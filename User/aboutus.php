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
    <title>About-Us</title>
    <meta name="description" content="A website to rent rooms at affordable prices.">

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/logo/favicon.svg" type="image/svg+xml">

    <!-- links add  -->
    <?php require("../Including/links.php"); ?>

    <!-- custome css link -->
    <link rel="stylesheet" href="../css/aboutus.css">
    <link rel="stylesheet" href="../css/headernextpag.css">
    <link rel="stylesheet" href="../css/login.css"> 

</head>

<body>

    <!-- header section -->
    <?php
    require("../including/header.php");
    ?>


    <?php
    $sql = "SELECT * FROM aboutcontent";

    $data = mysqli_query($conn, $sql);
 
    $result = mysqli_fetch_assoc( $data);
    ?>

    <main>
        <article>

            <!-- login form -->
            <?php require("../Including/form.php"); ?>


            <!-- about section  -->
            <section class="section aboutus">
                <div class="container">

                    <h1 class="headline-large about-title title">About Us</h1>

                    <div class="row">
                        <div class="video-holder">
                            <video src="../assets/images/3773486-hd_1280_720_60fps.mp4" autoplay muted loop></video>
                            <h3>Best Room Rental Portal</h3>
                        </div>

                        <div class="about-content">
                            <h3 class="headline-small about-subtitle"><?php echo $result['title'];?></h3>

                            <p class="body-large about-text">
                                <?php echo $result['content1'];?>
                            </p>
                            <p class="body-large about-text">
                                <?php echo $result['content2'];?>
                            </p>

                            <a href="../User/contact.php" class="btn btn-outline">
                                <span class="label-medium">Contact us</span>

                                <span class="material-symbols-rounded" aria-hidden="true">arrow_outward</span>
                            </a>

                        </div>

                    </div>

                    <!-- steps section  -->
                    <section class="section steps">
                        <h1 class="heading headline-small">Simple steps</h1>

                        <div class="box-container">

                            <div class="boxes">
                                <img src="../assets/images/step-1.png" alt="step1">
                                <div class="info">
                                    <h3 class="title-large headline">Search property</h3>
                                    <p class="body-medium">
                                        Discover a property that suits your budget and preferences.
                                    </p>
                                </div>
                            </div>

                            <div class="boxes">
                                <img src="../assets/images/step-2.png" alt="step2">
                                <div class="info">
                                    <h3 class="title-large headline">Contact agents</h3>
                                    <p class="body-medium">
                                        Reach out to potential investors for lucrative opportunities in the growing room
                                        rental market with Dreamy Rental.
                                    </p>
                                </div>
                            </div>

                            <div class="boxes">
                                <img src="../assets/images/step-3.png" alt="step3">
                                <div class="info">
                                    <h3 class="title-large headline">Enjoy your property</h3>
                                    <p class="body-medium">
                                        Enjoy the benefits of your property by effortlessly renting it out through our
                                        platform.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </section>


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