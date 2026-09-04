<?php
require('../Including/db_connection.php');
session_start();
?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];  

        // Validate email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Invalid email format";
        }

        if(!empty($email) && !empty($password)){
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        $total = mysqli_num_rows($result);

        if($total == 1){
            $_SESSION['email'] = $email;
            $_SESSION['loggedin'] = true;
            // echo "<script>alert('login successfull')</script>";
            $_SESSION['status'] = "Login successfully!";
            $_SESSION['status_code'] = "success";
            ?>
            <meta http-equiv="refresh" content="0; url=http://localhost/dreamyrental/User/index.php">
            <?php
        }else{
            // echo "<script>alert('Invalid password')</script>";
            $_SESSION['status'] = "Invalid Password/Email!";
            $_SESSION['status_code'] = "error";
            ?>

            <meta http-equiv="refresh" content="0; url=http://localhost/dreamyrental/User/index.php">
            <?php
        }
    }else{
        // echo "<script>alert('Please fill all the fields')</script>";
        $_SESSION['status'] = "Please fill all the fields!";
        $_SESSION['status_code'] = "error";
        ?>

        <meta http-equiv="refresh" content="0; url=http://localhost/dreamyrental/User/index.php">
        <?php
    }
}

?>