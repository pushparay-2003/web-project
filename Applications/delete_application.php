<?php
require '../db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Applications WHERE ApplicationID=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Application deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "No application ID provided.";
}
?>
