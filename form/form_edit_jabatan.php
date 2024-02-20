<div class="modal fade" id="editJabatanModal" tabindex="-1" role="dialog" aria-labelledby="editJabatanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="editJabatanModalLabel">Edit Jabatan</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <!-- Form Edit Jabatan -->
    <form id="editJabatanModal" action="proses_edit_jabatan.php" method="POST">
        <input type="hidden" id="edit_id" name="edit_id">
        <div class="form-group">
            <label for="edit_kode">Kode Jabatan:</label>
            <input type="text" class="form-control" id="edit_kode" name="edit_kode" required>
        </div>
        <div class="form-group">
            <label for="edit_nama">Nama Jabatan:</label>
            <input type="text" class="form-control" id="edit_nama" name="edit_nama" required>
        </div>
        <div class="form-group">
            <label for="edit_gaji">Gaji Pokok:</label>
            <input type="text" class="form-control" id="edit_gaji" name="edit_gaji" required>
        </div>
        <div class="form-group">
            <label for="edit_tunjangan">Tunjangan:</label>
            <input type="text" class="form-control" id="edit_tunjangan" name="edit_tunjangan" required>
        </div>
        <button type="submit" class="btn btn-info"><i class="fas fa-edit mr-2"></i>Simpan Perubahan</button>
    </form>
</div>

        </div>
    </div>
</div>
