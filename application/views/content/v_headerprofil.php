<!-- Font Awesome & Bootstrap CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    body {
        background-color: #f4f6f8;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .profile-card {
        max-width: 700px;
        margin: 60px auto;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        padding: 30px 40px;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .profile-header i {
        font-size: 60px;
        color: #007bff;
        margin-bottom: 10px;
    }

    .profile-header h3 {
        margin-bottom: 5px;
        font-weight: 600;
        color: #333;
    }

    .profile-header p {
        color: #666;
        font-size: 14px;
    }

    .profile-info .form-group {
        margin-bottom: 20px;
    }

    .profile-info label {
        font-weight: 600;
        color: #444;
    }

    .profile-info input {
        background-color: #f8f9fa;
        color: #555;
        border-radius: 6px;
        border: 1px solid #ced4da;
        padding: 10px;
    }

    .profile-info input:disabled {
        background-color: #e9ecef;
    }

    .btn-logout {
        width: 100%;
        background-color: #dc3545;
        border: none;
        padding: 12px;
        font-size: 16px;
        border-radius: 6px;
        color: white;
        transition: background-color 0.3s ease;
    }

    .btn-logout:hover {
        background-color: #c82333;
    }
</style>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success text-center"><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger text-center"><?= $this->session->flashdata('error'); ?></div>
<?php endif; ?>

<?php $this->load->view("partial/v_header.php") ?>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php $this->load->view("partial/v_sidebar.php") ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <?php $this->load->view("partial/v_topbar.php") ?>

            <!-- Main Content -->
            <div id="content">
                <div class="container-fluid mt-5">
                    <!-- start konten profile -->
                    <div class="profile-card">
                        <?php if (isset($admin)): ?>
                            <div class="profile-header">
                                <i class="fas fa-user-shield"></i>
                                <h3><?= $admin['nama']; ?></h3>
                                <p><?= $admin['email']; ?></p>
                            </div>

                            <div class="profile-info">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="<?= $admin['username']; ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="<?= $admin['email']; ?>" disabled>
                                </div>

                                <form action="<?= base_url('login/logout'); ?>" method="post">
                                    <button type="submit" class="btn-logout">Keluar</button>
                                </form>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-warning text-center">Data admin tidak ditemukan.</div>
                        <?php endif; ?>
                    </div>

                    <!-- Ganti Password -->
                    <div class="profile-card mt-4">
                        <div class="profile-header">
                            <i class="fas fa-key"></i>
                            <h3>Ganti Password</h3>
                        </div>

                        <?php if ($this->session->flashdata('password_success')): ?>
                            <div class="alert alert-success text-center"><?= $this->session->flashdata('password_success'); ?></div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('password_error')): ?>
                            <div class="alert alert-danger text-center"><?= $this->session->flashdata('password_error'); ?></div>
                        <?php endif; ?>

                        <form action="<?= base_url('dashboard/updatepassword'); ?>" method="post">
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="password" name="password_lama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" name="password_baru" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password Baru</label>
                                <input type="password" name="konfirmasi_password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Simpan Password Baru</button>
                        </form>
                    </div>
                    <!-- akhir konten profile -->
                </div>
                <?php $this->load->view("partial/v_footer.php") ?>
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Benar ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Ingin keluar dari dashboard?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href=" <?php echo base_url().'login' ?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("partial/v_js.php") ?>
</body>
</html>