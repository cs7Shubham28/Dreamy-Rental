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
    <title>Property</title>
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

                    <h1 class="headline-large property-title title">Property</h1>

                    <h2 class="section-title headline-small" style="margin-bottom: 10px;">Search Result</h2>

                    <div class="property-list">
                        <?php
                       $sql = "SELECT * FROM property WHERE 1=1";

                       if (isset($_GET['want-to']) && $_GET['want-to'] !== 'any') {
                           $want_to = mysqli_real_escape_string($conn, $_GET['want-to']);
                           $sql .= " AND offertype LIKE '%$want_to%'";
                       }
                       
                       if (isset($_GET['property-type']) && $_GET['property-type'] !== 'any') {
                           $property_type = mysqli_real_escape_string($conn, $_GET['property-type']);
                           $sql .= " AND propertytype LIKE '%$property_type%'";
                       }
                       
                       if (isset($_GET['location']) && !empty($_GET['location'])) {
                           $location = mysqli_real_escape_string($conn, $_GET['location']);
                           $sql .= " AND paddress LIKE '%$location%'";
                       }
                       

                        $data = mysqli_query($conn, $sql); 
                        $total = mysqli_num_rows($data);
                        
                        if ($total > 0) {
                            while ($row = mysqli_fetch_assoc($data)) { 
                                ?>
                                <div class="card">
                                    <div class="card-banner">
                                        <figure class="img-holder" style="--width: 585; --height: 390;">
                                            <img src="../uploadphoto/property/<?php echo $row['img1']; ?>" width="585" height="390" alt="Property Image" class="img-cover">
                                        </figure>
                                        <span class="badge label-medium">New</span>
                                        <button class="icon-btn fav-btn" aria-label="add to favorite">
                                            <span class="material-symbols-rounded" aria-hidden="true">favorite</span>
                                        </button>
                                    </div>
                                    <div class="card-content">
                                        <span class="title-large">Rs <?php echo $row['pprice']; ?> /-</span>
                                        <h3><a href="viewproperty.php?id=<?php echo $row['id']; ?>" class="title-small card-title"><?php echo $row['pname']; ?></a></h3>
                                        <address class="body-medium card-text"><?php echo $row['paddress']; ?></address>
                                        <div class="card-meta-list">
                                            <div class="meta-item">
                                                <span class="material-symbols-rounded meta-icon" aria-hidden="true">bed</span>
                                                <span class="meta-text label-medium"><?php echo $row['bedroom']; ?> Bed</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="material-symbols-rounded meta-icon" aria-hidden="true">bathtub</span>
                                                <span class="meta-text label-medium"><?php echo $row['bathroom']; ?> Bath</span>
                                            </div>
                                            <div class="meta-item">
                                                <span class="material-symbols-rounded meta-icon" aria-hidden="true">straighten</span>
                                                <span class="meta-text label-medium"><?php echo $row['area']; ?> sqft</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<p>No properties found matching your criteria!</p>";
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