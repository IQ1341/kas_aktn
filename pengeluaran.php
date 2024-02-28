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
    <title>pengeluaran Kas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'partials/navbar.php'; ?>
<div class="container-fluid">
    <div class="col-lg-10 mx-auto">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengeluaran Kas</h1>
        </div>
        
        <!-- Tabel Data pengeluaran Kas -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahPengeluaranModal">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah pengeluaran kas
                </button>
                <?php include 'form/form_tambah_pengeluaran.php'; ?>
                <?php include 'form/form_edit_pengeluaran.php'; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Nomor Nota</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Penanggung Jawab</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query_pengeluaran = "SELECT p.*, pengurus.nama AS nama_pengurus FROM pengeluaran p JOIN pengurus ON p.pengurus_id = pengurus.id";
                            $result_pengeluaran = mysqli_query($koneksi, $query_pengeluaran);
                            while ($row_pengeluaran = mysqli_fetch_assoc($result_pengeluaran)) {
                                echo "<tr>";
                                echo "<td>" . $row_pengeluaran['nomor_nota'] . "</td>";
                                echo "<td>" . $row_pengeluaran['tanggal'] . "</td>";
                                echo "<td>" . $row_pengeluaran['nama_pengurus'] . "</td>";
                                echo "<td>" . $row_pengeluaran['keterangan'] . "</td>";
                                echo "<td>" . $row_pengeluaran['jumlah'] . "</td>";
                                echo "<td class='text-center'>";
                                echo "<button class='btn btn-info btn-sm editBtn' data-toggle='modal' data-target='#editPengeluaranModal' data-id='" . $row_pengeluaran['id'] . "' data-nomor-nota='" . $row_pengeluaran['nomor_nota'] . "' data-tanggal='" . $row_pengeluaran['tanggal'] . "' data-nama-pengurus='" . $row_pengeluaran['nama_pengurus'] ."' data-keterangan='" . $row_pengeluaran['keterangan'] . "' data-jumlah='" . $row_pengeluaran['jumlah'] . "'><i class='fas fa-edit'></i> Edit</button>";
                                echo "<span class='mx-1'></span>";
                                echo "<a href='proses_hapus_pengeluaran.php?id=" . $row_pengeluaran['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Anda yakin ingin menghapus pengurus ini?\")'><i class='fas fa-trash'></i> Hapus</a>";
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
</div>


<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
