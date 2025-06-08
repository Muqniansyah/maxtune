<style>
  section {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 1.7;
    color: #333;
  }

  section img {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 20px;
  }

  section h1 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #222;
    border-left: 5px solid #007BFF;
    padding-left: 15px;
  }

  section .container {
    font-size: 16px;
  }

  section .container p {
    margin-bottom: 12px;
  }

  section .container::first-line {
    font-weight: bold;
  }

  .back-button {
    margin-top: 30px;
    text-align: left;
  }

  .back-button a {
    display: inline-block;
    padding: 10px 18px;
    background-color: #007BFF;
    color: #fff;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .back-button a:hover {
    background-color: #0056b3;
    transform: translateX(-3px);
    box-shadow: 0 4px 12px rgba(0, 123, 255, 0.2);
  }
</style>

<section>
  <img src="<?php echo base_url() ?>assets/img/blog/4.jpg" alt="Servis Sendiri atau Montir" />

  <h1>Pilih Montir atau Servis Sendiri?</h1>

  <div class="container">
    <p><strong>Sinopsis:</strong></p>
    <p>
      Beberapa orang masih bingung apakah harus mempercayakan motornya ke bengkel atau mencoba servis sendiri.
      Artikel ini membandingkan kelebihan dan risiko dari masing-masing pilihan.
    </p>

    <p><strong>Konten:</strong></p>
    <p>Melakukan servis sendiri memang bisa lebih hemat, tapi juga ada risikonya. Berikut perbandingannya:</p>

    <p><strong>Servis Sendiri:</strong></p>
    <ul>
      <li>Lebih murah</li>
      <li>Lebih fleksibel</li>
      <li>Menambah pengetahuan</li>
    </ul>

    <p><strong>Bengkel Profesional:</strong></p>
    <ul>
      <li>Dikerjakan oleh ahli</li>
      <li>Alat lebih lengkap</li>
      <li>Lebih aman untuk servis besar</li>
    </ul>

    <p>
      Untuk perawatan ringan, kamu bisa coba sendiri. Tapi untuk sistem vital seperti rem, CVT, dan mesin,
      sebaiknya tetap ke bengkel agar hasilnya aman dan maksimal.
    </p>
  </div>

  <div class="back-button">
    <a href="<?php echo base_url() ?>maxtune">← Kembali</a>
  </div>
</section>

