<?php
require('../Including/db_connection.php');
require('session_check.php');

$id = $_SESSION['email'];

$sql = "SELECT * FROM users WHERE email='$id'";

$data = mysqli_query($conn, $sql);

$result = mysqli_fetch_assoc($data);
?>

<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])) {
    $name = $_POST['name'];
    $feedback = $_POST['feedback'];
    $rateIndex = isset($_POST['rateIndex']) ? $_POST['rateIndex'] : -1; 
    $userprofile = $result['photo'];


        $bimage = $_FILES['photo']['name'];
        $tempphoto = $_FILES['photo']['tmp_name'];
        $folder = "../uploadphoto/feedback/" . $bimage;
        move_uploaded_file( $tempphoto, $folder);



        if (!empty($name) && !empty($feedback) && $rateIndex != -1 && !empty($bimage)) {
            $sql = "INSERT INTO feedback (name, feedback, bimage, rating, profile) VALUES ('$name', '$feedback', '$bimage', '$rateIndex', '$userprofile')";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['status'] = "Feedback submitted successfully!";
                $_SESSION['status_code'] = "success";
            } else {
                $_SESSION['status'] = "Error saving feedback.";
                $_SESSION['status_code'] = "error";
            }
        } else {
            $_SESSION['status'] = "Please fill in all fields!";
            $_SESSION['status_code'] = "error";
        }
        echo "<meta http-equiv='refresh' content='0; url=http://localhost/dreamyrental/user'>";
    }


?>