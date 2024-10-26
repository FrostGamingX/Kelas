<?php

$judul = "Curriculum Vitae (CV)";

$Identity = ["Tobias Hanan Syakura", "Sidoarjo/01-10-2008", "Laki-Laki", "Islam", "Gaming/Coding/Desain","172 cm", "45 kg", "Griya Alamanda C4-11, Dukuh Tengah, Buduran, Sidoarjo, Jawa Timur", "083829995219", "Belum Menikah", "tobiehanan@gmail.com"];

$Pendidikan = ["TK Negeri Alamanda Dukuh Tengah", "SD Muhammadiyah 9 Ngaban", "SMP Negeri 1 Buduran", "SMK Negeri 2 Buduran", "Les Matematika (2021-2023)", "Belajar Desain CorelDraw (2022-2023)", "Belajar Coding (2023-2024)"];

$Skill = ["HTML, PHP, CSS, JavaScript", "CorelDraw, Adobe Photoshop, Blender", "Bahasa Indonesia, Bahasa Inggris, Bahasa Jepang", "Matematika, IPA (FIsika dan BIologi), Sejarah", "Badminton"];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            border-top: solid;
            border-right: solid;
            border-bottom: solid;
            border-left: solid;
            background-color: wheat;
        }
        .header {
            text-align: center;
            border-bottom: solid;
        }

        .identitas {
            border-bottom: solid;
        }

        .CI {
            border-bottom: solid;
        }

        img {
            position: absolute;
            margin-left: 1301px;
            margin-top: 163px;
            border-image: auto;
            height: 35%;
            width: 13%;
        }

        h1 {
            font-family: 'Courier New', Courier, monospace;
        }

        .pendidikan {
            border-bottom: solid;
        }

        .non-formal {
            border-bottom: solid;
        }

        .kemampuan {
            border-bottom: solid;
        }

    </style>
</head>
<body>
    <div>
        <img src="images/foto.png" alt="">
        <img src="images/Identitas.png" alt="" style="margin-top: 83px; margin-left: 175px; height: 10%; width: 5%">
        <img src="images/Pendidikan.png" alt="" style="margin-top: 430px; margin-left: 200px; height: 10%; width: 5%">
        <img src="images/Skill.png" alt="" style="margin-top: 807px; margin-left: 355px; height: 10%; width: 5%">
    </div>
    <div class="header">
        <h1><?=$judul ?></h1>
    </div>
    <div class="identitas">
        <div>
            <h1>Identitas</h1>
        </div>
    </div>
    <div class="CI">
    <table>
            <tbody>
                <tr>
                    <td>Nama:</td>
                    <td><?=$Identity [0] ?></td>
                </tr>
                <tr>
                    <td>Tempat/Tanggal Lahir:</td>
                    <td><?=$Identity [1] ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin:</td>
                    <td><?=$Identity [2] ?></td>
                </tr>
                <tr>
                    <td>Agama:</td>
                    <td><?=$Identity [3] ?></td>
                </tr>
                <tr>
                    <td>Hobi:</td>
                    <td><?=$Identity [4] ?></td>
                </tr>
                <tr>
                    <td>Tinggi Badan:</td>
                    <td><?=$Identity [5] ?></td>
                </tr>
                <tr>
                    <td>Berat Badan:</td>
                    <td><?=$Identity [6] ?></td>
                </tr>
                <tr>
                    <td>Alamat:</td>
                    <td><?=$Identity [7] ?></td>
                </tr>
                <tr>
                    <td>Handphone:</td>
                    <td><?=$Identity [8] ?></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><?=$Identity [9] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?=$Identity [10] ?></td>
                </tr>
            </tbody>
        </table>
        <br>
    </div>
    <div class="pendidikan">
        <h1>Pendidikan</h1>
    </div>
    <div class="formal">
        <h2>Formal</h2>
        <table>
            <tbody>
                <tr>
                    <td>TK:</td>
                    <td><?=$Pendidikan [0] ?></td>
                </tr>
                <tr>
                    <td>Sekolah Dasar:</td>
                    <td><?=$Pendidikan [1] ?></td>
                </tr>
                <tr>
                    <td>SMP:</td>
                    <td><?=$Pendidikan [2] ?></td>
                </tr>
                <tr>
                    <td>SMA/SMK:</td>
                    <td><?=$Pendidikan [3] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="non-formal">
        <h2>Non-Formal</h2>
        <ol>
            <li><?=$Pendidikan [4] ?></li>
            <li><?=$Pendidikan [5] ?></li>
            <li><?=$Pendidikan [6] ?></li>
        </ol>
    </div>
    <div class="kemampuan">
        <h1>Kemampuan/Keahlian</h1>
    </div>
    <div class="keahlian">
        <br>
        <table>
            <tbody>
                <tr>
                    <td>Bahasa Program:</td>
                    <td><?=$Skill [0] ?></td>
                </tr>
                <tr>
                    <td>Desain:</td>
                    <td><?=$Skill [1] ?></td>
                </tr>
                <tr>
                    <td>Bahasa Percakapan:</td>
                    <td><?=$Skill [2] ?></td>
                </tr>
                <tr>
                    <td>Mapel yang Dikuasai:</td>
                    <td><?=$Skill [3] ?></td>
                </tr>
                <tr>
                    <td>Bidang Olahraga:</td>
                    <td><?=$Skill [4] ?></td>
                </tr>
            </tbody>
        </table>
        <br>
    </div>
</body>
</html>