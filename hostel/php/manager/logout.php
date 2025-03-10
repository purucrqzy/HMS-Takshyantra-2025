<?php
session_start();

// Destroy the session
session_unset();
session_destroy();

// Redirect to the dashboard or home page
header("Location: /hostel/manager/login.html");
exit();
