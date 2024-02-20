<?php
include 'koneksi.php';

$nip = $_POST['nip'];
// Ambil data pengurus lainnya dari form
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$jabatan_id = $_POST['jabatan_id'];
$nomor_hp = $_POST['nomor_hp'];

$query = "INSERT INTO pengurus (nip, nama, jenis_kelamin, alamat, jabatan_id, nomor_hp) VALUES ('$nip', '$nama', '$jenis_kelamin', '$alamat', '$jabatan_id', '$nomor_hp')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header('Location: pengurus.php');
} else {
    echo 'Gagal menambah pengurus. <a href="pengurus.php">Kembali</a>';
}
?>
