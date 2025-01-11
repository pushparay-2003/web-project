<?php
require '../db_connect.php';

$sql = "SELECT * FROM VisaTypes";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>VisaTypeID</th>
                <th>Visa Type Name</th>
                <th>Description</th>
                <th>Processing Time (Days)</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['VisaTypeID']}</td>
                <td>{$row['VisaTypeName']}</td>
                <td>{$row['Description']}</td>
                <td>{$row['ProcessingTimeDays']}</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No visa types found.";
}
?>
