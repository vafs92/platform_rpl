<style>
    body {
        /* Hapus background pada body */
        margin: 0;
        padding: 0;
        
    }

    .background-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        opacity: 1; /* Tambahkan nilai opacity di sini */
        background: url('<?= BASEURL; ?>/img/Home.jpg') no-repeat center center fixed;
        background-size: cover;
    }

    table, tr {
        text-align: center;
    }
    
    label{
        /* text-shadow: 1px 1px #FFFFFF; */
        font-weight: bold;
        
    }
   
    .form-frame {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
        background-color: #f9f9f9;
        opacity: 0.9;
    }

</style>

<div class="background-container"></div>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>

    <h3><b>Tambah Data : </b></h3>
  <div class="form-frame">
    <form action="<?= BASEURL ?>/permintaan/tambah" method="post">
        <div class="form-group">
            <label for="option">Pilih Jenis Layanan :</label>
            <select id="option" name="option" required class="btn btn-primary">
                <option value="">-- Pilih --</option>
                <option value="barang" <?= $data['selectedOption'] == 'barang' ? 'selected' : '' ?>>Barang</option>
                <option value="ruang" <?= $data['selectedOption'] == 'ruang' ? 'selected' : '' ?>>Ruang</option>
            </select>
        </div>

    <div class="row">
        <div class="col">
        <!-- <div class="form-group"> -->
            <label for="namaP">Nama Peminjam :</label> 
            <input type="text" id="namaP" name="namaP" class="form-control" required>
        </div>
        <div class="col">
        <!-- <div class="form-group"> -->
            <label for="nimP"> NIM : </label> 
            <input type="text" id="nimP" name="nimP" class="form-control" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
        <!-- <div class="form-group"> -->
            <label for="noWA">No WA :</label> 
            <input type="text" id="noWA" name="noWA" class="form-control" required>
        </div>
        <div class="col">
        <!-- <div class="form-group"> -->
            <label for="optionM">Pilih Prodi :</label> 
            <select id="optionM" name="optionM" class="form-control" required>
            <!-- <option value="">-- Pilih --</option> -->
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
        <!-- <div class="form-group"> -->
            <label for="kode">Kode :</label> 
            <input type="text" id="kode" name="kode" class="form-control" required>
            <button class="btn btn-primary" type="button" id="pilihData" data-bs-toggle="modal" data-bs-target="#modalData">Pilih Data</button>
        </div>
        <div class="col">
        <!-- <div class="form-group"> -->
            <label for="nama">Nama :</label> 
            <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
        <!-- <div class="form-group"> -->
            <label for="tanggalP">Tanggal Pinjam :</label> 
            <input type="date" id="tanggalP" name="tanggalP" class="form-control" required>
        </div>
        <div class="col">
        <!-- <div class="form-group"> -->
            <label for="jamP">Jam Pinjam :</label> 
            <input type="time" id="jamP" name="jamP" class="form-control" required>
        </div>
    </div>
    <br>

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


        <button class="btn btn-primary" type="submit">Tambah Data</button>

    </form>
</div>
</div>
