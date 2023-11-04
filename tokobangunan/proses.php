<?php
$koneksi = mysqli_connect("localhost","root","","tokobangunan");

$namabarang = $_POST['namabarang'];
$hargabarang = $_POST['hargabarang'];
$jumlahbarang = $_POST['jumlahbarang'];
$kodebarang = $_POST['kodebarang'];
$tanggal = $_POST['tanggal'];
$submit = $_POST['submit'];

$query = "INSERT INTO tokobangunan VALUES('$namabarang','$hargabarang','$jumlahbarang','$kodebarang','$tanggal','$submit','')";

mysqli_query($koneksi, $query);

if (isset($_POST["submit"])){
 
  header('Location: read.php');
  exit;
}
?>
