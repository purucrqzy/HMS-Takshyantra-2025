<?php

require 'db_connection.php';

// Fetch records
$sql = "SELECT * FROM hostel_students";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
