<?php
include "../koneksi.php";
// nomor otomatis
$query = "SELECT max(kode_barang) as maxKode FROM tbbarang";
$hasil = mysqli_query($sambungin, $query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['maxKode'];
$noUrut = (int) substr($kodeBarang,3,3);
$noUrut ++ ;
$char = "BRG";
$kodeBarang = $char.sprintf("%03s", $noUrut);
echo $kodeBarang;

if($_SERVER['REQUEST_METHOD']=="POST"){
    include "../koneksi.php";
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $kode_kategori = $_POST['kode_kategori'];
        $brand = $_POST['brand'];
        $stok = $_POST['stok'];
        $lokasi = $_POST['lokasi'];

        $simpan = mysqli_query($sambungin, "INSERT INTO tbbarang VALUES('$kode_barang','$nama_barang','$kode_kategori','$brand','$stok','$lokasi')");

           
            echo "
                <meta http-equiv='refresh' content = '0; url=?hal=dataBarang'>
            ";
   
}

?>

<section id="main-content">
<section class="wrapper">

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4><i class="fa fa-tasks"></i> Tambah Barang</h4>
              <hr>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Barang</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="kode_barang" value="<?php echo $kodeBarang ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_barang" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-5">
                      <?php
                        include "../koneksi.php";
                        echo "<select class='form-control' name='kode_kategori'>";
                        $tampil = mysqli_query($sambungin, "SELECT * FROM tbkategori");
                        while($data = mysqli_fetch_array($tampil)){
                          echo "<option value=$data[kode_kategori]>$data[nama_kategori]</option>";
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
                    <input type="number" class="form-control" name="stok" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                  <div class="col-sm-5">
                  <?php
                        echo "<select class='form-control' name='lokasi'>";

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
            </div>
          </div>
          <!-- col-lg-12-->
        </div>

        <br><br>

        <?php
          include "footer.php";
        ?>

</section>
</section>