<?php
require('../Including/db_connection.php');
session_start();
?>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset'])) {
    $email = $_POST['email'];
    $newpassword = isset($_POST['password']) ? $_POST['password'] : null;
    $cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : null;

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['status'] = "Invalid Email!";
        $_SESSION['status_code'] = "error";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/index.php'> ";
        exit();
    }

    // Check if passwords match
    if ($newpassword != $cpassword) {
        $_SESSION['status'] = "Passwords do not match!";
        $_SESSION['status_code'] = "error";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/index.php'> ";
        exit();
    }

    // Check if email exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        $_SESSION['status'] = "Email does not exist!";
        $_SESSION['status_code'] = "error";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/index.php'> ";
    }

    

    $sql = "UPDATE users SET password='$newpassword' WHERE email='$email'";
    $data = mysqli_query($conn, $sql);

    if ($data) {
        $_SESSION['status'] = "Password updated successfully!";
        $_SESSION['status_code'] = "success";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/index.php'> ";
        exit();
    } else {
        $_SESSION['status'] = "Failed to update password!";
        $_SESSION['status_code'] = "error";
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/index.php'> ";
        exit();
    }
} else {
    $_SESSION['status'] = "Please fill all fields!";
    $_SESSION['status_code'] = "error";
    echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/index.php'> ";
    exit();
}
?>