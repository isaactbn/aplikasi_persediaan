<?php
if($_GET['hal']=='tambahPengeluaran'){
include "../koneksi.php";
$brand = $_GET['brand'];

// nomor transaksi otomatis

$today = date("Ymd");
$query = "SELECT MAX(RIGHT(kode_keluar, 12)) As akhir FROM tbpengeluaran WHERE RIGHT(kode_keluar,12) LIKE '$today%'";
$hasil = mysqli_query($sambungin, $query);
$data = mysqli_fetch_array($hasil);
$noAkhirKeluar = $data['akhir'];
$noAkhirUrut = substr($noAkhirKeluar, 8, 4);
$noUrutSelanjutnya = $noAkhirUrut + 1;
$noKeluarSelanjutnya = $today . sprintf('%04s', $noUrutSelanjutnya);
$kode = "K";
$no_baru = $kode.$noKeluarSelanjutnya;

//Proses tambah

if($_SERVER['REQUEST_METHOD']== "POST" && isset($_POST['tambah'])) {
    $kode_keluar = $_POST['kode_keluar'];
    $kode_barang = $_POST['kode_barang'];
    $jumlah = $_POST['jumlah'];

// cek apa ada kode barang yang sama di tabel sementara
$cekData = "SELECT kode_barang FROM tbsementara WHERE kode_barang='$kode_barang'";
$ada = mysqli_query($sambungin, $cekData) or die (mysqli_error());
    if(mysqli_num_rows($ada) > 0) {
        //jika ada 1 kode barang yang duplikat di tabel sementara, maka jumlah kode barang tersebut akan ditambahkan melalui proses UPDATE
    $ubah = mysqli_query($sambungin, "UPDATE tbsementara SET jumlah = jumlah + '$jumlah' WHERE kode_barang='$kode_barang'");

    } else {
        //apabila kode barang tidak sama maka akan langsung menambahkan data (INSERT)
        $simpan = mysqli_query($sambungin, "INSERT INTO tbsementara VALUES('','$kode_keluar', '$kode_barang', '$jumlah')");
        if($simpan) {
            echo "<meta http-equiv='refresh' content='0 url=?hal=tambahPengeluaran&brand=$brand'>";
            

    }
}
}

    //Proses simpan data ke tabel penerimaan dan detail penerimaan

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['simpan'])) {
        $kode_keluar = $_POST['kode_keluar'];
        $jumlah_item = $_POST['jumlah_item'];
        $kode_store = $_POST['kode_store'];
        $id_login = $_SESSION['id_login'];
        $keterangan = $_POST['keterangan'];

        $simpanData = mysqli_query($sambungin, "INSERT INTO tbpengeluaran VALUES ('$kode_keluar','$today','$jumlah_item','$kode_store','$id_login','$keterangan')");

        if($simpanData) {
            // Pindahkan Data yang ada di tabel sementara ke tabel detail_penerimaan 

            $simpanTMP = mysqli_query($sambungin, "INSERT INTO tbdetail_pengeluaran (kode_keluar, kode_barang, jumlah_barang) SELECT kode, kode_barang, jumlah FROM tbsementara");
            
            $simpanGabungKeluar = mysqli_query($sambungin, "INSERT INTO tbgabung_transaksi (kode, tanggal, kode_barang, jumlah_barang, ket) SELECT kode, '$today', kode_barang, jumlah, 'KELUAR' FROM tbsementara");

            $simpanGabungMasuk = mysqli_query($sambungin, "INSERT INTO tbgabung_transaksi (kode, tanggal, kode_barang, jumlah_barang, ket) SELECT kode, '$today', kode_barang, 0, 'MASUK' FROM tbsementara");

            // Setelah data yang ada di tabel data sementara dipindahkan ke tabel detail, maka hapus semua data yang ada di tabel sementara

            $hapusTMP = mysqli_query($sambungin, "DELETE FROM tbsementara") or die(mysqli_error());

            echo "<script>window.alert('Data Pengeluaran Barang berhasil Disimpan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?hal=dataPengeluaran'>";
        }
    }

?>

<section id="main-content">
    <section class="wrapper">
        <div class="form-panel">
            <h3><i class="fa fa-forward"></i> Tambah Data Pengeluaran</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                <label>No. Keluar</label>
                                <input class="form-control" type="text" name="kode_keluar" value="<?php echo $no_baru ?>" readonly>
                                
                                </div>

                                <div class="form-group">
                                <label>Brand</label>
                                
                                    <input class="form-control" type="text" name="brand" id="brand" value="<?php echo $brand ?>" readonly>
                                
                                </div>

                                <div class="form-group">
                                <label>Nama Barang</label>
                                <select class="form-control" type="text" name="kode_barang" id="kode_barang" onchange="changeValue(this.value)">
                                <?php
                                    $tampil = mysqli_query($sambungin, "SELECT * FROM tbbarang WHERE brand = '$brand'");
                                        
                                    while($w=mysqli_fetch_array($tampil)) {
                                        echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
                                    }
                                    
                                ?>
                                </select>
                                
                                </div>

                                <div class="form-group">
                                <label>Jumlah</label>
                                <input class="form-control" type="text" name="jumlah" required="">
                                
                                </div>

                                <div class="form-group">
                                <button class="btn btn-primary" name="tambah">Tambah</button>                                
                                </div>

                            </form>
                        
                        </div> <!-- akhir row kiri -->

                            <div class="col-md-6">
                                <table class="table table-striped table-advance table-hover">
                                    <thead>
                                        <?php
                                            include "../koneksi.php";
                                            $query = mysqli_query($sambungin, "SELECT * FROM tbsementara left join tbbarang on tbsementara.kode_barang = tbbarang.kode_barang");
                                        ?>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <?php
                                            while($data = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                            <td><?php echo $data['kode_barang'] ?></td>
                                            <td><?php echo $data['nama_barang'] ?></td>
                                            <td><?php echo $data['jumlah'] ?></td>
                                            <td>
                                                <a href="pengeluaran/hapusSementara.php?id=<?php echo $data['id'] ?>&brand=<?php echo $brand ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger" name="hapus"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            </tr>

                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    
                                </table>
                            
                            
                            </div>

                    </div>

                </div>
            </div>

        </div> <!-- akhir panel 1 -->

        <div class="form-panel"> <!-- panel 2 -->
            <h3><i class="fa fa-save"></i> Simpan Data Pengeluaran</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                <label>No. Keluar</label>
                                <input class="form-control" type="text" name="kode_keluar" value="<?php echo $no_baru ?>" readonly>
                                
                                </div>

                                <div class="form-group">
                                <label>Tujuan Barang</label>
                                <select class="form-control" type="text" name="kode_store" id="kode_store" onchange="changeValue(this.value)" >
                                <?php
                                    $tampil = mysqli_query($sambungin, "SELECT * FROM tbstore WHERE ext = 'Store'");
                                    while($w = mysqli_fetch_array($tampil)) {
                                        echo "<option value =$w[kode_store] selected>$w[nama_store]</option>";
                                    }
                                    
                                ?>
                                </select>
                                </div>

                                <div class="form-group">
                                <label>Keterangan</label>
                                <input class="form-control" type="text" name="keterangan" id="keterangan" required="">
                                
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary" name="simpan">Simpan</button>
                                    <a href="beranda.php?hal=dataPengeluaran" class="btn btn-info">Kembali</a>
                                
                                </div>
                                
                        </div> <!-- akhir row kiri -->

                            <div class="col-md-6">
                                
                            <div class="form-group">
                                <label>Pemberi</label>
                                <input class="form-control" type="text" name="penerima" id="penerima" value="<?php echo $_SESSION['nama_admin'] ?>" readonly>
                                
                                </div>
                            
                                <?php
                                    // Hitung jumlah item yang akan disimpan
                                    include "../koneksi.php";
                                    $item = mysqli_query($sambungin, "SELECT kode_barang FROM tbsementara");
                                    $jumlahItem = mysqli_num_rows($item);

                                ?>

                            <div class="form-group">
                                <label>Jumlah Item Barang</label>
                                <input class="form-control" type="text" name="jumlah_item" value="<?php echo $jumlahItem ?>" readonly>
                                
                                </div>
                            </form>
                            
                            </div>

                    </div>

                </div>
            </div>

        </div> <!-- akhir panel 2 -->

        <br>

        <?php
          include "footer.php";
        ?>

    </section>
</section>
<?php
}
?>