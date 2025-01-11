<?php
include 'db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $sql = "SELECT id FROM applications WHERE verification_token = ? AND verification_status = 'pending'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $update_sql = "UPDATE applications SET verification_status = 'verified' WHERE verification_token = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("s", $token);

        if ($update_stmt->execute()) {
            echo "Email verified successfully. Your application is under review.";
        } else {
            echo "Error updating status.";
        }
    } else {
        echo "Invalid or expired token.";
    }
} else {
    echo "No token provided.";
}
?>
