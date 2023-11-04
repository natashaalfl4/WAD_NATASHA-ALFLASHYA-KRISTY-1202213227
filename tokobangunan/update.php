<?php
date_default_timezone_set("Asia/Jakarta");
?>
<?php
$koneksi = mysqli_connect("localhost", "root", "", "tokobangunan");
$id = $_GET['id'];
$data = query("SELECT * FROM tokobangunan WHERE id = $id")[0];

function query($data){
  global $koneksi;

  $hasil = mysqli_query($koneksi, $data);
  $rows = [];
  while ($row = mysqli_fetch_assoc($hasil)){
    $rows[] = $row;
  }

  return $rows;
}

if ( isset($_POST["submit"]) ){
  if (ubah($_POST) > 0){
    echo 
    "<script>
     alert('Data berhasil diubah'); 
    header('Location: read.php');
    </script>";
  }
  else{
    echo "<script> 
    alert('Data gagal diubah'); 
    header('Location: read.php');
    </script>";
  }
}

function ubah($sambung){
  global $koneksi;

  $id = $sambung['id'];
  $namabarang = $sambung["namabarang"];
  $hargabarang = $sambung["hargabarang"];
  $jumlahbarang = $sambung["jumlahbarang"];
  $kodebarang = $sambung["kodebarang"];
  $tanggal = $sambung["tanggal"];
  $submit = $sambung["submit"];

  $query = "UPDATE tokobangunan SET namabarang = '$namabarang', hargabarang = '$hargabarang', jumlahbarang = '$jumlahbarang', kodebarang = '$kodebarang', tanggal = '$tanggal', submit = '$submit' WHERE id = $id";

  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Ubah Data</h1>
    <form class="" action="" method="post">
      <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
      <label for="">Nama Barang</label>
      <input type="text" name="namabarang" autocomplete = "off" value = "<?php echo $data['namabarang']; ?>"> <br>
      <label for="">Harga Barang</label>
      <input type="text" name="hargabarang" autocomplete = "off" value = "<?php echo $data['hargabarang']; ?>"> <br>
      <label for="">Jumlah Barang</label>
      <input type="text" name="jumlahbarang" autocomplete="off" value = "<?php echo $data['jumlahbarang']; ?>"> <br>
      <label for="">Kode Barang</label>
      <input type="text" name="kodebarang" autocomplete="off" value = "<?php echo $data['kodebarang']; ?>"> <br>
      <label for="">Tanggal Pengiriman</label> <br>
      <input type="text" name="tanggal" autocomplete="off" value = "<?php echo $data['tanggal']; ?>"> <br>
      <button type="submit" name="submit" value = <?php echo date("h:i:sa"); ?> >Submit</button>
    </form>
    <a href="read.php">Lihat hasil data</a>
  </body>
</html>
