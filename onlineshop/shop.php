<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-img {
            width: 100%;
            height: auto;
            max-height: 200px;
        }
    </style>
</head>
<body>
    <!-- Shop Header -->
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="menu">
                <a href="index.php" class="text-white me-3 text-decoration-none">Home</a>
                <a href="#" class="text-white me-3 text-decoration-none">Shop</a>
                <a href="cart.php" class="text-white text-decoration-none">Contact</a>
            </div>
            <div class="search">
                <input type="text" class="form-control" placeholder="Cari produk...">
            </div>
        </div>
    </header>

    <!-- Shop Products -->
    <section class="shop py-4">
        <div class="container">
            <h2 class="text-center mb-4">Shop Our Products</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center">
                        <img src="images/64e2f0ef72f22.png" alt="Produk 1" class="card-img-top product-img">
                        <div class="card-body">
                            <h5 class="card-title">Produk 1</h5>
                            <p class="card-text">Rp100.000</p>
                            <a href="#" class="btn btn-primary">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <img src="images/pngegg.png" alt="Produk 2" class="card-img-top product-img">
                        <div class="card-body">
                            <h5 class="card-title">Produk 2</h5>
                            <p class="card-text">Rp200.000</p>
                            <a href="#" class="btn btn-primary">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <img src="images/Kuda-Linimassa-860x485.jpg" alt="Produk 3" class="card-img-top product-img">
                        <div class="card-body">
                            <h5 class="card-title">Produk 3</h5>
                            <p class="card-text">Rp300.000</p>
                            <a href="#" class="btn btn-primary">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <div class="menu mb-3">
                <a href="index.php" class="text-white me-3 text-decoration-none">Home</a>
                <a href="shop.php" class="text-white me-3 text-decoration-none">Shop</a>
                <a href="contact.php" class="text-white text-decoration-none">Contact</a>
            </div>
            <div class="payment mb-3">Metode Pembayaran: Visa, MasterCard, PayPal</div>
            <div class="social mb-3">Ikuti kami di: <a href="#" class="text-white text-decoration-none">Facebook</a> | <a href="#" class="text-white text-decoration-none">Instagram</a> | <a href="#" class="text-white text-decoration-none">Twitter</a></div>
            <div class="contact">Hubungi kami: email@contoh.com | +62 812-3456-7890</div>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
