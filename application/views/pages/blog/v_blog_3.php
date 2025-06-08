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
  <img src="<?php echo base_url() ?>assets/img/blog/3.jpg" alt="Servis Berkala" />

  <h1>Mengenal Jenis Servis Berkala Motor</h1>

  <div class="container">
    <p><strong>Sinopsis:</strong></p>
    <p>
      Apa saja jenis servis berkala yang penting untuk kendaraan roda dua?
      Artikel ini mengulas servis ringan, sedang, dan berat serta manfaatnya untuk performa dan keamanan berkendara.
    </p>

    <p><strong>Konten:</strong></p>
    <p>
      Servis berkala sangat penting untuk menjaga keamanan dan kenyamanan berkendara. Umumnya dibagi menjadi:
    </p>

    <ul>
      <li><strong>Servis Ringan</strong> (tiap 2.000–3.000 km): ganti oli, cek ban, bersihkan filter.</li>
      <li><strong>Servis Sedang</strong> (tiap 5.000–8.000 km): servis ringan + cek kampas rem, CVT, aki.</li>
      <li><strong>Servis Besar</strong> (setahun sekali): pengecekan mendalam, termasuk kelistrikan dan ruang bakar.</li>
    </ul>

    <p>
      Lakukan servis rutin agar performa motor tetap optimal dan mencegah kerusakan besar yang bisa menguras kantong.
    </p>
  </div>

  <div class="back-button">
    <a href="<?php echo base_url() ?>maxtune">← Kembali</a>
  </div>
</section>


