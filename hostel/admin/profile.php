<?php
session_start();
include '../php/admin/fetch_admin_data.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Profile</title>
    <link rel="stylesheet" href="../css/admin/profile.css">
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
                <li><a href="create_hm.html">Hostel Manager</a></li>
                <li><a href="students.html">Students</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="../php/admin/logout.php">Logout</a></li>

            </ul>
        </nav>
    </header>



    <!-- The profile page html starts here -->
    <div class="profile-container">
        <div class="profile-section profile-left">
            <img class="profile-image"
                src="../media/images/profile.png"
                alt="Profile Image">
            <h3 class="profile-name"><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?> <?php echo isset($_SESSION['surname']) ? $_SESSION['surname'] : ''; ?></h3>
            <p class="profile-email"><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></p>
        </div>
    
        <div class="profile-section profile-middle">
            <h4 class="profile-title">Profile</h4>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input id="firstName" name="username" type="text" placeholder="Your Name"
                    value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input id="lastName" name="surname" type="text" placeholder="Your Surname"
                    value="<?php echo isset($_SESSION['surname']) ? $_SESSION['surname'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="Your Username"
                    value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="text" placeholder="Enter your email"
                    value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="mobileNumber">Mobile Number</label>
                <input id="mobileNumber" type="text" placeholder="Enter phone number"
                    value="<?php echo isset($_SESSION['mobile_no']) ? $_SESSION['mobile_no'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input id="age" type="text" placeholder="Enter your Age"
                    value="<?php echo isset($_SESSION['age']) ? $_SESSION['age'] : ''; ?>">
            </div>
        </div>

        <div class="profile-section profile-right">
            <h4 class="profile-title">Additional Details</h4>
            <div class="form-group">
                <label for="address1">Created on:</label>
                <input id="address1" type="text" placeholder="Account Created on"
                    value="<?php echo isset($_SESSION['created_at']) ? $_SESSION['created_at'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="address2">Address</label>
                <input id="address2" type="text" placeholder="Enter address line 2"
                    value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="postcode">Postcode</label>
                <input id="postcode" type="text" placeholder="Enter postcode"
                    value="<?php echo isset($_SESSION['postcode']) ? $_SESSION['postcode'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input id="state" type="text" placeholder="Enter state"
                    value="<?php echo isset($_SESSION['state']) ? $_SESSION['state'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="education">Education</label>
                <input id="education" type="text" placeholder="Enter education"
                    value="<?php echo isset($_SESSION['education']) ? $_SESSION['education'] : ''; ?>">
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