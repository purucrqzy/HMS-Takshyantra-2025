<?php
require 'db_connection.php'; // Include the database connection file

$data = json_decode(file_get_contents('php://input'), true);
$rollno = $data['rollno'];
$status = $data['status'];

// Update status in the database
$sql = "UPDATE complaints SET status = ?, created_at = NOW() WHERE rollno = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $status, $rollno);
$stmt->execute();

// Schedule deletion for "Resolved" complaints
if ($status === 'Resolved') {
    $delete_sql = "DELETE FROM complaints WHERE rollno = ? AND created_at < NOW() - INTERVAL 2 DAY";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $rollno);
    $delete_stmt->execute();
}

// Close the connection
$conn->close();

echo json_encode(['success' => true]);
?>
