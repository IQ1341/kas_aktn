<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data Pengurus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Master Data Pengurus</h2>
        <!-- Tabel untuk menampilkan data pengurus -->
        <table class="table">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>Nomor HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data pengurus akan ditampilkan di sini -->
            </tbody>
        </table>
        <!-- Form untuk menambah pengurus -->
        <h3 class="mt-4">Tambah Pengurus</h3>
        <form action="proses_tambah_pengurus.php" method="POST">
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" class="form-control" id="nip" name="nip" required>
            </div>
            <!-- Tambahkan input untuk data pengurus lainnya -->
            <!-- Tambahkan dropdown/select untuk memilih jabatan -->
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>
</html>
