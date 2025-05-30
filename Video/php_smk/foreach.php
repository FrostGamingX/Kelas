<?php

    $nama = array("budi", "rudi", "siti", "tejo", "joko", "rian", 100); 

    var_dump($nama);

    foreach ($nama as $key) {
        echo $key."<br>";
    }

    $nama = array(
        "tejo" => "Aceh",
        "joko" => "NTT",
        "rian" => "Palembang",
    );

    var_dump($nama);
    echo '<br>';
    foreach ($nama as $a => $value) {
        echo $a."-".$b;
        echo '<br>';
    }


?>