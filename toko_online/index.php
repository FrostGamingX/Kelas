<?php 
session_start(); 
include 'config/database.php'; 
include 'includes/header.php'; 

// Cek jika ada permintaan untuk menambahkan produk ke keranjang
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Inisialisasi keranjang jika belum ada
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Tambahkan produk ke keranjang
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity; // Jika sudah ada, tambahkan jumlah
    } else {
        $_SESSION['cart'][$productId] = $quantity; // Jika belum ada, set jumlah
    }

    // Redirect ke cart.php setelah menambahkan produk
    header("Location: cart.php");
    exit();
}
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
        echo "<p>Harga: Rp " . number_format($row['price'], 2, ',', '.') . "</p>";
        echo "<img src='assets/images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
        echo "<form action='' method='POST'>";
        echo "<input type='hidden' name='product_id' value='" . htmlspecialchars($row['id']) . "'>";
        echo "<input type='number' name='quantity' value='1' min='1' required>";
        echo "<button type='submit' name='add_to_cart' class='add-to-cart'>Tambah ke Keranjang</button>";
        echo "</form>";
        echo "<a href='product.php?id=" . htmlspecialchars($row['id']) . "' class='button'>Lihat Detail</a>";
        echo "</div>";
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>