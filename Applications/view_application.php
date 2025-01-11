<?php
require '../db_connect.php';

$sql = "SELECT Applications.ApplicationID, Applicants.FirstName, Applicants.LastName, 
        VisaTypes.VisaTypeName, Applications.ApplicationDate, Applications.Status, Applications.Remarks 
        FROM Applications
        JOIN Applicants ON Applications.ApplicantID = Applicants.ApplicantID
        JOIN VisaTypes ON Applications.VisaTypeID = VisaTypes.VisaTypeID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Application ID</th>
                <th>Applicant</th>
                <th>Visa Type</th>
                <th>Application Date</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['ApplicationID']}</td>
                <td>{$row['FirstName']} {$row['LastName']}</td>
                <td>{$row['VisaTypeName']}</td>
                <td>{$row['ApplicationDate']}</td>
                <td>{$row['Status']}</td>
                <td>{$row['Remarks']}</td>
                <td>
                    <a href='update_application.php?id={$row['ApplicationID']}'>Update</a> | 
                    <a href='delete_application.php?id={$row['ApplicationID']}' onclick='return confirm(\"Are you sure you want to delete this application?\");'>Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No applications found.";
}
?>
