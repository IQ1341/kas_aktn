<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include('inc/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['edit_id'];
    $nomor_nota = $_POST['edit_nomor_nota'];
    $tanggal = $_POST['edit_tanggal'];
    $pengurus_id = $_POST['edit_pengurus_id'];
    $keterangan = $_POST['edit_keterangan'];
    $jumlah = $_POST['edit_jumlah'];

    $query = "UPDATE pengeluaran SET nomor_nota='$nomor_nota', tanggal='$tanggal', pengurus_id='$pengurus_id', keterangan='$keterangan', jumlah='$jumlah' WHERE id='$id'";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: penerima_kas.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>
