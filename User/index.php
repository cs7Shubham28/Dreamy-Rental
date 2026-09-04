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
    <title>Room-Rental-Portal</title>
    <meta name="description" content="A website to rent rooms at affordable prices.">

    <!-- favicon -->
    <link rel="shortcut icon" href="/dreamyrental/assets/logo/favicon.svg" type="image/svg+xml">

    <!-- links add  -->
    <?php require("../Including/links.php"); ?>

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


            <!-- #hero section  -->
            <section class="hero">

                <div class="container">


                    <div class="hero-content">

                        <h1 class="headline-large hero-title">Find a place where you can be yourself.</h1>

                        <p class="body-large hero-text">
                            If you're looking for a place where you can be yourself, don't give up.
                            Keep searching until you find a place that feels like home.
                        </p>

                        <form action="searchresult.php" method="get" class="search-bar">

                            <label class="search-item">
                                <span class="label-medium label">Want to</span>
                                <select name="want-to" class="search-item-field body-medium" id="searchItem">
                                    <option value="any" <?php echo (isset($_GET['want-to']) && $_GET['want-to'] == 'any') ? 'selected' : ''; ?>>Any</option>
                                    <option value="sale" <?php echo (isset($_GET['want-to']) && $_GET['want-to'] == 'sale') ? 'selected' : ''; ?>>Sale</option>
                                    <option value="resale" <?php echo (isset($_GET['want-to']) && $_GET['want-to'] == 'resale') ? 'selected' : ''; ?>>Resale</option>
                                    <option value="rent" <?php echo (isset($_GET['want-to']) && $_GET['want-to'] == 'rent') ? 'selected' : ''; ?>>Rent</option>
                                </select>
                                <span class="material-symbols-rounded" aria-hidden="true">real_estate_agent</span>
                            </label>

                            <label class="search-item">
                                <span class="label-medium label">Property type</span>
                                <select name="property-type" class="search-item-field body-medium" id="searchItemType">
                                    <option value="any" <?php echo (isset($_GET['property-type']) && $_GET['property-type'] == 'any') ? 'selected' : ''; ?>>Any</option>
                                    <option value="house" <?php echo (isset($_GET['property-type']) && $_GET['property-type'] == 'house') ? 'selected' : ''; ?>>House</option>
                                    <option value="shop" <?php echo (isset($_GET['property-type']) && $_GET['property-type'] == 'shop') ? 'selected' : ''; ?>>Shop</option>
                                    <option value="flat" <?php echo (isset($_GET['property-type']) && $_GET['property-type'] == 'flat') ? 'selected' : ''; ?>>Flats</option>
                                </select>
                                <span class="material-symbols-rounded" aria-hidden="true">gite</span>
                            </label>

                            <label class="search-item">
                                <span class="label-medium label">Location</span>
                                <input type="text" name="location" class="search-item-field"
                                    placeholder="Street, City, Zip..." value="<?php if (isset($_GET['location'])) {
                                        echo $_GET['location'];
                                    } ?>">
                                <span class="material-symbols-rounded" aria-hidden="true">location_on</span>
                            </label>

                            <button class="search-btn" type="submit">
                                <span class="material-symbols-rounded" aria-hidden="true">search</span>
                                <span class="label-medium">Search</span>
                            </button>
                        </form>



                    </div>

                    <img src="../assets/images/hero.png" width="816" height="659" role="presentation"
                        class="hero-banner">

                    <img src="../assets/images/bg-pattern.png" width="1240" height="840" role="presentation"
                        class="bg-pattern">
                </div>
            </section>





            <!-- #properties section  -->

            <section class="section property" aria-labelledby="property-label">
                <div class="container">

                    <div class="title-wrapper">

                        <div>
                            <h2 class="section-title headline-small">Recent Property</h2>

                            <p class="section-text body-large">
                                Lorem ipsum dolor sit amet consectetur. In quisque scelerisque eget id facilisis.
                                Aliquam in libero egestas at.
                            </p>
                        </div>

                        <a href="property.php" class="btn btn-outline">
                            <span class="label-medium">Explore more</span>

                            <span class="material-symbols-rounded" aria-hidden="true">arrow_outward</span>
                        </a>

                    </div>

                    <div class="property-list">
                        <?php

                        $sql = "SELECT * FROM property";
                        $data = mysqli_query($conn, $sql);
                        $total = mysqli_num_rows($data);

                        if ($total > 0) {
                            $counter = 0;
                            while ($row = mysqli_fetch_assoc($data)) {
                                if ($counter >= 4) {
                                    break;
                                }
                                ?>
                                <div class="card">
                                    <div class="card-banner">
                                        <figure class="img-holder" style="--width: 585; --height: 390;">
                                            <img src="../uploadphoto/property/<?php echo $row['img1']; ?>" width="585"
                                                height="390" alt="COVA Home Realty" class="img-cover">
                                        </figure>

                                        <span class="badge label-medium">New</span>

                                        <button class="icon-btn fav-btn" aria-label="add to favorite" id="toggleBtns"
                                            data-toggle-btn>
                                            <span class="material-symbols-rounded" aria-hidden="true">favorite</span>
                                        </button>
                                    </div>

                                    <div class="card-content">
                                        <span class="title-large">Rs <?php echo $row['pprice']; ?> /-</span>
                                        <h3>
                                            <a href="viewproperty.php?id=<?php echo $row['id']; ?>"
                                                class="title-small card-title"><?php echo $row['pname']; ?></a>
                                        </h3>
                                        <address class="body-medium card-text">
                                            <?php echo $row['paddress']; ?>
                                        </address>

                                        <div class="card-meta-list">
                                            <div class="meta-item">
                                                <span class="material-symbols-rounded meta-icon" aria-hidden="true">bed</span>
                                                <span class="meta-text label-medium"><?php echo $row['bedroom']; ?> Bed</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="material-symbols-rounded meta-icon"
                                                    aria-hidden="true">bathtub</span>
                                                <span class="meta-text label-medium"><?php echo $row['bathroom']; ?> Bath</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="material-symbols-rounded meta-icon"
                                                    aria-hidden="true">straighten</span>
                                                <span class="meta-text label-medium"><?php echo $row['area']; ?> sqft</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $counter++;
                            }
                        } else {
                            echo "<p>No properties found matching your criteria!</p>";
                        }
                        ?>
                    </div>


                </div>
            </section>



            <!-- features section -->

            <section class="section feature" aria-labelledby="feature-label">
                <div class="container">

                    <figure class="feature-banner">
                        <img src="../assets/images/feature-banner-1.jpg" width="1020" height="690"
                            loading="lazy" alt="feature banner" class="img-cover">
                    </figure>

                    <div class="feature-content">

                        <h2 class="headline-medium" id="feature-label">
                            We Specialize In Quality Home Renovations
                        </h2>

                        <p class="body-large feature-text">
                            Looking to renovate your home to reflect your style and personality? Look no further than
                            our
                            team of experts who specialize in quality home renovations
                            to transform your space into a dream home you’ll love. From design to execution.
                        </p>

                        <ul class="feature-list">
                            <li class="feature-item">
                                <span class="material-symbols-rounded feature-icon"
                                    aria-hidden="true">check_circle</span>

                                <span class="body-medium">Smart Home</span>
                            </li>

                            <li class="feature-item">
                                <span class="material-symbols-rounded feature-icon"
                                    aria-hidden="true">check_circle</span>

                                <span class="body-medium">Beautiful Scene Around</span>
                            </li>

                            <li class="feature-item">
                                <span class="material-symbols-rounded feature-icon"
                                    aria-hidden="true">check_circle</span>

                                <span class="body-medium">Exceptional lifestyle</span>
                            </li>

                            <li class="feature-item">
                                <span class="material-symbols-rounded feature-icon"
                                    aria-hidden="true">check_circle</span>

                                <span class="body-medium">Complete 24/7 Security</span>
                            </li>
                        </ul>

                    </div>

                </div>
            </section>

            <section class="section feature feature-2" aria-labelledby="feature-label-2">
                <div class="container">

                    <figure class="feature-banner">
                        <img src="../assets/images/feature-banner-2.jpg" width="1020" height="690"
                            loading="lazy" alt="feature banner" class="img-cover">
                    </figure>

                    <div class="feature-content">

                        <h2 class="headline-medium" id="feature-label-2">
                            We Are Experts In Historic Home Renovations
                        </h2>

                        <p class="body-large feature-text">
                            Looking to renovate your home to reflect your style and personality? Look no further than
                            our team of experts who
                            specialize in quality home renovations to transform your space into a
                            dream home you’ll love. From design to execution.
                        </p>

                        <ul class="feature-list">
                            <li class="feature-item">
                                <span class="material-symbols-rounded feature-icon"
                                    aria-hidden="true">check_circle</span>

                                <span class="body-medium">Smart Home</span>
                            </li>

                            <li class="feature-item">
                                <span class="material-symbols-rounded feature-icon"
                                    aria-hidden="true">check_circle</span>

                                <span class="body-medium">Beautiful Scene Around</span>
                            </li>

                            <li class="feature-item">
                                <span class="material-symbols-rounded feature-icon"
                                    aria-hidden="true">check_circle</span>

                                <span class="body-medium">Exceptional lifestyle</span>
                            </li>

                            <li class="feature-item">
                                <span class="material-symbols-rounded feature-icon"
                                    aria-hidden="true">check_circle</span>

                                <span class="body-medium">Complete 24/7 Security</span>
                            </li>
                        </ul>

                    </div>

                </div>
            </section>



            <!-- video section -->

            <section class="section video">
                <div class="container">

                    <div class="video-card">
                        <button class="play-btn" aria-label="play video">
                            <span class="material-symbols-rounded" aria-hidden="true">play_arrow</span>
                        </button>
                    </div>

                </div>
            </section>



            <!-- story section  -->

            <section class="section story">
                <div class="container">

                    <div class="title-wrapper">

                        <div>
                            <p class="section-subtitle title-medium">Our Customers</p>

                            <h2 class="section-title headline-medium">We Help 1000+ Family Find Their True Home</h2>

                            <ul class="avatar-list">
                                <?php
                                $sql = "SELECT * FROM feedback";
                                $result = mysqli_query($conn, $sql);
                                $total = mysqli_num_rows($result);

                                $counter = 0;

                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($counter >= 4) {
                                        break;
                                    }
                                    ?>
                                    <li class="profile">
                                        <img src="../uploadphoto/users/<?php echo !empty($row['profile']) ? $row['profile'] : 'default.png'; ?>"
                                            width="120" height="80" loading="lazy" alt="john smith" class="img-cover">
                                    </li>
                                    <?php
                                    $counter++;
                                }
                                ?>

                                <li class="profile">
                                    <img src="../assets/images/avatar-4.jpg" width="120" height="80"
                                        loading="lazy" alt="jane smith" class="img-cover">

                                    <div class="overlay-content">
                                        <span class="label-medium">99+</span>
                                    </div>


                            </ul>
                        </div>

                        <a href="../User/viewallstory.php" class="btn btn-outline">
                            <span class="label-medium">View All Stories</span>

                            <span class="material-symbols-rounded" aria-hidden="true">arrow_outward</span>
                        </a>
                    </div>

                    <ul class="story-list">
                        <?php
                        $sql = "SELECT * FROM feedback";
                        $data = mysqli_query($conn, $sql);
                        $total = mysqli_num_rows($data);
                        $max_display = 3;
                        $counter = 0;

                        if ($total > 0) {
                            while ($row = mysqli_fetch_assoc($data)) {
                                if ($counter >= $max_display) {
                                    break;
                                }
                                ?>
                                <li class="story-card"
                                    style="background-image: url(../uploadphoto/feedback/<?php echo !empty($row['bimage']) ? $row['bimage'] : 'default.png'; ?>);">
                                    <a href="#" class="overlay-content">

                                        <div>
                                            <h3 class="title-small"><?php echo $row['name']; ?></h3>

                                            <div class="rating-wrapper">
                                                <?php for ($i = 0; $i < $row['rating']; $i++): ?>
                                                    <span class="material-symbols-rounded" aria-hidden="true"
                                                        data-index="0">star</span>
                                                <?php endfor; ?>
                                                <?php for ($i = $row['rating']; $i < 5; $i++): ?>
                                                    <span class="material-symbols-rounded" aria-hidden="true"
                                                        style="color: white;">star_border</span>
                                                <?php endfor; ?>

                                                <data value="<?php echo htmlspecialchars($row['rating']); ?>"
                                                    class="title-small rating-text">
                                                    <?php echo htmlspecialchars($row['rating']); ?>
                                                </data>
                                            </div>

                                            <p class="body-medium" style="margin-top: 5px;"><?php echo $row['feedback']; ?></p>
                                        </div>

                                        <figure class="card-avatar">
                                            <img src="../uploadphoto/users/<?php echo !empty($row['profile']) ? $row['profile'] : 'default.png'; ?>"
                                                width="56" height="56" loading="lazy" alt="sudha karki" class="img-cover">
                                        </figure>

                                    </a>
                                </li>
                                <?php
                                $counter++;
                            }
                        }
                        ?>


                    </ul>

                </div>
            </section>

        </article>
    </main>


    <!-- footer section  -->

    <?php
    require("../including/popup.php");
    ?>

    <?php
    require("../including/footer.php");
    ?>

</body>

</html>