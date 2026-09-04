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
    <title>FAQs</title>
    <meta name="description" content="A website to rent rooms at affordable prices.">

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/logo/favicon.svg" type="image/svg+xml">

    <!-- links add  -->
    <?php require("../Including/links.php"); ?>

    <!-- custome css link -->
    <link rel="stylesheet" href="../css/FAQs.css">
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


            <!-- FAQs section  -->
            <section class="section FAQs" id="faq">
                <div class="container">

                    <h1 class="headline-large FAQs-title title">FAQs</h1>

                    <div class="box-container">

                        <div class="box">
                            <h3 class="title-small" id="downArrow">
                                How to cancel booking?
                                <span class="material-symbols-rounded">keyboard_arrow_down</span>
                            </h3>
                            <p class="body-medium">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Accusamus animi in eveniet saepe optio sequi tempora ipsam deserunt dolorum
                                nulla!
                            </p>
                        </div>

                        <div class="box">
                            <h3 class="title-small" id="downArrow">
                                When will I get the possession?
                                <span class="material-symbols-rounded">keyboard_arrow_down</span>
                            </h3>
                            <p class="body-medium">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Accusamus animi in eveniet saepe optio sequi tempora ipsam deserunt dolorum
                                nulla!
                            </p>
                        </div>

                        <div class="box">
                            <h3 class="title-small" id="downArrow">
                                Where can I pay the rent?
                                <span class="material-symbols-rounded">keyboard_arrow_down</span>
                            </h3>
                            <p class="body-medium">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Accusamus animi in eveniet saepe optio sequi tempora ipsam deserunt dolorum
                                nulla!
                            </p>
                        </div>

                        <div class="box">
                            <h3 class="title-small" id="downArrow">
                                How to contact with the buyers?
                                <span class="material-symbols-rounded">keyboard_arrow_down</span>
                            </h3>
                            <p class="body-medium">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Accusamus animi in eveniet saepe optio sequi tempora ipsam deserunt dolorum
                                nulla!
                            </p>
                        </div>

                        <div class="box">
                            <h3 class="title-small" id="downArrow">
                                Why my listing not showing up?
                                <span class="material-symbols-rounded">keyboard_arrow_down</span>
                            </h3>
                            <p class="body-medium">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Accusamus animi in eveniet saepe optio sequi tempora ipsam deserunt dolorum
                                nulla!
                            </p>
                        </div>

                        <div class="box">
                            <h3 class="title-small" id="downArrow">
                                How to promote my listing?
                                <span class="material-symbols-rounded">keyboard_arrow_down</span>
                            </h3>
                            <p class="body-medium">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Accusamus animi in eveniet saepe optio sequi tempora ipsam deserunt dolorum
                                nulla!
                            </p>
                        </div>

                    </div>



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