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
    <title>All story</title>
    <meta name="description" content="A website to rent rooms at affordable prices.">

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/logo/favicon.svg" type="image/svg+xml">

    <!-- links add  -->
    <?php require("../Including/links.php"); ?>

    <!-- custome css link -->
    <link rel="stylesheet" href="../css/property.css">
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

            <!-- property section  -->
            <section class="section property">
                <div class="container">

                    <h1 class="headline-large property-title title">All Stories</h1>

                    <h2 class="section-title headline-small" style="margin-bottom: 10px;">Customer Review</h2>


                    <div class="allstory">
                        <ul class="story-list">
                            <?php
                            $sql = "SELECT * FROM feedback";
                            $data = mysqli_query($conn, $sql);
                            $total = mysqli_num_rows($data);

                            if ($total > 0) {
                                while ($row = mysqli_fetch_assoc($data)) {
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

                                                <p class="body-medium" style="margin-top: 5px;"><?php echo $row['feedback']; ?>
                                                </p>
                                            </div>

                                            <figure class="card-avatar">
                                                <img src="../uploadphoto/users/<?php echo !empty($row['profile']) ? $row['profile'] : 'default.png'; ?>"
                                                    width="56" height="56" loading="lazy" alt="" class="img-cover">
                                            </figure>

                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>


                        </ul>
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