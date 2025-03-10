<?php
// Get the data sent from the client (JavaScript)
$data = json_decode(file_get_contents("php://input"), true);
$rollno = $data['rollno'];
$roomNo = $data['roomNo'];

require 'db_connection.php';


// SQL query to insert the approved application data into the hostel_students table
$sql = "INSERT INTO hostel_students 
    (rollno, sname, fname, surname, dob, email, phone, gender, course, department, yearofstudy, address, postcode, state, district, hostel_preference, remark, applied_on, room_no, admitted_on) 
    SELECT rollno, sname, fname, surname, dob, email, phone, gender, course, department, yearofstudy, address, postcode, state, district, hostel_preference, remark, applied_on, '$roomNo', NOW() 
    FROM applications WHERE rollno = '$rollno'";

// Execute the insert query to move data into hostel_students
if ($conn->query($sql) === TRUE) {
    
    // SQL query to delete the approved application from the applications table
    $delete_sql = "DELETE FROM applications WHERE rollno = '$rollno'";
    
    // Execute the delete query to remove the application
    if ($conn->query($delete_sql) === TRUE) {
        // Success: application has been approved and moved to hostel_students
        echo "Application approved and moved to hostel_students table.";
    } else {
        // Error: failed to delete the application
        echo "Error deleting application from applications table: " . $conn->error;
    }
} else {
    // Error: failed to insert the application into hostel_students
    echo "Error transferring data to hostel_students: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
