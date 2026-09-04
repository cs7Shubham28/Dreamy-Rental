<?php
require('../Including/db_connection.php');
require('session_check.php');

// Fetch current date and time
$currentDateTime = date("Y-m-d H:i:s");

if (isset($_GET['id']) && isset($_SESSION['email'])) {
    $property_id = mysqli_real_escape_string($conn, $_GET['id']);
    $user_email = $_SESSION['email'];

    // Update the booking details
    $sql = "UPDATE property SET booking = 0, isread = 2, cancel = 1, bookingdate = '$currentDateTime' WHERE id = '$property_id' AND user_email = '$user_email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Booking canceled successfully!";
        $_SESSION['status_code'] = "success";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/booking.php'>";
    } else {
        $_SESSION['status'] = "Failed to cancel the booking.";
        $_SESSION['status_code'] = "error";
    }


} else {
    $_SESSION['status'] = "Invalid request.";
    $_SESSION['status_code'] = "error";

}
