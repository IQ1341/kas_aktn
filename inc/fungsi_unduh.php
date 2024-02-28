<?php

function getExpensesByDateRange($start_date, $end_date, $koneksi) {
    $query = "SELECT pengeluaran.*, pengurus.nama AS nama_pengurus FROM pengeluaran JOIN pengurus ON pengeluaran.pengurus_id = pengurus.id WHERE pengeluaran.tanggal BETWEEN '$start_date' AND '$end_date'";
    $result = mysqli_query($koneksi, $query);
    $expenses = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $expenses[] = $row;
    }
    return $expenses;
}

function calculateTotalExpenses($expenses) {
    $total = 0;
    foreach ($expenses as $expense) {
        $total += $expense['jumlah'];
    }
    return $total;
}

function downloadExpenseReportPDF($expenses) {
    require_once('vendor/autoload.php');

    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Expense Report');
    $pdf->SetSubject('Expense Report');
    $pdf->SetKeywords('Expense, Report');
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetFont('helvetica', '', 12);
    $pdf->AddPage();
    $html = '<table border="1" cellspacing="0" cellpadding="3">
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Pengurus</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                </tr>';
    foreach ($expenses as $expense) {
        $html .= '<tr>
                    <td>' . $expense['tanggal'] . '</td>
                    <td>' . $expense['nama_pengurus'] . '</td>
                    <td>' . $expense['keterangan'] . '</td>
                    <td>' . $expense['jumlah'] . '</td>
                </tr>';
    }
    $html .= '<tr>
                <td colspan="3">Total Pengeluaran</td>
                <td>' . calculateTotalExpenses($expenses) . '</td>
            </tr>';
    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('Laporan.pdf', 'D');
}

?>
