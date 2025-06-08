<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pembayaran</title>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Ubuntu', sans-serif;
      background-color: #f0f2f5;
      margin: 0;
      padding: 0;
    }

    .payment-container {
      max-width: 500px;
      margin: 60px auto;
      background-color: #fff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .payment-container h1 {
      font-size: 28px;
      margin-bottom: 30px;
      color: #333;
    }

    .payment-container img {
      max-width: 100%;
      height: auto;
      border-radius: 12px;
      margin-bottom: 25px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .btn-confirm {
      background-color: #28a745;
      color: #fff;
      border: none;
      padding: 12px 28px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-confirm:hover {
      background-color: #218838;
      transform: scale(1.03);
    }

    @media (max-width: 600px) {
      .payment-container {
        padding: 30px 20px;
      }

      .payment-container h1 {
        font-size: 22px;
      }

      .btn-confirm {
        width: 100%;
        font-size: 15px;
      }
    }
  </style>
</head>
<body>

<div class="payment-container">
  <h1>Pembayaran</h1>
  <img src="<?php echo base_url() ?>assets/img/pembayaran/qris.jpeg" alt="QRIS Maxtune">

  <button onclick="konfirmasiPembayaran()" class="btn-confirm">Konfirmasi Pembayaran</button>
</div>

<script>
  function konfirmasiPembayaran() {
    // Tampilkan alert
    alert("Pembayaran berhasil dikonfirmasi.");

    // Redirect ke halaman tujuan
    window.location.href = "<?= base_url('maxtune') ?>";
  }
</script>
</body>
</html>
