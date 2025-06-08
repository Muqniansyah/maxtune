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
  <img src="<?php echo base_url() ?>assets/img/blog/1.jpg" alt="Maintenance" />

  <h1>Perawatan Rutin Agar Motor Awet</h1>

  <div class="container">
    <p><strong>Sinopsis:</strong></p>
    <p>
      Menjaga performa motor tidak cukup hanya dengan dipakai. Artikel ini membahas tips perawatan sederhana
      yang bisa dilakukan di rumah agar motor tetap prima dan awet digunakan dalam jangka panjang.
    </p>

    <p><strong>Konten:</strong></p>
    <p>
      Merawat motor secara rutin adalah kunci utama agar kendaraan selalu dalam kondisi prima dan tidak mudah rusak.
      Beberapa langkah sederhana yang bisa dilakukan sendiri di rumah antara lain:
    </p>

    <ul>
      <li>Cek tekanan ban secara berkala untuk menghindari ban cepat aus.</li>
      <li>Bersihkan rantai dan lumasi setiap seminggu sekali agar putaran mesin tetap halus.</li>
      <li>Panaskan motor setiap pagi selama 2–5 menit sebelum digunakan.</li>
      <li>Cek air radiator (untuk motor matic/berpendingin cairan) agar mesin tidak overheat.</li>
      <li>Cuci motor secara rutin, terutama setelah terkena hujan atau lumpur.</li>
    </ul>

    <p>
      Walau terlihat sederhana, kebiasaan ini akan memperpanjang usia komponen motor dan menghemat biaya
      perbaikan di kemudian hari.
    </p>
  </div>

  <div class="back-button">
    <a href="<?php echo base_url() ?>maxtune">← Kembali</a>
  </div>
</section>
