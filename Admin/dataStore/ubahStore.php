<?php
include "../koneksi.php";

$kode_store = $_GET['kode_store'];

if($_SERVER['REQUEST_METHOD']=="POST"){
    include "../koneksi.php";
        $kode_store = $_POST['kode_store'];
        $nama_store = $_POST['nama_store'];
        $ext = $_POST['ext'];
        $nama_superviser = $_POST['nama_superviser'];
        
        $simpan = mysqli_query($sambungin, "UPDATE tbstore SET nama_store='$nama_store', ext='$ext', nama_superviser='$nama_superviser' where kode_store='$kode_store'");

            
            echo "
                <meta http-equiv='refresh' content = '0; url=?hal=dataStore'>
            ";        
}

?>

<section id="main-content">
<section class="wrapper">

        <?php 
        $query = mysqli_query($sambungin, "SELECT * FROM tbstore WHERE kode_store = '$kode_store'");
        while ($data = mysqli_fetch_array($query)){
        
        ?>

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4><i class="fa fa-building"></i> Ubah Data</h4>
              <hr>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Store/Suplier</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="kode_store" value="<?php echo $kode_store ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_store" value="<?php echo $data['nama_store'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="ext" value="<?php echo $data['ext'] ?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Superviser</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_superviser" value="<?php echo $data['nama_superviser'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4">
                      <button class="btn btn-primary" name="">Simpan</button>
                      <a href="?hal=dataStore" class="btn btn-warning">Kembali</a>
                  </div>
                </div>
              </form>

              <?php 
                }
              ?>

            </div>
          </div>
          <!-- col-lg-12-->
        </div>

        <br>

        <?php
          include "footer.php";
        ?>

</section>
</section>