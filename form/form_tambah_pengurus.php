<div class="modal fade" id="tambahPengurusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <!-- Form Tambah Pengurus -->
    <form action="proses_tambah_pengurus.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group col-md-6">
                <label for="id_jabatan">Jabatan:</label>
                <select class="form-control" id="id_jabatan" name="id_jabatan" required>
                            <option value="">Pilih jabatan</option>
                            <?php
                            include('inc/koneksi.php');
                            $query = "SELECT * FROM jabatan";
                            $result = mysqli_query($koneksi, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
                            }
                            ?>
                        </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="telepon">Telepon:</label>
                <input type="text" class="form-control" id="telepon" name="telepon" required>
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Simpan</button>
    </form>
</div>

        </div>
    </div>
</div>
