<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $title = $_POST["title"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $description = $_POST["description"];

    // Validate and sanitize the form data
    // ...

    // Process the data or save it to the database
    $sql = "INSERT INTO events (email, title, date, time, description) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $email, $title, $date, $time, $description);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        // Display a success message and redirect to CreateEvent.html
        echo '<script>
                alert("Your request is sent. Please wait for confirmation email.");
                window.location.href = "CreateEvent.html";
              </script>';
        exit; // Terminate further processing
    } else {
        // Display an error message
        echo "<script>alert('Failed to create event. Please try again.');</script>";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>