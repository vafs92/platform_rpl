<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman <?= $data['judul']; ?> </title>
    <link rel="stylesheet" href="<?= BASEURL; ?> /css/bootstrap.css">
    <!-- Vendor CSS Files -->
    <link href="<?= BASEURL; ?>/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= BASEURL; ?>/assets/css/style.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid mt-1">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <nav class="navbar navbar-light bg-light">
    <div class="container">
      <!-- <a class="navbar-brand" href="#"> -->
        <img src="<?= BASEURL; ?>/img/logoUSD.jpg" height="80"alt=""/>
       <!-- </a> -->
    </div>
  </nav>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="container mt-1">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/home/indexLogin">Home</a>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="perekamanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Perekaman Sarana Dan Prasarana</a>
              <ul class="dropdown-menu" aria-labelledby="perekamanDropdown">
                <?php if ($_SESSION['role'] === 'BIRO' || $_SESSION['role'] === 'SEKRE') : ?>
                  <li><a class="dropdown-item" href="<?= BASEURL; ?>/perekaman/ruang">Ruang</a></li>
                  <li><a class="dropdown-item" href="<?= BASEURL; ?>/perekaman/barang">Barang</a></li>
                  <?php endif; ?>
                  <?php if($_SESSION['role'] === 'USER') :?> 
                  <li><a class="dropdown-item" href="<?= BASEURL; ?>/perekaman/tabelRuang">Ruang</a></li>
                  <li><a class="dropdown-item" href="<?= BASEURL; ?>/perekaman/tabelBarang">Barang</a></li>
                  <?php endif; ?>
              </ul>
            </div>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="permintaanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Peminjaman</a>
              <ul class="dropdown-menu" aria-labelledby="permintaanDropdown">
                  <li><a class="dropdown-item" href="<?= BASEURL; ?>/permintaan/status">Status Permintaan</a></li>
                  <?php if ($_SESSION['role'] === 'USER'):?>
                  <li><a class="dropdown-item" href="<?= BASEURL; ?>/permintaan/tambah">Perekaman Permintaan</a></li>
                  <?php endif;?>
                  <?php if ($_SESSION['role'] === 'SEKRE'):?>
                  <li><a class="dropdown-item" href="<?= BASEURL; ?>/permintaan/verif">Verifikasi</a></li>
                  <?php endif;?>
                  <?php if ($_SESSION['role'] === 'BIRO'):?>
                  <li><a class="dropdown-item" href="<?= BASEURL; ?>/permintaan/konfirmasi">Konfirmasi</a></li>
                  <?php endif;?>
              </ul>
            </div>
            <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/home/logout">Logout</a>
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

