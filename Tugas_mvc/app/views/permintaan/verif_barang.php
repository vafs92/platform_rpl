<div class="container">
    <h3>Data Pinjam barang</h3>

    <table>
        <thead>
            <tr>
                <th>Kode Pinjam</th>
                <th>Tanggal Pinjam</th>
                <th>Kode barang</th>
                <th>Nama barang</th>
                <th>Jam Pinjam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- <php if (is_array($data['items_barang'])) : ?> -->
                <form action="http://localhost/Tugas_mvc/public/permintaan/verif" method="post">
                <?php foreach ($data['items_barang'] as $item) : ?>
                    <tr>
                        
                            <td><?= $item['kodeP_barang'] ?></td>
                            <td><?= $item['tanggalP_barang'] ?></td>
                            <td><?= $item['kodeB'] ?></td>
                            <td><?= $item['namaB'] ?></td>
                            <td><?= $item['jamP_barang'] ?></td>
                            <td>
                                <select class="form-control" id="status" name="status">
                                    <option value="DIKIRIM">DIKIRM</option>
                                    <option value="DITERUSKAN">DITERUSKAN</option>
                                    <option value="TOLAK">TOLAK</option>
                                </select>
                            </td>
                            <td>
                                <input type="hidden" name="option" value="barang">
                                <input type="hidden" name="id" id="id" value="<?= $item['kodeP_barang'] ?>">
                                <input type="hidden" name="kode" id="kode" value="<?= $item['kodeB'] ?>">
                                <button type="submit">SIMPAN</button>
                            </td>
                        
                    </tr>
                    </form>
                <?php endforeach; ?>
                </form>
            <!-- <php endif; ?> -->
        </tbody>
    </table>
    <!-- </form> -->
</div>