<?php
// Database connection settings
$servername = "sql209.infinityfree.com"; // MySQL Host Name
$username = "if0_38169140";              // MySQL User Name
$password = "easyPassword123";      // Your InfinityFree vPanel password
$database = "if0_38169140_user_management"; // MySQL DB Name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}
?>
