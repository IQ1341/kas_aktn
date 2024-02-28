<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('inc/koneksi.php');

// Pastikan data yang diterima valid
if (isset($_POST['nama']) && isset($_POST['id_jabatan']) && isset($_POST['telepon']) && isset($_POST['email']) && isset($_POST['alamat']) && isset($_POST['jenis_kelamin'])) {
    $nama = $_POST['nama'];
    $id_jabatan = $_POST['id_jabatan'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Lakukan proses tambah data pengurus ke dalam database
    $query = "INSERT INTO pengurus (nama, id_jabatan, telepon, email, alamat, jenis_kelamin) VALUES ('$nama', '$id_jabatan', '$telepon', '$email', '$alamat', '$jenis_kelamin')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika proses tambah data berhasil, arahkan kembali ke halaman pengurus
        header("Location: pengurus_hrd.php");
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
