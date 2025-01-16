<?php
require 'database.php';

$req_type = $_POST['type'] ?? '';
$page_no = $_POST['page_no'] ?? 1;

function tableList($page_no) {
    $db = new Database();
    $limit = 5; // Number of records per page

$page ="";
if (isset($_POST["page_no"])) {
    $page = $_POST["page_no"];
}else{
    $page = 1;
}

    $offset = ($page_no - 1) * $limit; // Offset for pagination

    $query = "SELECT * FROM empp LIMIT $limit OFFSET $offset";
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
            $html .= '<td>' . $value['address'] . ', ' . $value['state'] . ', ' . $value['city'] . ' - ' . $value['pincode'] . '</td>';
            
            $html .= '<td>' . $value['bio'] . '</td>';
         
            // $html .= '<td>' . $value['image'] . '</td>';

            $html .= '<td>' . (isset($value['image']) ? $value['image'] : 'No Image') . '</td>'; // Handle missing image

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
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $bio = !empty($_POST['bio']) ? $_POST['bio'] : ''; 
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobbies'];

    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/"; // Create this directory if it doesn't exist
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        }
    }

    $query = "INSERT INTO empp (name, email, phone_no, dob, experience, salary, state, city, pincode, bio, address, gender, hobbies) 
              VALUES ('$name', '$email', '$phone_no', '$dob', '$experience', '$salary', '$state', '$city', '$pincode', '$bio', '$address', '$gender', '$hobbies')";
  
    return $db->runQuery($query);
}

if(!empty($req_type)){
    if($req_type == "list"){
        echo tableList($page_no);  // Pass $page_no as an argument
    }else if($req_type == "addupdate"){
       $result = addEditForm();
       echo json_encode(array('success'=>true,'message'=>"Data submitted."));
    }
}
?>