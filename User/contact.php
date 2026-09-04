<?php
    require('../Including/db_connection.php');
    require('session_check.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- primary meta tags -->
    <title>Contact Us</title>
    <meta name="description" content="A website to rent rooms at affordable prices.">

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/logo/favicon.svg" type="image/svg+xml">

    <!-- links add  -->
    <?php require("../Including/links.php"); ?>

    <!-- custome css link -->
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/headernextpag.css">
</head>

<body>

    <!-- header section -->
    <?php
    require("../including/header.php");
    ?>



    <main>
        <article>

            <!-- login form -->
            <?php require("../Including/form.php"); ?>


            <!-- contacts section  -->
            <section class="section contact">
                <div class="container">

                    <h1 class="headline-large contact-title title">Contact Us</h1>

                    <div class="contact-row">
                        <div class="images">
                            <img src="../assets/images/contact-img2.svg" alt="contactimg">
                        </div>

                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                            <h3 class="title-large">Get in touch</h3>
                            <input type="text" name="name" required maxlength="50" placeholder="Enter your name"
                                class="box">

                            <input type="email" name="email" required maxlength="50" placeholder="Enter your email"
                                class="box">

                            <input type="tel" name="phone" required maxlength="10" min="0" max="9999999999"
                                placeholder="Enter your number" class="box">

                            <textarea name="message" id="msg" class="box" placeholder="Enter your message" required
                                cols="30" rows="10" maxlength="1000"></textarea>

                            <input type="submit" value="Send message" name="send" class="contact-btn">
                        </form>
                    </div>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $message = $_POST['message'];

                        // Validate email
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo "Invalid email format";
                        }

                        if(!empty($name) && !empty($email) && !empty($phone) && !empty($message)){
                            $sql = "INSERT INTO contact (name, email, contact, message) VALUES ('$name', '$email', '$phone', '$message')";
                            $result = mysqli_query($conn, $sql);

                            if($result){
                                // echo "<script>alert('Message sent successfully')</script>";
                                $_SESSION['status'] = "Message sent successfully!";
                                $_SESSION['status_code'] = "success";
                                echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/contact.php'>  ";
                            } else{
                                // echo "<script>alert('Failed to send message!');</script>";
                                $_SESSION['status'] = "Failed to send message!";
                                $_SESSION['status_code'] = "error";
                                echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/contact.php'>  ";
                            }
                        }else{
                            // echo "<script>alert('Please fill all the fields')</script>";
                            $_SESSION['status'] = "Please fill all fields!";
                            $_SESSION['status_code'] = "error";
                            echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/contact.php'>  ";
                        }

                    }

                    ?>

                </div>
            </section>


        </article>
    </main>


    <!-- footer section  -->

    <?php
    require("../including/footer.php");
    ?>

</body>

</html>