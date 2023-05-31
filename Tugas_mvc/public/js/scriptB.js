$(function () {

    $('.tombolTambahData').on('click', function () {
        $('#formModalLabelB').html('Tambah Data Barang');
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });

    $('.tampilModalUbahB').on('click', function () {
        $('#formModalLabelB').html('Ubah Data Barang');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/Tugas_mvc/public/perekaman/editB');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/Tugas_mvc/public/perekaman/getubahB',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#kodeB').val(data.kodeB);
                $('#namaB').val(data.namaB);     
            }
        });
    });
});