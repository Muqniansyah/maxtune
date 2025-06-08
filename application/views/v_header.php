<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maxtune</title>
    <!-- Linking Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- seting base_url( ) untuk memudahkan dalam menghubungkan file view dengan file css nya. -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/landing-style.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <!-- navbar start -->
  <nav>
    <div class="nav-content">
      <div class="logo">
        <img src="<?php echo base_url() ?>assets/img/logo/mylogo.png" alt="maxtune-logo">
      </div>
      <!-- Tambahkan tombol hamburger menu -->
      <div class="menu-toggle">
        <i class="bi bi-list"></i>
      </div>
      <ul class="nav-links">
        <li class="center"><a href="<?php echo base_url().'maxtune' ?>">Beranda</a></li>
        <li class="center"><a href="<?php echo base_url().'maxtune/about' ?>">Tentang</a></li>
        <li class="center"><a href="<?php echo base_url().'maxtune/services' ?>">Servis</a></li>
        <li class="center"><a href="<?php echo base_url().'maxtune/berita' ?>">Berita</a></li>
        <li class="center"><a href="<?php echo base_url().'maxtune/contact' ?>">Kontak</a></li>
      </ul>
    </div>
  </nav>
  <!-- navbar end -->

  <!-- jumbotron start -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Bengkel <span>Terpercaya</span><br> untuk Pelayanan<span>Tepat Waktu</span></h1>
    </div>
  </div>
  <!-- jumbotron end -->

  <!-- title bar start -->
  <div class="d-flex justify-content-center">
    <div class="col-10 title-bar">
      <h1 class="judul"><?php echo $judul ?></h1>
    </div>
  </div>
  <!-- title bar end -->
</body>
</html>
