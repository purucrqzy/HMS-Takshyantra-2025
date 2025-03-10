<?php
session_start();
include '../php/student/fetch_student_data.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
    <link rel="stylesheet" href="../css/student/application.css">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo-container">
            <img src="../media/images/1.png" alt="Logo" class="logo">
            <h1>Hostel Form</h1>
        </div>
        <nav class="header-nav">
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="hostel.html">Hostels</a></li>
                <li><a href="message.php">Message</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="../php/student/logout.php">Logout</a></li>

            </ul>
        </nav>
    </header>

    <!-- the main content -->
    <div class="form-container">
        <h1>Hostel Admission Application Form</h1>
        <form id="hostelForm" action="../php/student/application.php" method="post">
            <div class="form-wrapper">
                <!-- Left Section -->
                <div class="form-section left">
                    <label for="sname">Name:</label>
                    <input type="text" id="sname" name="sname"
                        value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>" required>

                    <label for="fname">Father's Name:</label>
                    <input type="text" id="fname" name="fname" placeholder="Enter your Father's Name" required>

                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname"
                        value="<?php echo isset($_SESSION['surname']) ? $_SESSION['surname'] : ''; ?>" required>

                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob"
                        value="<?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : ''; ?>" required>

                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email"
                        value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required>

                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone"
                        value="<?php echo isset($_SESSION['mobile_no']) ? $_SESSION['mobile_no'] : ''; ?>" required>

                    <label for="gender">Gender</label>
                    <input id="gender" name="gender" type="text" placeholder="Your Gender"
                        value="<?php echo isset($_SESSION['gender']) ? $_SESSION['gender'] : ''; ?>">

                    <label for="course">Course Enrolled:</label>
                    <input type="text" id="course" name="course"
                        value="<?php echo isset($_SESSION['course']) ? $_SESSION['course'] : ''; ?>" required>

                    <label for="department">Department:</label>
                    <input type="text" id="department" name="department"
                        value="<?php echo isset($_SESSION['department']) ? $_SESSION['department'] : ''; ?>">


                </div>

                <!-- Right Section -->
                <div class="form-section right">

                    <label for="yearofstudy">Year of Study:</label>
                    <input type="text" id="yearofstudy" name="yearofstudy"
                        value="<?php echo isset($_SESSION['year_of_study']) ? $_SESSION['year_of_study'] : ''; ?>"
                        required>

                    <label for="rollno">Student Special ID NO:</label>
                    <input type="text" id="rollno" name="rollno"
                        value="<?php echo isset($_SESSION['roll_no']) ? $_SESSION['roll_no'] : ''; ?>">

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" class="addressinput"
                        value="<?php echo isset($_SESSION['address']) ? $_SESSION['address'] : ''; ?>">

                    <label for="postcode">PostCode:</label>
                    <input type="text" id="postcode" name="postcode"
                        value="<?php echo isset($_SESSION['postcode']) ? $_SESSION['postcode'] : ''; ?>">

                    <label for="state">State:</label>
                    <input type="text" id="state" name="state"
                        value="<?php echo isset($_SESSION['state']) ? $_SESSION['state'] : ''; ?>">

                    <label for="district">District:</label>
                    <input type="text" id="district" name="district"
                        value="<?php echo isset($_SESSION['district']) ? $_SESSION['district'] : ''; ?>">

                    <label for="hostelPreference">Hostel Preference:</label>
                    <select id="hostelPreference" name="hostelPreference" required>
                        <option value="">Select</option>
                        <option value="single">Single Room</option>
                        <option value="shared">Shared Room</option>
                    </select>

                    <label for="remark">Remark:</label>
                    <textarea id="remark" name="remark" rows="2"></textarea>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit">Submit</button>
                <button type="button" id="clearForm">Clear</button>
            </div>
        </form>
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
<script src="../javascript/student/application.js"></script>
<script src="../javascript/student/hostel_application_validation.js"></script>
</html>