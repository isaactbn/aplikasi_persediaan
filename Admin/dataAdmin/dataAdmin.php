<section id="main-content">
  <section class="wrapper">

<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-user"></i> Data Admin</h4>
                <hr>
                <div class="text-center">
                    <a href="?hal=tambahAdmin" class="btn btn-primary">Tambah Admin</a>
                </div>
                <br>
                <thead>
                <?php
                    include "../koneksi.php";
                    $query = mysqli_query($sambungin, "SELECT*FROM tblogin");

                ?>
                  <tr>
                    <th><i class="fa fa-user"></i> Profil </th>
                    <th><i class="fa fa-bullhorn"></i> Kode Admin</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Nama Admin</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Status </th>
                    
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                <?php
                  while($data = mysqli_fetch_array($query)){
                ?>
                    
                    <td class="hidden-phone"><img src="dataAdmin/images/<?php echo $data['profil'] ?>" style="width:30px;height:35px"></td>
                    <td class="hidden-phone"><?php echo $data['id_login'] ?></td>
                    <td class="hidden-phone"><?php echo $data['nama_admin'] ?></td>
                    <td class="hidden-phone"><?php echo $data['status_admin'] ?></td>
                    
                      <td>
                      <a href="beranda.php?hal=ubahAdmin&id_login=<?php echo $data['id_login'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="dataAdmin/hapusAdmin.php?id_login=<?php echo $data['id_login'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash-o "></i></a>
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

        <br><br><br><br>
        <br><br><br><br>

        <?php
          include "footer.php";
        ?>

  </section>
</section>