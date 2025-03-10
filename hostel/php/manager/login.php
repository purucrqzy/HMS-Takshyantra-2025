<?php
session_start();
require 'db_connection.php'; // Ensure this file connects to your database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($username) || empty($password)) {
        echo "Both fields are required.";
        exit();
    }

    // Query to fetch user data
    $sql = "SELECT * FROM hostel_manager WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['username'] = $user['username'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];

            // Redirect to the dashboard or home page
            header("Location: /hostel/manager/dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this username.";
    }
    $stmt->close();
    $conn->close();
}
?>
