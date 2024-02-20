<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

include('inc/koneksi.php');
include('inc/functions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query database untuk mencocokkan username dan password
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Jika ditemukan, set session dan redirect ke dashboard
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah";
    }
}
?>