<?php
include '../koneksi/koneksi.php';
$id = $_GET["id"];
//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM mahasiswa WHERE nim='$id' ";
$hasil_query = mysqli_query($conn, $query);
//periksa query, apakah ada kesalahan
if (!$hasil_query) {
  die("Gagal menghapus data: " . mysqli_errno($conn) .
    " - " . mysqli_error($conn));
} else {
  echo "<script>alert('Data berhasil dihapus.');window.location='../dashboard.php';</script>";
}