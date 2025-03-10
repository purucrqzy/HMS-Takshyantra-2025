<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db_connection.php';

// Check if the roll number is stored in the session
if (isset($_SESSION['rollno'])) {
    $rollno = $_SESSION['rollno']; // Use the session variable

    // Query the 'hostel_students' table using rollno
    $sql = "SELECT rollno, room_no, admitted_on FROM hostel_students WHERE rollno = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $rollno);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Store additional details in the session
        $_SESSION['room_no'] = $row['room_no'];
        $_SESSION['admitted_on'] = $row['admitted_on'];

    } else {
        echo "<script type='text/javascript'>alert('You yet have not Enrolled in the Hostel');</script>";
        // echo "No student found with the given roll number.";
    }

    $stmt->close();
} else {
    echo "No student is logged in.";
}

$conn->close();

?>