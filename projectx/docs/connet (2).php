<?php
$servername = "localhost";
$username = "u210910038_toor";
$password = "Edufun@123";
$dbname = "u210910038_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>