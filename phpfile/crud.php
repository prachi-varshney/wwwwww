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
            $html .= '<td>' . $value['gender'] . '</td>';
            $html .= '<td>' . $value['hobbies'] . '</td>';
            $html .= '<td>' . $value['salary'] . '</td>';
            $html .= '<td>' . $value['address'] . '</td>';
            $html .= '<td>' . $value['image'] . '</td>';
            $html .= '<td>
                        <button class="btn btn-sm btn-primary">edit</button>
                        <button class="btn btn-sm btn-danger">delete</button>
                      </td>';
            $html .= '</tr>';
        }
    }

    return $html;
}

// function addEditForm(){
//     print_r($_POST);die;
// }

function addEditForm() {
    $db = new Database();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $dob = !empty($_POST['dob']) ? $_POST['dob'] : NULL;  
    $experience = !empty($_POST['experience']) ? $_POST['experience'] : NULL; 
    $salary = !empty($_POST['salary']) ? $_POST['salary'] : NULL;  
    $state = !empty($_POST['state']) ? $_POST['state'] : NULL;  
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $bio = !empty($_POST['bio']) ? $_POST['bio'] : ''; 
    $address = $_POST['address'];
  
    $query = "INSERT INTO empp (name, email, phone_no, dob, experience, salary, state, city, pincode, bio, address) 
              VALUES ('$name', '$email', '$phone_no', '$dob', '$experience', '$salary', '$state', '$city', '$pincode', '$bio', '$address')";
  
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
