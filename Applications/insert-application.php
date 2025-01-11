<?php
require '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $applicantID = $_POST['applicantID'];
    $visaTypeID = $_POST['visaTypeID'];
    $remarks = $_POST['remarks'];

    $sql = "INSERT INTO Applications (ApplicantID, VisaTypeID, Remarks) 
            VALUES ('$applicantID', '$visaTypeID', '$remarks')";

    if (mysqli_query($conn, $sql)) {
        echo "Application added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    <label>Applicant ID:</label>
    <input type="number" name="applicantID" required>
    
    <label>Visa Type ID:</label>
    <input type="number" name="visaTypeID" required>
    
    <label>Remarks:</label>
    <textarea name="remarks"></textarea>
    
    <button type="submit">Add Application</button>
</form>
