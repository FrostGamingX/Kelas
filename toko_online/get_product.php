<?php 
include 'config/database.php'; 

// Cek apakah ada ID produk yang diberikan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Siapkan pernyataan untuk mengambil data produk
    $stmt = $conn->prepare("SELECT id, name, price, image, description FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah produk ditemukan
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        // Mengembalikan data produk dalam format JSON
        echo json_encode($product);
    } else {
        // Jika produk tidak ditemukan, kembalikan pesan kesalahan
        echo json_encode(['error' => 'Produk tidak ditemukan']);
    }
} else {
    // Jika tidak ada ID produk yang diberikan, kembalikan pesan kesalahan
    echo json_encode(['error' => 'ID produk tidak diberikan']);
}
?>