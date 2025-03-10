<?php
session_start();
// Include the database connection file
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $rollno = $_POST['rollno'];
    $sname = $_POST['sname'];
    $fname = $_POST['fname'];
    $surname = $_POST['surname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $department = $_POST['department'];
    $yearofstudy = $_POST['yearofstudy'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $hostel_preference = $_POST['hostelPreference'];
    $remark = $_POST['remark'];

    // Prepare an SQL query to insert data
    $sql = "INSERT INTO applications (rollno, sname, fname, surname, dob, email, phone, gender, course, department, yearofstudy, address, postcode, state, district, hostel_preference, remark)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Initialize a prepared statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param(
            "sssssssssssssssss",
            $rollno,
            $sname,
            $fname,
            $surname,
            $dob,
            $email,
            $phone,
            $gender,
            $course,
            $department,
            $yearofstudy,
            $address,
            $postcode,
            $state,
            $district,
            $hostel_preference,
            $remark
        );

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: /hostel/student/hostel.html");
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
