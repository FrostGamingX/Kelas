<?php 
session_start(); 
include 'config/database.php'; 
include 'includes/header.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Menghubungkan dengan style.css -->
    <title>Toko Online</title>
</head>
<body>

<h1>Daftar Produk</h1>

<?php if (isset($_SESSION['user_id'])): ?>
    <p>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>! 
    <a href="logout.php">Logout</a></p>
    
    <?php if ($_SESSION['role'] === 'admin'): ?>
        <p><a href="admin.php">Masuk ke Halaman Admin</a></p>
    <?php endif; ?>
<?php else: ?>
    <p><a href="login.php">Login</a> | <a href="register.php">Registrasi</a></p>
<?php endif; ?>

<div class="products">
    <?php
    $result = $conn->query("SELECT * FROM products");
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<p>Harga: " . htmlspecialchars($row['price']) . "</p>";
        echo "<img src='assets/images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
        echo "<a href='product.php?id=" . htmlspecialchars($row['id']) . "'>Lihat Detail</a>";
        echo "<button class='add-to-cart' data-id='" . htmlspecialchars($row['id']) . "'>Tambah ke Keranjang</button>";
        echo "</div>";
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>