<?php 

    if (isset($_GET['total'])) {
        $total = $_GET['total'];
        $idorder = idorder();
        $idpelanggan =  $_SESSION['idpelanggan'];
        $tgl=date('Y-m-d');

        $sql = "SELECT * FROM tblorder WHERE idorder = $idorder";

        $count = $db->rowCOUNT($sql);

        if ($count ==0) {
             insertorder($idorder,$idpelanggan,$tgl,$total);
             insertOrderDetail($idorder);
        }else {
            insertOrderDetail($idorder);
        }

        kosongkanSession();
        echo "<script>window.location.href='?f=home&m=checkout';</script>";
       
    }else {
        info();
    }

    function idorder()
    {
        global $db;
        $sql = "SELECT idorder FROM tblorder ORDER BY idorder DESC";
        $jumlah = $db->rowCOUNT($sql);
        if ($jumlah == 0) {
            $id = 1;
        }else {
            $item = $db->getITEM($sql);
            $id = $item['idorder']+1;
        }
        return $id;
    }

    function insertorder($idorder, $idpelanggan, $tgl, $total)
    {
        global $db;    
        $sql = "INSERT INTO tblorder (idorder, idpelanggan, tglorder, total, bayar, kembali, status) 
                VALUES ($idorder, $idpelanggan, '$tgl', $total, 0, 0, 0)";

        $db->runSQL($sql);
    }

    function insertOrderDetail($idorder=1)
    {
        global $db;

        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan' && $key<> 'idpelanggan' && $key<> 'user' && $key<> 'level' && $key<> 'iduser') {
                $id = substr($key,1);

                $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";

                $row = $db->getAll($sql);

                foreach ($row as $r) {
                    $idmenu = $r['idmenu'];
                    $harga = $r['harga'];
                    $sql = "INSERT INTO tblorderdetail (idorderdetail, idorder, idmenu, jumlah, hargajual) 
                            VALUES ('', $idorder, $idmenu, $value, $harga)";
                    $db->runSQL($sql);
                }
            }
        }
    }

    function kosongkanSession()
    {
        foreach ($_SESSION as $key => $value) {
            if ($key<>'pelanggan' && $key<> 'idpelanggan' && $key<> 'user' && $key<> 'level' && $key<> 'iduser') {
                $id = substr($key,1);

                unset($_SESSION['_'.$id]);

            }
        }
    }

    function info()
    {
        echo "<h3>TerimaKasih Sudah Berbelanja Di Restoran Kami</h3>";    
    }

?>