<?php

$data = "Saya Belajar PHP di SMKN 2 Buduran";

$isi = "Hari Ini Saya Belajar PHP";

$materi = "Materi Belajar PHP";

$sekolahs = [""];

$identitases = ["",]; 

$judul = "Curriculum Vitae (CV)";

$hobbies = [""];

$list1 = "Variable";

$list2 = "Array";

$list3 = "Pengujian";

$list4 = "Pengulangan";

$list5 = "Function";

$list6 = "Class";

$list7 = "Object";

$list8 = "FrameWork";

$list9 = "PHP and MySql";

$lists = ["Variable", "Array", "Pengujian", "Pengulangan", "Function", "Class", "Object", "FrameWork", "PHP and MySql"];

echo $data;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .kamar {
            text-align: center;
        }
        .list {
            display: flex;
          justify-content: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><?= $judul; ?></h1>
    </div>
    <div class="identitas">
        <table>
            <thead>
                <tr>
                    <th>Identitas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td><?= $identitases[0] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="kamar">
    <h1> <?php echo $data; ?> </h1>
    <p> <?php echo $isi; ?> </p>
    <h2> <?= $materi; ?> </h2>
    <div class="list">
    <ol>
        <li><?= $lists[0] ?></li>
        <p>Variable adalah wadah atau tempat untuk menyimpan data.</p>
        <p>Data bisa berupa text atau string, bisa juga berupa angka atau numerik, data juga boisa gabungan antara text, angka, dan symbol.</p>
        <li><?= $lists[1] ?></li>
        <li><?= $lists[2] ?></li>
        <li><?= $lists[3] ?></li>
        <li><?= $lists[4] ?></li>
        <li><?= $lists[5] ?></li>
        <li><?= $lists[6] ?></li>
        <li><?= $lists[7] ?></li>
        <li><?= $lists[8] ?></li>
    </ol>
    </div>
    </div>
</body>
</html>