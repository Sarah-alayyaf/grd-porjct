<?php
// Include the connection page
require_once "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $birthdate = $_POST["birthdate"];
    $interests = isset($_POST["interests"]) ? $_POST["interests"] : [];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO registrations (username, email, password, phone, birthdate, interests) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $username, $email, $password, $phone, $birthdate, $interests);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
        // Redirect to the home page using JavaScript
        echo '<script>window.location.href = "HomePage.html";</script>';
        exit; // Terminate further processing
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>