<?php
session_start(); // Start the session

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL query to fetch the hashed password for the provided username
    $sql = "SELECT password FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        // Verify the provided password against the hashed password in the database
        if (password_verify($password, $hashed_password)) {
            // Successful login, set session variables
            $_SESSION['admin_username'] = $username; // Store username in session
            $_SESSION['admin_logged_in'] = true; // Optional flag to check login status
            header("Location: /hostel/admin/dashboard.php"); // Redirect to the dashboard
            exit();
        } else {
            // Password does not match
            echo "Invalid Credentials, check again!";
        }
    } else {
        // No user found with the provided username
        echo "User not found.";
    }

    $stmt->close(); // Close the statement
    $conn->close(); // Close the database connection
}
?>
