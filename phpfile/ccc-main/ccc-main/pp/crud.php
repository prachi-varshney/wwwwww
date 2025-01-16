<?php
require 'database.php';

function stateList(){
    $db = new Database();
    $query = "SELECT * FROM state_master";
    $result = $db->getData($query);
    
    $html = '';  

    if ($result['success'] == true) {
        foreach ($result['data'] as $value) {
            $html .= '<option value="' . $value['state_id'] . '">' . $value['state_name'] . '</option>';
        }
    }

    return $html;
    
}

function districtList($id){
    $db = new Database();
    $query = "SELECT * FROM district_master WHERE state_id = ".$id;
    $result = $db->getData($query);
    
    $html = '';  

    if ($result['success'] == true) {
        foreach ($result['data'] as $value) {
            $html .= '<option value="' . $value['district_id'] . '">' . $value['district_name'] . '</option>';
        }
    }

    return $html;
    
}

function tableList(){
    $db = new Database();
    $query = "SELECT t1.*,t2.state_name AS state,t3.district_name AS district FROM empp AS t1 LEFT JOIN state_master as t2 ON t1.state = t2.state_id LEFT JOIN district_master AS t3 ON t3.district_id = t1.districts";
    $result = $db->getData($query);
    
    $html = '';  

    if($result['success'] == true){
        foreach($result['data'] as $value){
            $hobbies = $value['hobbies'].', '.$value['other_hobbies'];
            $html .= '<tr>';
            $html .= '<td> <a href="javascript:void(0);" style="text-decoration:none" onclick="getFromData(' . $value['id'] . ')" >#' .$value['id']. '</a></td>';
            $html .= '<td>' . $value['name'] . '</td>';
            $html .= '<td>' . $value['email'] . '</td>';
            $html .= '<td>' . $value['phone_no'] . '</td>';
            // $html .= '<td>' . $value['dob'] . '</td>';
            $html .= '<td>' . date('d/m/y', strtotime($value['dob'])) . '</td>';
            $html .= '<td>' . $value['experience'] . '</td>';
            $html .= '<td>' . $value['gender'] . '</td>';
            $html .= '<td>' .  $hobbies . '</td>';
            $html .= '<td>' . $value['salary'] . '</td>';
            $html .= '<td>' . $value['address'] . ', ' . $value['state'] . ', ' . $value['district'] . ' - ' . $value['pincode'] . '</td>';
            
            $html .= '<td>' . $value['bio'] . '</td>';
         
            $html .= '<td> <img style="max-width:20px; min-width:20px"  src=' . (!empty($value['Image']) ? $value['Image'] : 'No Image') . ' ></td>'; 

            $html .= '<td>
            <button class="btn btn-sm btn-primary" onclick="getFromData(' . $value['id'] . ')" >edit</button>
            <button class="btn btn-sm btn-danger" onclick="deleteData(' . $value['id'] . ')" >delete</button>
          </td>';
            $html .= '</tr>';
        }
    }

    return $html;
}

function addEditForm($post) {
    $db = new Database();
    // print_r($post);die;
        $formData = [];
        foreach ($post as $key => $value) {
            $formData[$key] = isset($value) ? $value : '';
        }
        $formData['hobbies'] = isset($post['hobbies']) ? implode(',', $post['hobbies']) : '';
        $formData['language'] = isset($post['language']) ? implode(',', $post['language']) : '';
        $id = isset($formData['id'])?$formData['id']:0;
        $name = $formData['name'];
        $email = $formData['email'];
        $phone_no = $formData['phone_no'];
        $dob = !empty(date('d/m/y', strtotime($formData['dob'])))?$formData['dob']:"";
        $gender = isset($formData['gender'])?$formData['gender']:NULL;
        $experience = $formData['experience'];
        $salary = !empty($formData['salary'])?$formData['salary']:'0.00';
        $state = !empty($formData['state'])?$formData['state']:0;
        $district = !empty($formData['district'])?$formData['district']:0;
        $pincode = $formData['pincode'];
        $hobbies = $formData['hobbies'];
        $other_hobbies = $formData['other_hobbies'];
//print_r($other_hobbies);die;
        $bio = $formData['bio'];
        $address = $formData['address'];
        
        $err = [];

        if (empty($dob)) {
            $err[] = "Dob cannot be empty.";
        }

        if (empty($name)) {
            $err[] = "Name cannot be empty.";
        }

        if (empty($email)) {
            $err[] = "Email cannot be empty.";
        }

        if (empty($phone_no)) {
            $err[] = "Phone number cannot be empty.";
        }

        if (empty($state)) {
            $err[] = "State cannot be empty.";
        }

        if (empty($district)) {
            $err[] = "district cannot be empty.";
        }

        if (!empty($err)) {
            foreach ($err as $message) {
                return array("success"=>false,"message"=>$message);
                break;
            }
        }


        $target_file = '';
        if (isset($_FILES['profile']) && $_FILES['profile']['error'] == 0) {
            $target_dir = "uploads/"; 
            $target_file = $target_dir . time().str_replace(' ','',$_FILES["profile"]["name"]);
           move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
              
        }

        $image_update = $target_file;

        if(empty($image_update)){
            $image_update = "";
        }
        else{
            $image_update = ", Image = '$image_update'";
        }

        $query =  "";
        if (empty($id)) {
            $query = "INSERT INTO empp (name, email, phone_no, dob, experience, salary,gender, state, districts, pincode, hobbies, bio, address,Image,other_hobbies)
            VALUES ('$name', '$email', '$phone_no', '$dob', '$experience', '$salary', '$gender', '$state', '$district', '$pincode', '$hobbies', '$bio', '$address' , '$target_file','$other_hobbies')";
        } else {
            $query = "UPDATE empp 
            SET name = '$name', email = '$email', phone_no = '$phone_no', dob = '$dob', experience = '$experience', salary = '$salary', state = '$state', districts = '$district', pincode = '$pincode', hobbies = '$hobbies', bio = '$bio', address = '$address' $image_update ,other_hobbies = '$other_hobbies'
            WHERE id = '$id'";
        }

        $image = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "uploads/"; 
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = $target_file;
            }
        }

        $db_resp = $db->runQuery($query);
        if($db_resp){
            return array("success"=>true,"message"=>"Recrod saved successfully");
        }else{
            return array("success"=>false,"message"=>"Failed to save");
        }
    
}


function getDetails($id){
    $db = new Database();
    $query = "SELECT * FROM empp WHERE id = ".$id;
    $dbresp = $db->getRowData($query);
    // print_r($dbresp);die;
    return $dbresp;
}

function deleteData($id){
    $db = new Database();
    $query = "DELETE FROM empp WHERE id = ".$id;
    return $db->runQuery($query);
}


$req_type = $_POST['type'];
unset($_POST['type']);
$post = $_POST;
if(!empty($req_type)){
    if($req_type == "list"){
        echo tableList();  
    }else if($req_type == "addupdate"){
       $respone = addEditForm($post);
       echo json_encode($respone);
    }elseif($req_type == "edit"){
        $result = getDetails($post['id']);
        echo json_encode(array("success"=>false, "data"=>$result));
    }elseif($req_type == 'delete'){
        $result = deleteData($post['id']);
        echo json_encode(array("success"=>true, "message"=>"Record deleted"));
    }elseif($req_type == 'state'){
        echo stateList();  
    }elseif($req_type == 'district'){
        echo districtList($post['state_id']);  
    }

}


?>