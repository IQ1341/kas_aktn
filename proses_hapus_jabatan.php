<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('inc/koneksi.php');

// Pastikan parameter ID ada dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Lakukan proses hapus di database
    $query = "DELETE FROM jabatan WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika proses hapus berhasil, arahkan kembali ke halaman master data jabatan
        header("Location: jabatan.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    // Jika parameter ID tidak ada, tampilkan pesan error
    echo "ID tidak ditemukan";
}
?>
