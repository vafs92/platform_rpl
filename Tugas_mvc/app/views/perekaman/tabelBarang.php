<div class="container mt-3">

	<div class="row mb-3">
		<div class="col-lg-6">
			<form action="<?= BASEURL; ?>/perekaman/caritabelB" method="POST">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="cari barang..." name="keyword" id="keyword" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" id="tombolCari">Search</button>
					</div>
				</div>
			</form>
		</div>

	</div>
	<div class="row">
		<div class="col-lg-6">

			<h3>Daftar Barang</h3>

			<ul class="list-group">
				<?php foreach ($data['barang'] as $barang) : ?>
					<li class="list-group-item">
						<?= $barang['kodeB'] ?>
						<?= $barang['namaB'] ?>

					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

</div>

