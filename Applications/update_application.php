<?php
require '../db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $status = $_POST['status'];
        $remarks = $_POST['remarks'];

        $sql = "UPDATE Applications 
                SET Status='$status', Remarks='$remarks' 
                WHERE ApplicationID=$id";

        if (mysqli_query($conn, $sql)) {
            echo "Application updated successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    $application = mysqli_query($conn, "SELECT * FROM Applications WHERE ApplicationID=$id");
    $row = mysqli_fetch_assoc($application);
?>
<form method="POST">
    <label>Status:</label>
    <select name="status" required>
        <option value="Pending" <?= $row['Status'] === 'Pending' ? 'selected' : '' ?>>Pending</option>
        <option value="Approved" <?= $row['Status'] === 'Approved' ? 'selected' : '' ?>>Approved</option>
        <option value="Rejected" <?= $row['Status'] === 'Rejected' ? 'selected' : '' ?>>Rejected</option>
    </select>
    
    <label>Remarks:</label>
    <textarea name="remarks"><?= $row['Remarks'] ?></textarea>
    
    <button type="submit">Update Application</button>
</form>
<?php
}
?>
