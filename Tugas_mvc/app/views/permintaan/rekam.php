<style>
        body {
            background: url('<?= BASEURL; ?> /img/Home.jpg') no-repeat center center fixed;
            background-size: cover;
        }
</style>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>

    <h3>Tambah Data</h3>
    <form action="<?= BASEURL ?>/permintaan/tambah" method="post">
        <div class="form-group">
            <label for="option">Pilih Jenis Layanan:</label>
            <select id="option" name="option" required>
                <option value="">-- Pilih --</option>
                <option value="barang" <?= $data['selectedOption'] == 'barang' ? 'selected' : '' ?>>Barang</option>
                <option value="ruang" <?= $data['selectedOption'] == 'ruang' ? 'selected' : '' ?>>Ruang</option>
            </select>
        </div>

        <div class="form-group">
            <label for="namaP">Nama:</label>
            <input type="text" id="namaP" name="namaP" required>
        </div>
        <div class="form-group">
            <label for="nimP">NIM:</label>
            <input type="text" id="nimP" name="nimP" required>
        </div>
        <div class="form-group">
            <label for="noWA">No WA:</label>
            <input type="text" id="noWA" name="noWA" required>
        </div>
        <div class="form-group">
            <label for="optionM">Pilih Prodi:</label>
            <select id="optionM" name="optionM" required>
                <!-- <option value="">-- Pilih --</option> -->

            </select>
        </div>


        <div class="form-group">
            <label for="kode">Kode:</label>
            <input type="text" id="kode" name="kode" required>
            <button type="button" id="pilihData" data-bs-toggle="modal" data-bs-target="#modalData">Pilih Data</button>
        </div>

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="tanggalP">Tanggal Pinjam:</label>
            <input type="date" id="tanggalP" name="tanggalP" required>
        </div>
        <div class="form-group">
            <label for="jamP">Jam Pinjam:</label>
            <input type="time" id="jamP" name="jamP" required>
        </div>

        <div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDataLabel">Data Tabel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data dari tabel akan ditampilkan di sini -->
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <button type="submit">Tambah Data</button>

    </form>
</div>
