<?php
// connection.php
$sn = "localhost"; // servername
$username = "root";
$password = "";
$dbname = "eventmanagement";

// Create connection
$conn = new mysqli($sn, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";

?>