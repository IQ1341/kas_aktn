<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('inc/koneksi.php');

// Pastikan data yang diterima valid
if (isset($_POST['edit_id']) && isset($_POST['edit_kode']) && isset($_POST['edit_nama']) && isset($_POST['edit_gaji']) && isset($_POST['edit_tunjangan'])) {
    $id = $_POST['edit_id'];
    $kode = $_POST['edit_kode'];
    $nama = $_POST['edit_nama'];
    $gaji = $_POST['edit_gaji'];
    $tunjangan = $_POST['edit_tunjangan'];

    // Lakukan proses update di database
    $query = "UPDATE jabatan SET kode='$kode', nama='$nama', gaji='$gaji', tunjangan='$tunjangan' WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika proses update berhasil, arahkan kembali ke halaman master data jabatan
        header("Location: jabatan.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    // Jika data tidak lengkap, tampilkan pesan error
    echo "Data yang diterima tidak lengkap";
}
?>
