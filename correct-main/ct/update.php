<?php
include_once('ajax-load.php'); // Include your database connection file

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create an instance of the Database class
    $obj = new Database();

    // Prepare the delete query
    $query = "DELETE FROM empp WHERE ID = $id";

    // Execute the delete query
    $result = $obj->getData($query);

    if ($result) {
        // Redirect back to the main page after successful deletion
        header("Location: http://localhost:81/phpfile/tassk/ct/insert-data.php?");
        exit();
    } else {
        echo "Error deleting record.";
    }
} else {
    echo "No ID provided for deletion.";
}
?>