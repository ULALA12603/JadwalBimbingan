<?php
require_once './koneksi/koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT * FROM `mahasiswa`";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

//mengecek apakah ada error ketika menjalankan query
if(!$result){
  die ("Query Error: ".mysqli_errno($conn).
     " - ".mysqli_error($conn));
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | CRUD</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style/dashboard.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <header class="sticky-top">
      <h2>Dashboard</h2>
      <li>
        <div class="dropdown">
          <button
            class="btn btn-transparent dropdown-toggle fw-bold"
            type="button"
            id="dropdownMenuButton1"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            Dropdown button
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>

        <div class="dropdown">
          <button
            class="btn btn-transparent dropdown-toggle fw-bold"
            type="button"
            id="dropdownMenuButton1"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            Dropdown button
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>

        <div class="dropdown">
          <button
            class="btn btn-transparent btn-font-weight dropdown-toggle fw-bold" 
            type="button"
            id="dropdownMenuButton1"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            Dropdown button
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
          </div>
      </li>
    </header>
    
    <div class="button-tambah">
     <a href="./addmahasiswa.php"><img src="asset/plus-circle (1).svg" alt="" srcset=""></a>
     <?php if ($count == 0) { ?>
      <h1>Tidak ada Data</h1>
     <?php }else{?>
    <table class="m-auto border border-2 border-dark" >
      <thead>
        <tr class=" border border-2 border-dark">
          <th class=" border border-2 border-dark">No</th>
          <th class=" border border-2 border-dark">Produk</th>
          <th class=" border border-2 border-dark">Dekripsi</th>
          <th class=" border border-2 border-dark">Harga Beli</th>
          <th class=" border border-2 border-dark">Harga Jual</th>
          <th class=" border border-2 border-dark">Gambar</th>
          <th class=" border border-2 border-dark">Action</th>
        </tr>
    </thead>
    <tbody >
      <?php

      //buat perulangan untuk element tabel dari data mahasiswa
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr class=" border border-2 border-dark">
          <td class=" border border-2 border-dark"><?php echo $row['nim'];  ?></td>
          <td class=" border border-2 border-dark"><?php echo $row['nama_mahasiswa']; ?></td>
          <td class=" border border-2 border-dark"><?php echo $row['program_studi'];?></td>
          <td class=" border border-2 border-dark"><?php echo $row['dosen']; ?></td>
          <td class=" border border-2 border-dark"><?php echo $row['jadwal_bimbingan']; ?></td>
          <td class=" border border-2 border-dark" style="text-align: center;"><img src="image/<?php echo $row['foto']; ?>" style="width: 120px;"></td>
          <td class=" border border-2 border-dark">
              <a href="editmahasiswa.php?id=<?php echo $row['nim']; ?>">Edit</a> |
              <a href="./fragment/delete.php?id=<?php echo $row['nim']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
      }}
      ?>
    </tbody>
    </table>

    </div>
  </body>

  <!-- CDN Bootstrap -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
</html>
