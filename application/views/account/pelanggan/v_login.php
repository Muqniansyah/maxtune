<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Bengkel Online</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* CSS kustom untuk styling halaman login */
        body {
            background-color: #f8f9fa;
            /* Warna latar belakang halaman */
            display: flex;
            /* Menggunakan flexbox untuk centering konten */
            justify-content: center;
            /* Pusatkan secara horizontal */
            align-items: center;
            /* Pusatkan secara vertikal */
            min-height: 100vh;
            /* Tinggi minimal 100% dari viewport */
            margin: 0;
            /* Hapus margin default body */
        }

        .login-container {
            background-color: #ffffff;
            /* Warna latar belakang kontainer login */
            padding: 30px;
            /* Padding di dalam kontainer */
            border-radius: 8px;
            /* Sudut membulat */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            /* Efek bayangan */
            width: 100%;
            /* Lebar 100% */
            max-width: 400px;
            /* Lebar maksimal kontainer */
        }

        .login-container h2 {
            margin-bottom: 25px;
            /* Margin bawah untuk judul */
            text-align: center;
            /* Pusatkan teks judul */
            color: #333;
            /* Warna teks judul */
        }

        .form-group {
            margin-bottom: 20px;
            /* Margin bawah untuk setiap grup form (label + input) */
        }

        .form-control {
            border-radius: 5px;
            /* Sudut membulat untuk input form */
        }

        .btn-primary {
            width: 100%;
            /* Tombol login mengambil lebar penuh */
            padding: 10px;
            /* Padding tombol */
            border-radius: 5px;
            /* Sudut membulat tombol */
        }

        /* Styling untuk alert (pesan sukses/error) */
        .alert {
            margin-bottom: 15px;
            /* Margin bawah alert */
            padding: 10px;
            /* Padding alert */
            border-radius: 5px;
            /* Sudut membulat alert */
        }

        .alert-success {
            background-color: #d4edda;
            /* Warna latar belakang hijau muda */
            color: #155724;
            /* Warna teks hijau tua */
            border-color: #c3e6cb;
            /* Warna border hijau lebih terang */
        }

        .alert-danger {
            background-color: #f8d7da;
            /* Warna latar belakang merah muda */
            color: #721c24;
            /* Warna teks merah tua */
            border-color: #f5c6cb;
            /* Warna border merah lebih terang */
        }

        .text-center {
            text-align: center;
            /* Pusatkan teks */
        }

        .link-registrasi {
            display: block;
            /* Membuat link menjadi blok agar bisa diberi margin atas */
            margin-top: 15px;
            /* Margin atas untuk link registrasi */
            color: #007bff;
            /* Warna link biru */
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Masuk Bengkel Online</h2>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php
        /*
         * Menampilkan error validasi form secara keseluruhan jika ada.
         * Fungsi validation_errors() dari helper form_validation CodeIgniter
         * akan mengembalikan string berisi semua error validasi yang terjadi.
         * Ini berguna jika ada beberapa field yang gagal validasi.
         */
        if (validation_errors()) {
            echo '<div class="alert alert-danger">' . validation_errors() . '</div>';
        }
        ?>

        <?php echo form_open('loginuser'); ?>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Masukkan Username" required>
            <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Anda" required>
            <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Masuk</button>
        <?php echo form_close(); ?>
        <div class="text-center">
            <a href="<?php echo base_url().'registeruser' ?>" class="link-registrasi">Belum punya akun? Daftar sekarang!</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>