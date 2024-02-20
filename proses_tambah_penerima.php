<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('inc/koneksi.php');

// Pastikan data yang diterima valid
if (isset($_POST['nomor_nota']) && isset($_POST['tanggal']) && isset($_POST['pengurus_id']) && isset($_POST['jumlah'])) {
    $nomor_nota = $_POST['nomor_nota'];
    $tanggal = $_POST['tanggal'];
    $pengurus_id = $_POST['pengurus_id'];
    $donatur = isset($_POST['donatur']) ? $_POST['donatur'] : '';
    $keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : '';
    $jumlah = $_POST['jumlah'];

    // Lakukan proses tambah penerimaan kas ke database
    $query = "INSERT INTO penerimaan (nomor_nota, tanggal, pengurus_id, donatur, keterangan, jumlah) VALUES ('$nomor_nota', '$tanggal', '$pengurus_id', '$donatur', '$keterangan', '$jumlah')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika proses tambah berhasil, arahkan kembali ke halaman penerimaan kas
        header("Location: penerima_kas.php");
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
