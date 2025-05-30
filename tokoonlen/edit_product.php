<?php
session_start();
include('db_connection.php');

// Periksa apakah pengguna adalah admin
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$query = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => $_SESSION['user_id']]);
$user = $stmt->fetch();

if (!$user || $user['is_admin'] != 1) {
    header('Location: index.php');
    exit;
}

// Periksa apakah ID produk disediakan
if (!isset($_GET['product_id'])) {
    header('Location: admin.php');
    exit;
}

$product_id = intval($_GET['product_id']);

// Ambil data produk berdasarkan ID
$query = "SELECT * FROM products WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => $product_id]);
$product = $stmt->fetch();

if (!$product) {
    header('Location: admin.php');
    exit;
}

// Mendapatkan daftar kategori
$query = "SELECT * FROM categories";
$stmt = $pdo->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll();

// Perbarui data produk
if (isset($_POST['update_product'])) {
    $product_name = htmlspecialchars($_POST['product_name']);
    $product_price = floatval($_POST['product_price']);
    $product_image = htmlspecialchars($_POST['product_image']);
    $product_description = htmlspecialchars($_POST['product_description']);
    $category_id = intval($_POST['category_id']);

    if (!empty($product_name) && $product_price > 0 && !empty($product_image) && $category_id > 0) {
        $query = "UPDATE products SET name = :name, price = :price, image = :image, description = :description, category_id = :category_id WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'name' => $product_name,
            'price' => $product_price,
            'image' => $product_image,
            'description' => $product_description,
            'category_id' => $category_id,
            'id' => $product_id
        ]);
        $success_message = "Produk berhasil diperbarui.";
    } else {
        $error_message = "Semua field harus diisi dengan benar.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Produk</title>
</head>
<body>
    <header>
        <div class="logo">Admin Panel</div>
        <nav>
            <a href="admin.php">Kembali ke Admin Panel</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="container">
        <h1>Edit Produk</h1>

        <?php if (isset($success_message)): ?>
            <div class="success-message"> <?php echo $success_message; ?> </div>
        <?php endif; ?>

        <?php if (isset($error_message)): ?>
            <div class="error-message"> <?php echo $error_message; ?> </div>
        <?php endif; ?>

        <form action="edit_product.php?product_id=<?php echo $product_id; ?>" method="POST">
            <label for="product_name">Nama Produk:</label>
            <input type="text" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>" required>

            <label for="product_price">Harga Produk:</label>
            <input type="number" id="product_price" name="product_price" step="0.01" value="<?php echo htmlspecialchars($product['price']); ?>" required>

            <label for="product_image">URL Gambar Produk:</label>
            <input type="text" id="product_image" name="product_image" value="<?php echo htmlspecialchars($product['image']); ?>" required>

            <label for="product_description">Deskripsi Produk:</label>
            <textarea id="product_description" name="product_description" rows="4" required><?php echo htmlspecialchars($product['description']); ?></textarea>

            <label for="category_id">Kategori:</label>
            <select id="category_id" name="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>" <?php echo $product['category_id'] == $category['id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" name="update_product">Perbarui Produk</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2023 Toko Online. All rights reserved.</p>
    </footer>
</body>
</html>
