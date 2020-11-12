<?php
include "../koneksi.php";

$kode_barang = $_GET['kode_barang'];

if($_SERVER['REQUEST_METHOD']=="POST"){
    include "../koneksi.php";
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $kode_kategori = $_POST['kode_kategori'];
        $brand = $_POST['brand'];
        $stok = $_POST['stok'];
        $lokasi = $_POST['lokasi'];

        $simpan = mysqli_query($sambungin, "UPDATE tbbarang SET nama_barang='$nama_barang', kode_kategori='$kode_kategori', brand='$brand', stok='$stok', lokasi='$lokasi' where kode_barang='$kode_barang'");

            echo "
                <meta http-equiv='refresh' content = '0; url=?hal=dataBarang'>
            ";    
}
?>

<section id="main-content">
<section class="wrapper">

        <?php 
        $query = mysqli_query($sambungin, "SELECT * FROM tbbarang WHERE kode_barang = '$kode_barang'");
        while ($data = mysqli_fetch_array($query)){
        
        ?>

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4><i class="fa fa-tasks"></i> Ubah Barang</h4>
              <hr>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Barang</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="kode_barang" value="<?php echo $kode_barang ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_barang" value="<?php echo $data['nama_barang'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-5">
                      <?php
                        include "../koneksi.php";
                        echo "<select class='form-control' name='kode_kategori'>";
                        $tampil = mysqli_query($sambungin, "SELECT * FROM tbkategori");
                        while($w = mysqli_fetch_array($tampil)){
                            if($data['kode_kategori'] == $w['kode_kategori']){
                          echo "<option value=$w[kode_kategori] selected>$w[nama_kategori]</option>";
                            }else{
                                echo "<option value=$w[kode_kategori]>$w[nama_kategori]</option>";
                            }

                        }
                          echo "</select>";
                      ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Brand</label>
                  <div class="col-sm-5">
                  <?php
                        echo "<select class='form-control' name='brand'>";

                        echo "<option>Daniel Wellington</option>";
                        echo "<option>Olivia Burton</option>";
                        echo "<option>D1 MILANO</option>";
                        echo "<option>ADIDAS</option>";
                        echo "<option>TIMEX</option>";
                        echo "<option>KOMONO</option>";
                        echo "<option>MVMT</option>";
                        
                        echo "</select>";
                      ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Stok</label>
                  <div class="col-sm-5">
                    <input type="number" class="form-control" name="stok" value="<?php echo $data['stok'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                  <div class="col-sm-5">
                  <?php
                        echo "<select class='form-control' name='lokasi' value='$data[brand]'>";

                        echo "<option>Brankas 1</option>";
                        echo "<option>Brankas 2</option>";
                        echo "<option>Brankas 3</option>";
                        echo "<option>Brankas 4</option>";
                        echo "<option>Brankas 5</option>";
                        echo "<option>Brankas 6</option>";
                        echo "<option>Brankas 7</option>";
                        
                        echo "</select>";
                      ?>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4">
                      <button class="btn btn-primary" name="">Simpan</button>
                      <a href="?hal=dataBarang" class="btn btn-warning">Kembali</a>
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