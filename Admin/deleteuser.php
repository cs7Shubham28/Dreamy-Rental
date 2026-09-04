<?php
require('../Including/db_connection.php');

$userid = (int)$_GET['id'];

$sql = "DELETE FROM users WHERE id=$userid";

$data = mysqli_query($conn, $sql);

if ($data) {
    echo "<script>alert('Your data is deleted!')</script>";
?>
    <meta http-equiv="refresh" content="0; url=http://localhost/dreamyrental/admin/user.php">
<?php
}else{
    echo "<script>alert('Failed to delete!')</script>";
}

?>