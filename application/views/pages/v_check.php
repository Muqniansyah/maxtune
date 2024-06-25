<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    /* Importing Google Fonts */
    @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap");

    /* Base styles */
    body {
         background-color: #f0f0f0;
        font-family: "Ubuntu", sans-serif;
    }

    section {
        padding: 60px 0;
        background-color: #f0f0f0;
    }

    .container {
        background-color: #ffffff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 40px;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .container:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    h2 {
        font-size: 36px;
        margin-bottom: 30px;
        text-align: center;
        color: #333;
        font-weight: 700;
    }

    h3 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #444;
        font-weight: 600;
    }

    p {
        font-size: 16px;
        color: #555;
    }

    .summary {
        margin-top: 30px;
    }

    .summary h3 {
        font-size: 22px;
        margin-bottom: 15px;
        color: #444;
    }

    .summary p {
        font-size: 18px;
        color: #555;
    }

    /* General button style */
    .btn-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-custom {
        position: relative;
        height: 65px;
        width: 210px;
        margin: 0 20px; /* Reduced margin to fit buttons better */
        font-size: 23px;
        font-weight: 500;
        letter-spacing: 1px;
        border-radius: 5px;
        text-transform: uppercase;
        border: 1px solid transparent;
        outline: none;
        cursor: pointer;
        background: var(--white);
        overflow: hidden;
        transition: 0.6s;
        color: #17a2b8;
        border-color: #45474B;
        text-align: center;
    }

    .btn-custom:hover {
        color: #f2f2f2;
        background: #17a2b8;
    }

    .btn-custom:before,
    .btn-custom:after {
        position: absolute;
        content: "";
        left: 0;
        top: 0;
        height: 100%;
        filter: blur(30px);
        opacity: 0.4;
        transition: 0.6s;
    }

    .btn-custom:before {
        width: 60px;
        background: rgba(255, 255, 255, 0.6);
        transform: translateX(-130px) skewX(-45deg);
    }

    .btn-custom:after {
        width: 30px;
        background: rgba(255, 255, 255, 0.6);
        transform: translateX(-130px) skewX(-45deg);
    }

    .btn-custom:hover:before,
    .btn-custom:hover:after {
        opacity: 0.6;
        transform: translateX(320px) skewX(-45deg);
    }

    /* Primary button style */
    .btn-primary-custom {
        color: white;
        background-color: #007bff;
        text-decoration: none;
        border: 2px solid #007bff;
        border-radius: 30px;
        padding: 10px 25px;
        display: inline-block;
    }

    .btn-primary-custom:hover {
        color: #f2f2f2;
        background: #0056b3;
        text-decoration: none;
    }

    /* Link button style */
    .btn-link-custom {
        color: grey;
        background-color: #F7F9F2; 
        text-decoration: none;
        border-radius: 30px;
        display: inline-block;
    }

    .btn-link-custom:hover {
        color: black; 
        background-color: #91DDCF;
        text-decoration: none;

    }

    /* Print button style */
    .btn-print {
        background-color: #F7F9F2; 
        border-color: none;
        color: grey;
        border-radius: 30px; 
        padding: 10px 25px; 
        display: inline-block;
    }

    .btn-print:hover {
        color: black; 
        background-color: #91DDCF;
        border-color: none;
    }

    @media (max-width: 768px) {
        .col-md-6 {
            margin-bottom: 20px;
        }

        h2 {
            font-size: 28px;
        }

        h3 {
            font-size: 20px;
        }

        .btn-container {
            flex-direction: column;
            align-items: stretch;
            margin: 0 auto;
            gap: 10px;
        }

        .btn-custom {
            width: 100%;
            margin: 10px 0;
            font-size: 18px;
            height: 55px;
        }

        .container {
            padding: 20px;
        }

        section {
            padding: 20px 0;
        }

        .summary p {
            font-size: 16px;
        }

        .summary h3 {
            font-size: 20px;
        }
    }
</style>
<section>
    <div class="container">
        <h2>Checkout Booking Service</h2>
        <div class="row">
            <div class="col-md-6">
                <h3>Informasi Pelanggan:</h3>
                <p><strong>Nama:</strong> <?= !empty($form_data['nama']) ? htmlspecialchars($form_data['nama']) : ''; ?></p>
                <p><strong>Email:</strong> <?= !empty($form_data['email']) ? htmlspecialchars($form_data['email']) : ''; ?></p>
                <p><strong>No. HP:</strong> <?= !empty($form_data['nohp']) ? htmlspecialchars($form_data['nohp']) : ''; ?></p>
                <p><strong>Alamat:</strong> <?= !empty($form_data['alamat']) ? htmlspecialchars($form_data['alamat']) : ''; ?></p>
                <p><strong>Provinsi:</strong> <?= !empty($form_data['provinsi']) ? htmlspecialchars($form_data['provinsi']) : ''; ?></p>
                <p><strong>Kota:</strong> <?= !empty($form_data['kota']) ? htmlspecialchars($form_data['kota']) : ''; ?></p>
            </div>
            <div class="col-md-6">
                <h3>Detail Servis:</h3>
                <p><strong>Motor:</strong> <?= !empty($form_data['motor']) ? htmlspecialchars($form_data['motor']) : ''; ?></p>
                <p><strong>Jenis Servis:</strong> <?= !empty($form_data['jenis_servis']) ? htmlspecialchars($form_data['jenis_servis']) : ''; ?></p>
                <p><strong>Jadwal:</strong> <?= !empty($form_data['jadwal']) ? htmlspecialchars($form_data['jadwal']) : ''; ?></p>
                <p><strong>Jam:</strong> <?= !empty($form_data['jam']) ? htmlspecialchars($form_data['jam']) : ''; ?></p>
            </div>
        </div>
        <div class="summary">
            <h3>Ringkasan Pesanan:</h3>
            <p><strong>Montir:</strong> <?= htmlspecialchars($form_data['montir']); ?></p>
            <p><strong>Total Harga:</strong> <span id="total-harga"></span></p>
        </div>
        <div class="btn-container">
            <form method="post" action="<?= base_url('maxtune/hapusform/'); ?>">
                <button type="submit" class="btn-link-custom btn-custom">Batalkan</button>
            </form>
            <button type="button" class="btn-print btn-custom" onclick="window.print()">Print</button>
            <a href="https://wa.me/6281220893249?" class="btn-primary-custom btn-custom">Konfirmasi</a>
        </div>
    </div>
</section>

<script>
    // Ambil nilai jenis_servis dari PHP ke JavaScript untuk menghitung total harga
    var jenisServisValue = '<?php echo isset($form_data['jenis_servis']) ? $form_data['jenis_servis'] : ''; ?>';

    // Tambahkan event listener untuk menghitung total harga saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        var selectedOption = jenisServisValue;
        var totalHargaElement = document.getElementById('total-harga');

        // Pisahkan nama servis dan harga dengan regex
        var regex = /(.*) - (\d+)k/;
        var match = selectedOption.match(regex);
        if (match) {
            var harga = parseInt(match[2]);
            totalHargaElement.textContent = 'Rp ' + harga.toLocaleString();
        } else {
            totalHargaElement.textContent = '';
        }
    });
</script>


