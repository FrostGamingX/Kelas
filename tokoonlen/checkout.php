<?php
session_start();
include('db_connection.php');

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Pengguna harus login untuk checkout
    exit;
}

$userId = $_SESSION['user_id'];

// Ambil produk dari keranjang berdasarkan user_id
$query = "SELECT c.*, p.name, p.price, p.image FROM cart c
          JOIN products p ON c.product_id = p.id
          WHERE c.user_id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['user_id' => $userId]);
$cartItems = $stmt->fetchAll();

// Total harga
$total = 0;
foreach ($cartItems as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Proses checkout jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    // Validasi alamat pengiriman
    if (empty($_POST['address']) || empty($_POST['city']) || empty($_POST['postal_code'])) {
        $error_message = "Harap isi alamat pengiriman dengan lengkap.";
    } else {
        // Simpan alamat pengiriman ke sesi
        $_SESSION['shipping_address'] = [
            'address' => $_POST['address'],
            'city' => $_POST['city'],
            'postal_code' => $_POST['postal_code']
        ];

        // Alihkan ke halaman pembayaran
        header("Location: payment.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Toko Online</title>
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
        <h1>Checkout</h1>

        <?php if (isset($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <div class="cart-items">
            <h2>Rincian Pesanan</h2>
            <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" style="width: 100px; height: auto;"></td>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td>Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td>Rp <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <div class="cart-summary">
                <p><strong>Total: Rp <?php echo number_format($total, 0, ',', '.'); ?></strong></p>
            </div>
        </div>

        <div class="shipping-address">
            <h2>Alamat Pengiriman</h2>
            <form method="post" action="">
                <label for="address">Alamat:</label>
                <input type="text" name="address" id="address" value="<?php echo isset($_SESSION['shipping_address']['address']) ? $_SESSION['shipping_address']['address'] : ''; ?>" required>

                <label for="city">Kota:</label>
                <input type="text" name="city" id="city" value="<?php echo isset($_SESSION['shipping_address']['city']) ? $_SESSION['shipping_address']['city'] : ''; ?>" required>

                <label for="postal_code">Kode Pos:</label>
                <input type="text" name="postal_code" id="postal_code" value="<?php echo isset($_SESSION['shipping_address']['postal_code']) ? $_SESSION['shipping_address']['postal_code'] : ''; ?>" required>

                <button type="submit" name="checkout" class="checkout-button">Lanjutkan ke Pembayaran</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2023 Toko Online. All rights reserved.</p>
    </footer>

    <style>
        .cart-items {
            margin-top: 20px;
        }

        .cart-items table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-items table th, .cart-items table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .cart-items table th {
            background-color: #f2f2f2;
        }

        .cart-summary {
            margin-top: 20px;
        }

        .shipping-address {
            margin-top: 30px;
        }

        .shipping-address label {
            display: block;
            margin-bottom: 5px;
        }

        .shipping-address input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .checkout-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkout-button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</body>
</html>
