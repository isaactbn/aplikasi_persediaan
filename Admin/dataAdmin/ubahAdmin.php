<?php
include "../koneksi.php";

$id_login = $_GET['id_login'];

if($_SERVER['REQUEST_METHOD']=="POST"){
    include "../koneksi.php";
        $id_login = $_POST['id_login'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama_admin = $_POST['nama_admin'];
        $status_admin = $_POST['status_admin'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $skype = $_POST['skype'];
      
        $ubah = mysqli_query($sambungin, "UPDATE tblogin SET username='$username', password='$password', nama_admin='$nama_admin', status_admin='$status_admin', email='$email', telepon='$telepon', skype='$skype' where id_login='$id_login'");

            
            echo "
                <meta http-equiv='refresh' content = '0; url=?hal=dataAdmin'>
            ";
      
}

?>

<section id="main-content">
<section class="wrapper">
        <!-- BASIC FORM ELELEMNTS -->
        <?php 
        $query = mysqli_query($sambungin, "SELECT * FROM tblogin WHERE id_login = '$id_login'");
        while ($data = mysqli_fetch_array($query)){
        
        ?>
        <div class="form-panel"> <!-- panel 2 -->
            <h3><i class="fa fa-user"></i> Ubah Admin</h3>
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
                                    <input type="text" class="form-control" name="username" value="<?php echo $data['username'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password Baru" required>
                                </div>

                                <div class="form-group">
                                    <label>Nama Admin</label>
                                    <input type="text" class="form-control" name="nama_admin" value="<?php echo $data['nama_admin'] ?>" required="">
                                </div>
                
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" name="status_admin" value="Admin" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo $data['email'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="text" class="form-control" name="telepon" value="<?php echo $data['telepon'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>ID Skype</label>
                                    <input type="text" class="form-control" name="skype" value="<?php echo $data['skype'] ?>" required>
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-primary" name="">Simpan</button>
                                    <a href="?hal=dataAdmin" class="btn btn-warning">Kembali</a>
                                </div>
   
                        </div> <!-- akhir row kiri -->

                            <div class="col-md-3">
                                
                            <div class="form-group">
                            <h4>Foto Profil</h4>                                    
                                    <div class="user">
                                  <img src="../Admin/dataAdmin/images/<?php echo $data['profil'] ?>" class="img-square" width="200">
                                </div>

                            
                                
                            </form>
                            <?php
                              }
                            ?>
                            
                            </div>
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