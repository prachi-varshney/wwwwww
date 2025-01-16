<?php
include("database.php");
$db = new Database();

// print_r($_POST);

if (isset($_REQUEST['state_id'])) {
    $state_id = $_REQUEST['state_id'];
    $sql = "SELECT district_name, district_id FROM district_master WHERE state_id =  $state_id";
    $params = [':state_id' => $state_id];
    $result = $db->getData($sql, $params);

    if ($result['success'] == true && !empty($result['data'])) {
        echo "<option value=''>Select </option>";
        foreach($result['data'] as $value){
            echo "<option value='{$value['district_id']}'>{$value['district_name']}</option>";
        }
    } else {
        echo "<option value=''>No districts found</option>";
    }
} else {
    echo "Error: state_id is not set.";
}
?>
