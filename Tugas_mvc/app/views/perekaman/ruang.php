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
			<form action="<?= BASEURL; ?>/perekaman/cariR" method="POST">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="cari ruang..." name="keyword" id="keyword" autocomplete="off">
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

			<h3><b>Daftar Ruang : </b></h3>

			<table class = "table table-striped table-light">
                    <thead>
                        <tr>
                            <th>Kode Ruangan</th>
                            <th>Nama Ruangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>	
                    <tbody>
                        <?php foreach ($data['ruang'] as $ruang) : ?>
                            <tr>
                                <td><?= $ruang['kodeR'] ?></td>
                                <td><?= $ruang['namaR'] ?></td>
                                <td><a href="<?= BASEURL; ?>/perekaman/editR/<?= $ruang['kodeR']; ?>" class="badge badge-warning float-end ms-1 tampilModalUbahR" style="color:black" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $ruang['kodeR']; ?>">edit</a>
						        <a href="<?= BASEURL; ?>/perekaman/hapusR/<?= $ruang['kodeR']; ?>" class="badge badge-danger float-end ms-1" style="color:black" onclick="return confirm('yakin?')">hapus</a></td>
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
				<h5 class="modal-title" id="formModalLabelR">Tambah Data</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<form action="<?= BASEURL; ?>/perekaman/tambahR" method="post">
					<!-- <input type="hidden" name="id" id="id"> -->
					<div class="mb-3">
						<label for="kodeR" class="form-label">Kode Ruang</label>
						<input type="text" class="form-control" id="kodeR" name="kodeR">
					</div>
					<div class="mb-3">
						<label for="namaR" class="form-label">Nama Ruang</label>
						<input type="text" class="form-control" id="namaR" name="namaR">
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
