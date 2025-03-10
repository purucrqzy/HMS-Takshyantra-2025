<?php
// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection file
include 'db_connection.php';

// Check if the user is logged in (session contains student username)
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Prepare the SQL query to fetch student data based on username
    $sql = "SELECT name, surname, username, email, mobile_no, dob, course, department, year_of_study, roll_no, past_education, gender, address, postcode, state, district, created_on 
            FROM student_access WHERE username = ?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);  // Bind the student username to the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if student data exists
    if ($result->num_rows > 0) {
        // Fetch the student data
        $row = $result->fetch_assoc();

        // Store the student details in session variables
        $_SESSION['name'] = $row['name'];
        $_SESSION['surname'] = $row['surname'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['mobile_no'] = $row['mobile_no'];
        $_SESSION['dob'] = $row['dob'];
        $_SESSION['course'] = $row['course'];
        $_SESSION['department'] = $row['department'];
        $_SESSION['year_of_study'] = $row['year_of_study'];
        $_SESSION['roll_no'] = $row['roll_no'];
        $_SESSION['past_education'] = $row['past_education'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['postcode'] = $row['postcode'];
        $_SESSION['state'] = $row['state'];
        $_SESSION['district'] = $row['district'];
        $_SESSION['created_on'] = $row['created_on'];
    } else {
        // No student found with the given username
        echo "No student found with the given username.";
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // If no student is logged in, display an error message
    echo "No student is logged in.";
}

// Close the database connection
$conn->close();
