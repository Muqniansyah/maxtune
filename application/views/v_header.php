<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maxtune</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- seting base_url( ) untuk memudahkan dalam menghubungkan file view dengan file css nya. -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <!-- navbar start -->
  <nav>
    <div class="nav-content">
      <div class="logo">
        <img src="<?php echo base_url() ?>assets/img/mylogo.png" alt="maxtune-logo">
      </div>
      <!-- Tambahkan tombol hamburger menu -->
      <div class="menu-toggle">
        <i class="bi bi-list"></i>
      </div>
      <ul class="nav-links">
        <li class="center"><a href="<?php echo base_url().'maxtune' ?>">Home</a></li>
        <li class="center"><a href="<?php echo base_url().'maxtune/about' ?>">About</a></li>
        <li class="center"><a href="<?php echo base_url().'maxtune/services' ?>">Services</a></li>
        <li class="center"><a href="<?php echo base_url().'maxtune/berita' ?>">Berita</a></li>
        <li class="center"><a href="<?php echo base_url().'maxtune/contact' ?>">Contact</a></li>
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

  <!-- CSS -->
  <style>
    /* CSS untuk hamburger menu */
    .menu-toggle {
      display: none; /* Sembunyikan secara default untuk versi desktop */
      cursor: pointer;
      color: #333;
      font-size: 28px;
      position: absolute;
      right: 20px;
      top: 20px;
      z-index: 1000
    }

    /* Style untuk ikon hamburger menu */
    .menu-toggle i {
      vertical-align: middle;
    }

    /* Tampilkan tombol hamburger menu pada media query tertentu */
    @media screen and (max-width: 768px) {
      .menu-toggle {
        display: block; /* Tampilkan saat tampilan berukuran kecil */
      }

      .nav-content {
        display: flex; /* Tampilkan navbar secara default */
      }

      .nav-links {
        display: none; /* Sembunyikan navbar pada tampilan kecil */
        flex-direction: column;
        background-color: rgba(240, 248, 254, 0.5);
        position: fixed;
        top: 60px;
        right: -100%;
        height: 100vh;
        width: 40%;
        padding-top: 80px;
        text-align: center;
        transition: all 0.9s ease;
        z-index: 999;
      }

      .nav-links.show {
        right: 0; /* Tampilkan navbar dari samping */
      }

      .nav-links li {
        margin: 10px 0;
      }

      .nav-links li a {
        padding: 10px;
        color: Black;
        font-size: 25px;      
      }
    }
  </style>
  <!-- End CSS -->

  <!-- JavaScript -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const menuToggle = document.querySelector(".menu-toggle");
      const navLinks = document.querySelector(".nav-links");

      menuToggle.addEventListener("click", function () {
        navLinks.classList.toggle("show");
      });
    });
  </script>
  <!-- End JavaScript -->

  <!-- Your content here -->

</body>
</html>
