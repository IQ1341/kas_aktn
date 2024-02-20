<div class="modal fade" id="tambahJabatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Jabatan -->
                <form action="proses_tambah_jabatan.php" method="POST">
                    <div class="form-group">
                        <label for="kode">Kode Jabatan:</label>
                        <input type="text" class="form-control" id="kode" name="kode" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Jabatan:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="gaji">Gaji Pokok:</label>
                        <input type="text" class="form-control" id="gaji" name="gaji" required>
                    </div>
                    <div class="form-group">
                        <label for="tunjangan">Tunjangan:</label>
                        <input type="text" class="form-control" id="tunjangan" name="tunjangan" required>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
