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
    <title>Penerimaan Kas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'partials/navbar.php'; ?>
<div class="container-fluid">
    <div class="col-lg-10 mx-auto">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Penerimaan Kas</h1>
        </div>

        
        <!-- Tabel Data Penerimaan Kas -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahPenerimaanModal">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah penerima kas
                </button>
                <?php include 'form/form_tambah_penerima.php'; ?>
                <?php include 'form/form_edit_penerima.php'; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor Nota</th>
                                <th>Tanggal</th>
                                <th>Pengurus</th>
                                <th>Donatur</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query_penerimaan = "SELECT p.*, pengurus.nama AS nama_pengurus FROM penerimaan p JOIN pengurus ON p.pengurus_id = pengurus.id";
                            $result_penerimaan = mysqli_query($koneksi, $query_penerimaan);
                            while ($row_penerimaan = mysqli_fetch_assoc($result_penerimaan)) {
                                echo "<tr>";
                                echo "<td>" . $row_penerimaan['nomor_nota'] . "</td>";
                                echo "<td>" . $row_penerimaan['tanggal'] . "</td>";
                                echo "<td>" . $row_penerimaan['nama_pengurus'] . "</td>";
                                echo "<td>" . $row_penerimaan['donatur'] . "</td>";
                                echo "<td>" . $row_penerimaan['keterangan'] . "</td>";
                                echo "<td>" . $row_penerimaan['jumlah'] . "</td>";
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
</body>
</html>
