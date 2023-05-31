$(function() {
    $('#pilihData').on('click', function() {
        // Mengambil nilai dari pilihan tabel
        var option = $('#option').val();

        // Lakukan AJAX request untuk mendapatkan data dari tabel yang dipilih
        $.ajax({
            url: '<?= BASEURL ?>/permintaan/getData',
            data: { option: option },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                // Memasukkan data ke dalam tabel modal
                var modalTable = $('#modalData').find('.modal-body table tbody');
                modalTable.empty();

                // Memasukkan data ke dalam tabel
                if (option=='ruang'){
                    $.each(data, function (index, item) {
                        var row = '<tr>';
                        row += '<td>' + item.kodeR + '</td>';
                        row += '<td>' + item.namaR + '</td>';
                        row += '</tr>';
                        modalTable.append(row);
                    });
                }else{
                    $.each(data, function (index, item) {
                        var row = '<tr>';
                        row += '<td>' + item.kodeB + '</td>';
                        row += '<td>' + item.namaB + '</td>';
                        row += '</tr>';
                        modalTable.append(row);
                    });
                }

                // Menampilkan modal
                $('#modalData').modal('show');
            }
        });
    });

    // Mengisi input kode dan nama setelah memilih data dari tabel modal
    $(document).on('click', '#modalData .modal-body table tr', function() {
        var kode = $(this).find('td:first-child').text();
        var nama = $(this).find('td:nth-child(2)').text();

        $('#kode').val(kode);
        $('#nama').val(nama);

        // Menutup modal
        $('#modalData').modal('hide');
    });
});
