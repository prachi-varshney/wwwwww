<?php
require 'database.php';
$req_type = $_POST['type'];
unset($_POST['type']);
$post_data = $_POST;

function tableList(){
    $db = new Database();
    $query = "SELECT * FROM empp";
    $result = $db->getData($query);
    
    $html = '';  

    if($result['success'] == true){
        foreach($result['data'] as $value){
            $html .= '<tr>';
            $html .= '<td>' . $value['id'] . '</td>';
            $html .= '<td>' . $value['name'] . '</td>';
            $html .= '<td>' . $value['email'] . '</td>';
            $html .= '<td>' . $value['phone_no'] . '</td>';
            $html .= '<td>' . $value['dob'] . '</td>';
            $html .= '<td>' . $value['experience'] . '</td>';
            $html .= '<td>' . $value['gender'] . '</td>';
            $html .= '<td>' . $value['hobbies'] . '</td>';
            $html .= '<td>' . $value['salary'] . '</td>';
            $html .= '<td>' . $value['address'] . ', ' . $value['state'] . ', ' . $value['districts'] . ' - ' . $value['pincode'] . '</td>';
            
            $html .= '<td>' . $value['bio'] . '</td>';
         
     
            $html .= '<td><img src="' . (isset($value['image']) ? $value['image'] : 'no-image.jpg') . '" alt="Image" width="50" height="50"></td>';

            $html .= '<td>
                        <button class="btn btn-sm btn-primary">edit</button>
                        
                       

                        <button class="btn btn-sm btn-danger" data-id="' . $value['id'] . '">delete</button>
                      </td>';
            $html .= '</tr>';
        }
    }

    return $html;
}

function addEditForm() {
    $db = new Database();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $dob = !empty($_POST['dob']) ? $_POST['dob'] : NULL;  
    $experience = !empty($_POST['experience']) ? $_POST['experience'] : NULL; 
    $salary = !empty($_POST['salary']) ? $_POST['salary'] : NULL;  
    $state = !empty($_POST['state']) ? $_POST['state'] : NULL;  
    $districts = $_POST['districts'];
    $pincode = $_POST['pincode'];
    $bio = !empty($_POST['bio']) ? $_POST['bio'] : ''; 
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    // $hobbies = $_POST['hobbies'];
    $hobbies = implode(',', $_POST['hobbies']);
    

    $image = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir = "uploads/"; // Create this directory if it doesn't exist
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = $target_file;
    }
}

$query = "INSERT INTO empp (name, email, phone_no, dob, experience, salary, state, districts, pincode, bio, address, gender, hobbies, image) 
          VALUES ('$name', '$email', '$phone_no', '$dob', '$experience', '$salary', '$state', '$districts', '$pincode', '$bio', '$address', '$gender', '$hobbies', '$image')";
  
    return $db->runQuery($query);
}

if(!empty($req_type)){
    if($req_type == "list"){
        echo tableList();  
    }else if($req_type == "addupdate"){
       $result = addEditForm();
       echo json_encode(array('success'=>true,'message'=>"Data submitted."));
    }
}


?>