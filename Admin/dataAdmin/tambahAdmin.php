<?php
include "../koneksi.php";
// nomor otomatis
$query = "SELECT max(id_login) as maxKode FROM tblogin";
$hasil = mysqli_query($sambungin, $query);
$data = mysqli_fetch_array($hasil);
$id_login = $data['maxKode'];
$noUrut = (int) substr($id_login,3,3);
$noUrut ++ ;
$char = "ADM";
$id_login = $char.sprintf("%03s", $noUrut);
echo $id_login;

if($_SERVER['REQUEST_METHOD']=="POST"){
    include "../koneksi.php";
        $profil_file = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $tipe_file = $_FILES['gambar']['type'];
        $id_login = $_POST['id_login'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama_admin = $_POST['nama_admin'];
        $status_admin = $_POST['status_admin'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $skype = $_POST['skype'];
        $tmp_file = $_FILES['gambar']['tmp_name'];

        $path = 'dataAdmin/images/'.$profil_file;

        if($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png"){

            if($ukuran_file <= 25000000){ 
                if(move_uploaded_file($tmp_file, $path)){  
                    $simpan = mysqli_query($sambungin, "INSERT INTO tblogin VALUES('$profil_file','$ukuran_file','$tipe_file','$id_login','$username','$password','$nama_admin','$status_admin','$email','$telepon','$skype')");
            
                    echo "
                        <meta http-equiv='refresh' content = '0; url=?hal=dataAdmin'>
                    "; 
                  
                  if($simpan){
                    echo "
                            <meta http-equiv='refresh' content = '0; url=?hal=dataAdmin'>
                        ";
                  }else{
                    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                    echo "<br><a href='tambahAdmin.php'>Kembali Ke Form</a>";
                  }
                }else{
                  echo "Maaf, Gambar gagal untuk diupload.";
                  echo "<br><a href='tambahAdmin.php'>Kembali Ke Form</a>";
                }
              }else{
                echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 25MB";
                echo "<br><a href='tambahAdmin.php'>Kembali Ke Form</a>";
              }
        
        
        }else{
            // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
            echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
            echo "<br><a href='tambahAdmin.php'>Kembali Ke Form</a>";
          }
}

?>

<section id="main-content">
    <section class="wrapper">
        <div class="form-panel"> <!-- panel 2 -->
            <h3><i class="fa fa-user"></i> Tambah Admin</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Id Login</label>
                                    <input type="text" class="form-control" name="id_login" value="<?php echo $id_login ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" required>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>

                                <div class="form-group">
                                    <label>Nama Admin</label>
                                    <input type="text" class="form-control" name="nama_admin" required="">
                                </div>
                
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" name="status_admin" value="Admin" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" required>
                                </div>

                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="text" class="form-control" name="telepon" required>
                                </div>

                                <div class="form-group">
                                    <label>ID Skype</label>
                                    <input type="text" class="form-control" name="skype" required>
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-primary" name="">Simpan</button>
                                    <a href="?hal=dataAdmin" class="btn btn-warning">Kembali</a>
                                </div>
   
                        </div> <!-- akhir row kiri -->

                            <div class="col-md-3">
                                
                            <div class="form-group">
                                    <label>Upload Foto</label>
                                    <input type="file" name="gambar" class="form-control" id="file_gambar" accept="image/*" required>
                                    <br>
                                    <img id="prev_foto" width="100px" src="" style="display: block; margin: auto;">
                                </div>

                            
                                
                            </form>
                            
                            </div>

                    </div>

                </div>
            </div>

        </div> <!-- akhir panel 2 -->

        <br>

        <?php
          include "footer.php";
        ?>

    </section>
</section>