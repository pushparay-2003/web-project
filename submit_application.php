<?php
require '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $passport_number = $_POST['passport_number'];
    $visa_type = $_POST['visa_type'];
    $email = $_POST['email'];

    $verification_token = bin2hex(random_bytes(32));

    $sql = "INSERT INTO applications (name, passport_number, visa_type, email, verification_token) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $passport_number, $visa_type, $email, $verification_token);

    if ($stmt->execute()) {
        $verification_link = "http://localhost/visa-application/verify_email.php?token=$verification_token";
        $subject = "Email Verification - Visa Application";
        $message = "Hi $name,\n\nPlease verify your email by clicking the link below:\n$verification_link\n\nThank you.";
        $headers = "From: no-reply@visa-application.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "Application submitted. Check your email to verify.";
        } else {
            echo "Error sending email.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
