<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing the password
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $state = $_POST['state'];
    $education = $_POST['education'];
    $mobile_number = $_POST['mobile_no'];


    // Insert into the admin table
    $sql = "INSERT INTO admin (username, email, password, name, surname, age, address, postcode, state, education, mobile_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssssisssss", $username, $email, $password, $name, $surname, $age, $address, $postcode, $state, $education, $mobile_number);
        if ($stmt->execute()) {
            echo "Admin registered successfully!";
            header("Location: /hostel/admin/login.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
    $conn->close();
}
?>
