<?php
require '../db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['visa_type_name'];
        $description = $_POST['description'];
        $processingTime = $_POST['processing_time'];

        $sql = "UPDATE VisaTypes 
                SET VisaTypeName='$name', Description='$description', ProcessingTimeDays='$processingTime'
                WHERE VisaTypeID=$id";

        if (mysqli_query($conn, $sql)) {
            echo "Visa type updated successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    $visaType = mysqli_query($conn, "SELECT * FROM VisaTypes WHERE VisaTypeID=$id");
    $row = mysqli_fetch_assoc($visaType);
?>
<form method="POST">
    <input type="text" name="visa_type_name" value="<?= $row['VisaTypeName'] ?>" required>
    <textarea name="description"><?= $row['Description'] ?></textarea>
    <input type="number" name="processing_time" value="<?= $row['ProcessingTimeDays'] ?>" required>
    <button type="submit">Update</button>
</form>
<?php
}
?>
