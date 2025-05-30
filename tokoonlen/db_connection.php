<?php
// Pengaturan koneksi database
$host = 'localhost';  // Alamat host database, biasanya localhost
$dbname = 'tokoonline'; // Nama database yang digunakan
$username = 'root';    // Username untuk mengakses database
$password = '';        // Password untuk akses database (kosongkan jika menggunakan root tanpa password)

try {
    // Membuat koneksi PDO ke database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Mengatur PDO error mode untuk menampilkan exception jika terjadi kesalahan
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Menyatakan koneksi berhasil
    // echo "Koneksi berhasil!";
} catch (PDOException $e) {
    // Menangkap error jika koneksi gagal
    echo "Koneksi gagal: " . $e->getMessage();
    exit();
}
?>
