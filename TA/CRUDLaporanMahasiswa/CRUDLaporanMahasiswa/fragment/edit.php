<?php
// memanggil file koneksi.php untuk melakukan koneksi database 
include '../koneksi/koneksi.php';

// membuat variabel untuk menampung data dari form

$nim = $_POST['nim'];
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$studi = $_POST['studi'];
$dosen = $_POST['dosen'];
$jadwal = $_POST['tanggal'];
$gambar = $_FILES['gambar_profil']['name'];
  
//cek dulu jika ada gambar produk jalankan coding ini

if($gambar != "") {
  $ekstensi_diperbolehkan = array('png','jpg', 'jpeg', 'svg' ); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_profil']['tmp_name'];
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {     
                move_uploaded_file($file_tmp, '../image/'.$gambar); //memindah file gambar ke folder gambar
                  // jalankan query UPDATE untuk mengubah data ke database pastikan sesuai urutan
                  $query = "UPDATE `mahasiswa` SET `nim`='$nim',`nama_mahasiswa`='$nama_mahasiswa',`program_studi`='$studi',`dosen`='$dosen',`jadwal_bimbingan`='$jadwal',`foto`='$gambar' WHERE nim = '$nim'";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman dashboard
                    echo "<script>alert('Data berhasil diubah.');window.location='../dashboard.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi file yang boleh hanya jpg, svg, jpeg, dan png.');window.location='../addmahasiswa.php';</script>";
            }
} else {
    $query = "UPDATE `mahasiswa` SET `nim`='$nim',`nama_mahasiswa`='$nama_mahasiswa',`program_studi`='$studi',`dosen`='$dosen',`jadwal_bimbingan`='$jadwal',`foto`=null WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);
    // periska query apakah ada error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($conn).
             " - ".mysqli_error($conn));
    } else {
      //tampil alert dan akan redirect ke halaman dashboard
      echo "<script>alert('Data berhasil diubah.');window.location='../dashboard.php';</script>";
    }
}