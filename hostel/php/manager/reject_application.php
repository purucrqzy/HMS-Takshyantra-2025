<?php
$data = json_decode(file_get_contents("php://input"), true);
$rollno = $data['rollno'];

require 'db_connection.php';


// Delete the application from the applications table
$sql = "DELETE FROM applications WHERE rollno = '$rollno'";
$conn->query($sql);

$conn->close();
?>
