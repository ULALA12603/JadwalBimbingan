<?php
    // Periksa apakah form telah disubmit
    if (isset($_POST['submit'])) {
        echo "<script>alert('BERHASIL MASUK'); window.location.href='../dashboard.php';</script>";
        exit();
    }
?>
