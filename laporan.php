<?php
session_start();
include('inc/koneksi.php');
include('inc/fungsi_unduh.php');

// Logika untuk menangani form pencarian dan unduhan laporan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangani pencarian pengeluaran berdasarkan rentang tanggal
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $expenses = getExpensesByDateRange($start_date, $end_date, $koneksi);
    $total_expenses = calculateTotalExpenses($expenses);
} else {
    // Ambil semua data pengeluaran dari database dan urutkan berdasarkan tanggal (paling baru ke paling lama)
    $query = "SELECT pengeluaran.*, pengurus.nama AS nama_pengurus FROM pengeluaran JOIN pengurus ON pengeluaran.pengurus_id = pengurus.id ORDER BY pengeluaran.tanggal DESC";
    $result = mysqli_query($koneksi, $query);
    $expenses = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $expenses[] = $row;
    }
    // Hitung total pengeluaran
    $total_expenses = calculateTotalExpenses($expenses);
}

// Tangani unduhan laporan jika parameter 'unduh' diberikan
if (isset($_GET['unduh'])) {
    downloadExpenseReportPDF($expenses);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengeluaran</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS styling untuk tampilan halaman */
    </style>
</head>
<body>
<?php include 'partials/navbar.php'; ?>
    <div class="container-fluid">
        <div class="col-lg-10 mx-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Laporan Pengeluaran</h1>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="start_date" required>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="end_date" required>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-secondary"><i class="fas fa-search fa-sm"></i></button>
                            </div>
                            <div class="col-md-4">
                                <a href="?unduh" class="btn btn-success"><i class="fas fa-download fa-sm"></i> Unduh Laporan</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Nama Pengurus</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($expenses as $expense): ?>
                                    <tr>
                                        <td class="text-center"><?php echo $expense['tanggal']; ?></td>
                                        <td><?php echo $expense['nama_pengurus']; ?></td>
                                        <td><?php echo $expense['keterangan']; ?></td>
                                        <td class="text-right"><?php echo $expense['jumlah']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="font-weight-bold text-right">Total Pengeluaran</td>
                                    <td class="text-right"><?php echo $total_expenses; ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
