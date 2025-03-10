<?php
// Start session to use session variables
session_start();

// Include the database connection file
include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $roomNumber = mysqli_real_escape_string($conn, $_POST['roomNumber']);
    
    // Get the selected issues
    $selectedIssues = mysqli_real_escape_string($conn, $_POST['selectedIssues']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    
    // Default status for new complaints
    $status = "Pending";
    
    // Check if the student has already submitted a complaint
    $checkComplaintQuery = "SELECT * FROM complaints WHERE rollno = '$rollno' AND status = 'Pending'";
    $result = mysqli_query($conn, $checkComplaintQuery);
    
    if (mysqli_num_rows($result) > 0) {
        // If there's a pending complaint, prevent new submission
        $_SESSION['error_message'] = "You already have a pending complaint. Please wait until it's resolved.";
        header("Location: /hostel/student/message.php");
        exit;
    }
    
    // Insert data into the complaints table
    $sql = "INSERT INTO complaints (rollno, name, surname, room_no, issue_type, remarks, status, created_at) 
            VALUES ('$rollno', '$sname', '$surname', '$roomNumber', '$selectedIssues', '$remarks', '$status', NOW())";
    
    if (mysqli_query($conn, $sql)) {
        // Success message
        $_SESSION['success_message'] = "Complaint submitted successfully.";
    } else {
        // Error message
        $_SESSION['error_message'] = "Error submitting complaint: " . mysqli_error($conn);
    }
    
    // Redirect back to the form page or a confirmation page
    header("Location: /hostel/student/message.php");
    exit;
} else {
    // Redirect if the script is accessed directly
    header("Location: /hostel/student/message.php");
    exit;
}
?>
