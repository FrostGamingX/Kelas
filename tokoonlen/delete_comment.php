<?php
session_start();

// Include your database connection
include('db_connection.php');

if (isset($_POST['comment_id']) && isset($_SESSION['user_id'])) {
    $commentId = $_POST['comment_id'];
    $userId = $_SESSION['user_id'];

    // Check if the comment belongs to the logged-in user or if the user is an admin
    $query = "SELECT user_id FROM comments WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$commentId]);
    $comment = $stmt->fetch();

    if ($comment && ($comment['user_id'] == $userId || $_SESSION['is_admin'] == 1)) {
        // Delete the comment from the database
        $query = "DELETE FROM comments WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$commentId]);

        // Redirect back to the product page
        header("Location: product_detail.php?id=" . $_POST['product_id']);
        exit();
    } else {
        // If the user is not authorized to delete the comment
        echo "You are not authorized to delete this comment.";
    }
} else {
    echo "Invalid request.";
}
?>
