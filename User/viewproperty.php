<?php
require('../Including/db_connection.php');
// require('session_check.php');

// Set the default timezone to Nepal Time
date_default_timezone_set('Asia/Kathmandu');

// Fetch current date and time
$currentDateTime = date("Y-m-d H:i:s");


$propertyid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "SELECT * FROM property WHERE id='$propertyid'";

$data = mysqli_query($conn, $sql);

$result = mysqli_fetch_assoc($data);


$amenities = explode(',', $result['extra']);

function checkAmenity($amenities, $amenity)
{
    return in_array($amenity, $amenities) ? 'check' : 'close';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- primary meta tags -->
    <title>View Property</title>
    <meta name="description" content="A website to rent rooms at affordable prices.">

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/logo/favicon.svg" type="image/svg+xml">

    <!-- links add  -->
    <?php require("../Including/links.php"); ?>

    <!-- custome css link -->
    <link rel="stylesheet" href="../css/viewproperty.css">
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


            <!-- view property section  -->
            <section class="section viewproperty">

                <div class="container">

                    <h1 class="headline-medium viewproperty-title title">Property details</h1>

                    <div class="backarrow"><a href="property.php"><span
                                class="material-symbols-rounded arrow">arrow_back</span></a></div>

                    <div class="view-property">
                        <div class="pro-details">
                            <div class="thumb">
                                <div class="big-img" style="--width: 585; --height: 390;">
                                    <div class="property-img-holder">
                                        <img src="../uploadphoto/property/<?php echo $result['img1']; ?>" alt="My home"
                                            class="img-cover">
                                    </div>
                                </div>

                                <div class="small-img">
                                    <img src="../uploadphoto/property/<?php echo $result['img2']; ?>" alt="My home"
                                        class="img-cover">
                                    <img src="../uploadphoto/property/<?php echo $result['img3']; ?>" alt="My home"
                                        class="img-cover">
                                    <img src="../uploadphoto/property/<?php echo $result['img4']; ?>" alt="My home"
                                        class="img-cover">
                                    <img src="../uploadphoto/property/<?php echo $result['img5']; ?>" alt="My home"
                                        class="img-cover">
                                </div>
                            </div>
                            <span class="title-large" style="color: var(--primary-80); margin-top: 10px;">Rs
                                <?php echo $result['pprice']; ?> /-</span>

                            <h3 class="title-small name"><?php echo $result['pname']; ?></h3>

                            <address class="body-medium card-text location">
                                <span class="material-symbols-rounded icons">location_on</span>
                                <?php echo $result['paddress']; ?>
                            </address>

                            <div class="info">
                                <p class="body-medium card-text">
                                    <span class="material-symbols-rounded icons">sell</span>
                                    Rs <?php echo $result['depositeamt']; ?> /-
                                </p>

                                <p class="body-medium card-text">
                                    <span class="material-symbols-rounded icons">apartment</span>
                                    <?php echo $result['propertytype']; ?>
                                </p>

                                <p class="body-medium card-text">
                                    <span class="material-symbols-rounded icons">house</span>
                                    <?php echo $result['offertype']; ?>
                                </p>

                                <p class="body-medium card-text">
                                    <span class="material-symbols-rounded icons">calendar_month</span>
                                    <?php echo $result['Bdate']; ?>
                                </p>
                            </div>


                            <h3 class="title-small topic">Details</h3>
                            <div class="flex">
                                <div class="box">
                                    <p class="title-small">
                                        BHK : <span class="body-medium desc"><?php echo $result['BHK']; ?> bhk</span>
                                    </p>
                                    <p class="title-small">
                                        Deposite amount: <span
                                            class="body-medium desc"><?php echo $result['depositeamt']; ?></span>
                                    </p>
                                    <p class="title-small">
                                        Status : <span class="body-medium desc"><?php echo $result['status']; ?></span>
                                    </p>
                                    <p class="title-small">
                                        Bedroom : <span
                                            class="body-medium desc"><?php echo $result['bedroom']; ?></span>
                                    </p>
                                    <p class="title-small">
                                        Bathroom : <span
                                            class="body-medium desc"><?php echo $result['bathroom']; ?></span>
                                    </p>
                                    <p class="title-small">
                                        Balcony : <span
                                            class="body-medium desc"><?php echo $result['balcony']; ?></span>
                                    </p>
                                    <p class="title-small">
                                        Kitchen : <span
                                            class="body-medium desc"><?php echo $result['kitchen']; ?></span>
                                    </p>
                                    <p class="title-small">
                                        Hall : <span class="body-medium desc"><?php echo $result['hall']; ?></span>
                                    </p>
                                </div>

                                <div class="box">
                                    <p class="title-small">
                                        Area : <span class="body-medium desc"><?php echo $result['area']; ?>
                                            sq/ft</span>
                                    </p>
                                    <p class="title-small">
                                        Age : <span class="body-medium desc"><?php echo $result['age']; ?></span>
                                    </p>
                                    <p class="title-small">
                                        Room floor : <span
                                            class="body-medium desc"><?php echo $result['floorroom']; ?></span>
                                    </p>
                                    <p class="title-small">
                                        Total floor : <span
                                            class="body-medium desc"><?php echo $result['totalfloor']; ?></span>
                                    </p>
                                    <p class="title-small">
                                        Furnished : <span
                                            class="body-medium desc"><?php echo $result['furnishedstatus']; ?></span>
                                    </p>
                                    <p class="title-small">
                                        Loan : <span class="body-medium desc"><?php echo $result['loan']; ?></span>
                                    </p>
                                </div>
                            </div>

                            <h3 class="title-small topic">Amenities</h3>

                            <div class="flex">
                                <div class="box">
                                    <div class="body-medium feature">
                                        <span
                                            class="material-symbols-rounded icons"><?php echo checkAmenity($amenities, 'lift'); ?></span>
                                        Lifts
                                    </div>

                                    <div class="body-medium feature">
                                        <span
                                            class="material-symbols-rounded icons"><?php echo checkAmenity($amenities, 'security_guard'); ?></span>
                                        Security guards
                                    </div>

                                    <div class="body-medium feature">
                                        <span
                                            class="material-symbols-rounded icons"><?php echo checkAmenity($amenities, 'play_ground'); ?></span>
                                        Play ground
                                    </div>

                                    <div class="body-medium feature">
                                        <span
                                            class="material-symbols-rounded icons"><?php echo checkAmenity($amenities, 'garden'); ?></span>
                                        Gardens
                                    </div>

                                    <div class="body-medium feature">
                                        <span
                                            class="material-symbols-rounded icons"><?php echo checkAmenity($amenities, 'water_supply'); ?></span>
                                        Water supply
                                    </div>

                                    <div class="body-medium feature">
                                        <span
                                            class="material-symbols-rounded icons"><?php echo checkAmenity($amenities, 'power_backup'); ?></span>
                                        Power backup
                                    </div>
                                </div>

                                <div class="box">
                                    <div class="body-medium feature">
                                        <span
                                            class="material-symbols-rounded icons"><?php echo checkAmenity($amenities, 'parking_area'); ?></span>
                                        Parking area
                                    </div>

                                    <div class="body-medium feature">
                                        <span
                                            class="material-symbols-rounded icons"><?php echo checkAmenity($amenities, 'gym'); ?></span>
                                        Gym
                                    </div>

                                    <div class="body-medium feature">
                                        <span
                                            class="material-symbols-rounded icons"><?php echo checkAmenity($amenities, 'shopping_mall'); ?></span>
                                        Shopping Mall
                                    </div>

                                    <div class="body-medium feature">
                                        <span
                                            class="material-symbols-rounded icons"><?php echo checkAmenity($amenities, 'hospital'); ?></span>
                                        Hospital
                                    </div>

                                    <div class="body-medium feature">
                                        <span
                                            class="material-symbols-rounded icons"><?php echo checkAmenity($amenities, 'school'); ?></span>
                                        School
                                    </div>

                                    <div class="body-medium feature">
                                        <span
                                            class="material-symbols-rounded icons"><?php echo checkAmenity($amenities, 'market_area'); ?></span>
                                        Market area
                                    </div>
                                </div>
                            </div>


                            <h3 class="title-small topic">Description</h3>
                            <p class="description body-medium">
                                <?php echo $result['description']; ?>
                            </p>

                            <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=$propertyid" ?>" method="post">
                                <input type="hidden" name="Bdate" value="<?php echo $currentDateTime; ?>">
                                <input type="hidden" name="booking" value="1">

                                <?php if (isset($_SESSION['loggedin'])): ?>
                                    <input type="submit" value="Save property" name="save" class="btn-submit label-medium">
                                <?php else: ?>
                                    <input type="submit" value="Save property" name="alert" class="btn-submit label-medium">
                                <?php endif; ?>
                            </form>

                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
                                $user_email = $_SESSION['email'];
                                $Bdate = $_POST['Bdate'];
                                $booking = 1;
                                $isread = 1;

                                $checkBookingSql = "SELECT * FROM property WHERE id='$propertyid' AND booking=1";
                                $checkResult = mysqli_query($conn, $checkBookingSql);
                                $isBooked = mysqli_num_rows($checkResult) > 0;

                                if ($isBooked) {
                                    $_SESSION['status'] = "This property is already booked by another user.";
                                    $_SESSION['status_code'] = "warning";
                                } else {
                                    $sql = "UPDATE property SET booking='$booking', bookingdate='$Bdate', isread='$isread', user_email='$user_email' WHERE id='$propertyid'";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        $_SESSION['status'] = "Saved successfully!";
                                        $_SESSION['status_code'] = "success";
                                    } else {
                                        $_SESSION['status'] = "Failed to add!";
                                        $_SESSION['status_code'] = "error";
                                    }
                                }
                                echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/User/property.php'>";
                            }

                            ?>


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