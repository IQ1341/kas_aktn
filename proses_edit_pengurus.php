<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('inc/koneksi.php');

// Pastikan data yang diterima valid
if (isset($_POST['edit_id']) && isset($_POST['edit_nama']) && isset($_POST['edit_id_jabatan']) && isset($_POST['edit_telepon']) && isset($_POST['edit_email']) && isset($_POST['edit_alamat']) && isset($_POST['edit_jenis_kelamin'])) {
    $edit_id = $_POST['edit_id'];
    $edit_nama = $_POST['edit_nama'];
    $edit_id_jabatan = $_POST['edit_id_jabatan'];
    $edit_telepon = $_POST['edit_telepon'];
    $edit_email = $_POST['edit_email'];
    $edit_alamat = $_POST['edit_alamat'];
    $edit_jenis_kelamin = $_POST['edit_jenis_kelamin'];

    // Lakukan proses update di database
    $query = "UPDATE pengurus SET nama='$edit_nama', id_jabatan='$edit_id_jabatan', telepon='$edit_telepon', email='$edit_email', alamat='$edit_alamat', jenis_kelamin='$edit_jenis_kelamin' WHERE id='$edit_id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika proses update berhasil, arahkan kembali ke halaman pengurus
        header("Location: pengurus.php");
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
