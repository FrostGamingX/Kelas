<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }
        main {
            padding: 20px;
        }
        .cart-container {
            max-width: 900px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #333;
            color: white;
        }
        .total-section {
            text-align: right;
            margin-top: 20px;
        }
        .total-section p {
            font-size: 18px;
            font-weight: bold;
        }
        .checkout-button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
        }
        .checkout-button:hover {
            background-color: #555;
        }
        .empty-cart-message {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Your Cart</h1>
        <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="menu">
                <a href="index.php" class="text-white me-3 text-decoration-none">Home</a>
                <a href="shop.php" class="text-white me-3 text-decoration-none">Shop</a>
                <a href="contact.php" class="text-white text-decoration-none">Contact</a>
            </div>
            <div class="auth">
            <a href="register.php" class="text-white me-3 text-decoration-none">Register</a>
                <a href="login.php" class="text-white me-3 text-decoration-none">Login</a>
                <a href="cart.php" class="text-white text-decoration-none">Cart</a>
            </div>
        </div>
    </header>
    </header>

    <main>
        <section class="cart-container">
            <!-- Jika ada barang dalam keranjang, tampilkan tabel berikut -->
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Product 1</td>
                        <td>2</td>
                        <td>Rp 50,000</td>
                        <td>Rp 100,000</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>Product 2</td>
                        <td>1</td>
                        <td>Rp 150,000</td>
                        <td>Rp 150,000</td>
                        <td><button>Remove</button></td>
                    </tr>
                </tbody>
            </table>

            <!-- Total belanja -->
            <div class="total-section">
                <p>Total: Rp 250,000</p>
                <a href="checkout.html" class="checkout-button">Proceed to Checkout</a>
            </div>
        </section>
    </main>
</body>
</html>
