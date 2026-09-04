<?php
require('../Including/db_connection.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}

$abtid = $_GET['id'];
$sql = "SELECT * FROM aboutcontent WHERE id='$abtid'";
$data = mysqli_query($conn, $sql);
$result1 = mysqli_fetch_assoc($data);
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
                    <h2>Edit About Content</h2>
                    <h3> <a href="dashboard.php">Dashboard</a> / <a href="viewaboutcontent.php">View about content</a>/
                        About Content</h3>
                </div>

                <div class="location-container">

                    <h2>Edit Content</h2>

                    <h4>About us</h4>

                    <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=$abtid" ?>" method="POST">


                        <div class="input-field">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"
                                value="<?php echo $result1['title'] ?>">
                        </div>

                        <div class="input-field">
                            <label for="content">Paragraph 1</label>
                            <textarea name="description1" maxlength="1000" class="input" cols="30" rows="10"
                                placeholder="Write about website..."><?php echo $result1['content1'] ?></textarea>

                        </div>

                        <div class="input-field">
                            <label for="content">Paragraph 2</label>
                            <textarea name="description2" maxlength="1000" class="input" cols="30" rows="10"
                                placeholder="Write about website..."><?php echo $result1['content2'] ?></textarea>

                        </div>

                        <input type="submit" value="Update">

                    </form>
                </div>

                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $title = $_POST['title'];
                    $desc1 = $_POST['description1'];
                    $desc2 = $_POST['description2'];

                    if (!empty($title) && !empty($desc1) && !empty($desc2)) {
                        $sql = "UPDATE aboutcontent SET title='$title', content1='$desc1', content2='$desc2' WHERE id='$abtid'";
                        $data = mysqli_query($conn, $sql);

                        if ($data) {
                            // echo "<script>alert('About Content updated successfully')</script>";
                            $_SESSION['status'] = "Updated successfully!";
                            $_SESSION['status_code'] = "success";
                            echo "<meta http-equiv='refresh' content='2; url=http://localhost/dreamyrental/admin/viewaboutcontent.php'>";
                            ?>

                            <?php
                        } else {
                            // echo "<script>alert('Failed to update about us details')</script>";
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
        <!-- body part  -->

        <?php
        require("Includefile/popup.php");
        ?>


        <?php
        require("Includefile/jslink.php");
        ?>

</body>

</html>