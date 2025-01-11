<?php
require '../db_connect.php'; // Include database connection

// Check if the document ID is provided in the URL
if (isset($_GET['id'])) {
    $documentID = $_GET['id'];

    // Fetch the document file path before deleting it
    $query = "SELECT FilePath FROM Documents WHERE DocumentID = $documentID";
    $result = mysqli_query($conn, $query);
    $document = mysqli_fetch_assoc($result);

    if ($document) {
        $filePath = $document['FilePath'];

        // Delete the document record from the database
        $sql = "DELETE FROM Documents WHERE DocumentID = $documentID";

        if (mysqli_query($conn, $sql)) {
            // Check if the file exists, and delete it from the server
            if (file_exists($filePath)) {
                unlink($filePath); // Remove the file from the server
            }
            echo "Document deleted successfully!";
        } else {
            echo "Error deleting document: " . mysqli_error($conn);
        }
    } else {
        echo "Document not found.";
    }
} else {
    echo "No document ID provided.";
}
?>
