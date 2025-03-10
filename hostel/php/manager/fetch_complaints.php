<?php
require 'db_connection.php'; // Include the database connection file

$sql = "SELECT rollno, name, surname, room_no, issue_type, remarks, status FROM complaints";
$result = $conn->query($sql);

$complaints = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $complaints[] = $row;
    }
}

// Close the connection
$conn->close();

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($complaints);
?>
