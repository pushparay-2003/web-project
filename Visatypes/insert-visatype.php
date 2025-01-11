<?php
require '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['visa_type_name'];
    $description = $_POST['description'];
    $processingTime = $_POST['processing_time'];

    $sql = "INSERT INTO VisaTypes (VisaTypeName, Description, ProcessingTimeDays)
            VALUES ('$name', '$description', '$processingTime')";

    if (mysqli_query($conn, $sql)) {
        echo "Visa type added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    <input type="text" name="visa_type_name" placeholder="Visa Type Name" required>
    <textarea name="description" placeholder="Description"></textarea>
    <input type="number" name="processing_time" placeholder="Processing Time (Days)" required>
    <button type="submit">Submit</button>
</form>
