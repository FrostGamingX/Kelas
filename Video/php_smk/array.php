<?php

// array dimensi

$nama = array("joni", "budi", "rudi", "siti", 100, 2.5);

var_dump($nama);

echo '<br>';

echo $nama[5];

echo '<br>';

// for ($i = 0; $i < 6; $i++){
//     // echo $i
//     echo $nama[$i].'<br>'; 
// }

foreach ($nama as $k){
    echo $k.'<br>';
}

// array asosiatif

// $nama = array(
//     "joni" => "surabaya",
//     "budi" => "malang",
//     "rudi" => "jakarta",
//     "siti" => "bandung"
// );

$nama['joni'] = "malang";
$nama['budi'] = "sidaorjo";
$nama['rudi'] = "surabaya";

var_dump($nama);

echo '<br>';

// echo $nama['budi'];

foreach ($nama as $key => $value){
    echo $key.' => '.$key;
    echo '<br>'; 
}





?>