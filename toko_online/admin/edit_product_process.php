<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "../assets/images/" . basename($image);

    // Jika gambar baru diupload
    if (!empty($image)) {
        // Update produk dengan gambar baru
        $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?");
        $stmt->bind_param("ssdsi", $name, $description, $price, $image, $id);
        
        if ($stmt->execute() && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Jika berhasil, alihkan ke halaman admin
            header("Location: ../admin.php");
            exit();
        } else {
            echo "Gagal memperbarui produk: " . $stmt->error;
        }
    } else {
        // Jika tidak ada gambar baru, update produk tanpa mengubah gambar
        $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?");
        $stmt->bind_param("ssdi", $name, $description, $price, $id);
        
        if ($stmt->execute()) {
            // Jika berhasil, alihkan ke halaman admin
            header("Location: ../admin.php");
            exit();
        } else {
            echo "Gagal memperbarui produk: " . $stmt->error;
        }
    }
} else {
    echo "ID produk tidak ditemukan.";
}
?>