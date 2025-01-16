<?php

class Database {

private $username = "root";
private $password = "";
private $hostname = "localhost";
private $dbname = "test";
private $connection = NULL;

function __construct() {
    $this->connection = $this->db_connect();
}

function db_connect() {
    $conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
    if ($conn->connect_errno) {
        return (object) array('message' => "Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
}

function getdata($query = "") {
    try {
        if ($this->connection) {
            $result = $this->connection->query($query);

            // Check if the query is a SELECT query
            if (stripos($query, 'SELECT') === 0) {
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    return array("success" => true, "message" => "Data found", "data" => $result->fetch_all(MYSQLI_ASSOC));
                } else {
                    return array("success" => false, "message" => "No data found", "data" => array());
                }
            } 
            // Handle UPDATE, INSERT, DELETE queries
            else {
                if ($result === true) {
                    $affected_rows = $this->connection->affected_rows;
                    return array("success" => true, "message" => "Query executed successfully", "affected_rows" => $affected_rows);
                } else {
                    return array("success" => false, "message" => "Query execution failed", "error" => $this->connection->error);
                }
            }
        } else {
            return array("success" => false, "message" => "Database connection error", "data" => array());
        }
    } catch (Exception $e) {
        return array("success" => false, "message" => $e->getMessage(), "data" => array());
    }
}
}


?>