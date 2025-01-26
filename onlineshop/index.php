<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-img {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }
        .carousel-item img {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: contain;
        }

        .static-banner {
            width: 250px;
            background-color: white;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            flex-direction: column;
            align-items: center;
        }
        .dynamic-banner, .static-banner {
                margin-bottom: 20px;
                width: 100%;
            }

            .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            align-items: center;
        }
        .static-banner img {
            width: 20%;  /* Mengatur gambar agar lebih kecil */
            height: auto;  /* Mempertahankan aspek rasio gambar */
            margin-bottom: 15px;  /* Memberikan jarak di bawah gambar */
        }

    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="menu">
                <a href="index.php" class="text-white me-3 text-decoration-none">Home</a>
                <a href="shop.php" class="text-white me-3 text-decoration-none">Shop</a>
                <a href="contact.php" class="text-white text-decoration-none">Contact</a>
            </div>
            <div class="search flex-grow-1 mx-3">
                <input type="text" class="form-control" placeholder="Cari produk...">
            </div>
            <div class="auth">
            <a href="register.php" class="text-white me-3 text-decoration-none">Register</a>
                <a href="login.php" class="text-white me-3 text-decoration-none">Login</a>
                <a href="cart.php" class="text-white text-decoration-none">Cart</a>
            </div>
        </div>
    </header>

    <!-- Banner -->
    <section class="banner py-4">
        <div class="container">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/idps.png" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="images/Phising-03.png" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="images/pngegg (1).png" class="d-block w-100" alt="Slide 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="static-banner">
                <img src="images/mandiri.png" alt="">
        </div>
        </div>
    </section>

    <!-- Produk -->
    <section class="products py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center">
                        <img src="images/64e2f0ef72f22.png" alt="Produk 1" class="card-img-top product-img">
                        <div class="card-body">
                            <h5 class="card-title">Produk 1</h5>
                            <p class="card-text">Rp100.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <img src="images/pngegg.png" alt="Produk 2" class="card-img-top product-img">
                        <div class="card-body">
                            <h5 class="card-title">Produk 2</h5>
                            <p class="card-text">Rp200.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <img src="images/Kuda-Linimassa-860x485.jpg" alt="Produk 3" class="card-img-top product-img">
                        <div class="card-body">
                            <h5 class="card-title">Produk 3</h5>
                            <p class="card-text">Rp300.000</p>
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
