<?php
$host = "localhost";
$dbname = "hostel_management";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password

// Create Connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
