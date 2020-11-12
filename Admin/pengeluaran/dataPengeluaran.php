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
                <h4><i class="fa fa-forward"></i> Data Pengeluaran</h4>
                <hr>
                <div class="text-center">
                    <button type="button" name="pengeluaran" id="pengeluaran" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">Tambah Pengeluaran</button>
                </div>
                <br>
                <thead>
                <?php
                    include "../koneksi.php";
                    $query = mysqli_query($sambungin, "SELECT*FROM tbpengeluaran left join tbstore on tbpengeluaran.kode_store = tbstore.kode_store left join tblogin on tbpengeluaran.id_login = tblogin.id_login ");

                ?>
                  <tr>
                    
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Kode Keluar</th>
                    <th class="hidden-phone"><i class="fa fa-calendar"></i> Tanggal Keluar</th>
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
                    
                    <td class="hidden-phone"><?php echo $data['kode_keluar'] ?></td>
                    <td class="hidden-phone"><?php echo tgl_indo ($data['tanggal_keluar']); ?></td>
                    <td class="hidden-phone"><?php echo $data['jumlah_item'] ?></td>
                    <td class="hidden-phone"><?php echo $data['nama_store'] ?></td>
                    <td class="hidden-phone"><?php echo $data['nama_admin'] ?></td>
                    <td class="hidden-phone"><?php echo $data['keterangan'] ?></td>
                      <td>
                      <a href="beranda.php?hal=detailPengeluaran&kode_keluar=<?php echo $data['kode_keluar'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-code-fork" data-toggle="tooltip" title="Detail"></i></a>
                      <a href="pengeluaran/hapusPengeluaran.php?kode_keluar=<?php echo $data['kode_keluar'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash-o "></i></a>
                    </td>
                  </tr>
                  <?php
                  }
              ?>
                </tbody>
              </table>

              <a href="pengeluaran/exportPengeluaran.php" class="btn btn-warning">EXPORT</a>
              
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
                  <a href="?hal=tambahPengeluaran&brand=<?php echo $w['brand'] ?>;?hal=hapusSementara&brand=<?php echo $w['brand'] ?>" class="btn btn-primary" style="width:200px;margin-bottom:20px;margin-right:10px;"><input style="visibility: hidden;margin-top:-12px;" type="button"><?php echo $w['brand'] ?></a>
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