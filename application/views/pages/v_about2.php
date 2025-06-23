<style>
  .parallax-section {
    background-image: url("<?= base_url('assets/img/clients/background.jpg') ?>");
    min-height: 300px;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    display: flex;
    align-items: center;
    color: white;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
    padding: 60px 0;
    overflow: hidden;
  }

  /* Overlay abu-abu transparan */
  .parallax-section::before {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    background: rgba(128, 128, 128, 0.5); /* abu-abu transparan */
    z-index: 0;
  }

  /* Kontainer di atas overlay */
  .parallax-section .container {
    position: relative;
    z-index: 1;
  }

  .parallax-section h3 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 40px;
  }

  .parallax-section img {
    max-width: 150px;
    height: auto;
    transition: transform 0.3s ease, opacity 0.3s ease;
    opacity: 0.9;
    filter: drop-shadow(0 3px 6px rgba(0, 0, 0, 0.4));
    margin: 0 auto;
    display: block;
  }

  .parallax-section img:hover {
    transform: scale(1.1);
    opacity: 1;
    filter: drop-shadow(0 6px 12px rgba(0,0,0,0.5));
  }

  /* daftar harga servis style */
  .card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: auto;
  }

  .card {
    background-color: #fff;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.12);
  }

  .card::before {
    content: "";
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(120deg, #007bff, #6610f2);
    transform: rotate(45deg);
    opacity: 0.08;
  }

  .card-icon {
    font-size: 40px;
    color: #007bff;
    margin-bottom: 10px;
  }

  .card-title {
    font-size: 18px;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    position: relative;
    z-index: 1;
  }

  .card-price {
    font-size: 16px;
    color: #28a745;
    font-weight: 500;
    position: relative;
    z-index: 1;
  }
</style>

<!-- Clients Start -->
<section id="clients" class="parallax-section text-center text-white d-flex align-items-center">
  <div class="container">
    <h2 class="mb-5">Partner <span>Kami</span></h2>
    <div class="row justify-content-center">
      <div class="col-md-3 col-6 mb-4">
        <img src="<?= base_url('assets/img/clients/yamaha.png') ?>" alt="Yamaha" class="img-fluid">
      </div>
      <div class="col-md-3 col-6 mb-4">
        <img src="<?= base_url('assets/img/clients/astra.png') ?>" alt="Astra" class="img-fluid">
      </div>
    </div>
  </div>
</section>
<!-- Clients End -->

<!-- Jenis Service Start -->
<section>
  <h2 style="text-align: center; margin-bottom: 30px; margin-top: 80px;">Daftar Harga Servis</h2>

  <div class="card-container">
    <div class="card">
      <div class="card-icon"><i class="fas fa-oil-can"></i></div>
      <div class="card-title">Ganti Oli Mesin</div>
      <div class="card-price">Rp 50.000</div>
    </div>
    <div class="card">
      <div class="card-icon"><i class="fas fa-tools"></i></div>
      <div class="card-title">Tune Up</div>
      <div class="card-price">Rp 70.000</div>
    </div>
    <div class="card">
      <div class="card-icon"><i class="fas fa-oil-can"></i></div>
      <div class="card-title">Ganti Oli Gardan</div>
      <div class="card-price">Rp 15.000</div>
    </div>
    <div class="card">
      <div class="card-icon"><i class="fas fa-bolt"></i></div>
      <div class="card-title">Ganti Busi</div>
      <div class="card-price">Rp 50.000</div>
    </div>
    <div class="card">
      <div class="card-icon"><i class="fas fa-wind"></i></div>
      <div class="card-title">Ganti Filter Udara</div>
      <div class="card-price">Rp 60.000</div>
    </div>
    <div class="card">
      <div class="card-icon"><i class="fas fa-car-crash"></i></div>
      <div class="card-title">Ganti Kampas Rem</div>
      <div class="card-price">Rp 60.000</div>
    </div>
    <div class="card">
      <div class="card-icon"><i class="fas fa-car-battery"></i></div>
      <div class="card-title">Perawatan Aki</div>
      <div class="card-price">Rp 150.000</div>
    </div>
    <div class="card">
      <div class="card-icon"><i class="fas fa-cogs"></i></div>
      <div class="card-title">Bongkar Pasang Mesin</div>
      <div class="card-price">Rp 500.000</div>
    </div>
    <div class="card">
      <div class="card-icon"><i class="fas fa-circle-notch"></i></div>
      <div class="card-title">Tambal Ban</div>
      <div class="card-price">Rp 15.000</div>
    </div>
    <div class="card">
      <div class="card-icon"><i class="fas fa-motorcycle"></i></div>
      <div class="card-title">Bore Up</div>
      <div class="card-price">Rp 700.000</div>
    </div>
  </div>
</section>
<!-- Jenis Service End -->

