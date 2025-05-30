<?php
$sql = "SELECT * FROM product ORDER BY product ASC";
// echo $sql;
$hasil = mysqli_query($koneksi, $sql);
$baris = mysqli_num_rows($hasil);
echo $baris;
if ($baris == 0) {
    echo "<h1>Product Belum Diisi<h1>";
}
?>

<div class="product">
    <h1>PRODUCT</h1>
    <?php
    if ($baris > 0) {
        while ($row = mysqli_fetch_assoc($hasil)) {
    ?>
     <div class="detail-product">
        <h2><?= $row["Product"] ?></h2>
        <img src="images/<?= $row["Gambar"] ?>" alt="">
        <p><?= $row["Deskripsi"] ?></p>
        <p><?= $row["Stock"] ?></p>
        <p><strong><?= $row["Harga"] ?></strong></p>
        <a href="?menu=cart&add=<?= $row["ID"] ?>"><button>BELI</button></a>
    </div>
    <?php
        }
    }
    ?>
</div>