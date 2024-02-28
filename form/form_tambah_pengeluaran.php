<div class="modal fade" id="tambahPengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran Kas</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Penerimaan Kas -->
                <form action="proses_tambah_pengeluaran.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nomor_nota">Nomor Nota:</label>
                            <input type="text" class="form-control" id="nomor_nota" name="nomor_nota" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pengurus_id">Penanggung Jawab:</label>
                        <select class="form-control" id="pengurus_id" name="pengurus_id" required>
                            <option value="">Pilih PJ</option>
                            <?php
                            include('inc/koneksi.php');
                            $query = "SELECT * FROM pengurus";
                            $result = mysqli_query($koneksi, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah:</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
