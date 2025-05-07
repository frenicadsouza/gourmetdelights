<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'comments_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $conn->real_escape_string($_POST['name']);
$message = $conn->real_escape_string($_POST['message']);

// Insert comment into database
$sql = "INSERT INTO comments (name, message) VALUES ('$name', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Comment submitted successfully!";
    header('Location: comments.html'); // Redirect back to comments page
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

<!-- Display Comments -->
<section>
    <table class="table2" cellpadding="8">
        <tr>
            <th>Name</th>
            <th>Comment</th>
        </tr>
        <?php
        // Include a PHP script to fetch comments from the database
        include 'fetch_comments.php';
        ?>
    </table>
</section>
