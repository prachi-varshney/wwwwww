<?php

include("database.php"); // Include your database connection file

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Instantiate the Database class
    $db = new Database();

    
    $query = "DELETE FROM empp WHERE id = $id";

    // Use the runQuery method to execute the query
    $result = $db->runQuery($query);

    if ($result) {
        echo 1; // Success
    } else {
        echo 0; // Failure
    }
} else {
    echo 0; // Invalid request
}
?>