<?php
include_once 'connection.php';

// Initialize variables
$message = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Insert the comment and rating into the database
    $sql = "INSERT INTO comments (rating, comment) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $rating, $comment);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $message = "Comment sent successfully.";
        // Redirect to Events.html with popup message
        echo '<script>
                alert("Comment and rating sent successfully.");
                window.location.href = "Events.html";
              </script>';
        exit; // Terminate further processing
    } else {
        $message = "Failed to send comment.";
    }

    $stmt->close();
    $conn->close();
}
?>