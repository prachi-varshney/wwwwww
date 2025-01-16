<?php
if (isset($_POST["search"])) {
    $search_value = $_POST["search"];
} else {
    $search_value = '';
}

require 'database.php';

function tableList($search_value){
    $db = new Database();
    $query = "SELECT * FROM empp where name like '%{$search_value}%'";
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

echo tableList($search_value);
?>