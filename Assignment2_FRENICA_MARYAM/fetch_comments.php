<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'comments_db');

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Fetch comments
$sql = "SELECT name, message FROM comments ORDER BY id DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>" . htmlspecialchars($row['message']) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='2'>No comments found.</td></tr>";
}

// Close connection
$conn->close();
?>
