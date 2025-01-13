<?php
session_start();
include '../config/database.php';

/**
 * Fungsi untuk menampilkan semua produk
 */
function getAllProducts($conn) {
    $result = $conn->query("SELECT * FROM products");
    return $result->fetch_all(MYSQLI_ASSOC);
}

/**
 * Fungsi untuk mendapatkan detail produk berdasarkan ID
 */
function getProductById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

/**
 * Fungsi untuk menambahkan produk ke keranjang
 */
function addToCart($productId) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]++;
    } else {
        $_SESSION['cart'][$productId] = 1;
    }
}

/**
 * Fungsi untuk mendapatkan semua item di keranjang
 */
function getCartItems($conn) {
    $cartItems = [];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $quantity) {
            $product = getProductById($conn, $id);
            if ($product) {
                $product['quantity'] = $quantity;
                $cartItems[] = $product;
            }
        }
    }
    return $cartItems;
}

/**
 * Fungsi untuk menghitung total harga keranjang
 */
function calculateCartTotal($cartItems) {
    $total = 0;
    foreach ($cartItems as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

/**
 * Fungsi untuk menghapus item dari keranjang
 */
function removeFromCart($productId) {
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}

/**
 * Fungsi untuk mengosongkan keranjang
 */
function clearCart() {
    unset($_SESSION['cart']);
}

/**
 * Fungsi untuk memeriksa apakah pengguna sudah login
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

/**
 * Fungsi untuk mendapatkan username pengguna
 */
function getUsername() {
    return isset($_SESSION['username']) ? $_SESSION['username'] : '';
}
?>