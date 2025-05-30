<?php
session_start();

// Cek apakah keranjang ada di session
if (isset($_SESSION['cart']) && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Hapus item dari keranjang
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Redirect kembali ke halaman keranjang
header("Location: cart.php");
exit();