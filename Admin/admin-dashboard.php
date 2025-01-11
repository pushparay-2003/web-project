<?php
include 'db_connect.php';

$sql = "SELECT * FROM applications WHERE verification_status = 'verified'";
$result = $conn->query($sql);

echo "<h2>Verified Applications</h2>";
echo "<table border='1'>";
echo "<tr><th>Name</th><th>Passport Number</th><th>Visa Type</th><th>Submission Date</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['passport_number'] . "</td>";
    echo "<td>" . $row['visa_type'] . "</td>";
    echo "<td>" . $row['submitted_at'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
