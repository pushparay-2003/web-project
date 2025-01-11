<?php
require '../db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM VisaTypes WHERE VisaTypeID=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Visa type deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
