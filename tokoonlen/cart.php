<?php
session_start();
include('db_connection.php');

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Ambil ID pengguna dari sesi
$userId = $_SESSION['user_id'];

// Menambahkan produk ke keranjang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productId = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    // Periksa apakah produk sudah ada di keranjang
    $checkQuery = "SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id";
    $stmt = $pdo->prepare($checkQuery);
    $stmt->execute(['user_id' => $userId, 'product_id' => $productId]);
    $existingCartItem = $stmt->fetch();

    if ($existingCartItem) {
        // Jika produk sudah ada, tambahkan quantity
        $updateQuery = "UPDATE cart SET quantity = quantity + :quantity WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $pdo->prepare($updateQuery);
        $stmt->execute(['quantity' => $quantity, 'user_id' => $userId, 'product_id' => $productId]);
    } else {
        // Jika produk belum ada, masukkan produk
        $insertQuery = "INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
        $stmt = $pdo->prepare($insertQuery);
        $stmt->execute(['user_id' => $userId, 'product_id' => $productId, 'quantity' => $quantity]);
    }

    header("Location: cart.php?added=true");
    exit;
}

// Mengambil data keranjang
$query = "SELECT c.*, p.name, p.price, p.image FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id = :user_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['user_id' => $userId]);
$cartItems = $stmt->fetchAll();

// Menghitung total keranjang
$total = 0;
foreach ($cartItems as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo">Toko Online</div>
        <nav>
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
        <h1>Keranjang Belanja</h1>

        <?php if (isset($_GET['added'])): ?>
            <p class="success-message">Produk berhasil ditambahkan ke keranjang!</p>
        <?php endif; ?>

        <div class="cart-items">
            <?php if (count($cartItems) > 0): ?>
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
            <?php else: ?>
                <p>Keranjang Anda kosong.</p>
            <?php endif; ?>
        </div>

        <?php if (count($cartItems) > 0): ?>
            <!-- Form Checkout -->
            <form method="post" action="checkout.php">
                <button type="submit" class="checkout-button">Checkout</button>
            </form>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2023 Toko Online. All rights reserved.</p>
    </footer>

    <style>
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
    </style>
</body>
</html>
