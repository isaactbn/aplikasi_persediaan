<?php
include "../koneksi.php";
// nomor otomatis
$query = "SELECT max(kode_store) as maxKode FROM tbstore";
$hasil = mysqli_query($sambungin, $query);
$data = mysqli_fetch_array($hasil);
$kodeStore = $data['maxKode'];
$noUrut = (int) substr($kodeStore,3,3);
$noUrut ++ ;
$char = "DEP";
$kodeStore = $char.sprintf("%03s", $noUrut);
echo $kodeStore;

if($_SERVER['REQUEST_METHOD']=="POST"){
    include "../koneksi.php";
        $kode_store = $_POST['kode_store'];
        $nama_store = $_POST['nama_store'];
        $ext = $_POST['ext'];
        $nama_superviser = $_POST['nama_superviser'];
  
        $simpan = mysqli_query($sambungin, "INSERT INTO tbstore VALUES('$kode_store','$nama_store','$ext','$nama_superviser')");

            echo "
                <meta http-equiv='refresh' content = '0; url=?hal=dataStore'>
            ";    
}

?>


<section id="main-content">
<section class="wrapper">

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4><i class="fa fa-building"></i> Tambah Data</h4>
              <hr>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Store/Suplier</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="kode_store" value="<?php echo $kodeStore ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_store" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-5">
                  <?php
                          echo "<select class='form-control' name='ext'>";
                          
                          echo "<option>Store</option>";
                          echo "<option>Suplier</option>";
                        
                          echo "</select>";
                      ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Superviser</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_superviser" required="">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4">
                      <button class="btn btn-primary" name="">Simpan</button>
                      <a href="?hal=dataStore" class="btn btn-warning">Kembali</a>
                  </div>
                </div>

              </form>
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