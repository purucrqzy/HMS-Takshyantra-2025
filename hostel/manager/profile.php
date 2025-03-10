<?php
session_start();
include '../php/manager/fetch_manager_data.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager | Profile</title>
    <link rel="stylesheet" href="../css/manager/profile.css">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo-container">
            <img src="../media/images/1.png" alt="Logo" class="logo">
            <h1>Profile</h1>
        </div>
        <nav class="header-nav">
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="hostel_applications.html">Applications</a></li>
                <li><a href="students.html">Students</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="complaints.html">Messages</a></li>
                <li><a href="../php/manager/logout.php">Logout</a></li>

            </ul>
        </nav>
    </header>



    <!-- The profile page html starts here -->
    <div class="profile-container">
        <div class="profile-section profile-left">
            <img class="profile-image"
                src="../media/images/profile.png"
                alt="Profile Image">
            <h3 class="profile-name"><?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : ''; ?> <?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : ''; ?></h3>
            <p class="profile-email"><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></p>
        </div>

        <div class="profile-section profile-middle">
            <h4 class="profile-title">Profile</h4>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input id="firstname" name="name" type="text"
                    value="<?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input id="lastname" name="surname" type="text"
                    value="<?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" name="username" type="text"
                    value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="text"
                    value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
            </div>

            <div class="form-group">
                <label for="hostelcode">Hostel Code:</label>
                <input id="hostelcode" name="hostelcode" type="text"
                    value="<?php echo isset($_SESSION['hostel_code']) ? $_SESSION['hostel_code'] : ''; ?>">
            </div>

            <div class="form-group">
                <label for="createdon">Account Created on:</label>
                <input id="createdon" name="created_on" type="text"
                    value="<?php echo isset($_SESSION['created_at']) ? $_SESSION['created_at'] : ''; ?>">
            </div>
        </div>




        <div class="profile-section profile-right">
            <h4 class="profile-title">Personal Details</h4>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input id="gender" name="gender" type="text"
                    value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="gender">Date of Birth:</label>
                <input id="dob" name="dob" type="text"
                    value="<?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : ''; ?>">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input id="address" name="address" type="text"
                    value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>">
            </div>

            <div class="form-group">
                <label for="mobileno">Mobile Number</label>
                <input id="mobileno" name="mobile_no" type="text"
                    value="<?php echo isset($_SESSION['mobile_number']) ? $_SESSION['mobile_number'] : ''; ?>">
            </div>

            <div class="form-group">
                <label for="smobile_no">Second Contact No:</label>
                <input id="smobile_no" name="smobile_no" type="text"
                    value="<?php echo isset($_SESSION['smobile_no']) ? $_SESSION['smobile_no'] : ''; ?>">
            </div>


            <div class="form-group">
                <label for="button">Use This Button to Edit Details</label>
                <button class="edit-btn">Edit Profile</button>
            </div>

        </div>
    </div>



    <!-- Footer -->
    <footer>
        <nav class="footer-nav">
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <br>
        <p>&copy; 2024 MyWeb. All rights reserved.</p>
    </footer>
</body>
<script src="../javascript/common_profile.js"></script>

</html>