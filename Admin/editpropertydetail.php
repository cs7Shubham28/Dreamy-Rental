<?php
require('../Including/db_connection.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}

$propertyid = $_GET['id'];
$sql = "SELECT * FROM property WHERE id=$propertyid";
$data = mysqli_query($conn, $sql);
$results = mysqli_fetch_assoc($data);

$extras1 = $results['extra'];
$extras = explode(',', $extras1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- primary meta tags -->
    <title>Admin_dashboard</title>
    <meta name="description" content="A website to rent rooms at affordable prices.">

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/logo/favicon.svg" type="image/svg+xml">

    <!-- custome links  -->
    <?php
    require("Includefile/customelink.php");
    ?>



</head>

<body>


    <div class="container">
        <!-- sidenavbar  -->
        <?php
        require("Includefile/sidebar.php");
        ?>
        <!-- sidenavbar  -->

        <!-- body part  -->
        <div class="dashboard">

        <?php
        require("Includefile/topheader.php");
        ?>

            <div class="dashboard-content">

                <div class="dashboard-title">
                    <h2>Update Property</h2>
                    <h3> <a href="dashboard.php">Dashboard</a> / <a href="viewproperty.php">View Property</a> /
                        updateProperty</h3>
                </div>

                <div class="addproperty">
                    <h3>Update Property Details</h3>
                    <h4>Property Detail</h4>



                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        <div class="box">
                            <p>property name <span>*</span></p>
                            <input type="text" name="property_name" maxlength="50" placeholder="Enter property name"
                                class="input" value="<?php echo $results['pname'] ?>">
                        </div>

                        <div class="flex">
                            <div class="box">
                                <p>property price <span>*</span></p>
                                <input type="tel" name="price" min="0" max="9999999999" maxlength="10"
                                    placeholder="Enter property price" class="input"
                                    value="<?php echo $results['pprice'] ?>">
                            </div>

                            <div class="box">
                                <p>deposite amount <span>*</span></p>
                                <input type="tel" name="deposite" min="0" max="9999999999" maxlength="10"
                                    placeholder="Enter deposite amount" class="input"
                                    value="<?php echo $results['depositeamt'] ?>">
                            </div>

                            <div class="box">
                                <p>property address <span>*</span></p>
                                <input type="text" name="address" maxlength="100"
                                    placeholder="Enter property full address" class="input"
                                    value="<?php echo $results['paddress'] ?>">
                            </div>

                            <div class="box">
                                <p>offer type <span>*</span></p>
                                <select name="offer" class="input select">
                                    <option value="sale" <?php echo $results['offertype'] == 'sale' ? 'selected' : ''; ?>>
                                        sale</option>
                                    <option value="resale" <?php echo $results['offertype'] == 'resale' ? 'selected' : ''; ?>>resale</option>
                                    <option value="rent" <?php echo $results['offertype'] == 'rent' ? 'selected' : ''; ?>>
                                        rent</option>
                                </select>
                            </div>

                            <div class="box">
                                <p>property type <span>*</span></p>
                                <select name="type" class="input select">
                                    <option value="flat" <?php echo $results['propertytype'] == 'flat' ? 'selected' : ''; ?>>flat</option>
                                    <option value="house" <?php echo $results['propertytype'] == 'house' ? 'selected' : ''; ?>>house</option>
                                    <option value="shop" <?php echo $results['propertytype'] == 'shop' ? 'selected' : ''; ?>>shop</option>
                                </select>

                            </div>

                            <div class="box">
                                <p>property status <span>*</span></p>
                                <select name="status" class="input">
                                    <option value="ready to move" <?php echo $results['status'] == 'ready to move' ? 'selected' : ''; ?>>ready to move</option>
                                    <option value="under construction" <?php echo $results['status'] == 'under construction' ? 'selected' : ''; ?>>under construction</option>
                                </select>
                            </div>

                            <div class="box">
                                <p>furnished status <span>*</span></p>
                                <select name="furnished" class="input select">
                                    <option value="furnished" <?php echo $results['furnishedstatus'] == 'furnished' ? 'selected' : ''; ?>>furnished</option>
                                    <option value="semi-furnished" <?php echo $results['furnishedstatus'] == 'semi-furnished' ? 'selected' : ''; ?>>
                                        semi-furnished</option>
                                    <option value="unfurnished" <?php echo $results['furnishedstatus'] == 'unfurnished' ? 'selected' : ''; ?>>unfurnished</option>
                                </select>
                            </div>

                            <div class="box">
                                <p>how many BHK <span>*</span></p>
                                <select name="bhk" class="input">
                                    <option value="1" <?php echo $results['BHK'] == '1' ? 'selected' : ''; ?>>1 BHK
                                    </option>
                                    <option value="2" <?php echo $results['BHK'] == '2' ? 'selected' : ''; ?>>2 BHK
                                    </option>
                                    <option value="3" <?php echo $results['BHK'] == '3' ? 'selected' : ''; ?>>3 BHK
                                    </option>
                                    <option value="4" <?php echo $results['BHK'] == '4' ? 'selected' : ''; ?>>4 BHK
                                    </option>
                                    <option value="5" <?php echo $results['BHK'] == '5' ? 'selected' : ''; ?>>5 BHK
                                    </option>
                                    <option value="6" <?php echo $results['BHK'] == '6' ? 'selected' : ''; ?>>6 BHK
                                    </option>
                                    <option value="7" <?php echo $results['BHK'] == '7' ? 'selected' : ''; ?>>7 BHK
                                    </option>
                                    <option value="8" <?php echo $results['BHK'] == '8' ? 'selected' : ''; ?>>8 BHK
                                    </option>
                                    <option value="9" <?php echo $results['BHK'] == '9' ? 'selected' : ''; ?>>9 BHK
                                    </option>
                                </select>
                            </div>

                            <div class="box">
                                <p>how many bedrooms <span>*</span></p>
                                <select name="bedroom" class="input">
                                    <option value="0" <?php echo $results['bedroom'] == '0' ? 'selected' : ''; ?>>0 bedroom
                                    </option>
                                    <option value="1" <?php echo $results['bedroom'] == '1' ? 'selected' : ''; ?>>1 bedroom
                                    </option>
                                    <option value="2" <?php echo $results['bedroom'] == '2' ? 'selected' : ''; ?>>2 bedroom
                                    </option>
                                    <option value="3" <?php echo $results['bedroom'] == '3' ? 'selected' : ''; ?>>3 bedroom
                                    </option>
                                    <option value="4" <?php echo $results['bedroom'] == '4' ? 'selected' : ''; ?>>4 bedroom
                                    </option>
                                    <option value="5" <?php echo $results['bedroom'] == '5' ? 'selected' : ''; ?>>5 bedroom
                                    </option>
                                    <option value="6" <?php echo $results['bedroom'] == '6' ? 'selected' : ''; ?>>6 bedroom
                                    </option>
                                    <option value="7" <?php echo $results['bedroom'] == '7' ? 'selected' : ''; ?>>7 bedroom
                                    </option>
                                    <option value="8" <?php echo $results['bedroom'] == '8' ? 'selected' : ''; ?>>8 bedroom
                                    </option>
                                    <option value="9" <?php echo $results['bedroom'] == '9' ? 'selected' : ''; ?>>9 bedroom
                                    </option>
                                </select>
                            </div>

                            <div class="box">
                                <p>how many bathrooms <span>*</span></p>
                                <select name="bathroom" class="input">
                                    <option value="1" <?php echo $results['bathroom'] == '1' ? 'selected' : ''; ?>>1
                                        bathroom</option>
                                    <option value="2" <?php echo $results['bathroom'] == '2' ? 'selected' : ''; ?>>2
                                        bathroom</option>
                                    <option value="3" <?php echo $results['bathroom'] == '3' ? 'selected' : ''; ?>>3
                                        bathroom</option>
                                    <option value="4" <?php echo $results['bathroom'] == '4' ? 'selected' : ''; ?>>4
                                        bathroom</option>
                                    <option value="5" <?php echo $results['bathroom'] == '5' ? 'selected' : ''; ?>>5
                                        bathroom</option>
                                    <option value="6" <?php echo $results['bathroom'] == '6' ? 'selected' : ''; ?>>6
                                        bathroom</option>
                                    <option value="7" <?php echo $results['bathroom'] == '7' ? 'selected' : ''; ?>>7
                                        bathroom</option>
                                    <option value="8" <?php echo $results['bathroom'] == '8' ? 'selected' : ''; ?>>8
                                        bathroom</option>
                                    <option value="9" <?php echo $results['bathroom'] == '9' ? 'selected' : ''; ?>>9
                                        bathroom</option>
                                </select>
                            </div>

                            <div class="box">
                                <p>how many balconys <span>*</span></p>
                                <select name="balcony" class="input">
                                    <option value="0" <?php echo $results['balcony'] == '0' ? 'selected' : ''; ?>>0 balcony
                                    </option>
                                    <option value="1" <?php echo $results['balcony'] == '1' ? 'selected' : ''; ?>>1 balcony
                                    </option>
                                    <option value="2" <?php echo $results['balcony'] == '2' ? 'selected' : ''; ?>>2 balcony
                                    </option>
                                    <option value="3" <?php echo $results['balcony'] == '3' ? 'selected' : ''; ?>>3 balcony
                                    </option>
                                    <option value="4" <?php echo $results['balcony'] == '4' ? 'selected' : ''; ?>>4 balcony
                                    </option>
                                    <option value="5" <?php echo $results['balcony'] == '5' ? 'selected' : ''; ?>>5 balcony
                                    </option>
                                    <option value="6" <?php echo $results['balcony'] == '6' ? 'selected' : ''; ?>>6 balcony
                                    </option>
                                    <option value="7" <?php echo $results['balcony'] == '7' ? 'selected' : ''; ?>>7 balcony
                                    </option>
                                    <option value="8" <?php echo $results['balcony'] == '8' ? 'selected' : ''; ?>>8 balcony
                                    </option>
                                    <option value="9" <?php echo $results['balcony'] == '9' ? 'selected' : ''; ?>>9 balcony
                                    </option>
                                </select>
                            </div>

                            <div class="box">
                                <p>how many kitchen <span>*</span></p>
                                <select name="kitchen" class="input">
                                    <option value="1" <?php echo $results['kitchen'] == '1' ? 'selected' : ''; ?>>1
                                        kitchen</option>
                                    <option value="2" <?php echo $results['kitchen'] == '2' ? 'selected' : ''; ?>>2
                                        kitchen</option>
                                    <option value="3" <?php echo $results['kitchen'] == '3' ? 'selected' : ''; ?>>3
                                        kitchen</option>
                                    <option value="4" <?php echo $results['kitchen'] == '4' ? 'selected' : ''; ?>>4
                                        kitchen</option>
                                    <option value="5" <?php echo $results['kitchen'] == '5' ? 'selected' : ''; ?>>5
                                        kitchen</option>
                                    <option value="6" <?php echo $results['kitchen'] == '6' ? 'selected' : ''; ?>>6
                                        kitchen</option>
                                    <option value="7" <?php echo $results['kitchen'] == '7' ? 'selected' : ''; ?>>7
                                        kitchen</option>
                                    <option value="8" <?php echo $results['kitchen'] == '8' ? 'selected' : ''; ?>>8
                                        kitchen</option>
                                    <option value="9" <?php echo $results['kitchen'] == '9' ? 'selected' : ''; ?>>9
                                        kitchen</option>
                                </select>
                            </div>

                            <div class="box">
                                <p>how many hall <span>*</span></p>
                                <select name="hall" class="input">
                                    <option value="0" <?php echo $results['hall'] == '0' ? 'selected' : ''; ?>>0 hall
                                    </option>
                                    <option value="1" <?php echo $results['hall'] == '1' ? 'selected' : ''; ?>>1 hall
                                    </option>
                                    <option value="2" <?php echo $results['hall'] == '2' ? 'selected' : ''; ?>>2 hall
                                    </option>
                                    <option value="3" <?php echo $results['hall'] == '3' ? 'selected' : ''; ?>>3 hall
                                    </option>
                                    <option value="4" <?php echo $results['hall'] == '4' ? 'selected' : ''; ?>>4 hall
                                    </option>
                                    <option value="5" <?php echo $results['hall'] == '5' ? 'selected' : ''; ?>>5 hall
                                    </option>
                                    <option value="6" <?php echo $results['hall'] == '6' ? 'selected' : ''; ?>>6 hall
                                    </option>
                                    <option value="7" <?php echo $results['hall'] == '7' ? 'selected' : ''; ?>>7 hall
                                    </option>
                                    <option value="8" <?php echo $results['hall'] == '8' ? 'selected' : ''; ?>>8 hall
                                    </option>
                                    <option value="9" <?php echo $result['hall'] == '9' ? 'selected' : ''; ?>>9 hall
                                    </option>
                                </select>
                            </div>

                            <div class="box">
                                <p>carpet area <span>*</span></p>
                                <input type="tel" name="carpet" min="1" max="9999999999" maxlength="10"
                                    placeholder="How many square feet?" class="input"
                                    value="<?php echo $results['area'] ?>">
                            </div>

                            <div class="box">
                                <p>property age <span>*</span></p>
                                <input type="tel" name="age" min="0" max="99" maxlength="2"
                                    placeholder="How old is property?" class="input"
                                    value="<?php echo $results['age'] ?>">
                            </div>

                            <div class="box">
                                <p>total floors <span>*</span></p>
                                <input type="tel" name="total_floors" min="0" max="99" maxlength="2"
                                    placeholder="How many floors available?" class="input"
                                    value="<?php echo $results['totalfloor'] ?>">
                            </div>

                            <div class="box">
                                <p>floor room <span>*</span></p>
                                <input type="tel" name="room_floor" min="0" max="99" maxlength="2"
                                    placeholder="Property floor number" class="input"
                                    value="<?php echo $results['floorroom'] ?>">
                            </div>


                            <div class="box">
                                <p>loan <span>*</span></p>
                                <select name="loan" class="input">
                                    <option value="available" <?php echo $results['loan'] == 'available' ? 'selected' : ''; ?>>available</option>
                                    <option value="not available" <?php echo $results['loan'] == 'not available' ? 'selected' : ''; ?>>not available</option>
                                </select>
                            </div>

                        </div>
                        <div class="box">
                            <p>property description <span>*</span></p>
                            <textarea name="desc" maxlength="1000" class="input" cols="30" rows="10"
                                placeholder="Write about property..."><?php echo $results['description'] ?></textarea>
                        </div>




                        <div class="checkbox">
                            <div class="checkbox-wrapper">
                                <div class="checkbox_box">
                                    <input type="checkbox" name="extra[]" value="lift" <?php echo in_array('lift', $extras) ? 'checked' : ''; ?>>
                                    <label for="checkbox">Lift</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="checkbox" name="extra[]" value="security_guard" <?php echo in_array('security_guard', $extras) ? 'checked' : ''; ?>>
                                    <label for="checkbox">Security guard</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="checkbox" name="extra[]" value="play_ground" <?php echo in_array('play_ground', $extras) ? 'checked' : ''; ?>>
                                    <label for="checkbox">Play ground</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="checkbox" name="extra[]" value="garden" <?php echo in_array('garden', $extras) ? 'checked' : ''; ?>>
                                    <label for="checkbox">Garden</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="checkbox" name="extra[]" value="water_supply" <?php echo in_array('water_supply', $extras) ? 'checked' : ''; ?>>
                                    <label for="checkbox">Water supply</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="checkbox" name="extra[]" value="power_backup" <?php echo in_array('power_backup', $extras) ? 'checked' : ''; ?>>
                                    <label for="checkbox">Power backup</label>
                                </div>
                            </div>

                            <div class="checkbox-wrapper">
                                <div class="checkbox_box">
                                    <input type="checkbox" name="extra[]" value="parking_area" <?php echo in_array('parking_area', $extras) ? 'checked' : ''; ?>>
                                    <label for="checkbox">Parking area</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="checkbox" name="extra[]" value="gym" <?php echo in_array('gym', $extras) ? 'checked' : ''; ?>>
                                    <label for="checkbox">Gym</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="checkbox" name="extra[]" value="shopping_mall" <?php echo in_array('shopping_mall', $extras) ? 'checked' : ''; ?>>
                                    <label for="checkbox">Shopping mall</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="checkbox" name="extra[]" value="hospital" <?php echo in_array('hospital', $extras) ? 'checked' : ''; ?>>
                                    <label for="checkbox">Hospital</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="checkbox" name="extra[]" value="school" <?php echo in_array('school', $extras) ? 'checked' : ''; ?>>
                                    <label for="checkbox">School</label>
                                </div>
                                <div class="checkbox_box">
                                    <input type="checkbox" name="extra[]" value="market_area" <?php echo in_array('market_area', $extras) ? 'checked' : ''; ?>>
                                    <label for="checkbox">Market area</label>
                                </div>
                            </div>

                        </div>

                        <div class="box">
                            <p>image 01 <span>*</span></p>
                            <input type="file" name="img1" class="input fileupload" accept="image/*">
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
                            <p>Booking Date</p>
                            <input type="date" name="bdate" class="input date" value="<?php echo $results['Bdate'] ?>">
                        </div>

                        <input type="submit" value="Update Property" class="btns" name="post" style="margin-top: 20px;">
                    </form>
                </div>
            </div>
        </div>

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

            $extra = $_POST['extra'];
            $extra1 = implode(',', $extra);

            // for image 1
            if(isset($_FILES['img1']) && $_FILES['img1']['error'] == 0){
                $img1 = $_FILES['img1']['name'];
                $img1_tmp = $_FILES['img1']['tmp_name'];
                $folder = "../uploadphoto/property/" . $img1;
                move_uploaded_file($img1_tmp, $folder);
            }else{
                $img1 = $results['img1'];
            }
            

            // for image 2
            if(isset($_FILES['img2']) && $_FILES['img2']['error'] == 0){
            $img2 = $_FILES['img2']['name'];
            $img2_tmp = $_FILES['img2']['tmp_name'];
            $folder = "../uploadphoto/property/" . $img2;
            move_uploaded_file($img2_tmp, $folder);
            }else{
                $img2 = $results['img2'];
            }

            // for image 3
            if(isset($_FILES['img3']) && $_FILES['img3']['error'] == 0){
            $img3 = $_FILES['img3']['name'];
            $img3_tmp = $_FILES['img3']['tmp_name'];
            $folder = "../uploadphoto/property/" . $img3;
            move_uploaded_file($img3_tmp, $folder);
            }else{
                $img3 = $results['img3'];
            }

            // for image 4
            if(isset($_FILES['img4']) && $_FILES['img4']['error'] == 0){
            $img4 = $_FILES['img4']['name'];
            $img4_tmp = $_FILES['img4']['tmp_name'];
            $folder = "../uploadphoto/property/" . $img4;
            move_uploaded_file($img4_tmp, $folder);
            }else{
                $img4 = $results['img4'];
            }

            // for image 5
            if(isset($_FILES['img5']) && $_FILES['img5']['error'] == 0){
            $img5 = $_FILES['img5']['name'];
            $img5_tmp = $_FILES['img5']['tmp_name'];
            $folder = "../uploadphoto/property/" . $img5;
            move_uploaded_file($img5_tmp, $folder);
            }else{
                $img5 = $results['img5'];
            }

            $bdate = $_POST['bdate'];

            if (
                !empty($pname) && !empty($price) && !empty($depositamt) && !empty($address) && !empty($offer) && !empty($type) && !empty($status)
                && !empty($furnished) && !empty($bhk) && !empty($bedroom) && !empty($bathroom) && !empty($balcony)
                && !empty($area) && !empty($p_age) && !empty($floors) && !empty($room) && !empty($loan) && !empty($desc)
                && !empty($img1) && !empty($bdate)
            ) {
                $sql = "UPDATE `property` SET `pname`='$pname',`pprice`='$price',`depositeamt`='$depositamt',`paddress`='$address',
            `offertype`='$offer',`propertytype`='$type',`status`='$status',`furnishedstatus`='$furnished',`BHK`='$bhk',`bedroom`='$bedroom',
            `bathroom`='$bathroom',`balcony`='$balcony', `kitchen`='$kitchen',`hall`='$hall',`area`='$area',`age`='$p_age',`totalfloor`='$floors',`floorroom`='$room',
            `loan`='$loan',`description`='$desc',`extra`='$extra1',`img1`='$img1',`img2`='$img2',`img3`='$img3',
            `img4`='$img4',`img5`='$img5',`Bdate`='$bdate' WHERE id='$propertyid'";

                $data = mysqli_query($conn, $sql);

                if ($data) {
                    // echo "<script>alert('Location added successfully')</script>";
                    $_SESSION['status'] = "update successfully!";
                    $_SESSION['status_code'] = "success";

                    ?>
                    <meta http-equiv="refresh" content="2; url=http://localhost/dreamyrental/admin/viewproperty.php">
                    <?php
                } else {
                    // echo "Error: ". mysqli_error($conn);
                    $_SESSION['status'] = "Failed to add!";
                    $_SESSION['status_code'] = "error";
                }
            } else {
                // echo "<script>alert('Please fill all the fields')</script>";
                $_SESSION['status'] = "Fill all the field!";
                $_SESSION['status_code'] = "error";
            }

        }

        ?>


        <!-- body part  -->

        <?php
        require("Includefile/popup.php");
        ?>


        <?php
        require("Includefile/jslink.php");
        ?>

</body>

</html>