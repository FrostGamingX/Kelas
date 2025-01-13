<?php include '../config/database.php'; ?>
<?php include '../includes/header.php'; ?>

<h1>Tambah Produk</h1>
<form action="add_product_process.php" method="POST" enctype="multipart/form-data">
    <label for="name">Nama Produk:</label>
    <input type="text" name="name" required>
    
    <label for="description">Deskripsi:</label>
    <textarea name="description" required></textarea>
    
    <label for="price">Harga:</label>
    <input type="number" name="price" step="0.01" required>
    
    <label for="image">Gambar:</label>
    <input type="file" name="image" required>
    
    <button type="submit">Tambah Produk</button>
</form>

<?php include '../includes/footer.php'; ?>