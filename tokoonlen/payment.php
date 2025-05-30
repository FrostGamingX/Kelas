<?php
session_start();
include('db_connection.php');

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Periksa apakah ada data alamat pengiriman di sesi
if (!isset($_SESSION['shipping_address'])) {
    header("Location: checkout.php");
    exit;
}

$userId = $_SESSION['user_id'];
$shippingAddress = $_SESSION['shipping_address'];

// Total pembayaran dari sesi
$total = 0;
$query = "SELECT c.*, p.price FROM cart c
          JOIN products p ON c.product_id = p.id
          WHERE c.user_id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['user_id' => $userId]);
$cartItems = $stmt->fetchAll();

foreach ($cartItems as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Proses pembayaran jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_method'])) {
    $paymentMethod = $_POST['payment_method'];

    // Simpan detail pesanan ke database
    $insertOrderQuery = "INSERT INTO orders (user_id, total_price, address, city, postal_code, payment_method) 
                         VALUES (:user_id, :total_price, :address, :city, :postal_code, :payment_method)";
    $stmt = $pdo->prepare($insertOrderQuery);
    $stmt->execute([
        'user_id' => $userId,
        'total_price' => $total,
        'address' => $shippingAddress['address'],
        'city' => $shippingAddress['city'],
        'postal_code' => $shippingAddress['postal_code'],
        'payment_method' => $paymentMethod
    ]);

    // Dapatkan ID pesanan yang baru saja dibuat
    $orderId = $pdo->lastInsertId();

    // Simpan detail produk pesanan
    foreach ($cartItems as $item) {
        $insertOrderItemQuery = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                                 VALUES (:order_id, :product_id, :quantity, :price)";
        $stmt = $pdo->prepare($insertOrderItemQuery);
        $stmt->execute([
            'order_id' => $orderId,
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'price' => $item['price']
        ]);
    }

    // Hapus data keranjang pengguna
    $deleteCartQuery = "DELETE FROM cart WHERE user_id = :user_id";
    $stmt = $pdo->prepare($deleteCartQuery);
    $stmt->execute(['user_id' => $userId]);

    // Redirect ke halaman sukses
    header("Location: payment_success.php?order_id=$orderId");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Toko Online</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo">Toko Online</div>
        <nav>
            <a href="cart.php">Go to Cart</a>
            <a href="index.php">Home</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </nav>
    </header>

    <div class="container">
        <h1>Pilih Metode Pembayaran</h1>
        <p><strong>Alamat Pengiriman:</strong></p>
        <p>
            <?php echo htmlspecialchars($shippingAddress['address']); ?><br>
            <?php echo htmlspecialchars($shippingAddress['city']); ?><br>
            <?php echo htmlspecialchars($shippingAddress['postal_code']); ?>
        </p>
        <p><strong>Total Pembayaran:</strong> Rp <?php echo number_format($total, 0, ',', '.'); ?></p>

        <form method="post" action="payment.php">
            <label for="payment_method">Pilih Metode Pembayaran:</label>
            <select name="payment_method" id="payment_method" required>
                <option value="credit_card">Kartu Kredit</option>
                <option value="bank_transfer">Transfer Bank</option>
                <option value="cash_on_delivery">Bayar di Tempat</option>
            </select>
            <button type="submit" class="pay-button">Bayar Sekarang</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2023 Toko Online. All rights reserved.</p>
    </footer>

    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .container h1 {
            margin-bottom: 20px;
        }

        .container p {
            margin-bottom: 15px;
        }

        .container label {
            display: block;
            margin-bottom: 5px;
        }

        .container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .pay-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .pay-button:hover {
            background-color: #0056b3;
        }
    </style>
</body>
</html>
