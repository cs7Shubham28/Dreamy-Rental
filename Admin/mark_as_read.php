<?php
require('../Including/db_connection.php');


$sql = "UPDATE property SET isread = 0 WHERE isread IN (1, 2)";
if (mysqli_query($conn, $sql)) {
} else {
    echo "Error updating notifications: " . mysqli_error($conn);
}
?>
