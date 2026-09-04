<?php
require('../Including/db_connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- primary meta tags -->
    <title>Admin Login</title>
    <meta name="description" content="A website to rent rooms at affordable prices.">

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/logo/favicon.svg" type="image/svg+xml">

    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- google icon link -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0..1,0" />


    <!-- custome links css      -->
    <link rel="stylesheet" href="../css/customeproperties.css">
    <link rel="stylesheet" href="../css/typography.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/adminlogin.css">

</head>

<body>

    <main>
        <article>

            <div class="form-container">

                <div class="form">

                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

                        <h2 class="title-medium">Admin Login Pannel</h2>

                        <h3 class="text-small">Access to our dashboard</h3>

                        <div class="from-content">

                            <div class="form-content">
                                <input type="name" name="name" required maxlength="50" placeholder="Username"
                                    id="Username">
                                <span class="material-symbols-rounded loginicon">person</span>
                            </div>

                            <div class="form-content">
                                <input type="password" name="password" required maxlength="20" placeholder="Password"
                                    id="password">
                                <span class="material-symbols-rounded loginicon">lock</span>
                            </div>

                            <input type="submit" class="contact-btn" name="login" value="Log in"
                                style="background: var(--gradient);">

                        </div>

                    </form>

                </div>

            </div>

        </article>
    </main>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['name'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM adminlogin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        $total = mysqli_num_rows($result);

        // echo $total;
    
        if ($total == 1) {



            $_SESSION['username'] = $username;
            header('location: dashboard.php');
        } else {
            // echo "<script>alert('Invalid password')</script>";
            $_SESSION['status'] = "Invalid Username or Password!";
            $_SESSION['status_code'] = "error";

            ?>
            <meta http-equiv="refresh" content="2; url=http://localhost/dreamyrental/admin/index.php">
            <?php
        }
    }
    ?>
<?php
require("Includefile/popup.php");
?>    

</body>

<script src="../JavaScripts/adminlogin.js"></script>

</html>