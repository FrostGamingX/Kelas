<?php 
session_start(); 
include 'config/database.php'; 
include 'includes/header.php'; 

// Cek jika ada permintaan untuk menghapus produk dari keranjang
if (isset($_GET['remove'])) {
    $productId = $_GET['remove'];
    // Hapus produk dari keranjang
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
    // Redirect kembali ke cart.php
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Keranjang Belanja - Toko Online</title>
</head>
<body>

<div class="cart">
    <h1>Keranjang Belanja</h1>
    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                foreach ($_SESSION['cart'] as $productId => $quantity): 
                    $stmt = $conn->prepare("SELECT name, price FROM products WHERE id = ?");
                    $stmt->bind_param("i", $productId);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $product = $result->fetch_assoc();
                    $subtotal = $product['price'] * $quantity;
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo htmlspecialchars($quantity); ?></td>
                    <td>Rp <?php echo number_format($product['price'], 2, ',', '.'); ?></td>
                    <td>Rp <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                    <td>
                        <a href="cart.php?remove=<?php echo $productId; ?>" class="remove-item">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Total: Rp <?php echo number_format($total, 2, ',', '.'); ?></h2>
        <a href="checkout.php" class="button">Lanjutkan ke Checkout</a>
    <?php else: ?>
        <p>Keranjang Anda kosong.</p>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>