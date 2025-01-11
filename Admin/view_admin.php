<?php
require '../db_connect.php';

$sql = "SELECT * FROM Admins";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>AdminID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Country</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['AdminID']}</td>
                <td>{$row['Username']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['Country']}</td>
                <td>{$row['CreatedAt']}</td>
                <td>
                    <a href='update_admin.php?id={$row['AdminID']}'>Update</a> | 
                    <a href='delete_admin.php?id={$row['AdminID']}' onclick='return confirm(\"Are you sure you want to delete this admin?\");'>Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No admins found.";
}
?>
