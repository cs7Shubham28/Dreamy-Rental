<?php
require('../Including/db_connection.php');

$locid = $_GET['id'];

session_start();

if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}

$sql = "SELECT * FROM location WHERE id='$locid'";

$data = mysqli_query($conn, $sql);

$result2 = mysqli_fetch_assoc($data);
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
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $city = $_POST['city'];
        $state = $_POST['state'];

        if (!empty($city) && !empty($state)) {
            $sql = "UPDATE location SET city='$city', state='$state' WHERE id='$locid'";
            $data = mysqli_query($conn, $sql);

            if ($data) {
                //     echo "<script>alert('Admin details updated successfully')</script>";
                $_SESSION['status'] = "Updated successfully!";
                $_SESSION['status_code'] = "success";


                echo "<meta http-equiv='refresh' content='2; url=http://localhost/dreamyrental/admin/viewlocation.php'> ";

            } else {
                // echo "<script>alert('Failed to update admin details')</script>";
                $_SESSION['status'] = "Failed to update!";
                $_SESSION['status_code'] = "error";
            }
        } else {
            // echo "<script>alert('Please fill all the fields')</script>";
            $_SESSION['status'] = "Fill all the field!";
            $_SESSION['status_code'] = "error";
        }
    }
    ?>

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
                    <h2>Update Location</h2>
                    <h3> <a href="dashboard.php">Dashboard</a> / <a href="viewlocation.php">View loaction</a> / Update
                        Location</h3>
                </div>

                <div class="location-container">

                    <h2>Update Location</h2>

                    <h4>Location Detail</h4>

                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">


                        <div class="input-field">
                            <label for="city">City Name</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City"
                                value="<?php echo $result2['city'] ?>">
                        </div>

                        <div class="input-field">
                            <label for="state">State Name</label>
                            <select name="state" class="select">
                                <option value="">Select State</option>
                                <option value="koshi_province" <?php echo ($result2['state'] == 'koshi_province') ? 'selected' : ''; ?>>Koshi Province</option>
                                <option value="madhesh_province" <?php echo ($result2['state'] == 'madhesh_province') ? 'selected' : ''; ?>>Madhesh Province</option>
                                <option value="bagmati_province" <?php echo ($result2['state'] == 'bagmati_province') ? 'selected' : ''; ?>>Bagmati Province</option>
                                <option value="gandaki_province" <?php echo ($result2['state'] == 'gandaki_province') ? 'selected' : ''; ?>>Gandaki Province</option>
                                <option value="lumbini_province" <?php echo ($result2['state'] == 'lumbini_province') ? 'selected' : ''; ?>>Lumbini Province</option>
                                <option value="karnali_province" <?php echo ($result2['state'] == 'karnali_province') ? 'selected' : ''; ?>>Karnali Province</option>
                                <option value="sudurpaschim_province" <?php echo ($result2['state'] == 'sudurpaschim_province') ? 'selected' : ''; ?>>Sudurpaschim
                                    Province</option>
                            </select>
                        </div>


                        <input type="submit" name="submit">

                    </form>


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