<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db_connection.php';

if (isset($_SESSION['admin_username'])) {
    $admin_username = $_SESSION['admin_username'];

    $sql = "SELECT name, surname, username, email, mobile_no, age, created_at, address, postcode, state, education  FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $admin_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['name'] = $row['name'];
        $_SESSION['surname'] = $row['surname'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['mobile_no'] = $row['mobile_no'];
        $_SESSION['age'] = $row['age'];
        // $_SESSION['created_at'] = date('Y-m-d H:i:s'); 
        $_SESSION['created_at'] = $row['created_at']; 
        $_SESSION['address'] = $row['address'];
        $_SESSION['postcode'] = $row['postcode'];
        $_SESSION['state'] = $row['state'];
        $_SESSION['education'] = $row['education'];


    } else {
        echo "No admin found with the given username.";
    }
    $stmt->close();
} else {
    echo "No admin is logged in.";
}

$conn->close();
?>
