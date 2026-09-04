<?php
require('../Including/db_connection.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}
$id = $_SESSION['username'];

$sql = "SELECT * FROM adminlogin WHERE username='$id'";

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

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];


    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo']['name'];
        $tempphoto = $_FILES['photo']['tmp_name'];
        $folder = "../uploadphoto/admin/" . $photo;
        move_uploaded_file($tempphoto, $folder);
    } else {
        $photo = $result['photo'];
    }



    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    }

    if (!empty($username) && !empty($email) && !empty($contact) && !empty($gender) && !empty($dob)) {
        $sql = "UPDATE adminlogin SET username='$username', email='$email', contact='$contact', gender='$gender', photo='$photo', dob='$dob' WHERE username='$id'";


        $data = mysqli_query($conn, $sql);

        if ($data) {
        //     echo "<script>alert('Admin details updated successfully')</script>";
            $_SESSION['status'] = "Updated successfully!";
            $_SESSION['status_code'] = "success";


            echo "<meta http-equiv='refresh' content='2; url=http://localhost/dreamyrental/admin/profile.php'> ";

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
                    <h2>Profile</h2>
                    <h3> <a href="dashboard.php">Dashboard</a> / Profile</h3>
                </div>

                <div class="profile-container">

                    <div class="left">
                        <div class="profile-holder">
                            <img src="../uploadphoto/admin/<?php echo !empty($result['photo']) ? $result['photo'] : 'default.png'; ?>" alt="Profile Image" id="profile-pic">


                            <h2 class="name"><?php echo $result['username'] ?></h2>

                            <div class="profile-detail">
                                <h4>Email: <span><?php echo $result['email'] ?></span></h4>
                                <h4>Gender:
                                    <span><?php echo ($result['gender'] == 'male') ? 'Male' : 'Female'; ?></span>
                                </h4>
                                <h4>Phone-Number: <span><?php echo $result['contact']; ?></span></h4>
                                <h4>Date of Birth: <span><?php echo $result['dob']; ?></span></h4>
                            </div>


                        </div>
                    </div>

                    <div class="right">
                        <div class="profile-form">
                            <h2>Edit Profile</h2>

                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                                <div class="input-field">
                                    <label for="name">Username</label>
                                    <input type="text" id="name" name="name" value="<?php echo $result['username'] ?>">
                                </div>

                                <div class="input-field">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="<?php echo $result['email'] ?>">
                                </div>

                                <div class="input-field">
                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender" class="select">
                                        <option value="" disabled <?php if (empty($result['gender']))
                                            echo "selected"; ?>>Select Gender</option>
                                        <option value="male" <?php if ($result['gender'] == 'male')
                                            echo "selected"; ?>>
                                            Male</option>
                                        <option value="female" <?php if ($result['gender'] == 'female')
                                            echo "selected"; ?>>Female</option>
                                    </select>
                                </div>


                                <div class="input-field">
                                    <label for="contact">Phone Number</label>
                                    <input type="tel" id="contact" name="contact"
                                        value="<?php echo $result['contact']; ?>" </div>

                                    <div class=" input-field">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" id="dob" name="dob" value="<?php echo $result['dob']; ?>"
                                            </div>

                                        <div class="input-field">
                                            <label for="input-file" class="third">Change Profile</label>
                                            <input type="file" name="photo" accept="image/jpeg, image/png, image/jpg"
                                                id="input-file">
                                        </div>

                                        <input type="submit" value="Update" style="display: inline; color: white;">
                            </form>



                        </div>
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