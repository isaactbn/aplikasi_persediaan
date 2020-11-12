<?php
    include "../../koneksi.php";
    $kode_store = $_GET['kode_store'];
    $query = mysqli_query($sambungin, "DELETE FROM tbstore WHERE kode_store = '$kode_store'") or die (mysql_error());

    echo "
                <meta http-equiv='refresh' content = '0; url=../beranda.php?hal=dataStore'>
            ";
?>