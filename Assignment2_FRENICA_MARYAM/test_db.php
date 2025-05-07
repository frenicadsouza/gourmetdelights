<?php
$conn = new mysqli('localhost', 'root', '', 'comments_db');
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully.";
}
$conn->close();
?>

