<?php
require '../db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $country = $_POST['country'];

        $sql = "UPDATE Admins 
                SET Username='$username', Email='$email', Country='$country' 
                WHERE AdminID=$id";

        if (mysqli_query($conn, $sql)) {
            echo "Admin updated successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    $admin = mysqli_query($conn, "SELECT * FROM Admins WHERE AdminID=$id");
    $row = mysqli_fetch_assoc($admin);
?>
<form method="POST">
    <input type="text" name="username" value="<?= $row['Username'] ?>" required>
    <input type="email" name="email" value="<?= $row['Email'] ?>" required>
    <input type="text" name="country" value="<?= $row['Country'] ?>" required>
    <button type="submit">Update Admin</button>
</form>
<?php
}
?>
