<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include('inc/koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data Pengurus</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'partials/navbar.php'; ?>
    <div class="container-fluid">
    <div class="col-lg-10 mx-auto">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Master Data Pengurus</h1>
        </div>

        <!-- Daftar pengurus -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahPengurusModal">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Pengurus
                </button>
                <?php include 'form/form_tambah_pengurus.php'; ?>
                <?php include 'form/form_edit_pengurus.php'; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Jabatan</th>
                                <th class="text-center">Telepon</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Daftar pengurus dari database -->
                            <?php
                            include('inc/koneksi.php');
                            $query = "SELECT pengurus.*, jabatan.nama AS nama_jabatan FROM pengurus JOIN jabatan ON pengurus.id_jabatan = jabatan.id";
                            $result = mysqli_query($koneksi, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td class='text-center'>" . $row['nama'] . "</td>";
                                echo "<td class='text-center'>" . $row['nama_jabatan'] . "</td>";
                                echo "<td class='text-center'>" . $row['telepon'] . "</td>";
                                echo "<td class='text-center'>" . $row['email'] . "</td>";
                                echo "<td class='text-center'>" . $row['alamat'] . "</td>";
                                echo "<td class='text-center'>" . $row['jenis_kelamin'] . "</td>";
                                echo "<td class='text-center'>";
                                echo "<button class='btn btn-info btn-sm editBtn' data-toggle='modal' data-target='#editPengurusModal' data-id='" . $row['id'] . "' data-nama='" . $row['nama'] . "' data-nama-jabatan='" . $row['id_jabatan'] . "' data-telepon='" . $row['telepon'] . "' data-email='" . $row['email'] . "' data-alamat='" . $row['alamat'] . "' data-jenis-kelamin='" . $row['jenis_kelamin'] . "'><i class='fas fa-edit'></i> Edit</button>";
                                echo "<span class='mx-1'></span>";
                                echo "<a href='proses_hapus_pengurus.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Anda yakin ingin menghapus pengurus ini?\")'><i class='fas fa-trash'></i> Hapus</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
