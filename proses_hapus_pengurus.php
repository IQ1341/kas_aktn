<?php
session_start();
include('inc/koneksi.php');

// Periksa jika pengguna tidak masuk, arahkan kembali ke halaman login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil id pengurus yang akan dihapus
$id_pengurus = $_GET['id'];

// Hapus terlebih dahulu data terkait di tabel penerimaan
$query_hapus_penerimaan = "DELETE FROM pengeluaran WHERE pengurus_id = $id_pengurus";
$result_hapus_penerimaan = mysqli_query($koneksi, $query_hapus_penerimaan);

// Periksa apakah penghapusan penerimaan berhasil
if ($result_hapus_penerimaan) {
    // Jika penghapusan penerimaan berhasil, lanjutkan dengan menghapus pengurus
    $query_hapus_pengurus = "DELETE FROM pengurus WHERE id = $id_pengurus";
    $result_hapus_pengurus = mysqli_query($koneksi, $query_hapus_pengurus);

    // Periksa apakah penghapusan pengurus berhasil
    if ($result_hapus_pengurus) {
        // Redirect atau lakukan tindakan lain setelah penghapusan berhasil
        header("Location: pengurus_hrd.php");
        exit();
    } else {
        // Handle kesalahan jika penghapusan pengurus gagal
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Handle kesalahan jika penghapusan penerimaan gagal
    echo "Error: " . mysqli_error($koneksi);
}
?>
