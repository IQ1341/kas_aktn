<!-- Form Edit pengeluaran Kas -->
<div class="modal fade" id="editPengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="editPengeluaranModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="editPengeluaranModalLabel">Edit pengeluaran Kas</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editpengeluaranForm" action="proses_edit_pengeluaran.php" method="POST">
                    <input type="hidden" id="edit_id" name="edit_id">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_nomor_nota">Nomor Nota:</label>
                            <input type="text" class="form-control" id="edit_nomor_nota" name="edit_nomor_nota" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_tanggal">Tanggal:</label>
                            <input type="date" class="form-control" id="edit_tanggal" name="edit_tanggal" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_pengurus_id">Penanggung Jawab:</label>
                        <select class="form-control" id="edit_pengurus_id" name="edit_pengurus_id" required>
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
                        <label for="edit_keterangan">Keterangan:</label>
                        <textarea class="form-control" id="edit_keterangan" name="edit_keterangan" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_jumlah">Jumlah:</label>
                        <input type="number" class="form-control" id="edit_jumlah" name="edit_jumlah" required>
                    </div>
                    <button type="submit" class="btn btn-info"><i class="fas fa-edit mr-2"></i>Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
