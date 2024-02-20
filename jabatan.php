 
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
    <title>Master Data Jabatan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'partials/navbar.php'; ?>
    <div class="container-fluid">
    <div class="col-lg-10 mx-auto">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Master Data Jabatan</h1>
        </div>

            <!-- Daftar jabatan -->
            <div class="card shadow mb-4">
    <div class="card-header py-3">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahJabatanModal">
            <i class="fas fa-plus-circle mr-2"></i> Tambah Jabatan
        </button>
        <?php include 'form/form_tambah_jabatan.php'; ?>
        <?php include 'form/form_edit_jabatan.php'; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">Kode Jabatan</th>
                        <th class="text-center">Nama Jabatan</th>
                        <th class="text-center">Gaji Pokok</th>
                        <th class="text-center">Tunjangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Daftar jabatan dari database -->
                    <?php
include('inc/koneksi.php');
$query = "SELECT * FROM jabatan";
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td class='text-center'>" . $row['kode'] . "</td>";
    echo "<td class='text-center'>" . $row['nama'] . "</td>";
    echo "<td class='text-center'>" . $row['gaji'] . "</td>";
    echo "<td class='text-center'>" . $row['tunjangan'] . "</td>";
    echo "<td class='text-center'>";
    echo "<button class='btn btn-info btn-sm editBtn' data-toggle='modal' data-target='#editJabatanModal' data-id='" . $row['id'] . "' data-kode='" . $row['kode'] . "' data-nama='" . $row['nama'] . "' data-gaji='" . $row['gaji'] . "' data-tunjangan='" . $row['tunjangan'] . "'><i class='fas fa-edit'></i> Edit</button>";
    echo "<span class='mx-1'></span>";
    echo "<a href='proses_hapus_jabatan.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Anda yakin ingin menghapus jabatan ini?\")'><i class='fas fa-trash'></i> Hapus</a>";
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
