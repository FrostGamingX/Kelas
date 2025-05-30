<?php 
include 'config/database.php'; 
session_start();
include 'includes/header.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}

// Cek jika ada permintaan untuk menambahkan ke keranjang
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?php echo htmlspecialchars($product['name']); ?> - Toko Online</title>
</head>
<body>

<div class="product-detail">
    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
    <div class="product-info">
        <img src="assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
        <div class="product-description">
            <p><strong>Deskripsi:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
            <p><strong>Harga:</strong> Rp <?php echo number_format($product['price'], 2, ',', '.'); ?></p>
            <form action="" method="POST">
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
                <label for="quantity">Jumlah:</label>
                <input type="number" name="quantity" value="1" min="1" required>
                <button type="submit" name="add_to_cart" class="add-to-cart">Tambah ke Keranjang</button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>