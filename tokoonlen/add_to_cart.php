<?php
session_start();
$connection = new mysqli("localhost", "root", "", "tokoonline");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}

// Cek apakah produk_id dan quantity ada di POST
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    // Cek apakah keranjang sudah ada di session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Tambahkan atau perbarui item di keranjang
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity; // Update quantity
    } else {
        $_SESSION['cart'][$product_id] = $quantity; // Add new item
    }

    // Redirect ke halaman keranjang atau halaman produk
    header("Location: cart.php"); // Atau bisa ke halaman produk
    exit();
} else {
    // Jika tidak ada produk_id atau quantity, redirect ke halaman produk
    header("Location: index.php");
    exit();
}