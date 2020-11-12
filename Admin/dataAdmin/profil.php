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
      
        $ubah = mysqli_query($sambungin, "UPDATE tblogin SET username='$username', password='$password', nama_admin='$nama_admin', status_admin='$status_admin', email='$email', telepon='$telepon', skype='$skype' where id_login='$id_login'");

            
            echo "
                <meta http-equiv='refresh' content = '0; url=?hal=profil'>
            ";
      
}

?>


<section id="main-content">
  <section class="wrapper">

<div class="row mt">
          <div class="col-lg-12">
          <div class="row content-panel">
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="content-panel pn">
                  <div id="profile-02">
                    <div class="user">
                      <img src="../Admin/dataAdmin/images/<?php echo $_SESSION['profil'] ?>" class="img-circle" width="130">
                      
                    </div>
                  </div>
                  <div class="pr2-social centered">
                    <h4><?php echo $_SESSION['nama_admin'] ?></h4>
                  </div>
                </div>
                <!-- /panel -->
              </div>

              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3> ADMINISTRATOR </h3>
                <h6><?php echo $_SESSION['id_login'] ?></h6>
                <p></p>
                <br>
                <p><button class="btn btn-theme"><i class="fa fa-envelope"></i> <?php echo $_SESSION['email'] ?></button></p>
                <p><button class="btn btn-theme"><i class="fa fa-phone-square"></i> <?php echo $_SESSION['telepon'] ?></button></p>
                <p><button class="btn btn-theme"><i class="fa fa-skype"></i> <?php echo $_SESSION['skype'] ?></button></p>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li>
                    <a data-toggle="tab" href="#contact" class="contact-map">Kontak Perusahaan</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit">Ubah Profil</a>
                  </li>
                  
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">


                <div class="col-md-6">

</div> <!-- akhir row kiri -->

    <div class="col-md-3">

    </div>

                  
                  <div id="contact" class="tab-pane">
                    <div class="row">
                      <div class="col-md-16 centered">
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-md-6 detailed">
                        <h4>Alamat</h4>
                        <div class="col-md-8 col-md-offset-2 mt centered">
                          <p>
                          Indonesia Stock Exchange Building<br/> Tower II, 17th Floor<br/> Jl. Jend. Sudirman Kav. 52-53<br/>Jakarta, Indonesia 12190
                          </p>
                          <br>
                          <p>
                          Opening hours : <br/> Monday to Friday 9am-5pm<br/> (Closed on national holidays)
                          </p>
                        </div>
                      </div>
                      <div class="col-md-6 detailed">
                        <h4>Kontak</h4>
                        <div class="col-md-8 col-md-offset-2 mt centered">
                          <p>
                            Telp: +62 21 515 76 04<br/>
                          </p>
                          <br>
                          <p>
                            Email: info@kgbgroup.co.id<br/> Website: http://www.kgbgroup.co.id
                          </p>
                        </div>
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->

                  <div id="edit" class="tab-pane">
                    <div class="row">
                      <div class="col-md-16 centered">

          <?php 
            $query = mysqli_query($sambungin, "SELECT * FROM tblogin WHERE id_login = '$id_login'");
            $data = mysqli_fetch_array($query);
            
          ?>
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"></h4>
              <form class="form-horizontal style-form" method="post">
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Admin</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="id_login" value="<?php echo $_SESSION['id_login'] ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username'] ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-5">
                    <input type="password" class="form-control" name="password" placeholder="Password Baru" value="<?php echo $data['password'] ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Admin</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_admin" value="<?php echo $_SESSION['nama_admin'] ?>" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Status Admin</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="status_admin" value="<?php echo $_SESSION['status_admin'] ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Email</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['email'] ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">No. Telepon</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="telepon" value="<?php echo $_SESSION['telepon'] ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">ID Skype</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="skype" value="<?php echo $_SESSION['skype'] ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4">
                      <button class="btn btn-primary" name="">Ubah</button>
                  </div>
                </div>

              </form>

             

            </div>
          </div>

                        
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>

            <br>
              
          </div>
        </div>
        <?php
          include "footer.php";
        ?>

  </section>
</section>