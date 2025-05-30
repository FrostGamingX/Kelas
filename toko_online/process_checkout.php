<?php
session_start();
include 'config/database.php';

// Cek apakah keranjang tidak kosong
if (empty($_SESSION['cart'])) {
    echo "Keranjang Anda kosong. Tidak ada yang dapat dibeli.";
    exit();
}

// Ambil data dari formulir
$name = $_POST['name'] ?? '';
$address = $_POST['address'] ?? '';
$phone = $_POST['phone'] ?? '';
$total = $_POST['total'] ?? 0;

// Simpan pesanan ke dalam database
$stmt = $conn->prepare("INSERT INTO orders (customer_name, address, phone, total) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $name, $address, $phone, $total);

if ($stmt->execute()) {
    $orderId = $stmt->insert_id; // Ambil ID pesanan yang baru saja dibuat

    // Simpan detail pesanan
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        $stmt = $conn->prepare("SELECT price FROM products WHERE id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        // Simpan detail produk ke dalam tabel order_details
        $stmt = $conn->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiid", $orderId, $productId, $quantity, $product['price']);
        $stmt->execute();
    }

    // Kosongkan keranjang setelah checkout
    unset($_SESSION['cart']);

    // Alihkan ke halaman konfirmasi
    header("Location: confirmation.php?order_id=" . $orderId);
    exit();
} else {
    echo "Gagal memproses pesanan: " . $stmt->error;
}
?>