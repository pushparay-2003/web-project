<?php
require '../db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Applicants WHERE ApplicantID=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Applicant deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
