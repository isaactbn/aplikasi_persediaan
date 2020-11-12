<?php
    include "../../koneksi.php";
    $id_login = $_GET['id_login'];
    $pilih = mysqli_query($sambungin, "SELECT * FROM tblogin WHERE id_login = '$id_login'");
    $data = mysqli_fetch_array($pilih);
    $gambar = $data['profil'];

    unlink("../dataAdmin/images/".$gambar);

    $query = mysqli_query($sambungin, "DELETE FROM tblogin WHERE id_login = '$id_login'") or die (mysql_error());

    echo "
                <meta http-equiv='refresh' content = '0; url=../beranda.php?hal=dataAdmin'>
            ";
?>