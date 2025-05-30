<?php
include 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username sudah ada, tampilkan pesan error
        echo "Username sudah terdaftar. Silakan pilih username lain.";
    } else {
        // Jika username belum ada, lakukan registrasi
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        
        if ($stmt->execute()) {
            // Registrasi berhasil, alihkan ke halaman login
            header("Location: login.php");
            exit();
        } else {
            echo "Registrasi gagal: " . $stmt->error;
        }
    }
}
?>