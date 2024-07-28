<?php
include_once 'connection.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $name1 = $_POST['username'];
    $e = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$name1', '$e')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // Redirect to the home page using JavaScript
        echo '<script>window.location.href = "HomePage.html";</script>';
        exit; // Terminate further processing
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Username or password not provided.";
}

$conn->close();
?>