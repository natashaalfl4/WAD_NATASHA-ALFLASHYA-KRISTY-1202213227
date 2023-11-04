<?php
$koneksi = mysqli_connect("localhost", "root", "", "tokobangunan");
$statistik = query("SELECT * FROM tokobangunan");

function query($data){
  global $koneksi;

  $hasil = mysqli_query($koneksi, $data);
  $rows = [];
  while ($row = mysqli_fetch_assoc($hasil)){
    $rows[] = $row;
  }

  return $rows;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kumpulan Data</title>
  </head>
  <body>
    <h1>Hasil Data</h1>
    <table border = 1 cellpadding = 10 cellspacing = 0>
      <tr>
        <th>Nomor</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Jumlah Barang</th>
        <th>Kode Barang</th>
        <th>Tanggal Pengiriman</th>
        <th>Waktu</th>
        <th colspan = 2>Tindakan</th>
      </tr>

      <?php $y = 1; ?>
      <?php foreach($statistik as $data) : ?>
      <tr>
        <td><?php echo $y; ?></td>
        <td><?php echo $data["namabarang"]; ?></td>
        <td><?php echo $data["hargabarang"]; ?></td>
        <td><?php echo $data["jumlahbarang"]; ?></td>
        <td><?php echo $data["kodebarang"]; ?></td>
        <td><?php echo $data["tanggal"]; ?></td>
        <td><?php echo $data["submit"]; ?></td>
        <td> <a href="update.php?id=<?php echo $data["id"]; ?>">Ubah</a> </td>
        <td> <a href="delete.php?id=<?php echo $data["id"]; ?>">Hapus</a> </td>
      </tr>
      <?php $y++; ?>
      <?php endforeach; ?>
    </table>
    <br>
    <p>Total Data = <?php echo ($y - 1); ?></p>
    <br>
    <a href="index.php">Isi Data</a>
  </body>
</html>
