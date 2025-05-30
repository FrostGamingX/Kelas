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

// Menambahkan kategori baru
if (isset($_POST['add_category'])) {
    $category_name = htmlspecialchars($_POST['category_name']);
    if (!empty($category_name)) {
        $query = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['name' => $category_name]);
        $success_message = "Kategori berhasil ditambahkan.";
    } else {
        $error_message = "Nama kategori tidak boleh kosong.";
    }
}

// Menambahkan produk baru
if (isset($_POST['add_product'])) {
    $product_name = htmlspecialchars($_POST['product_name']);
    $product_price = floatval($_POST['product_price']);
    $product_image = htmlspecialchars($_POST['product_image']);
    $product_description = htmlspecialchars($_POST['product_description']);
    $category_id = intval($_POST['category_id']);

    if (!empty($product_name) && $product_price > 0 && !empty($product_image) && $category_id > 0) {
        $query = "INSERT INTO products (name, price, image, description, category_id) VALUES (:name, :price, :image, :description, :category_id)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'name' => $product_name,
            'price' => $product_price,
            'image' => $product_image,
            'description' => $product_description,
            'category_id' => $category_id
        ]);
        $success_message = "Produk berhasil ditambahkan.";
    } else {
        $error_message = "Semua field produk harus diisi dengan benar.";
    }
}

// Mendapatkan daftar kategori untuk dropdown
$query = "SELECT * FROM categories";
$stmt = $pdo->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll();

// Mendapatkan daftar produk
$query = "SELECT p.*, c.name AS category_name FROM products p JOIN categories c ON p.category_id = c.id";
$stmt = $pdo->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll();

// Menghapus produk
if (isset($_POST['delete_product'])) {
    $product_id = intval($_POST['product_id']);
    $query = "DELETE FROM products WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $product_id]);
    $success_message = "Produk berhasil dihapus.";
}

// Mengedit produk
if (isset($_POST['edit_product'])) {
    $product_id = intval($_POST['product_id']);
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
        $error_message = "Semua field produk harus diisi dengan benar.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Panel</title>
</head>
<body>
    <header>
        <div class="logo">Admin Panel</div>
        <nav>
            <a href="index.php">Home</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="container">
        <h1>Admin Panel</h1>

        <?php if (isset($success_message)): ?>
            <div class="success-message"> <?php echo $success_message; ?> </div>
        <?php endif; ?>

        <?php if (isset($error_message)): ?>
            <div class="error-message"> <?php echo $error_message; ?> </div>
        <?php endif; ?>

        <div class="form-section">
            <h2>Tambah Kategori</h2>
            <form action="admin.php" method="POST">
                <label for="category_name">Nama Kategori:</label>
                <input type="text" id="category_name" name="category_name" required>
                <button type="submit" name="add_category">Tambah Kategori</button>
            </form>
        </div>

        <div class="form-section">
            <h2>Tambah Produk</h2>
            <form action="admin.php" method="POST">
                <label for="product_name">Nama Produk:</label>
                <input type="text" id="product_name" name="product_name" required>
<br>
                <label for="product_price">Harga Produk:</label>
                <input type="number" id="product_price" name="product_price" step="0.01" required>
<br>
                <label for="product_image">URL Gambar Produk:</label>
                <input type="text" id="product_image" name="product_image" required>
<br>
                <label for="product_description">Deskripsi Produk:</label>
                <textarea id="product_description" name="product_description" rows="4" required></textarea>
<br>
                <label for="category_id">Kategori:</label>
                <select id="category_id" name="category_id" required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>">
                            <?php echo htmlspecialchars($category['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" name="add_product">Tambah Produk</button>
            </form>
        </div>

        <div class="form-section">
            <h2>Daftar Produk</h2>
            <table border="1" cellpadding="8" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td>Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></td>
                            <td><img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width: 100px;"></td>
                            <td><?php echo htmlspecialchars($product['description']); ?></td>
                            <td><?php echo htmlspecialchars($product['category_name']); ?></td>
                            <td>
                                <form action="admin.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <button type="submit" name="delete_product">Hapus</button>
                                </form>
                                <form action="edit_product.php" method="GET" style="display: inline;">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <button type="submit">Edit</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; 2023 Toko Online. All rights reserved.</p>
    </footer>
</body>
</html>
