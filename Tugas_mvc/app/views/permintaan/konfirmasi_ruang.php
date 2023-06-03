<div class="container">
    <h3>Data Pinjam Ruang</h3>

    <table class = "table table-striped table-light">
        <thead>
            <tr>
                <th>Kode Pinjam</th>
                <th>Tanggal Pinjam</th>
                <th>Kode Ruang</th>
                <th>Nama Ruang</th>
                <th>Jam Pinjam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
                <form action="http://localhost/Tugas_mvc/public/permintaan/konfirmasi" method="post">
                <?php foreach ($data['items_ruang'] as $item) : ?>
                    <tr>
                        
                            <td><?= $item['kodeP_ruang'] ?></td>
                            <td><?= $item['tanggalP_ruang'] ?></td>
                            <td><?= $item['kodeR'] ?></td>
                            <td><?= $item['namaR'] ?></td>
                            <td><?= $item['jamP_ruang'] ?></td>
                            <td>
                                <select class="form-control" id="status" name="status">
                                    <option value="DITERUSKAN">DITERUSKAN</option>
                                    <option value="ACC">ACC</option>
                                    <option value="TOLAK">TOLAK</option>
                                </select>
                            </td>
                            <td>
                                <input type="hidden" name="option" value="ruang">
                                <input type="hidden" name="id" id="id" value="<?= $item['kodeP_ruang'] ?>">
                                <input type="hidden" name="kode" id="kode" value="<?= $item['kodeR'] ?>">
                                <button class="btn btn-success" type="submit">SIMPAN</button>
                            </td>
                        
                    </tr>
                    </form>
                <?php endforeach; ?>
                </form>
        </tbody>
    </table>
</div>
