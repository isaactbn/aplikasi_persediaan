<?php
error_reporting(0);
include "../../koneksi.php";
$id = $_GET['id'];

$query = mysqli_query($sambungin, "DELETE FROM tbsementara WHERE id = '$id'") or die (mysql_error());

if($query) {
    $_GET['hal']=='hapusSementara';
        $brand = $_GET['brand'];
    echo "
        <meta http-equiv='refresh' content = '0; url=../beranda.php?hal=tambahPenerimaan&brand=$brand'>
    ";
    
}
?>