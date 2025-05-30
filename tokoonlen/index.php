<?php
session_start();
include('db_connection.php');

// Periksa apakah kategori dipilih
$category = isset($_GET['category']) ? htmlspecialchars($_GET['category']) : null;

if ($category) {
    // Ambil data produk berdasarkan kategori
    $query = "SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE c.name = :category";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['category' => $category]);
    $products = $stmt->fetchAll();
} else {
    // Jika tidak ada kategori, ambil semua produk
    $query = "SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll();
}

// Ambil semua kategori untuk ditampilkan sebagai filter
$categoryQuery = "SELECT name FROM categories";
$categoryStmt = $pdo->prepare($categoryQuery);
$categoryStmt->execute();
$categories = $categoryStmt->fetchAll();

// Mengambil data pengguna jika sudah login
$user = null;
if (isset($_SESSION['user_id'])) {
    $query = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Home - Toko Online</title>
</head>
<body>
    <header>
        <div class="logo">Toko Online</div>
        <nav>
        <a href="cart.php">Go to Cart</a> <!-- Link to cart.php -->
            <a href="index.php">Home</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Logout</a>
                <?php if ($user && $user['is_admin'] == 1): ?>
                    <a href="admin.php">Admin Panel</a>
                <?php endif; ?>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
        </nav>
    </header>

    <div class="container">
        <div class="category-filter">
            <h3>Filter Kategori</h3>
            <ul>
                <li><a href="index.php">Semua</a></li>
                <?php foreach ($categories as $cat): ?>
                    <li><a href="index.php?category=<?php echo urlencode($cat['name']); ?>"><?php echo htmlspecialchars($cat['name']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="product-list">
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
                        <h3 class="product-name"> <?php echo htmlspecialchars(mb_strimwidth($product['name'], 0, 30, '...')); ?> </h3>
                        <p class="product-price">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
                        <a href="product.php?id=<?php echo $product['id']; ?>" class="view-details">View Details</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada produk dalam kategori ini.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2023 Toko Online. All rights reserved.</p>
    </footer>

    <style>
        .category-filter {
            margin-bottom: 20px;
        }

        .category-filter ul {
            list-style-type: none;
            padding: 0;
        }

        .category-filter ul li {
            margin-bottom: 10px;
        }

        .category-filter ul li a {
            text-decoration: none;
            color: #333;
        }

        .category-filter ul li a:hover {
            text-decoration: underline;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            width: calc(33.333% - 20px);
            box-sizing: border-box;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product-card h3 {
            font-size: 1.2em;
            margin: 10px 0;
        }

        .product-card p {
            color: #555;
            margin: 5px 0;
        }

        @media (max-width: 768px) {
            .product-card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .product-card {
                width: 100%;
            }
        }
    </style>
</body>
</html>
