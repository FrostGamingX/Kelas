<h3>Keranjang Belanja</h3>

<?php 

    if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        unset($_SESSION['_'.$id]);
        echo "<script>window.location.href='?f=home&m=beli';</script>";
    }

    if (isset($_GET['tambah'])) {
        $id = $_GET['tambah'];
        $_SESSION['_'.$id]++;
    }
    if (isset($_GET['kurang'])) {
        $id = $_GET['kurang'];
        $_SESSION['_'.$id]--;

        if ($_SESSION['_'.$id]==0) {
            unset($_SESSION['_'.$id]);
        }
    }

    if (!isset($_SESSION['pelanggan'])) {
        echo "<script>window.location.href='?f=home&m=login';</script>";
    }else {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            isi($id);
            echo "<script>window.location.href='?f=home&m=beli';</script>";
        }else {
            keranjang();
        }
    }

   




    function isi($id){
        if (isset($_SESSION['_'.$id])) {
            $_SESSION['_'.$id]++;
        }else {
            $_SESSION['_'.$id]=1;
        }
    }
    function keranjang(){

        global $db;
        
        $total = 0;

        global $total;

        echo '
        <table class="table table-bordered w-70">
    <thead>
        <tr>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Hapus</th>
        </tr>
    </thead>';
        foreach ($_SESSION as $key => $value) { 
            if ($key<>'pelanggan' && $key<> 'idpelanggan' && $key<> 'user' && $key<> 'level' && $key<> 'iduser') {
                $id = substr($key,1);

                $sql = "SELECT * FROM tblmenu WHERE idmenu=$id";

                $row = $db->getAll($sql);

                foreach ($row as $r) {
                    echo '<tr>';
                    echo '<td>'.$r['menu'].'</td>';
                    echo '<td>'.$r['harga'].'</td>';
                    echo '<td><a href="?f=home&m=beli&tambah='.$r['idmenu'].'">[+]</a> &nbsp &nbsp'.$value.' &nbsp &nbsp <a href="?f=home&m=beli&kurang='.$r['idmenu'].'">[-]</a></td>';
                    echo '<td>'.$r['harga'] * $value.'</td>';
                    echo '<td><a href="?f=home&m=beli&hapus='.$r['idmenu'].'">Hapus</a></td>';
                    echo '</tr>';
                    $total = $total +($value *$r['harga']);
                }
            }
         
        }

        echo '<tr>
                <td colspan=4px;><h3>GRAND TOTAL :</h3></td>
                <td>,<h3>'.$total.'</h3></td>
              </tr>';

        echo '</table>';
    }

   

?>

<?php 

if (!empty($total)) {
    


?>

<a class="btn btn-primary" href="?f=home&m=checkout&total=<?php echo $total?>" role="button">CHECK OUT</a>

<?php 

}

?>