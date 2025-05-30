<?php
// Database connection details (replace with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tokoonline";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get comment data from the form
$name = $_POST['name'];
$comment = $_POST['comment'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO comments (author_name, comment_text) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $comment);

// Execute the statement
if ($stmt->execute()) {
    echo "Comment added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();

// Redirect back to the comment page or display a success message
header("Location: comment.php");
exit();
?>