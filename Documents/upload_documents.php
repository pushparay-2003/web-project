<?php
require '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['document'])) {
    $applicationID = $_POST['application_id'];
    $documentType = $_POST['document_type'];
    $filePath = 'uploads/' . basename($_FILES['document']['name']);

    if (move_uploaded_file($_FILES['document']['tmp_name'], $filePath)) {
        $sql = "INSERT INTO Documents (ApplicationID, DocumentType, FilePath)
                VALUES ('$applicationID', '$documentType', '$filePath')";

        if (mysqli_query($conn, $sql)) {
            echo "Document uploaded successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading file.";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="application_id" placeholder="Application ID" required>
    <select name="document_type" required>
        <option value="Passport Photo">Passport Photo</option>
    </select>
    <input type="file" name="document" required>
    <button type="submit">Upload</button>
</form>
