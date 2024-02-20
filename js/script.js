$(document).ready(function() {
    // Event listener untuk tombol DATA
    $('#btnData').on('click', function() {
        // Lakukan AJAX request untuk memuat konten jabatan.php
        $.ajax({
            url: 'jabatan.php',
            type: 'GET',
            success: function(response) {
                // Ganti konten utama dengan konten dari jabatan.php
                $('#content').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
$(document).ready(function(){
    $('.editBtn').on('click', function(){
        // Mendapatkan nilai atribut data dari tombol edit yang diklik
        var id = $(this).data('id');
        var kode = $(this).data('kode');
        var nama = $(this).data('nama');
        var gaji = $(this).data('gaji');
        var tunjangan = $(this).data('tunjangan');
        
        // Mengisi nilai input pada form edit dengan nilai yang diperoleh
        $('#edit_id').val(id);
        $('#edit_kode').val(kode);
        $('#edit_nama').val(nama);
        $('#edit_gaji').val(gaji);
        $('#edit_tunjangan').val(tunjangan);
    });
});