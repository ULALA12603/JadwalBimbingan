<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include './koneksi/koneksi.php';
  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM mahasiswa WHERE nim='$id'";
    $result = mysqli_query($conn, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
      die("Query Error: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
      echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
    }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='dashbord.php';</script>";
  }
  ?>
  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form | CRUD</title>

    <!-- CSS -->
    <link rel="stylesheet" href="form.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <form action="fragment/edit.php" method="post" enctype="multipart/form-data">
      <h2 class="text">Form Pengajuan Bimbingan</h2>
      <label for="inputState" class="form-label">Foto</label>
      <div class="input-group mb-lg-5">
        <input type="file" name="gambar_profil" class="form-control" id="inputGroupFile02" />
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>

      <div class="row g-3 mb-lg-4">
        <div class="col">
          <input
            type="text"
            class="form-control"
            name="nama_mahasiswa"
            placeholder="Nama Mahasiswa"
            aria-label="First name"
            value="<?php echo $data['nama_mahasiswa']; ?>"
          />
        </div>
        <div class="col">
          <input
            type="text"
            name="nim"
            class="form-control"
            placeholder="Nomor Induk Mahasiswa"
            aria-label="Last name"
            value="<?php echo $data['nim']; ?>"
          />
          </div>
      </div>

      <div class="col-md-4 mb-lg-4">
        <label for="inputState" class="form-label">Program Studi</label>
        <select id="inputState" class="form-select" name="studi">
          <option>Choose...</option>
          <option>Sitem Informasi</option>
          <option>Teknik Informasi</option>
          <option>Ilmu Komunikasi</option>
        </select>
      </div>

      <div class="col-md-4 mb-lg-4">
        <label for="inputState" class="form-label">Dosen</label>
        <select id="inputState" class="form-select" name="dosen">
          <option>Choose...</option>
          <option>Dr. Ali Wahyudin, M.M</option>
          <option>Ir. Subandi, S.H</option>
          <option>Prof. Dr. Sayuti Melik</option>
        </select>
      </div>

      <div class="jadwal">
        <label for="inputState" class="form-label">Jadwal Bimbingan</label>
        <input type="date" name="tanggal" id="" class="button-jadwal" value="<?php echo $data['jadwal_bimbingan']; ?>"/>
      </div>

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href=""
          ><button class="btn btn-primary" name="submit" type="submit">Submit</button></a
        >
        <a href="./dashboard.php"
          ><button class="btn btn-danger" type="button">Cancel</button></a
        >
      </div>
    </form>
  </body>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
</html>
