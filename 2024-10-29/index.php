<?php

$sekolah = ["TK Negeri Alamanda", "SD Muhammadiyah 9 Ngaban", "SMP Negeri 1 Buduran", "SMK Negeri 2 Buduran"];

$sekolahs = ["TK"=>"TK Negeri Alamanda", "SD"=>"SD Muhammadiyah 9 Ngaban", "SMP"=>"SMP Negeri 1 Buduran", "SMK"=>"SMK Negeri 2 Buduran", "PT"=>"Universitas Negeri Surabaya"];


$skills = ["C++" => "Expert", "HTML" => "Newbie", "CSS" => "Newbie", "PHP" => "Intermediate", "JS" => "Intermediate"];

$identitas = ["Nama" => "Tobias Hanan Syakura", "Alamat" => "Griya Alamanda C4-11", "Email" => "tobiehanan@gmail.com", "FB" => "frostgamingx", "TikTok" => "-", "IG" => "FrostGamingX"];

$hobies = ["Coding", "Musik", "Mancing", "Bersepeda", "Membaca"];

// echo $sekolah[0];
// echo "<br>";
// echo $sekolahs["TK"];
// echo "<br>";
// echo $sekolah[1];
// echo "<br>";
// echo $sekolahs["SD"];
// echo "<br>";

// for ($i = 0; $i < 4; $i++) {
//     echo $sekolah[$i];
//     echo "<br>";
// }

// foreach ($sekolah as $key) {
//     echo $key;
//     echo "<br>";
// }

// foreach ($sekolahs as $key => $value) {
//     echo $key;
//     echo "=";
//     echo $value;
//     echo "<br>";
// }

// foreach ($skills as $key => $value) {
//     echo $key;
//     echo "=";
//     echo $value;
//     echo "<br>";
// }

if (isset($_GET ["menu"])) {
$menu = $_GET ["menu"];
echo $menu;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <hr>
    <ul>
        <li><a href="?menu=Home">Home</a></li>
        <li><a href="?menu=CV">CV</a></li>
        <li><a href="?menu=Project">Project</a></li>
        <li><a href="?menu=Contact">Contact</a></li>
    </ul>
    <h2>Identitas</h2>
    <table border="1px">
        <thead>
            <tr>
                <th>Identitas</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($identitas as $key => $value) {
            ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <hr>
    <h2>Riwayat Sekolah</h2>
    <table border="1px">
        <thead>
            <tr>
                <th>Jenjang</th>
                <th>Nama Sekolah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($sekolahs as $key => $value) {
                echo "<tr>";
                echo "<td>";
                echo $key;
                echo "</td>";
                echo "<td>";
                echo $value;
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <hr>
    <h2>Skill</h2>
    <table border="1px">
        <thead>
            <tr>
                <th>Skill</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($skills as $key => $value) {
            ?>
             <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <hr>
    <h2>Hobi</h2>
    <ul>
        <?php
        foreach ($hobies as $key) {
        ?>
        <li><?= $key ?></li>
        <?php
        }
        ?>
    </ul>
</body>
</html>