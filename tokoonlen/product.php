<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHq6k4c7kHKoO6tTV6Ut/Ne6jkD9rLsAgKZFXLbsjQHBtG6LZGvR8X2F3y1uNXY7v0XzVq7w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo htmlspecialchars($product['name']); ?> - Detail Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .logo {
            font-size: 1.5em;
            font-weight: bold;
        }

        nav a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-size: 1em;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .product-detail {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
        }

        .product-image img {
            max-width: 100%;
            border-radius: 8px;
            object-fit: cover;
            max-height: 400px;
        }

        .product-info {
            flex: 1;
        }

        .product-info h1 {
            margin-bottom: 15px;
            font-size: 2em;
            color: #343a40;
        }

        .product-info .product-price {
            font-size: 1.8em;
            color: #dc3545;
            margin-bottom: 20px;
        }

        .product-info form {
            margin-top: 15px;
        }

        .product-info label {
            font-weight: bold;
        }

        .product-info input[type="number"] {
            width: 60px;
            padding: 5px;
            margin: 10px 0;
            font-size: 1em;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .add-to-cart {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart:hover {
            background-color: #218838;
        }

        .success-message {
            color: #28a745;
            margin-top: 15px;
            font-weight: bold;
        }

        .product-description {
            margin-top: 30px;
        }

        .product-description h2 {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: #343a40;
        }

        .product-description p {
            line-height: 1.6;
            color: #495057;
        }

        footer {
            margin-top: 20px;
            padding: 15px;
            background-color: #343a40;
            color: white;
            text-align: center;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Toko Online</div>
        <nav>
            <a href="cart.php"><i class="fas fa-shopping-cart"></i> Keranjang</a>
            <a href="index.php"><i class="fas fa-home"></i> Beranda</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <?php else: ?>
                <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                <a href="register.php"><i class="fas fa-user-plus"></i> Daftar</a>
            <?php endif; ?>
        </nav>
    </header>

    <div class="container">
        <div class="product-detail">
            <div class="product-image">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            </div>
            <div class="product-info">
                <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                <p class="product-price">Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></p>
                <form method="post" action="">
                    <label for="quantity">Jumlah:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" required>
                    <button type="submit" name="add_to_cart" class="add-to-cart">Tambahkan ke Keranjang</button>
                </form>
                <?php if (isset($_GET['added'])): ?>
                    <p class="success-message">Produk berhasil ditambahkan ke keranjang!</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="product-description">
            <h2>Deskripsi Produk</h2>
            <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
        </div>
    </div>

    <footer>
        <p>&copy; 2023 Toko Online. All rights reserved.</p>
    </footer>
</body>
</html>
