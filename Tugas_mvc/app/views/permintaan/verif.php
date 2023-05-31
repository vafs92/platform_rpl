<div class="container mt-3">
    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/permintaan/cari" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari barang..." name="keyword" id="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASEURL ?>/permintaan/verif" method="post">
                <label for="option">Pilih:</label>
                <select name="option" id="option">
                    <option value="">-- Pilih --</option>
                    <option value="barang" <?= $data['selectedOption'] == 'barang' ? 'selected' : '' ?>>Barang</option>
                    <option value="ruang" <?= $data['selectedOption'] == 'ruang' ? 'selected' : '' ?>>Ruang</option>
                </select>
                <button type="submit">Tampilkan</button>
            </form>

            <?php if ($data['selectedOption'] == 'barang') : ?>
                <h3>Data Pinjam Barang</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Kode Pinjam</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jam Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['items'] as $item) : ?>
                            <tr>
                                <td><?= $item['kodeB'] ?></td>
                                <td><?= $item['namaP'] ?></td>
                                <td><?= $item['tanggalP_barang'] ?></td>
                                <td><?= $item['jamP_barang'] ?></td>
                                <td><?= $item['statusP_barang'] ?></td>
                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVerif" data-id="<?= $item['kodeB'] ?>" data-type="barang">Detail</button>
                                </td>                               
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php elseif ($data['selectedOption'] == 'ruang') : ?>
                <h3>Data Pinjam Ruang</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Kode Pinjam</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jam Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['items'] as $item) : ?>
                            <tr>
                                <td><?= $item['kodeR'] ?></td>
                                <td><?= $item['namaP'] ?></td>
                                <td><?= $item['tanggalP_ruang'] ?></td>
                                <td><?= $item['jamP_ruang'] ?></td>
                                <td><?= $item['statusP_ruang'] ?></td>
                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVerif" data-id="<?= $item['kodeB'] ?>" data-type="barang">Detail</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>

    <div class="modal fade" id="modalVerif" tabindex="-1" aria-labelledby="modalVerifLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVerifLabel">Detail Permintaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="detailData"></div>
                <form action="<?= BASEURL ?>/permintaan/verifikasi" method="post">
                    <div class="mb-3">
                        <label for="verifikasi">Verifikasi:</label>
                        <select name="verifikasi" id="verifikasi" class="form-select">
                            <option value="">-- Pilih --</option>
                            <option value="acc">Acc</option>
                            <option value="tolak">Tolak</option>
                            <option value="diteruskan">Diteruskan</option>
                        </select>
                    </div>
                    <input type="hidden" name="kodePinjam" id="kodePinjam">
                    <input type="hidden" name="jenis" id="jenis">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>





