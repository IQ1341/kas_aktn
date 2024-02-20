<?php
include('inc/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $gaji = $_POST['gaji'];
    $tunjangan = $_POST['tunjangan'];

    $query = "INSERT INTO jabatan (kode, nama, gaji, tunjangan) VALUES ('$kode', '$nama', '$gaji', '$tunjangan')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: jabatan.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>
