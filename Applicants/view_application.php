<?php
require '../db_connect.php';

$sql = "SELECT * FROM Applicants";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ApplicantID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Nationality</th>
                <th>Passport</th>
                <th>Applying From</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['ApplicantID']}</td>
                <td>{$row['FirstName']}</td>
                <td>{$row['LastName']}</td>
                <td>{$row['DateOfBirth']}</td>
                <td>{$row['Email']}</td>
                <td>{$row['PhoneNumber']}</td>
                <td>{$row['Nationality']}</td>
                <td>{$row['PassportNumber']}</td>
                <td>{$row['ApplyingFrom']}</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No applicants found.";
}
?>
