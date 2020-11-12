<section id="main-content">
    <section class="wrapper">
        <div class="col-md-6">
            <div class="form-panel">
                <h3><i class="fa fa-file-o"></i> Laporan Penerimaan Barang </h3>
                    <form method="POST" action="laporan/laporanPenerimaan.php" target="_blank">
                        <div class="form-group">
                            <label> Tanggal Awal </label>
                            <input class="form-control" type="date" name="tgl_awal">

                        </div>

                        <div class="form-group">
                            <label> Tanggal Awal </label>
                            <input class="form-control" type="date" name="tgl_akhir">

                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" name="cetakPenerimaan"><i class="fa fa-print"></i> Cetak </button>
                        </div>
                    
                    </form>

            </div> <!-- Akhir Panel -->

        </div>

        <div class="col-md-6">
            <div class="form-panel">
                <h3><i class="fa fa-file-o"></i> Laporan Pengeluaran Barang </h3>
                    <form method="POST" action="laporan/laporanPengeluaran.php" target="_blank">
                        <div class="form-group">
                            <label> Tanggal Awal </label>
                            <input class="form-control" type="date" name="tgl_awal" required>

                        </div>

                        <div class="form-group">
                            <label> Tanggal Awal </label>
                            <input class="form-control" type="date" name="tgl_akhir" required>

                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" name="cetakPenerimaan"><i class="fa fa-print"></i> Cetak </button>
                        </div>
                    
                    </form>

            </div> <!-- Akhir Panel -->

        </div>

        <div class="row">
          <div class="col-lg-9 main-chart">
          </div>
        </div>

        <br><br><br><br><br>
        <br><br><br><br>

        <?php
        include "footer.php";
        ?>

    </section>
</section>