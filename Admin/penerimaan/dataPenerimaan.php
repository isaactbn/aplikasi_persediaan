<?php
  include "../koneksi.php";
  include "fungsiTanggal.php";
?>

<section id="main-content">
<section class="wrapper">

<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-backward"></i> Data Penerimaan</h4>
                <hr>
                <div class="text-center">
                    <button type="button" name="penerimaan" id="penerimaan" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Tambah Penerimaan</button>
                </div>
                <br>
                <thead>
                <?php
                    include "../koneksi.php";
                    $query = mysqli_query($sambungin, "SELECT * FROM tbpenerimaan left join tbstore on tbpenerimaan.kode_store = tbstore.kode_store left join tblogin on tbpenerimaan.id_login = tblogin.id_login ");

                ?>
                  <tr>
                    
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Kode Terima</th>
                    <th class="hidden-phone"><i class="fa fa-calendar"></i> Tanggal Terima</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Jumlah Item</th>
                    <th class="hidden-phone"><i class="fa fa-building"></i> Asal Barang</th>
                    <th class="hidden-phone"><i class="fa fa-user"></i> Nama Admin</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Keterangan</th>
                    
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                <?php
                  while($data = mysqli_fetch_array($query)){
                ?>

                    <td class="hidden-phone"><?php echo $data['kode_terima'] ?></td>
                    <td class="hidden-phone"><?php echo tgl_indo ($data['tanggal_terima']); ?></td>
                    <td class="hidden-phone"><?php echo $data['jumlah_item'] ?></td>
                    <td class="hidden-phone"><?php echo $data['nama_store'] ?></td>
                    <td class="hidden-phone"><?php echo $data['nama_admin'] ?></td>
                    <td class="hidden-phone"><?php echo $data['keterangan'] ?></td>
                      <td>
                      <a href="beranda.php?hal=detailPenerimaan&kode_terima=<?php echo $data['kode_terima'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-code-fork" data-toggle="tooltip" title="Detail"></i></a>
                      <a href="penerimaan/hapusPenerimaan.php?kode_terima=<?php echo $data['kode_terima'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash-o "></i></a>
                    </td>
                  </tr>
                  <?php
                  }
              ?>
                </tbody>
              </table>

              <a href="penerimaan/exportPenerimaan.php" class="btn btn-warning">EXPORT</a>
              
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>

        <div id="add_data_Modal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header" style="background-color: #ffb94b;
            background-image: -webkit-linear-gradient(top, #ffb94b, #ff6600);
            background-image: -moz-linear-gradient(top, #ffb94b, #ff6600);
            background-image: -ms-linear-gradient(top, #ffb94b, #ff6600);
            background-image: -o-linear-gradient(top, #ffb94b, #ff6600);
            background-image: linear-gradient(top, #ffb94b, #ff6600);">
              <h4 class="text-center">Pilih Jenis Brand</h4>
            </div>
            <div class="modal-body">
              <div class="text-center">
              <?php
                  $tampil = mysqli_query($sambungin, "SELECT DISTINCT brand FROM tbbarang");
                  while($w=mysqli_fetch_array($tampil)) {
              ?>
                  <a href="?hal=tambahPenerimaan&brand=<?php echo $w['brand'] ?>;?hal=hapusSementara&brand=<?php echo $w['brand'] ?>" class="btn btn-primary" style="width:200px;margin-bottom:20px;margin-right:10px;"><input style="visibility: hidden;margin-top:-12px;" type="button"><?php echo $w['brand'] ?></a>
              <?php    
                } 
              ?>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
          </div>
        </div>
        

        <br>
        <br>
        <br>
        <br>
       
        <?php
        include "footer.php";
        ?>

</section>
</section>