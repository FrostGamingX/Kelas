<?php
//Untuk Mengecek Apakah Sudah Login, Jika belum maka diarahkan ke Login
if (!isset($_SESSION["email"])) {
    header("location:index.php?menu=login");
}

//menghapus isi session
if (isset($_GET["hapus"])) {
    $id = $_GET["hapus"];
    unset($_SESSION["cart"][$id]);
}

//mengecek isi session,juka session kosong akan kembali ke product
$cart = count($_SESSION["cart"]);
if ($cart == 0) {
    header("location:index.php");
}

//menggambil data dari database dan menyimpan sepads session
if (isset($_GET["add"])) {
    $id = $_GET["add"];
    $sql = "SELECT * FROM product WHERE id=$id";
    // echo $sql;
    $hasil = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($hasil);
    echo $row["ID"];
    echo $row["Product"];
    echo $row["Harga"];
    $_SESSION["cart"][$row["ID"]] = [
        "ID" => $row["ID"],
        "Product" => $row["Product"],
        "Harga" => $row["Harga"],
        "Jumlah" => isset($_SESSION["cart"][$row["ID"]])?$_SESSION["cart"][$row["ID"]]["Jumlah"] + 1 : 1
    ];
}
?>
<div class="cart">
    <h1>CART</h1>
    <table border="1px">
        <thead>
            <tr>
                <th>No.</th>
                <th>Product</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
        foreach ($_SESSION["cart"] as $key) {
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $key["Product"] ?></td>
                <td><?= $key["Harga"] ?></td>
                <td><?= $key["Jumlah"] ?></td>
                <td><?= $key["Jumlah"] * $key["Harga"] ?></td>
                <td><a href="?menu=cart&hapus=<?= $key["ID"] ?>">Hapus</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>