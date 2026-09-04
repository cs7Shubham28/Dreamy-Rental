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
    <title>Submit Property</title>
    <meta name="description" content="A website to rent rooms at affordable prices.">

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/logo/favicon.svg" type="image/svg+xml">

    <!-- links add  -->
    <?php require("../Including/links.php"); ?>

    <!-- custome css link -->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/customeproperties.css">
    <link rel="stylesheet" href="../css/typography.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/property.css">
    <link rel="stylesheet" href="../css/headernextpag.css">
    <link rel="stylesheet" href="../css/submitproperty.css">

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

                    <h1 class="headline-medium property-title title">Submit Property</h1>

                    <section class="property-form">

                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                            <h3>property details</h3>
                            <div class="box">
                                <p>property name <span>*</span></p>
                                <input type="text" name="property_name" required maxlength="50"
                                    placeholder="Enter property name" class="input"
                                    value="<?php echo isset($pname) ? $pname : ''; ?>">
                            </div>

                            <div class="flex">
                                <div class="box">
                                    <p>property price <span>*</span></p>
                                    <input type="number" name="price" required min="0" max="9999999999" maxlength="10"
                                        placeholder="Enter property price" class="input"
                                        value="<?php echo isset($price) ? $price : ''; ?>">
                                </div>

                                <div class="box">
                                    <p>deposite amount <span>*</span></p>
                                    <input type="number" name="deposite" required min="0" max="9999999999"
                                        maxlength="10" placeholder="Enter deposite amount" class="input"
                                        value="<?php echo isset($depositamt) ? $depositamt : ''; ?>">
                                </div>

                                <div class="box">
                                    <p>property address <span>*</span></p>
                                    <input type="text" name="address" required maxlength="100"
                                        placeholder="Enter property full address" class="input"
                                        value="<?php echo isset($address) ? $address : ''; ?>">
                                </div>

                                <div class="box">
                                    <p>offer type <span>*</span></p>
                                    <select name="offer" required class="input">
                                        <option value="sale">sale</option>
                                        <option value="resale">resale</option>
                                        <option value="rent">rent</option>
                                    </select>
                                </div>

                                <div class="box">
                                    <p>property type <span>*</span></p>
                                    <select name="type" required class="input">
                                        <option value="flat">flat</option>
                                        <option value="house">house</option>
                                        <option value="shop">shop</option>
                                    </select>

                                </div>

                                <div class="box">
                                    <p>property status <span>*</span></p>
                                    <select name="status" required class="input">
                                        <option value="ready to move">ready to move</option>
                                        <option value="under construction">under construction</option>
                                    </select>
                                </div>

                                <div class="box">
                                    <p>furnished status <span>*</span></p>
                                    <select name="furnished" required class="input">
                                        <option value="furnished">furnished</option>
                                        <option value="semi-furnished">semi-furnished</option>
                                        <option value="unfurnished">unfurnished</option>
                                    </select>
                                </div>

                                <div class="box">
                                    <p>how many BHK <span>*</span></p>
                                    <select name="bhk" required class="input">
                                        <option value="1">1 BHK</option>
                                        <option value="2">2 BHK</option>
                                        <option value="3">3 BHK</option>
                                        <option value="4">4 BHK</option>
                                        <option value="5">5 BHK</option>
                                        <option value="6">6 BHK</option>
                                        <option value="7">7 BHK</option>
                                        <option value="8">8 BHK</option>
                                        <option value="9">9 BHK</option>
                                    </select>
                                </div>

                                <div class="box">
                                    <p>how many bedrooms <span>*</span></p>
                                    <select name="bedroom" required class="input">
                                        <option value="0">0 bedroom</option>
                                        <option value="1" selected>1 bedroom</option>
                                        <option value="2">2 bedroom</option>
                                        <option value="3">3 bedroom</option>
                                        <option value="4">4 bedroom</option>
                                        <option value="5">5 bedroom</option>
                                        <option value="6">6 bedroom</option>
                                        <option value="7">7 bedroom</option>
                                        <option value="8">8 bedroom</option>
                                        <option value="9">9 bedroom</option>
                                    </select>
                                </div>

                                <div class="box">
                                    <p>how many bathrooms <span>*</span></p>
                                    <select name="bathroom" required class="input">
                                        <option value="1">1 bathroom</option>
                                        <option value="2">2 bathroom</option>
                                        <option value="3">3 bathroom</option>
                                        <option value="4">4 bathroom</option>
                                        <option value="5">5 bathroom</option>
                                        <option value="6">6 bathroom</option>
                                        <option value="7">7 bathroom</option>
                                        <option value="8">8 bathroom</option>
                                        <option value="9">9 bathroom</option>
                                    </select>
                                </div>

                                <div class="box">
                                    <p>how many balconys <span>*</span></p>
                                    <select name="balcony" required class="input">
                                        <option value="0">0 balcony</option>
                                        <option value="1">1 balcony</option>
                                        <option value="2">2 balcony</option>
                                        <option value="3">3 balcony</option>
                                        <option value="4">4 balcony</option>
                                        <option value="5">5 balcony</option>
                                        <option value="6">6 balcony</option>
                                        <option value="7">7 balcony</option>
                                        <option value="8">8 balcony</option>
                                        <option value="9">9 balcony</option>
                                    </select>
                                </div>

                                <div class="box">
                                    <p>how many kitchen <span>*</span></p>
                                    <select name="kitchen" required class="input">
                                        <option value="1">1 kitchen</option>
                                        <option value="2">2 kitchen</option>
                                        <option value="3">3 kitchen</option>
                                        <option value="4">4 kitchen</option>
                                        <option value="5">5 kitchen</option>
                                        <option value="6">6 kitchen</option>
                                        <option value="7">7 kitchen</option>
                                        <option value="8">8 kitchen</option>
                                        <option value="9">9 kitchen</option>
                                    </select>
                                </div>

                                <div class="box">
                                    <p>how many hall <span>*</span></p>
                                    <select name="hall" required class="input">
                                        <option value="0">0 hall</option>
                                        <option value="1">1 hall</option>
                                        <option value="2">2 hall</option>
                                        <option value="3">3 hall</option>
                                        <option value="4">4 hall</option>
                                        <option value="5">5 hall</option>
                                        <option value="6">6 hall</option>
                                        <option value="7">7 hall</option>
                                        <option value="8">8 hall</option>
                                        <option value="9">9 hall</option>
                                    </select>
                                </div>

                                <div class="box">
                                    <p>carpet area <span>*</span></p>
                                    <input type="tel" name="carpet" required min="1" max="9999999999" maxlength="10"
                                        placeholder="How many squarefits?" class="input"
                                        value="<?php echo isset($_POST['carpet']) ? $_POST['carpet'] : ''; ?>">
                                </div>

                                <div class="box">
                                    <p>property age <span>*</span></p>
                                    <input type="tel" name="age" required min="0" max="99" maxlength="2"
                                        placeholder="How old is property?" class="input"
                                        value="<?php echo isset($_POST['age']) ? $_POST['age'] : ''; ?>">
                                </div>

                                <div class="box">
                                    <p>total floors <span>*</span></p>
                                    <input type="tel" name="total_floors" required min="0" max="99" maxlength="2"
                                        placeholder="How floors available?" class="input"
                                        value="<?php echo isset($_POST['total_floors']) ? $_POST['total_floors'] : ''; ?>">
                                </div>

                                <div class="box">
                                    <p>floor room <span>*</span></p>
                                    <input type="tel" name="room_floor" required min="0" max="99" maxlength="2"
                                        placeholder="Property floor number" class="input"
                                        value="<?php echo isset($_POST['room_floor']) ? $_POST['room_floor'] : ''; ?>">
                                </div>

                                <div class="box">
                                    <p>loan <span>*</span></p>
                                    <select name="loan" required class="input">
                                        <option value="available" <?php echo (isset($_POST['loan']) && $_POST['loan'] == 'available') ? 'selected' : ''; ?>>available</option>
                                        <option value="not available" <?php echo (isset($_POST['loan']) && $_POST['loan'] == 'not available') ? 'selected' : ''; ?>>not available
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <div class="box">
                                <p>property description <span>*</span></p>
                                <textarea name="desc" maxlength="1000" class="input" required cols="30" rows="10"
                                    placeholder="Write about property..."><?php echo isset($_POST['desc']) ? $_POST['desc'] : ''; ?></textarea>
                            </div>


                            <div class="checkbox">

                                <div class="checkbox-wrapper-21">
                                    <label class="control control--checkbox">
                                        Lifts
                                        <input type="checkbox" name="extra[]" value="lift" />
                                        <div class="control__indicator"></div>
                                    </label>

                                    <label class="control control--checkbox">
                                        Security guard
                                        <input type="checkbox" name="extra[]" value="security_guard" />
                                        <div class="control__indicator"></div>
                                    </label>

                                    <label class="control control--checkbox">
                                        Play ground
                                        <input type="checkbox" name="extra[]" value="play_ground" />
                                        <div class="control__indicator"></div>
                                    </label>

                                    <label class="control control--checkbox">
                                        Garden
                                        <input type="checkbox" name="extra[]" value="garden" />
                                        <div class="control__indicator"></div>
                                    </label>

                                    <label class="control control--checkbox">
                                        Water supply
                                        <input type="checkbox" name="extra[]" value="water_supply" />
                                        <div class="control__indicator"></div>
                                    </label>

                                    <label class="control control--checkbox">
                                        Power backup
                                        <input type="checkbox" name="extra[]" value="power_backup" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>

                                <div class="checkbox-wrapper-21">
                                    <label class="control control--checkbox">
                                        Parking area
                                        <input type="checkbox" name="extra[]" value="parking_area" />
                                        <div class="control__indicator"></div>
                                    </label>

                                    <label class="control control--checkbox">
                                        Gym
                                        <input type="checkbox" name="extra[]" value="gym" />
                                        <div class="control__indicator"></div>
                                    </label>

                                    <label class="control control--checkbox">
                                        Shopping mall
                                        <input type="checkbox" name="extra[]" value="shopping_mall" />
                                        <div class="control__indicator"></div>
                                    </label>

                                    <label class="control control--checkbox">
                                        Hospital
                                        <input type="checkbox" name="extra[]" value="hospital" />
                                        <div class="control__indicator"></div>
                                    </label>

                                    <label class="control control--checkbox">
                                        School
                                        <input type="checkbox" name="extra[]" value="school" />
                                        <div class="control__indicator"></div>
                                    </label>

                                    <label class="control control--checkbox">
                                        Market area
                                        <input type="checkbox" name="extra[]" value="market_area" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>

                            </div>




                            <div class="box">
                                <p>image 01 <span>*</span></p>
                                <input type="file" name="img1" class="input fileupload" accept="image/*" required>
                            </div>

                            <div class="flex">
                                <div class="box">
                                    <p>image 02</p>
                                    <input type="file" name="img2" class="input fileupload" accept="image/*">
                                </div>

                                <div class="box">
                                    <p>image 03</p>
                                    <input type="file" name="img3" class="input fileupload" accept="image/*">
                                </div>

                                <div class="box">
                                    <p>image 04</p>
                                    <input type="file" name="img4" class="input fileupload" accept="image/*">
                                </div>

                                <div class="box">
                                    <p>image 05</p>
                                    <input type="file" name="img5" class="input fileupload" accept="image/*">
                                </div>
                            </div>

                            <div class="box">
                                <p>Booking data</p>
                                <input type="date" name="bdate" class="input date"
                                    value="<?php echo isset($bdate) ? $bdate : ''; ?>">
                            </div>

                            <input type="submit" value="Post Property" class=" contact-btn" name="post"
                                style="margin-top: 20px;">
                        </form>

                    </section>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post'])) {
                        $pname = htmlspecialchars($_POST['property_name']);
                        $price = $_POST['price'];
                        $depositamt = $_POST['deposite'];
                        $address = $_POST['address'];
                        $offer = $_POST['offer'];
                        $type = $_POST['type'];
                        $status = $_POST['status'];
                        $furnished = $_POST['furnished'];
                        $bhk = $_POST['bhk'];
                        $bedroom = $_POST['bedroom'];
                        $bathroom = $_POST['bathroom'];
                        $balcony = $_POST['balcony'];
                        $kitchen = $_POST['kitchen'];
                        $hall = $_POST['hall'];
                        $area = $_POST['carpet'];
                        $p_age = $_POST['age'];
                        $floors = $_POST['total_floors'];
                        $room = $_POST['room_floor'];
                        $loan = $_POST['loan'];
                        $desc = $_POST['desc'];
                        $booking = 0;
                        $isread = 0;

                        $extra = $_POST['extra'];
                        $extra1 = implode(',', $extra);

                        // for image 1
                        $img1 = $_FILES['img1']['name'];
                        $img1_tmp = $_FILES['img1']['tmp_name'];
                        $folder = "../uploadphoto/property/" . $img1;
                        move_uploaded_file($img1_tmp, $folder);

                        // for image 2
                        $img2 = $_FILES['img2']['name'];
                        $img2_tmp = $_FILES['img2']['tmp_name'];
                        $folder = "../uploadphoto/property/" . $img2;
                        move_uploaded_file($img2_tmp, $folder);

                        // for image 3
                        $img3 = $_FILES['img3']['name'];
                        $img3_tmp = $_FILES['img3']['tmp_name'];
                        $folder = "../uploadphoto/property/" . $img3;
                        move_uploaded_file($img3_tmp, $folder);

                        // for image 4
                        $img4 = $_FILES['img4']['name'];
                        $img4_tmp = $_FILES['img4']['tmp_name'];
                        $folder = "../uploadphoto/property/" . $img4;
                        move_uploaded_file($img4_tmp, $folder);

                        // for image 5
                        $img5 = $_FILES['img5']['name'];
                        $img5_tmp = $_FILES['img5']['tmp_name'];
                        $folder = "../uploadphoto/property/" . $img5;
                        move_uploaded_file($img5_tmp, $folder);

                        $bdate = $_POST['bdate'];

                        if (
                            !empty($pname) && !empty($price) && !empty($depositamt) && !empty($address) && !empty($offer) && !empty($type) && !empty($status)
                            && !empty($furnished) && !empty($bhk) && !empty($bedroom) && !empty($bathroom) && !empty($balcony)
                            && !empty($area) && !empty($p_age) && !empty($floors) && !empty($room) && !empty($loan) && !empty($desc)
                            && !empty($img1) && !empty($bdate)
                        ) {
                            $sql = "INSERT INTO `property`(`pname`, `pprice`, `depositeamt`, `paddress`, `offertype`, `propertytype`, `status`, 
                                    `furnishedstatus`, `BHK`, `bedroom`, `bathroom`, `balcony`, `kitchen`, `hall`, `area`, `age`, `totalfloor`, `floorroom`, `loan`, 
                                    `description`, `extra`, `booking`, `isread`, `img1`, `img2`, `img3`, `img4`, `img5`, `Bdate` ) VALUES ('$pname', '$price', '$depositamt', '$address', '$offer', '$type', '$status',
                                    '$furnished', '$bhk', '$bedroom', '$bathroom', '$balcony', '$kitchen', '$hall', '$area', '$p_age', '$floors', '$room', '$loan', 
                                    '$desc', '$extra1', '$booking', '$isread', '$img1', '$img2', '$img3', '$img4', '$img5', '$bdate')";
                            
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                // echo "<script>alert('Location added successfully')</script>";
                                $_SESSION['status'] = "Add successfully!";
                                $_SESSION['status_code'] = "success";
                
                                ?>
                                <meta http-equiv="refresh" content="2; url=http://localhost/dreamyrental/User/property.php">
                                <?php
                            } else {
                                // echo "Error: ". mysqli_error($conn);
                                $_SESSION['status'] = "Failed to add!";
                                $_SESSION['status_code'] = "error";

                                ?>
                                <meta http-equiv="refresh" content="2; url=http://localhost/dreamyrental/User/submitproperty.php">
                                <?php
                            }
                        } else {
                            // echo "<script>alert('Please fill all the fields')</script>";
                            $_SESSION['status'] = "Fill all the field!";
                            $_SESSION['status_code'] = "error";

                            ?>
                                <meta http-equiv="refresh" content="2; url=http://localhost/dreamyrental/User/submitproperty.php">
                            <?php
                        }
                    }
                    ?>


                </div>



                </div>
            </section>


        </article>
    </main>


    <?php
    require("../including/popup.php");
    ?>

    <!-- footer section  -->

    <?php
    require("../including/footer.php");
    ?>

</body>

</html>