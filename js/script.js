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

$(document).on("click", ".editBtn", function () {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var id_jabatan = $(this).data('id-jabatan');
    var telepon = $(this).data('telepon');
    var email = $(this).data('email');
    var alamat = $(this).data('alamat');
    var jenis_kelamin = $(this).data('jenis-kelamin');

    $("#edit_id").val(id);
    $("#edit_nama").val(nama);
    $("#edit_id_jabatan").val(id_jabatan);
    $("#edit_telepon").val(telepon);
    $("#edit_email").val(email);
    $("#edit_alamat").val(alamat);
    $("#edit_jenis_kelamin").val(jenis_kelamin);
});

$(document).on("click", ".editBtn", function () {
    var id = $(this).data('id');
    var nomor_nota = $(this).data('nomor-nota');
    var tanggal = $(this).data('tanggal');
    var nama_pengurus = $(this).data('nama-pengurus');
    var donatur = $(this).data('donatur');
    var keterangan = $(this).data('keterangan');
    var jumlah = $(this).data('jumlah');

    $("#edit_id").val(id);
    $("#edit_nomor_nota").val(nomor_nota);
    $("#edit_tanggal").val(tanggal);
    $("#edit_nama_pengurus").val(nama_pengurus);
    $("#edit_donatur").val(donatur);
    $("#edit_keterangan").val(keterangan);
    $("#edit_jumlah").val(jumlah);
});

