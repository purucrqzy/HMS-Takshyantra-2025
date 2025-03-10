<?php
session_start();
// Include the database connection file
require_once 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data and sanitize input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile_no = mysqli_real_escape_string($conn, $_POST['mobile_no']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $year_of_study = mysqli_real_escape_string($conn, $_POST['yearofstudy']);
    $roll_no = mysqli_real_escape_string($conn, $_POST['rollno']);
    $past_education = mysqli_real_escape_string($conn, $_POST['pasteducation']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);

    // Prepare the SQL query to insert the data into the table
    $sql = "INSERT INTO student_access (
        username, email, mobile_no, name, surname, password, dob, course, department, year_of_study, roll_no, past_education, gender, address, postcode, state, district
    ) VALUES (
        '$username', '$email', '$mobile_no', '$name', '$surname', '$password', '$dob', '$course', '$department', '$year_of_study', '$roll_no', '$past_education', '$gender', '$address', '$postcode', '$state', '$district'
    )";

    // Execute the query and check for success
    if (mysqli_query($conn, $sql)) {
        echo "student registered successfully!";
        header("Location: /hostel/student/login.html");
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
