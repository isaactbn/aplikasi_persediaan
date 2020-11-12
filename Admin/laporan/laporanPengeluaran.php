<?php
    include "../../koneksi.php";
    include "../../fpdf17/fpdf.php";
    include "../fungsiTanggal.php";
    $tgl_awal = $_POST['tgl_awal'];
    $tgl_akhir = $_POST['tgl_akhir'];

$pdf = new FPDF ('L', 'mm', array(210,297)); //tipe kertasP potrait, L lanscape, mm milimeter, '210,297' ukuran kertas
$pdf->addPage();

$pdf-> SetFont('Arial', 'B', 18); //tipe font, bold, ukuran font
$pdf-> Cell(60);
$pdf->Cell(155,10,'Laporan Pengeluaran Barang', 0, 1, 'C');
$pdf-> SetFont('Arial', 'B', 14); //tipe font, bold, ukuran font
$pdf-> Cell(60);
$pdf->Cell(155,10,'PT. Kami Gawi Berjaya', 0, 1, 'C');
$pdf->Ln(2);

$pdf-> SetFont('Arial', 'B', 12); //tipe font, bold, ukuran font
$pdf-> Cell(27,6, 'Tanggal', 1,0,'C');
$pdf-> Cell(35,6, 'Kode Keluar', 1,0,'C');
$pdf-> Cell(90,6, 'Nama Barang', 1,0,'C');
$pdf-> Cell(32,6, 'Jumlah Barang', 1,0,'C');
$pdf-> Cell(66,6, 'Nama Store', 1,0,'C');
$pdf-> Cell(27,6, 'Keterangan', 1,0,'C');

$query = mysqli_query($sambungin, "SELECT DISTINCT * FROM tbpengeluaran LEFT JOIN tbdetail_pengeluaran ON tbpengeluaran.kode_keluar = tbdetail_pengeluaran.kode_keluar LEFT JOIN tbbarang ON tbdetail_pengeluaran.kode_barang = tbbarang.kode_barang LEFT JOIN tbstore ON tbpengeluaran.kode_store = tbstore.kode_store WHERE (tbpengeluaran.tanggal_keluar BETWEEN '$tgl_awal' AND '$tgl_akhir') GROUP BY tbpengeluaran.kode_keluar");
while ($data = mysqli_fetch_array($query)) {

    $pdf->Ln(6);
    $pdf-> SetFont('Arial', 'B', 12); //tipe font, bold, ukuran font
    $pdf-> Cell(27,6, tgl_indo($data['tanggal_keluar']), 1,0,'C');
    $pdf-> Cell(35,6, $data['kode_keluar'], 1,0,'C');
    $pdf-> Cell(90,6, $data['nama_barang'], 1,0,'C');
    $pdf-> Cell(32,6, $data['jumlah_barang'], 1,0,'C');
    $pdf-> Cell(66,6, $data['nama_store'], 1,0,'C');
    $pdf-> Cell(27,6, $data['keterangan'], 1,0,'C');
}


$pdf->Output();


?>