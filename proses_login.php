<?php
session_start();

// Masukkan file koneksi ke database
include('inc/koneksi.php');

// Ambil data yang dikirimkan dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Query untuk mencari pengguna berdasarkan username, password, dan role
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = '$role'";
$result = mysqli_query($koneksi, $query);

// Periksa apakah pengguna ditemukan
if (mysqli_num_rows($result) == 1) {
    // Pengguna ditemukan, simpan informasi pengguna ke dalam sesi
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    // Arahkan pengguna ke dashboard yang sesuai dengan peran (role)
    if ($role === 'kas') {
        header("Location: dashboard_kas.php");
    } elseif ($role === 'hrd') {
        header("Location: dashboard_hrd.php");
    } else {
        // Jika peran tidak valid, arahkan pengguna kembali ke halaman login
        header("Location: login.php?error=invalid_role");
    }
} else {
    // Jika pengguna tidak ditemukan, arahkan kembali ke halaman login dengan pesan kesalahan
    header("Location: login.php?error=invalid_credentials");
}
?>
