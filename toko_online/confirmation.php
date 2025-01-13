<?php 
session_start(); 
include 'config/database.php'; 

// Cek apakah ada order_id di URL
if (!isset($_GET['order_id'])) {
    echo "ID pesanan tidak ditemukan.";
    exit();
}

$orderId = $_GET['order_id'];

// Ambil informasi pesanan
$stmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
$stmt->bind_param("i", $orderId);
$stmt->execute();
$orderResult = $stmt->get_result();

if ($orderResult->num_rows === 0) {
    echo "Pesanan tidak ditemukan.";
    exit();
}

$order = $orderResult->fetch_assoc();

// Ambil detail pesanan
$stmt = $conn->prepare("SELECT od.*, p.name, p.image FROM order_details od JOIN products p ON od.product_id = p.id WHERE od.order_id = ?");
$stmt->bind_param("i", $orderId);
$stmt->execute();
$orderDetailsResult = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Konfirmasi Pesanan - Toko Online</title>
</head>
<body>

<div class="container">
    <h1>Konfirmasi Pesanan</h1>

    <h2>Terima kasih, <?php echo htmlspecialchars($order['customer_name']); ?>!</h2>
    <p>Pesanan Anda telah berhasil diproses. Berikut adalah detail pesanan Anda:</p>

    <div class="order-summary">
        <p><strong>Nomor Pesanan:</strong> <?php echo htmlspecialchars($orderId); ?></p>
        <p><strong>Alamat Pengiriman:</strong> <?php echo nl2br(htmlspecialchars($order['address'])); ?></p>
        <p><strong>Nomor Telepon:</strong> <?php echo htmlspecialchars($order['phone']); ?></p>
    </div>

    <h3>Produk yang Dipesan</h3>
    <div class="order-items">
        <?php while ($item = $orderDetailsResult->fetch_assoc()): ?>
            <div class="order-item">
                <img src="assets/images/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                <div class="order-item-details">
                    <h4><?php echo htmlspecialchars($item['name']); ?></h4>
                    <p>Jumlah: <?php echo htmlspecialchars($item['quantity']); ?></p>
                    <p>Harga: Rp <?php echo number_format($item['price'],  2, ',', '.'); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <h3>Total Pembayaran: Rp <?php echo number_format($order['total'], 2, ',', '.'); ?></h3>
    <a href="index.php" class="button">Kembali ke Beranda</a>
</div>

</body>
</html>