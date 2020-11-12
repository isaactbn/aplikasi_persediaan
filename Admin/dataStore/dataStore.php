<section id="main-content">
<section class="wrapper">

<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-building"></i> Data Store dan Suplier</h4>
                <hr>
                <div class="text-center">
                    <a href="?hal=tambahStore" class="btn btn-primary">Tambah Data</a>
                </div>
                <br>
                <thead>
                <?php
                    include "../koneksi.php";
                    $query = mysqli_query($sambungin, "SELECT*FROM tbstore ");

                ?>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Kode Store/Suplier</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nama </th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Keterangan</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nama Superviser</th>
                    
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                <?php
                  while($data = mysqli_fetch_array($query)){
                ?>
                  
                    <td class="hidden-phone"><?php echo $data['kode_store'] ?></td>
                    <td class="hidden-phone"><?php echo $data['nama_store'] ?></td>
                    <td class="hidden-phone"><?php echo $data['ext'] ?></td>
                    <td class="hidden-phone"><?php echo $data['nama_superviser'] ?></td>
                    
                      <td>
                      <a href="beranda.php?hal=ubahStore&kode_store=<?php echo $data['kode_store'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="dataStore/hapusStore.php?kode_store=<?php echo $data['kode_store'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash-o "></i></a>
                    </td>
                  </tr>
                  <?php
                  }
              ?>
                </tbody>
              </table>
              
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
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