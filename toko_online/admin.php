<?php 
include 'config/database.php'; 
session_start();

// Cek apakah pengguna sudah login dan memiliki role admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Alihkan ke halaman login jika tidak memiliki akses
    exit();
}

include 'includes/header.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Admin - Toko Online</title>
</head>
<body>

<h1>Halaman Admin</h1>
<a href="admin/add_product.php" class="button">Tambah Produk</a>
<a href="admin/logout.php" class="button">Logout</a>
<h2>Daftar Produk</h2>
<div class="products">
    <?php
    $result = $conn->query("SELECT * FROM products");
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
        echo "<p>Harga: " . htmlspecialchars($row['price']) . "</p>";
        echo "<a href='admin/edit_product.php?id=" . htmlspecialchars($row['id']) . "'>Edit</a> | ";
        echo "<a href='admin/delete_product.php?id=" . htmlspecialchars($row['id']) . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus produk ini?\")'>Hapus</a>";
        echo "</div>";
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>