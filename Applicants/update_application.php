<?php
require '../db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];

        $sql = "UPDATE Applicants SET FirstName='$firstName', LastName='$lastName', Email='$email' WHERE ApplicantID=$id";

        if (mysqli_query($conn, $sql)) {
            echo "Applicant updated successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    $applicant = mysqli_query($conn, "SELECT * FROM Applicants WHERE ApplicantID=$id");
    $row = mysqli_fetch_assoc($applicant);
?>
<form method="POST">
    <input type="text" name="first_name" value="<?= $row['FirstName'] ?>" required>
    <input type="text" name="last_name" value="<?= $row['LastName'] ?>" required>
    <input type="email" name="email" value="<?= $row['Email'] ?>" required>
    <button type="submit">Update</button>
</form>
<?php
}
?>
