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
            </tr>
        </thead>
        <tbody>

            <?php foreach ($data['items_barang'] as $item) : ?>
                <tr>

                    <td><?= $item['kodeP_barang'] ?></td>
                    <td><?= $item['tanggalP_barang'] ?></td>
                    <td><?= $item['kodeB'] ?></td>
                    <td><?= $item['namaB'] ?></td>
                    <td><?= $item['jamP_barang'] ?></td>
                    <td><?= $item['statusP_barang'] ?>
                    </td>

                </tr>

            <?php endforeach; ?>
            </form>
            <!-- <php endif; ?> -->
        </tbody>
    </table>
    <!-- </form> -->
</div>