<?php
session_start();
require('../Including/db_connection.php');

if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM adminlogin WHERE id=$id";
$data = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($data);

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
        <div class="dashboard updatedata">

        <?php
        require("Includefile/topheader.php");
        ?>

            <div class="dashboard-content">

                <div class="dashboard-title">
                    <h2>Admin</h2>
                    <h3> <a href="dashboard.php">Dashboard</a> / <a href="admin.php">Admin</a> / Update Detail</h3>
                </div>

                <div class="update-container">

                    <div class="updatedetail">
                        <h2>Update Admin Detail</h2>

                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input type="text" name="name" id="name" value="<?php echo $result['username'] ?>">
                            </div>

                            <div class="flexgroup">

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="<?php echo $result['email'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password"
                                        value="<?php echo $result['password'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="tel" name="contact" id="contact"
                                        value="<?php echo $result['contact'] ?>">
                                </div>


                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" id="dob" value="<?php echo $result['dob'] ?>">
                                </div>



                            </div>


                            <input type="submit" value="Update">
                        </form>

                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $username = $_POST['name'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $contact = $_POST['contact'];
                            $dob = $_POST['dob'];
                       
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo "Invalid email format";
                            }

                            if (!empty($username) && !empty($email) && !empty($password) && !empty($contact) && !empty($dob)) {
                                $sql = "UPDATE adminlogin SET username='$username', email='$email', password='$password', contact='$contact', dob='$dob' WHERE id=$id";

                                $data = mysqli_query($conn, $sql);

                                if ($data) {
                                    // echo "<script>alert('Admin details updated successfully')</script>";
                                    $_SESSION['status'] = "Updated successfully!";
                                    $_SESSION['status_code'] = "success";


                                    echo "<meta http-equiv='refresh' content='2; url=http://localhost/dreamyrental/admin/admin.php'> ";
                                    ?>



                                    <?php
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
                    </div>

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