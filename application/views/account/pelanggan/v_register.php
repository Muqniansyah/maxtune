<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Bengkel Online</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS kustom yang serupa dengan halaman login untuk konsistensi */
        body {
            background-image: url("assets/img/login/login2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .register-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            /* Lebih lebar sedikit dari login karena lebih banyak field */
            margin: 40px 0; /* Tambahan jarak atas dan bawah */
        }

        .register-container h2 {
            margin-bottom: 25px;
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }

        .alert {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .text-center {
            text-align: center;
        }

        .link-login {
            display: block;
            margin-top: 15px;
            color: #007bff;
        }

        small.text-danger {
            display: block;
            /* Agar error validasi di bawah input */
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h2>Daftar Akun Baru</h2>

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
        // Menampilkan semua error validasi form secara keseluruhan jika ada
        // Ini akan muncul jika ada beberapa field yang gagal validasi
        if (validation_errors()) {
            echo '<div class="alert alert-danger">' . validation_errors() . '</div>';
        }
        ?>

        <?php
        // Memulai form dengan helper form_open().
        // 'auth/register' adalah URL action dari form, yang akan mengarah ke method register di Auth controller.
        // Ini juga secara otomatis menambahkan CSRF token tersembunyi.
        echo form_open('registeruser');
        ?>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Minimal 4 karakter, hanya huruf dan angka" required>
            <?php echo form_error('username', '<small class="text-danger">', '</small>'); // Menampilkan error spesifik field username 
            ?>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="contoh@domain.com" required>
            <?php echo form_error('email', '<small class="text-danger">', '</small>'); // Menampilkan error spesifik field email 
            ?>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 6 karakter" required>
            <?php echo form_error('password', '<small class="text-danger">', '</small>'); // Menampilkan error spesifik field password 
            ?>
        </div>
        <div class="form-group">
            <label for="passconf">Konfirmasi Password:</label>
            <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Ulangi password Anda" required>
            <?php echo form_error('passconf', '<small class="text-danger">', '</small>'); // Menampilkan error spesifik field konfirmasi password 
            ?>
        </div>
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap (Opsional):</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>" placeholder="Nama Lengkap Anda">
            <?php echo form_error('nama_lengkap', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="no_telepon">Nomor Telepon (Opsional):</label>
            <input type="tel" class="form-control" id="no_telepon" name="no_telepon" value="<?php echo set_value('no_telepon'); ?>" placeholder="Contoh: 08123456789">
            <?php echo form_error('no_telepon', '<small class="text-danger">', '</small>'); ?>
        </div>

        <button type="submit" class="btn btn-primary">Daftar Akun</button>
        <?php echo form_close(); ?>
        <div class="text-center">
            <a href="<?php echo base_url().'loginuser' ?>" class="link-login">Sudah punya akun? Masuk di sini.</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>