<?php
require_once "koneksi.php";
require_once "assets/fpdf/fpdf.php";

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', '16');
$pdf->Cell(0,20,'Laporan Data Pelanggan','0',1,'C');
$pdf->SetFont('Arial', 'B', '11');

$pdf->SetFont('Arial', '', '11');
$pdf->SetFillColor(70, 130, 180);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128, 128, 128);
$pdf->Cell(10,7,'No',1,'0', 'C',true);
$pdf->Cell(35,7,'Nama Pelanggan',1,'0', 'C',true);
$pdf->Cell(48,7,'Nama Barang',1,'0', 'C',true);
$pdf->Cell(18,7,'Harga',1,'0', 'C',true);
$pdf->Cell(25,7,'Alamat',1,'0', 'C',true);
$pdf->Cell(20,7,'No Telp',1,'0', 'C',true);
$pdf->Cell(33,7,'Status',1,'0', 'C',true);
$pdf->Ln();

$pdf->SetFont('Arial', '',11);
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$i=0;
$tampil = mysqli_query($conn, "SELECT * FROM checkout WHERE status ='Disetujui' ORDER BY nama ASC");
$count  = mysqli_num_rows($tampil);
if($count == 0) {
    $pdf->SetFont('Arial', 'B', '16');
    $pdf->Cell(189,7,'Data Kosong',1,'0', 'C',true);
    $pdf->SetFont('Arial', 'B', '11');
}
while($data=mysqli_fetch_array($tampil)){
    $i++;
    $pdf->Cell(10,7, $i, 1, '0','C', true);
    $pdf->Cell(35,7, $data['nama'], 1, '0', '0',true);
    $pdf->Cell(48,7, $data['namabarang'], 1, '0', 'L', true);
    $pdf->Cell(18,7, $data['harga'], 1, '0', 'C', true);
    $pdf->Cell(25,7, $data['alamat'], 1,'0', 'C', true);
    $pdf->Cell(20,7, $data['telp'], 1,'0', 'C', true);
    $pdf->Cell(33,7, $data['status'], 1,'0', 'C', true);
    $pdf->Ln();
}
$pdf->Output('i','Laporan Data Pelanggan Apoteker.pdf','false'); 
?>