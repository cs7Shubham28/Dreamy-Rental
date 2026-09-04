<?php
require('../Including/db_connection.php');

$propertyid = (int)$_GET['id'];

$sql = "DELETE FROM property WHERE id=$propertyid";

$data = mysqli_query($conn, $sql);

if ($data) {
    echo "<script>alert('Property is deleted!')</script>";
?>
    <meta http-equiv="refresh" content="0; url=http://localhost/dreamyrental/admin/viewproperty.php">
<?php
}else{
    echo "<script>alert('Failed to delete!')</script>";
}
?>