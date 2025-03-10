<?php
// Start the session first
session_start();

// Include the database connection file
require_once 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data and sanitize input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password']; // Password entered by the user
    // Fetch user data from 'student_access' table
    $sql = "SELECT * FROM student_access WHERE username = '$username'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch user data
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['rollno'] = $user['roll_no']; // Match the column name here

            // Debugging: Check roll number is set
            echo "Roll number set in session: " . $_SESSION['rollno'];

            // Redirect to dashboard
            header("Location: /hostel/student/dashboard.php");
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "No user found with that username.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
