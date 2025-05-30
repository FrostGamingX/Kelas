<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave a Comment</title>
</head>
<body>
    <h2>Leave a Comment</h2>
    <form action="comment_process.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" rows="5" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form> 
</body>
</html>