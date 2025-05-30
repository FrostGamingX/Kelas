<?php 
session_start(); 
include 'config/database.php'; 
include 'includes/header.php'; 

// Cek apakah keranjang tidak kosong
if (empty($_SESSION['cart'])) {
    echo "<p>Keranjang Anda kosong. <a href='index.php'>Kembali ke Beranda</a></p>";
    exit();
}

// Ambil data produk dari keranjang
$cartItems = $_SESSION['cart'];
$total = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Checkout - Toko Online</title>
</head>
<body>

<div class="checkout">
    <h1>Checkout</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($cartItems as $productId => $quantity): 
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
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Total: Rp <?php echo number_format($total, 2, ',', '.'); ?></h2>
    <form action="process_checkout.php" method="POST">
        <input type="hidden" name="total" value="<?php echo $total; ?>">
        <button type="submit" class="button">Proses Pembayaran</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>