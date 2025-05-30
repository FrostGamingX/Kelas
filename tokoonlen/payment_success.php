<?php
session_start();
include('db_connection.php');

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Periksa apakah ada ID pesanan yang dikirim melalui URL
if (!isset($_GET['order_id']) || !is_numeric($_GET['order_id'])) {
    header("Location: index.php");
    exit;
}

$userId = $_SESSION['user_id'];
$orderId = intval($_GET['order_id']);

// Ambil detail pesanan dari database
$query = "SELECT * FROM orders WHERE id = :order_id AND user_id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['order_id' => $orderId, 'user_id' => $userId]);
$order = $stmt->fetch();

if (!$order) {
    header("Location: index.php"); // Jika pesanan tidak ditemukan
    exit;
}

// Ambil detail produk dalam pesanan
$orderItemsQuery = "SELECT oi.*, p.name, p.image 
                    FROM order_items oi 
                    JOIN products p ON oi.product_id = p.id 
                    WHERE oi.order_id = :order_id";
$stmt = $pdo->prepare($orderItemsQuery);
$stmt->execute(['order_id' => $orderId]);
$orderItems = $stmt->fetchAll();

// Pastikan keranjang kosong setelah pembayaran
$deleteCartQuery = "DELETE FROM cart WHERE user_id = :user_id";
$stmt = $pdo->prepare($deleteCartQuery);
$stmt->execute(['user_id' => $userId]);

// Hapus data alamat pengiriman dari sesi
unset($_SESSION['shipping_address']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Sukses - Toko Online</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo">Toko Online</div>
        <nav>
            <a href="index.php">Home</a>
            <a href="orders.php">Pesanan Saya</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </nav>
    </header>

    <div class="container">
        <h1>Pembayaran Berhasil!</h1>
        <p>Terima kasih atas pesanan Anda. Berikut adalah detail pesanan Anda:</p>

        <h2>Detail Pesanan</h2>
        <p><strong>ID Pesanan:</strong> <?php echo htmlspecialchars($order['id']); ?></p>
        <p><strong>Total Pembayaran:</strong> Rp <?php echo number_format($order['total_price'], 0, ',', '.'); ?></p>
        <p><strong>Alamat Pengiriman:</strong></p>
        <p>
            <?php echo htmlspecialchars($order['address']); ?><br>
            <?php echo htmlspecialchars($order['city']); ?><br>
            <?php echo htmlspecialchars($order['postal_code']); ?>
        </p>

        <h2>Produk Pesanan</h2>
        <table>
            <tr>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            <?php foreach ($orderItems as $item): ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" style="width: 100px; height: auto;"></td>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                    <td>Rp <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="index.php" class="button">Kembali ke Beranda</a>
    </div>

    <footer>
        <p>&copy; 2023 Toko Online. All rights reserved.</p>
    </footer>

    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .container h1, .container h2 {
            margin-bottom: 20px;
        }

        .container p {
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</body>
</html>
