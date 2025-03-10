<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection file
include 'db_connection.php';

// Check if the user is logged in (session contains hostel manager username)
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Prepare the SQL query to fetch hostel manager data based on username
    $sql = "SELECT username, firstname, lastname, gender, dob, mobile_number, smobile_no, hostel_code, email, address, created_at 
            FROM hostel_manager WHERE username = ?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); // Bind the hostel manager username to the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if hostel manager data exists
    if ($result->num_rows > 0) {
        // Fetch the hostel manager data
        $row = $result->fetch_assoc();

        // Store the hostel manager details in session variables
        $_SESSION['username'] = $row['username'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['mobile_number'] = $row['mobile_number'];
        $_SESSION['hostel_code'] = $row['hostel_code'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['created_at'] = $row['created_at'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['dob'] = $row['dob'];
        $_SESSION['smobile_no'] = $row['smobile_no'];

    } else {
        // No hostel manager found with the given username
        echo "No hostel manager found with the given username.";
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // If no hostel manager is logged in, display an error message
    echo "No hostel manager is logged in.";
}

// Close the database connection
$conn->close();
?>
