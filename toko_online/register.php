<?php include 'config/database.php'; ?>
<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Registrasi - Toko Online</title>
</head>
<body>

<h1>Registrasi</h1>
<form action="register_process.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Daftar</button>
</form>

<p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

<?php include 'includes/footer.php'; ?>
</body>
</html>