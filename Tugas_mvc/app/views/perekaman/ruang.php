<div class="container mt-3">

	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash() ?>
		</div>
	</div>

	<div class="row mb-3">
		<div class="col-lg-6">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary tombolTambahDataR" data-bs-toggle="modal" data-bs-target="#formModal">
				TAMBAH
			</button>
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

	</div>
	<div class="row">
		<div class="col-lg-6">

			<h3>Daftar Ruang</h3>

			<ul class="list-group">
				<?php foreach ($data['ruang'] as $ruang) : ?>
					<li class="list-group-item">
						<?= $ruang['kodeR'] ?>
						<?= $ruang['namaR'] ?>
						<a href="<?= BASEURL; ?>/perekaman/editR/<?= $ruang['kodeR']; ?>" class="badge badge-warning float-end ms-1 tampilModalUbahR" style="color:black" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $ruang['kodeR']; ?>">edit</a>
						<a href="<?= BASEURL; ?>/perekaman/hapusR/<?= $ruang['kodeR']; ?>" class="badge badge-danger float-end ms-1" style="color:black" onclick="return confirm('yakin?')">hapus</a>

					</li>
				<?php endforeach; ?>
			</ul>
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
				<button type="submit" class="btn btn-primary">Tambah Data</button>
				</form>
			</div>
		</div>
	</div>
</div>
