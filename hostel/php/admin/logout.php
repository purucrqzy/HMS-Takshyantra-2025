<?php
session_start();
session_unset();
session_destroy();
header("Location: /hostel/admin/login.html");
exit();
?>
