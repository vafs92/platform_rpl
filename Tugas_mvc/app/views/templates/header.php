<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman <?= $data['judul']; ?> </title>
    <link rel="stylesheet" href="<?= BASEURL; ?> /css/bootstrap.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid mt-1">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="container mt-1">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/home/indexLogin">Home</a>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="perekamanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Perekaman Sarana Dan Prasarana</a>
              <ul class="dropdown-menu" aria-labelledby="perekamanDropdown">
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/perekaman/ruang">Ruang</a></li>
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/perekaman/barang">Barang</a></li>
              </ul>
            </div>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="permintaanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Peminjaman</a>
              <ul class="dropdown-menu" aria-labelledby="permintaanDropdown">
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/permintaan/status">Status Permintaan</a></li>
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/permintaan/tambah">Perekaman Permintaan</a></li>
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/permintaan/verif">Verifikasi</a></li>
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/permintaan/konfirmasi">Konfirmasi</a></li>
              </ul>
            </div>
            <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/AksiLogout/logout">Logout</a>
<!--             <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
          </div>
        </div>
      </div>
    </div>
  </nav>
  
  <script src="<?= BASEURL; ?>/js/bootstrap.bundle.js"></script>
</body>
</html>

