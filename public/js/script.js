$(function() {

    $('#tmabah-mhs').on('click', function() {
        $('#judulmodal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', "http://localhost/phpmvc/public/mahasiswa/tambah")
    });

    $('.tampilModalUbah').on('click', function() {
        $('#judulmodal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', "http://localhost/phpmvc/public/mahasiswa/ubah")
        const id = $(this).data('id');

        // $.post('http://localhost/phpmvc/public/mahasiswa/getubah', { id: id },
        //     function(data, status) {
        //         console.log(data);
        //     });
        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getUbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                // console.log(data);

                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });

    });

});