<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap");

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

    .btn-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-custom {
        position: relative;
        height: 55px;
        width: 180px;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 1px;
        border-radius: 8px;
        text-transform: uppercase;
        border: 2px solid transparent;
        outline: none;
        cursor: pointer;
        overflow: hidden;
        transition: 0.6s;
        text-align: center;
    }

    .btn-link-custom {
        background-color: white;
        color: #6c757d;
        border: 2px solid #6c757d;
    }

    .btn-link-custom:hover {
        background-color: #6c757d;
        color: white;
    }

    .btn-print {
        background-color: white;
        color: #6c757d;
        border: 2px solid #6c757d;
    }

    .btn-print:hover {
        background-color: #6c757d;
        color: white;
    }

    .btn-primary-custom {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #007bff;
        color: white;
        border: 2px solid #007bff;
        text-decoration: none;
    }

    .btn-primary-custom:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        color: white;
        text-decoration: none;
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
            font-size: 18px;
            height: 50px;
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
        <h2>Checkout Pelayanan Servis</h2>
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
                <button type="submit" class="btn-custom btn-link-custom">Batalkan</button>
            </form>
            <button type="button" class="btn-custom btn-print" onclick="window.print()">Print</button>
            <a href="<?php echo base_url().'maxtune/bayar' ?>" class="btn-custom btn-primary-custom">Bayar</a>
        </div>
    </div>
</section>

<script>
    var jenisServisValue = '<?php echo isset($form_data['jenis_servis']) ? $form_data['jenis_servis'] : ''; ?>';

    document.addEventListener('DOMContentLoaded', function () {
        var selectedOption = jenisServisValue;
        var totalHargaElement = document.getElementById('total-harga');

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
