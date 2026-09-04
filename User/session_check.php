<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // echo "<script>alert('Please login first!')</script>"; 
    $_SESSION['status'] = "You have to login first!";
    $_SESSION['status_code'] = "error";
    echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/index.php'>";
    exit();
}
?>
