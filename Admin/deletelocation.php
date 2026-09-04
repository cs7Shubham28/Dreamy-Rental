<?php
require('../Including/db_connection.php');

$locid = (int)$_GET['id'];

$sql = "DELETE FROM location where id=$locid";

$data = mysqli_query($conn, $sql);

if ($data) {
    echo "<script>alert('Location is deleted!')</script>";
?>
    <meta http-equiv="refresh" content="0; url=http://localhost/dreamyrental/admin/viewlocation.php">
<?php
exit();
}else{
    echo "<script>alert('Failed to delete!')</script>";
    exit();
}
?>