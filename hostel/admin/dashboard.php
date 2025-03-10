<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Home</title>
    <link rel="stylesheet" href="../css/admin/admin_home.css">
    <script defer src="../javascript/common_dashboard_slider.js"></script>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo-container">
            <img src="../media/images/1.png" alt="Logo" class="logo">
            <h1>Home</h1>
        </div>
        <nav class="header-nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="create_hm.html">Hostel Manager</a></li>
                <li><a href="students.html">Students</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="../php/admin/logout.php">Logout</a></li>

            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- slider banner -->
        <div class="unique-slider-container">
            <div class="unique-slider">
                <div class="unique-slide">
                    <img src="../media/images/1.png" alt="Image 1">
                    <div class="unique-slider-overlay">
                        <h1>HOSTEL MANAGEMENT SYSTEM</h1>
                    </div>
                </div>
                <div class="unique-slide">
                    <img src="../media/images/2.png" alt="Image 2">
                    <div class="unique-slider-overlay">
                        <h1>ROOMS</h1>
                    </div>
                </div>
                <div class="unique-slide">
                    <img src="../media/images/3.png" alt="Image 3">
                    <div class="unique-slider-overlay">
                        <h1>HOSTELS</h1>
                    </div>
                </div>
                <div class="unique-slide">
                    <img src="../media/images/4.png" alt="Image 4">
                    <div class="unique-slider-overlay">
                        <h1>Welcome to Slide 4</h1>
                        <p>Subtitle for Slide 4</p>
                    </div>
                </div>
            </div>
            <button class="unique-prev-btn">&#10094;</button>
            <button class="unique-next-btn">&#10095;</button>
        </div>
        <!-- slider banner close -->
    </main>

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

</html>