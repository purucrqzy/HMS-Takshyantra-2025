<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch form data
    $username = $_POST['username'];
    $hostel_code = $_POST['hostelcode'];
    $admin_password = $_POST['adminpassword']; // Validate admin password in real implementation
    $confirm = $_POST['adminpassword']; // This should be the same text entered in the confirm field

    // Validate if the confirm field contains the expected text "confirm"
    if ($confirm !== "confirm") {
        echo "Error: You must type 'confirm' in the confirmation field to delete.";
    } else {
        // Prepare the SQL query to check if the record exists
        $sql = "SELECT * FROM hostel_manager WHERE username = ? AND hostel_code = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hostel_code);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Record found, proceed with deletion
            $sql = "DELETE FROM hostel_manager WHERE username = ? AND hostel_code = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $hostel_code);

            if ($stmt->execute()) {
                echo "Hostel Manager removed successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "No matching record found!";
        }

        $stmt->close();
    }

    $conn->close();
}
?>
