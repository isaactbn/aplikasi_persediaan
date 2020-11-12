<?php

$kode_kategori = $_GET['kode_kategori'];

if($_SERVER['REQUEST_METHOD']=="POST"){
    include "../koneksi.php";
        $nama_kategori = $_POST['nama_kategori'];

        $simpan = mysqli_query($sambungin, "UPDATE tbkategori SET nama_kategori='$nama_kategori' WHERE kode_kategori='$kode_kategori'");

            
            echo "
                <meta http-equiv='refresh' content = '0; url=?hal=dataKategori'>
            ";  
}

?>

<section id="main-content">
<section class="wrapper">

        <?php
        include "../koneksi.php";
        $query = mysqli_query($sambungin, "SELECT * FROM tbkategori WHERE kode_kategori='$kode_kategori'");

        while($data = mysqli_fetch_array($query)){
        ?>

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4><i class="fa fa-tags"></i> Ubah Kategori</h4>
              <hr>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kategori</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_kategori" value="<?php echo $data['nama_kategori'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4">
                      <button class="btn btn-primary" name="">Simpan</button>
                      <a href="?hal=dataKategori" class="btn btn-warning">Kembali</a>
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

        <br><br><br><br>
        <br><br><br><br>
        <br><br><br><br>

        <?php
          include "footer.php";
        ?>

</section>
</section>