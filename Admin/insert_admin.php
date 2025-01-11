<?php
require '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password hashing
    $email = $_POST['email'];
    $country = $_POST['country'];

    $sql = "INSERT INTO Admins (Username, Password, Email, Country) 
            VALUES ('$username', '$password', '$email', '$country')";

    if (mysqli_query($conn, $sql)) {
        echo "Admin added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="country" placeholder="Country" required>
    <button type="submit">Add Admin</button>
</form>
