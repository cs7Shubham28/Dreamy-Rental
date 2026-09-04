<?php
    require('../Including/db_connection.php');

    session_start();

    if(!isset($_SESSION['username'])) {
        header("location: index.php");
        exit();
    }
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

<style>

</style>

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
                    <h2>Add Location</h2>
                    <h3> <a href="dashboard.php">Dashboard</a> / Add Location</h3>
                </div>

                <div class="location-container">

                    <h2>Add Location</h2>

                    <h4>Location Detail</h4>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        

                        <div class="input-field">
                            <label for="city">City Name</label>
                            <input type="text" class="form-control" id="city" name="city" required placeholder="Enter City"> 
                        </div>

                        <div class="input-field">
                            <label for="state">State Name</label>
                            <select name="state" class="select">
                                <option value="">Select State</option>
                                <option value="koshi_province">Koshi Province</option>
                                <option value="madhesh_province">Madhesh Province</option>
                                <option value="bagmati_province">Bagmati Province</option>
                                <option value="gandaki_province">Gandaki Province</option>
                                <option value="lumbini_province">Lumbini Province</option>
                                <option value="karnali_province">Karnali Province</option>
                                <option value="sudurpaschim_province">Sudurpaschim Province</option>
                            </select>
                        </div>

                        <input type="submit" name="submit">

                    </form>

                    <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $city = $_POST['city'];
                            $state = $_POST['state'];

                            if(!empty($city) && !empty($state)){
                                $sql = "INSERT INTO `location`(city, state) VALUES ('$city', '$state')";
                                $result = mysqli_query($conn, $sql);

                                if($result){
                                    // echo "<script>alert('Location added successfully')</script>";
                                    $_SESSION['status'] = "Add successfully!";
                                    $_SESSION['status_code'] = "success";

                                ?>
                                    <meta http-equiv="refresh" content="2; url=http://localhost/dreamyrental/admin/viewlocation.php">  
                                <?php
                                } else{
                                    // echo "Error: ". mysqli_error($conn);
                                    $_SESSION['status'] = "Failed to add!";
                                    $_SESSION['status_code'] = "error";
                                }
                            }else{
                                // echo "<script>alert('Please fill all the fields')</script>";
                                $_SESSION['status'] = "Fill all the field!";
                                $_SESSION['status_code'] = "error";
                            }
                           
                        }
                    ?>
                </div>

            </div>



        </div>
        <!-- body part  -->

        <?php
        require("Includefile/popup.php");
        ?>


        <?php
        require("Includefile/jslink.php");
        ?>

</body>

</html>