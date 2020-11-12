<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    include "../koneksi.php";
        $nama_kategori = $_POST['nama_kategori'];

        $simpan = mysqli_query($sambungin, "INSERT INTO tbkategori VALUES('','$nama_kategori')");

            
            echo "
                <meta http-equiv='refresh' content = '0; url=?hal=dataKategori'>
            ";
}

?>

<section id="main-content">
<section class="wrapper">

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4><i class="fa fa-tags"></i> Tambah Kategori</h4>
              <hr>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kategori</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_kategori" required="">
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-4">
                      <button class="btn btn-primary" name="">Simpan</button>
                      <a href="?hal=dataKategori" class="btn btn-warning">Kembali</a>
                  </div>
                </div>
                
              </form>
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