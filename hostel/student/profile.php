<?php
session_start();
include '../php/student/fetch_student_data.php';
include '../php/student/fetch_hostel_data.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student | Profile</title>
    <link rel="stylesheet" href="../css/student/profile.css?v=1.0">
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
                <li><a href="hostel.html">Hostels</a></li>
                <li><a href="message.php">Message</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="../php/student/logout.php">Logout</a></li>

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
            <p class="profile-email">Hostel Room No: <?php echo isset($_SESSION['room_no']) ? $_SESSION['room_no'] : ''; ?></p>
            <p class="profile-email">Admitted On:<br><?php echo isset($_SESSION['admitted_on']) ? $_SESSION['admitted_on'] : ''; ?></p>
        
        </div>
    
        <div class="profile-section profile-middle">
            <h4 class="profile-title">Profile</h4>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input id="firstname" name="name" type="text" placeholder="Your Name"
                    value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input id="lastname" name="surname" type="text" placeholder="Your Surname"
                    value="<?php echo isset($_SESSION['surname']) ? $_SESSION['surname'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="Your Username"
                    value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="text" placeholder="Your email"
                    value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="mobileno">Mobile Number</label>
                <input id="mobileno" name="mobile_no" type="text" placeholder="Your Phone Number"
                    value="<?php echo isset($_SESSION['mobile_no']) ? $_SESSION['mobile_no'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input id="dob" name="dob" type="text" placeholder="Your Date of Birth"
                    value="<?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : ''; ?>">
            </div>
        </div>


        <div class="profile-section profile-right">
            <h4 class="profile-title">Academic Details</h4>
            <div class="form-group">
                <label for="currentcourse">Current Course:</label>
                <input id="currentcourse" name="course" type="text" placeholder="Account Created on"
                    value="<?php echo isset($_SESSION['course']) ? $_SESSION['course'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input id="department" name="department" type="text" placeholder="Your Department"
                    value="<?php echo isset($_SESSION['department']) ? $_SESSION['department'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="yearofstudy">Year of Study</label>
                <input id="yearofstudy" name="year_of_study" type="text" placeholder="Your Year of Study"
                    value="<?php echo isset($_SESSION['year_of_study']) ? $_SESSION['year_of_study'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="rollno">Roll No</label>
                <input id="rollno" name="roll_no" type="text" placeholder="Your Roll No"
                    value="<?php echo isset($_SESSION['roll_no']) ? $_SESSION['roll_no'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="pasteducation">Past Education</label>
                <input id="pasteducation" name="past_education" type="text" placeholder="Your Past education"
                    value="<?php echo isset($_SESSION['past_education']) ? $_SESSION['past_education'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="createdon">Account Created on:</label>
                <input id="createdon" name="created_on" type="text" placeholder="Account Created on"
                    value="<?php echo isset($_SESSION['created_on']) ? $_SESSION['created_on'] : ''; ?>">
            </div>

        </div>



        <div class="profile-section profile-right">
            <h4 class="profile-title">Personal Details</h4>
           
            <div class="form-group">
                <label for="gender">Gender</label>
                <input id="gender" name="gender" type="text" placeholder="Your Gender"
                    value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input id="address" name="address" type="text" placeholder="Your Address"
                    value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="postcode">Postcode</label>
                <input id="postcode" name="postcode" type="text" placeholder="Your PostCode"
                    value="<?php echo isset($_SESSION['postcode']) ? $_SESSION['postcode'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input id="state" name="state" type="text" placeholder="Your State"
                    value="<?php echo isset($_SESSION['state']) ? $_SESSION['state'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input id="district" name="district" type="text" placeholder="Enter education"
                    value="<?php echo isset($_SESSION['district']) ? $_SESSION['district'] : ''; ?>">
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