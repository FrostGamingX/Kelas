<?php 
    session_start();
    require_once "dbcontroller.php";
    $db = new DB;

    $sql = "SELECT * FROM tblkategori ORDER BY kategori";
    $row = $db->getAll($sql);

    if (isset($_GET['log'])) {
       session_destroy();
       header("location:index.php");
    }

    function cart()
    {
        global $db;

        $cart = 0;

        foreach ($_SESSION as $key => $value) {
           if($key<>'pelanggan' && $key<> 'idpelanggan' && $key<> 'user' && $key<> 'level' && $key<> 'iduser') {
                $id = substr($key,1);

                $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";

                $row = $db->getAll($sql);

                foreach ($row as $r) {
                    $cart++;
                }
            }
        }    

        return $cart;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran FROSTXSHOP | Aplikasi Restoran FROSTXSHOP</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        
        .restaurant-name {
            font-weight: 700;
            color: #d35400;
            transition: all 0.3s;
        }
        
        .restaurant-name:hover {
            color: #e67e22;
            text-decoration: none;
        }
        
        .nav-link {
            color: #444;
            font-weight: 500;
            transition: all 0.3s;
            border-radius: 4px;
            padding: 8px 15px;
        }
        
        .nav-link:hover {
            background-color: #f5f5f5;
            color: #d35400;
        }
        
        .category-section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
            padding: 20px;
        }
        
        .category-title {
            color: #d35400;
            font-weight: 600;
            border-bottom: 2px solid #f5f5f5;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        
        .content-section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
            padding: 20px;
            min-height: 500px;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
        }
        
        .user-menu a {
            color: #555;
            margin-left: 15px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .user-menu a:hover {
            color: #d35400;
            text-decoration: none;
        }
        
        .cart-icon {
            position: relative;
        }
        
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #d35400;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }
        
        .footer {
            background-color: #fff;
            padding: 20px 0;
            margin-top: 50px;
            border-top: 1px solid #eee;
        }
        
        .btn-auth {
            background-color: #d35400;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            margin-left: 10px;
            transition: all 0.3s;
        }
        
        .btn-auth:hover {
            background-color: #e67e22;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand restaurant-name" href="index.php">
                <i class="fas fa-utensils mr-2"></i>RESTORAN FROSTXSHOP
            </a>
            
            <div class="ml-auto user-menu">
                <?php 
                if (isset($_SESSION['pelanggan'])) {
                    echo '
                        <span class="mr-3">Halo, '.$_SESSION['pelanggan'].'</span>
                        <a href="?f=home&m=history" class="mr-3"><i class="fas fa-history mr-1"></i> History</a>
                        <a href="?f=home&m=beli" class="mr-3 cart-icon">
                            <i class="fas fa-shopping-cart mr-1"></i> Cart
                            <span class="cart-count">'.cart().'</span>
                        </a>
                        <a href="?log=logout" class="btn-auth"><i class="fas fa-sign-out-alt mr-1"></i> Logout</a>
                    ';
                } else {
                    echo '
                        <a href="?f=home&m=login" class="btn-auth"><i class="fas fa-sign-in-alt mr-1"></i> Login</a>
                        <a href="?f=home&m=daftar" class="btn-auth"><i class="fas fa-user-plus mr-1"></i> Daftar</a>
                    ';
                }
                ?>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="category-section">
                    <h4 class="category-title"><i class="fas fa-list mr-3"></i>Kategori Menu</h4>
                    <?php if(!empty($row)) { ?>
                    <ul class="nav flex-column">
                        <?php foreach($row as $r): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?f=home&m=produk&id=<?php echo $r['idkategori']?>">
                                <i class="fas fa-angle-right mr-3"></i><?php echo $r['kategori'] ?>
                            </a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-9">
                <div class="content-section">
                    <?php 
                    if (isset($_GET['f']) && isset($_GET['m'])) {
                        $f = $_GET['f'];
                        $m = $_GET['m'];
                        $file = $f.'/'.$m.'.php';
                        require_once $file;
                    } else {
                        require_once "home/produk.php";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="restaurant-name">RESTORAN FROSTXSHOP</h5>
                    <p>Menyajikan makanan berkualitas dengan harga terjangkau untuk semua kalangan.</p>
                </div>
                <div class="col-md-3">
                    <h5>Kontak Kami</h5>
                    <p><i class="fas fa-map-marker-alt mr-2"></i> Jl. Pendidikan No. 123</p>
                    <p><i class="fas fa-phone mr-2"></i> (021) 1234-5678</p>
                    <p><i class="fas fa-envelope mr-2"></i> Frostxshop.com </p>
                </div>
                <div class="col-md-3">
                    <h5>Jam Operasional</h5>
                    <p>Senin - Jumat: 08:00 - 22:00</p>
                    <p>Sabtu - Minggu: 10:00 - 23:00</p>
                </div>
            </div>
            <hr>
            <p class="text-center mb-0">2024 - Copyright &copy; FrostXShop | Semua Hak Dilindungi</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>