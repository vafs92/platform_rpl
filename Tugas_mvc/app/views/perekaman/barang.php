<style>
        body {
            background: url('<?= BASEURL; ?> /img/Home.jpg') no-repeat center center fixed;
            background-size: cover;
        }
		h3{

		}
		table{
			text-align: center;
		}
        
</style>

<div class="container mt-3">

	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash() ?>
		</div>
	</div>

	<div class="row mb-3">
		
		<div class="col-lg-6">
			<form action="<?= BASEURL; ?>/perekaman/cariB" method="POST">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="cari barang..." name="keyword" id="keyword" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-lg-6">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary tombolTambahDataB" data-bs-toggle="modal" data-bs-target="#formModal">
				TAMBAH
			</button>
		</div>
	

	</div>
	<div class="row">
		<div class="col-lg-12">

			<h3><b>Daftar Barang : </b></h3>

			<table class = "table table-striped table-light">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['barang'] as $barang) : ?>
                            <tr>
                                <td><?= $barang['kodeB'] ?></td>
                                <td><?= $barang['namaB'] ?></td>
                                <td><a href="<?= BASEURL; ?>/perekaman/editB/<?= $barang['kodeB']; ?>" class="badge badge-warning float-end ms-1 tampilModalUbahB" style="color:black" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $barang['kodeB']; ?>">edit</a>
						        <a href="<?= BASEURL; ?>/perekaman/hapusB/<?= $barang['kodeB']; ?>" class="badge badge-danger float-end ms-1" style="color:black" onclick="return confirm('yakin?')">hapus</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
		</div>
	</div>

</div>
<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formModalLabelB">Tambah Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<form action="<?= BASEURL; ?>/perekaman/tambahB" method="post">
					<!-- <input type="hidden" name="id" id="id"> -->
					<div class="mb-3">
						<label for="kodeB" class="form-label">Kode Barang</label>
						<input type="text" class="form-control" id="kodeB" name="kodeB">
					</div>
					<div class="mb-3">
						<label for="namaB" class="form-label">Nama Barang</label>
						<input type="text" class="form-control" id="namaB" name="namaB">
					</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success">Tambah Data</button>
				</form>
			</div>
		</div>
	</div>
</div>
