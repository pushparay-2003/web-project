<?php
require '../db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Admins WHERE AdminID=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Admin deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
