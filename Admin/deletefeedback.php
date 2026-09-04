<?php
require('../Including/db_connection.php');

$feedbackid = (int)$_GET['id'];

$sql = "DELETE FROM feedback WHERE id=$feedbackid";

$data = mysqli_query($conn, $sql);

if ($data) {
    echo "<script>alert('Feedback is deleted!')</script>";
    ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/dreamyrental/admin/feedbackmsg.php">
    <?php
    exit();
}else{
    echo "<script>alert('Failed to delete feedback!')</script>";
    ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/dreamyrental/admin/feedbackmsg.php">
    <?php
    exit();
}
?>