<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kas_app";

// Membuat koneksi
$koneksi = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Connection failed: " . $coneksi->connect_error);
}
?>
