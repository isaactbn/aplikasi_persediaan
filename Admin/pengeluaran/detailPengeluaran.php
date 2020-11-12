<?php
include "../koneksi.php";
include "fungsiTanggal.php";
$kode_keluar = $_GET['kode_keluar'];

$dataAtas = mysqli_query($sambungin, "SELECT * FROM tbpengeluaran LEFT JOIN tbstore ON tbpengeluaran.kode_store = tbstore.kode_store WHERE tbpengeluaran.kode_keluar = '$kode_keluar'");
$x = mysqli_fetch_array($dataAtas);
?>

<section id="main-content">
    <section class="wrapper">
        <div class="col-lg-12 mt">
            <div class="row content-panel">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="pull-left">
                        <h2>Detail Pengeluaran Barang</h2>
                    </div>
                <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-5">
                            
                            <div>
                                <div class="pull-left">NOMOR KELUAR :</div>
                                <div class="pull-right"><?php echo $x['kode_keluar'] ?></div>
                                <div class="clearfix"></div>
                            </div>
                            <div>
                                <div class="pull-left">TANGGAL KELUAR :</div>
                                <div class="pull-right"><?php echo tgl_indo( $x['tanggal_keluar']); ?></div>
                                <div class="clearfix"></div>
                            </div>
                            <div>
                                <div class="pull-left">Asal Barang :</div>
                                <div class="pull-right"><?php echo $x['nama_store'] ?></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                            
                    </div>
                    <br>
                        <table class="table">
                            <thead>
                                <?php
                                    include "../koneksi.php";
                                    $dataBawah = mysqli_query($sambungin, "SELECT * FROM tbpengeluaran left join tbdetail_pengeluaran on tbpengeluaran.kode_keluar = tbdetail_pengeluaran.kode_keluar left join tbbarang on tbdetail_pengeluaran.kode_barang = tbbarang.kode_barang where tbpengeluaran.kode_keluar = '$kode_keluar'");
                                ?>
                                <tr>
                                    <th style="width: 100px">KODE BARANG</th>
                                    <th class="text-left">NAMA BARANG</th>
                                    <th style="width: 30px">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($data = mysqli_fetch_array($dataBawah)){
                                ?>  
                                <tr>
                                    <td><?php echo $data['kode_barang'] ?></td>
                                    <td><?php echo $data['nama_barang'] ?></td>
                                    <td><?php echo $data['jumlah_barang'] ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>

                        </table>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <a href="beranda.php?hal=dataPengeluaran" class="btn btn-info">Kembali</a>
                            </div>
                        
                        </div>
                </div>

            </div>
            
        </div>

        <div class="row">
          <div class="col-lg-9 main-chart">
          </div>
        </div>

        <br><br><br><br>
        <br><br><br>

        <?php
          include "footer.php";
        ?>

    </section>
</section>