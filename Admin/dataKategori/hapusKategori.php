<?php
    include "../../koneksi.php";
    $kode_kategori = $_GET['kode_kategori'];
    $query = mysqli_query($sambungin, "DELETE FROM tbkategori WHERE kode_kategori = '$kode_kategori'") or die (mysql_error());

    echo "
                <meta http-equiv='refresh' content = '0; url=../beranda.php?hal=dataKategori'>
            ";
?>