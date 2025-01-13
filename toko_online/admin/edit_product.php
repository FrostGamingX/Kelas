<?php include '../config/database.php'; ?>
<?php include '../includes/header.php'; ?>

<h1>Edit Produk</h1>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
}
?>

<form action="edit_product_process.php?id=<?php echo $product['id']; ?>" method="POST" enctype="multipart/form-data">
    <label for="name">Nama Produk:</label>
    <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
    
    <label for="description">Deskripsi:</label>
    <textarea name="description" required><?php echo $product['description']; ?></textarea>
    
    <label for="price">Harga:</label>
    <input type="number" name="price" step="0.01" value="<?php echo $product['price']; ?>" required>
    
    <label for="image">Gambar (kosongkan jika tidak ingin mengubah):</label>
    <input type="file" name="image">
    
    <button type="submit">Simpan Perubahan</button>
</form>

<?php include '../includes/footer.php'; ?>