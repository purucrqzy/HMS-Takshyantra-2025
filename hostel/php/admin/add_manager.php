<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch form data
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $mobile_number = $_POST['mobile'];
    $smobile_no = $_POST['smobile_no'];
    $hostel_code = $_POST['hostelcode'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Insert into database
    $sql = "INSERT INTO hostel_manager (username, firstname, lastname, gender, dob, mobile_number, smobile_no, hostel_code, email, address, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $username, $firstname, $lastname, $gender, $dob, $mobile_number, $smobile_no, $hostel_code, $email, $address, $password);

    if ($stmt->execute()) {
        echo "Hostel Manager added successfully!";
        // header("Location: ../admin/create_hm.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
