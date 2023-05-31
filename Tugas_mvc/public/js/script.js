$(function () {

    $('.tombolTambahDataR').on('click', function () {
        $('#formModalLabelR').html('Tambah Data Ruang');
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });

    $('.tampilModalUbahR').on('click', function () {
        $('#formModalLabelR').html('Ubah Data Ruang');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/Tugas_mvc/public/perekaman/editR');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/Tugas_mvc/public/perekaman/getubahR',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#kodeR').val(data.kodeR);
                $('#namaR').val(data.namaR);
            }
        });
    });

    $('#option').on('change', function () {
        $('#kode').val('');
        $('#nama').val('');
    });

    $('#pilihData').on('click', function () {
        var option = $('#option').val();

        $.ajax({
            url: 'http://localhost/Tugas_mvc/public/permintaan/getData',
            data: { option: option },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                var modalTable = $('#modalData').find('.modal-body table tbody');
                modalTable.empty();

                if (option == 'ruang') {
                    $.each(data, function (index, item) {
                        var row = '<tr>';
                        row += '<td>' + item.kodeR + '</td>';
                        row += '<td>' + item.namaR + '</td>';
                        row += '</tr>';
                        modalTable.append(row);
                    });
                } else {
                    $.each(data, function (index, item) {
                        var row = '<tr>';
                        row += '<td>' + item.kodeB + '</td>';
                        row += '<td>' + item.namaB + '</td>';
                        row += '</tr>';
                        modalTable.append(row);
                    });
                }


                $('#modalData').modal('show');
            }
        });
    });
    $(document).on('click', '#modalData .modal-body table tr', function () {
        var kode = $(this).find('td:first-child').text();
        var nama = $(this).find('td:nth-child(2)').text();

        $('#kode').val(kode);
        $('#nama').val(nama);

        // Menutup modal
        $('#modalData').modal('dispose');
    });

    var dropdown = $('#optionM');
    dropdown.empty();

    $.ajax({
        url: 'http://localhost/Tugas_mvc/public/permintaan/getDataMahasiswa',
        method: 'post',
        dataType: 'json',
        success: function (data) {
            dropdown.empty();

            if (data.length > 0) {
                $.each(data, function (index, item) {
                    dropdown.append($('<option></option>').attr('value', item.id_mahasiswa).text(item.id_mahasiswa));
                });
            }
        }
    });

    $(document).ready(function() {
        $('#modalVerif').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var kodePinjam = button.data('id');
            var jenis = button.data('type');
            var modal = $(this);
            modal.find('#kodePinjam').val(kodePinjam);
            modal.find('#jenis').val(jenis);
            $.ajax({
                url: 'http://localhost/Tugas_mvc/public/permintaan/getData', // replace with the file that fetches the data for the modal
                method: 'POST',
                data: {
                    kodePinjam: kodePinjam,
                    jenis: jenis
                },
                success: function(data) {
                    modal.find('#detailData').html(data);
                }
            });
        });
    });



});
