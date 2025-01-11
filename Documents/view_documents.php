<?php
require '../db_connect.php';

$sql = "SELECT * FROM Documents";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>DocumentID</th>
                <th>ApplicationID</th>
                <th>Document Type</th>
                <th>File Path</th>
                <th>Uploaded At</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['DocumentID']}</td>
                <td>{$row['ApplicationID']}</td>
                <td>{$row['DocumentType']}</td>
                <td><a href='{$row['FilePath']}' target='_blank'>View Document</a></td>
                <td>{$row['UploadedAt']}</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No documents found.";
}
?>
