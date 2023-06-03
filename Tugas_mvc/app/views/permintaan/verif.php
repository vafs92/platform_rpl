<style>
        body {
            background: url('<?= BASEURL; ?> /img/Home.jpg') no-repeat center center fixed;
            background-size: cover;
        }
		table{
			text-align: center;
            
		}
        h3{
            font-weight: bold;
        }
        label{
            font-weight: bold;
        }
        
</style>

<!-- verif.php -->
<div class="container mt-3">
    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="http://localhost/Tugas_mvc/public/permintaan/cari" method="POST">
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
            <form action="http://localhost/Tugas_mvc/public/permintaan/verif" method="post">
                <label for="option">Pilih Jenis Layanan :</label>
                <select name="option" id="option" class="btn btn-light">
                    <option value="">-- Pilih --</option>
                    <option value="barang" <?= $data['selectedOption'] == 'barang' ? 'selected' : '' ?>>Barang</option>
                    <option value="ruang" <?= $data['selectedOption'] == 'ruang' ? 'selected' : '' ?>>Ruang</option>
                </select>
                <button class="btn btn-primary" type="submit">Tampilkan</button>
            </form>

            <?php if ($data['selectedOption'] == 'barang') : ?>
                <h3>Data Pinjam Barang</h3>
                <table class = "table table-striped table-light">
                    <thead>
                        <tr>
                            <th>Kode Pinjam</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['items'] as $item) : ?>
                            <tr>
                                <td><?= $item['kodeP_barang'] ?></td>
                                <td><?= $item['namaP'] ?></td>
                                <td><?= $item['tanggalP_barang'] ?></td>
                                <td><?= $item['statusP_barang'] ?></td>
                                <td>
                                    <form action="http://localhost/Tugas_mvc/public/permintaan/verif" method="post">
                                        <input type="hidden" name="option" value="barang">
                                        <input type="hidden" name="id" value="<?= $item['kodeP_barang'] ?>">
                                        <button class="btn btn-success"  type="submit">Detail</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if (isset($data['items_barang']) && is_array($data['items_barang'])) : ?>
                    <?php include 'verif_barang.php'; ?>
                <?php endif; ?>

            <?php elseif ($data['selectedOption'] == 'ruang') : ?>
                <h3>Data Pinjam Ruang</h3>
                <table class = "table table-striped table-light">
                    <thead>
                        <tr>
                            <th>Kode Pinjam</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['items'] as $item) : ?>
                            <tr>
                                <td><?= $item['kodeP_ruang'] ?></td>
                                <td><?= $item['namaP'] ?></td>
                                <td><?= $item['tanggalP_ruang'] ?></td>
                                <td><?= $item['statusP_ruang'] ?></td>
                                <td>
                                    <form action="http://localhost/Tugas_mvc/public/permintaan/verif" method="post">
                                        <input type="hidden" name="option" value="ruang">
                                        <input type="hidden" name="id" value="<?= $item['kodeP_ruang'] ?>">
                                        <button class="btn btn-success" type="submit">Detail</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if (isset($data['items_ruang']) && is_array($data['items_ruang'])) : ?>
                    <?php include 'verif_ruang.php'; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
