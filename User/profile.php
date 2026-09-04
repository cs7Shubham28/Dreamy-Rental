<?php
require('../Including/db_connection.php');
require('session_check.php');

$id = $_SESSION['email'];

$sql = "SELECT * FROM users WHERE email='$id'";

$data = mysqli_query($conn, $sql);

$result = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- primary meta tags -->
    <title>My profile</title>
    <meta name="description" content="A website to rent rooms at affordable prices.">

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/logo/favicon.svg" type="image/svg+xml">

    <!-- links add  -->
    <?php require("../Including/links.php"); ?>

    <!-- custome css link -->
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/headernextpag.css">
    <link rel="stylesheet" href="../css/login.css">

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


            <section class="section profilesection">
                <div class="container">

                    <h1 class="headline-large about-title title">My Profile</h1>

                    <div class="profile-container">

                        <div class="left">
                            <div class="profile-holder">

                                <img src="../uploadphoto/users/<?php echo !empty($result['photo']) ? $result['photo'] : 'default.png'; ?>"
                                    alt="Profile Image" id="profile-pic">

                                <h2 class="name"><?php echo $result['username']; ?></h2>

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

                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="input-field">
                                        <label for="name">Username</label>
                                        <input type="text" id="name" name="name"
                                            value="<?php echo $result['username'] ?>">
                                    </div>

                                    <div class="input-field">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email"
                                            value="<?php echo $result['email'] ?>">
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
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" id="phone" name="phone" value="<?php echo $result['contact']; ?>">
                                    </div>

                                    <div class="input-field">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" id="dob" name="dob" value="<?php echo $result['dob']; ?>">
                                    </div>

                                    <div class="input-field button">
                                        <label for="input-file" class="third">Change Profile</label>
                                        <input type="file" name="photo" accept="image/jpeg, image/png, image/jpg"
                                            id="input-file">
                                    </div>

                                    <input type="submit" value="Update" class="contact-btn">


                                </form>

                            </div>
                        </div>

                    </div>


                </div>
            </section>

        </article>
    </main>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
        }

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            $photo = $_FILES['photo']['name'];
            $tempphoto = $_FILES['photo']['tmp_name'];
            $folder = "../uploadphoto/users/" . $photo;
            move_uploaded_file($tempphoto, $folder);
        } else {
            // If no new photo, keep the old photo
            $photo = $result['photo'];
        }

        if (!empty($username) && !empty($email) && !empty($contact) && !empty($gender) && !empty($dob)) {
            $sql = "UPDATE users SET username='$username', email='$email', contact='$contact', gender='$gender', dob='$dob', photo='$photo' WHERE email='$id'";
            $data = mysqli_query($conn, $sql);
            if ($data) {
                // echo "<script>alert('Profile updated successfully')</script>";
                $_SESSION['status'] = "Updated successfully!";
                $_SESSION['status_code'] = "success";

                echo "<meta http-equiv='refresh' content='2; url=http://localhost/dreamyrental/User/profile.php'> ";
            } else {
                // echo "<script>alert('Failed to update profile')</script>";
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


    <!-- footer section  -->
    <?php
    require("../including/popup.php");
    ?> 

    <?php
    require("../including/footer.php");
    ?>

</body>

</html>