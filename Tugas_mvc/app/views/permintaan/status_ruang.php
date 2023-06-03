<div class="container">
    <h3>Data Pinjam Ruang</h3>

    <table>
        <thead>
            <tr>
                <th>Kode Pinjam</th>
                <th>Tanggal Pinjam</th>
                <th>Kode Ruang</th>
                <th>Nama Ruang</th>
                <th>Jam Pinjam</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($data['items_ruang'] as $item) : ?>
                <tr>

                    <td><?= $item['kodeP_ruang'] ?></td>
                    <td><?= $item['tanggalP_ruang'] ?></td>
                    <td><?= $item['kodeR'] ?></td>
                    <td><?= $item['namaR'] ?></td>
                    <td><?= $item['jamP_ruang'] ?></td>
                    <td><?= $item['statusP_ruang'] ?>
                    </td>

                </tr>
            <?php endforeach; ?>
            </form>
        </tbody>
    </table>
</div>