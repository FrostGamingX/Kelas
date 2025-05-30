<?php 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM tblkategori WHERE idkategori=$id";

        $db->runSQL($sql);

        header("location:http://localhost/php%20smk/restoran/admin/?f=kategori&m=select");

    }

?>