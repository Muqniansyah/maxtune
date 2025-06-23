<!-- Font Awesome untuk ikon user -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f8;
        margin: 0;
        padding: 0;
    }

    section {
        max-width: 800px;
        margin: 40px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .profile-avatar {
        width: 90px;
        height: 90px;
        background-color: #007bff;
        color: white;
        border-radius: 50%;
        font-size: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }

    section h3 {
        text-align: center;
        margin-bottom: 5px;
        color: #333;
    }

    section p {
        text-align: center;
        margin-bottom: 25px;
        color: #666;
    }

    .form-container {
        width: 100%;
    }

    .form-group {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .form-group.full-width {
        flex-direction: column;
        gap: 0;
    }

    .form-field {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 6px;
        font-weight: 600;
        color: #444;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background-color: #f8f9fa;
        color: #555;
    }

    input:disabled {
        background-color: #e9ecef;
        color: #777;
        cursor: not-allowed;
    }

    .help-text {
        font-size: 0.85em;
        color: #999;
        margin-top: 5px;
    }

    .submit-button {
        background-color: #dc3545;
        color: white;
        padding: 12px;
        border: none;
        width: 100%;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-button:hover {
        background-color: #c82333;
    }

    .simpan-button {
        background-color: #9FC87E;
        color: white;
        padding: 12px;
        border: none;
        width: 100%;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .simpan-button:hover {
        background-color: #16610E;
    }

    .error {
        background-color: #f8d7da;
        color: #842029;
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 20px;
        border: 1px solid #f5c2c7;
    }
</style>

<?php
$customer = $this->session->userdata('customer');
?>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif; ?>

<section>
    <div class="profile-avatar">
        <i class="fas fa-user"></i>
    </div>

    <?php if (isset($customer)): ?>
        <h3><?php echo $customer['nama_lengkap'] ?: $customer['username']; ?></h3>
        <p><?php echo $customer['email']; ?></p>

        <div class="form">
            <div class="form-container">
                <?php echo form_open('loginuser/logout'); ?>

                <div class="form-group full-width">
                    <div class="form-field">
                        <label for="username">Username</label>
                        <input type="text" id="username" disabled value="<?php echo $customer['username']; ?>">
                        <p class="help-text">Ini akan menjadi cara nama Anda ditampilkan di bagian akun dan dalam ulasan</p>
                    </div>
                </div>

                <div class="form-group full-width">
                    <div class="form-field">
                        <label for="no_telepon">Nomor Telepon</label>
                        <input type="text" id="no_telepon" disabled value="<?php echo $customer['no_telepon']; ?>">
                    </div>
                </div>

                <div class="form-group full-width">
                    <div class="form-field">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" disabled value="<?php echo $customer['email']; ?>">
                    </div>
                </div>

                <div class="form-group full-width">
                    <button type="submit" class="submit-button">Keluar</button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    <?php else: ?>
        <p class="text-danger text-center">Data pengguna tidak ditemukan.</p>
    <?php endif; ?>

    <hr style="margin: 30px 0;">

    <h4>Ganti Password</h4>
    <?php echo form_open('maxtune/ganti_password'); ?>

    <div class="form-group full-width">
        <div class="form-field">
            <label for="password_lama">Password Lama</label>
            <input type="password" id="password_lama" name="password_lama" class="form-control" required>
        </div>
    </div>

    <div class="form-group full-width">
        <div class="form-field">
            <label for="password_baru">Password Baru</label>
            <input type="password" id="password_baru" name="password_baru" class="form-control" required>
        </div>
    </div>

    <div class="form-group full-width">
        <div class="form-field">
            <label for="konfirmasi_password">Konfirmasi Password Baru</label>
            <input type="password" id="konfirmasi_password" name="konfirmasi_password" class="form-control" required>
        </div>
    </div>

    <div class="form-group full-width">
        <button type="submit" class="simpan-button">Simpan Password Baru</button>
    </div>

    <?php echo form_close(); ?>
</section>
