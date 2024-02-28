<?php
session_start();
include('inc/koneksi.php');

// Periksa jika pengguna tidak masuk, arahkan kembali ke halaman login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil id jabatan yang akan dihapus
$id_jabatan = $_GET['id'];

// Hapus terlebih dahulu data pengurus yang terkait dengan jabatan yang akan dihapus
$query_hapus_pengurus = "DELETE FROM pengurus WHERE id_jabatan = $id_jabatan";
$result_hapus_pengurus = mysqli_query($koneksi, $query_hapus_pengurus);

// Periksa apakah penghapusan pengurus berhasil
if ($result_hapus_pengurus) {
    // Jika penghapusan pengurus berhasil, lanjutkan dengan menghapus jabatan
    $query_hapus_jabatan = "DELETE FROM jabatan WHERE id = $id_jabatan";
    $result_hapus_jabatan = mysqli_query($koneksi, $query_hapus_jabatan);

    // Periksa apakah penghapusan jabatan berhasil
    if ($result_hapus_jabatan) {
        // Redirect atau lakukan tindakan lain setelah penghapusan berhasil
        header("Location: jabatan_hrd.php");
        exit();
    } else {
        // Handle kesalahan jika penghapusan jabatan gagal
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Handle kesalahan jika penghapusan pengurus gagal
    echo "Error: " . mysqli_error($koneksi);
}
?>
