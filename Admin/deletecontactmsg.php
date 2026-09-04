<?php
require('../Including/db_connection.php');

$contid = $_GET['id'];

$sql =   "DELETE FROM contact WHERE id='$contid'";

$data =mysqli_query($conn, $sql);

if ($data) {
    echo "<script>alert('Message is deleted!')</script>";
?>
    <meta http-equiv="refresh" content="0; url=http://localhost/dreamyrental/admin/contactmsg.php">
<?php
}else{
    echo "<script>alert('Failed to delete Message!')</script>";
}
?>
