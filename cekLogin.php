<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($sambungin, "Select * from tblogin where username = '$username' and password = '$password'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

    if($ketemu > 0){
        session_start();

        $_SESSION['profil'] = $r['profil'];
        $_SESSION['ukuran'] = $r['ukuran'];
        $_SESSION['tipe'] = $r['tipe'];
        $_SESSION['id_login'] = $r['id_login'];
        $_SESSION['username'] = $r['username'];
        $_SESSION['nama_admin'] = $r['nama_admin'];
        $_SESSION['status_admin'] = $r['status_admin'];
        $_SESSION['email'] = $r['email'];
        $_SESSION['telepon'] = $r['telepon'];
        $_SESSION['skype'] = $r['skype'];
        $_SESSION['status'] = "login";

    echo"
            <script>
            window.location = 'admin/index.php'
            </script>
    ";
    }else{

        header("location:index.php?pesan=gagal");
    }

?>