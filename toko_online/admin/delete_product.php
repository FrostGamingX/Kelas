<?php
include '../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Siapkan pernyataan untuk menghapus produk dari database
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        // Jika berhasil, alihkan ke halaman admin
        header("Location: ../admin.php");
        exit();
    } else {
        echo "Gagal menghapus produk: " . $stmt->error;
    }
} else {
    echo "ID produk tidak ditemukan.";
}
?>