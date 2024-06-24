<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Lato', sans-serif;
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

        .btn-custom {
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 30px;
            margin: 5px;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary-custom {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .btn-link-custom {
            color: #007bff;
            text-decoration: none;
            border: 2px solid #007bff;
            border-radius: 30px;
            padding: 10px 25px;
            display: inline-block;
        }

        .btn-print {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
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
            <p><strong>Total Harga:</strong> <span id="total-harga"></span></p>
        </div>
        <div class="mt-3">
            <button type="button" class="btn btn-print btn-custom" onclick="window.print()">Print</button>
            <form method="post" action="<?php echo base_url('maxtune/hapusform/'); ?>">
                <button type="submit" class="btn-link-custom btn-custom">
                    Batalkan dan Kembali ke Beranda
                </button>
            </form>
            <a href="https://wa.me/6281220893249?" class="btn btn-primary btn-primary-custom btn-custom">Konfirmasi dan Lanjutkan Pembayaran</a>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

