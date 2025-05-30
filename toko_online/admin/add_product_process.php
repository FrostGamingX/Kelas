<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "../assets/images/" . basename($image);

    // Cek apakah gambar berhasil diupload
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Siapkan pernyataan untuk menambahkan produk ke database
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $name, $description, $price, $image);
        
        if ($stmt->execute()) {
            // Jika berhasil, alihkan ke halaman admin
            header("Location: ../admin.php");
            exit();
        } else {
            echo "Gagal menambahkan produk: " . $stmt->error;
        }
    } else {
        echo "Gagal mengupload gambar.";
    }
}
?>