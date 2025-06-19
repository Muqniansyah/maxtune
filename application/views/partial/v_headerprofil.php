<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maxtune</title>
    <!-- Linking Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- seting base_url( ) untuk memudahkan dalam menghubungkan file view dengan file css nya. -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/landing-style.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>
    .profile-header {
        background-image: url('https://via.placeholder.com/1500x300/6c757d/ffffff?text=Background+Profile');
        /* Ganti dengan URL gambar background Anda */
        background-size: cover;
        background-position: center;
        padding: 200px 0;
        text-align: center;
        color: #fff;
        position: relative;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background-color: #007bff;
        /* Warna default avatar jika tidak ada gambar */
        display: inline-flex;
        justify-content: center;
        align-items: center;
        font-size: 4em;
        font-weight: bold;
        color: #fff;
        border: 4px solid #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        position: relative;
        margin-bottom: 15px;
    }

    .profile-avatar .edit-icon {
        position: absolute;
        bottom: 5px;
        right: 5px;
        background-color: #007bff;
        color: #fff;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 0.8em;
        cursor: pointer;
        border: 2px solid #fff;
    }

    .profile-header h3 {
        margin-bottom: 5px;
    }

    .profile-header p {
        font-size: 0.9em;
        opacity: 0.8;
    }

    .profile-content {
        padding: 30px 0;
    }

    nav-tabs .nav-link {
        color: #495057;
        border: 1px solid transparent;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #007bff;
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
    }

    .tab-content {
        padding: 20px;
        border: 1px solid #dee2e6;
        border-top: none;
        border-bottom-left-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
        background-color: #fff;
    }

    .content-area {
        display: flex;
        flex-direction: column;
        /* Default to column for smaller screens */
        gap: 40px;
        width: 100%;
    }



    .form-container {
        background-color: #fff;
        padding: 30px;
        margin-top: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        flex: 2;
        /* Allows it to take available space */
        min-width: 200px;
        width: 100%;

        align-items: center;
        position: center;
        /* Minimum width for the form side */
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr;
        /* Default to single column */
        gap: 20px;
    }

    @media (min-width: 768px) {

        /* Two columns for larger screens */
        .content-area {
            flex-direction: row;
            /* Row for larger screens */
        }

        .form-grid {
            grid-template-columns: 1fr 1fr;
            /* Two columns for some fields */
        }

        .full-width-field {
            grid-column: span 2;
            /* Full width for specific fields */
        }
    }

    .form-group {
        margin-bottom: 0;
        /* Managed by grid gap */
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea {
        width: calc(100% - 20px);
        /* Adjust for padding */
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        box-sizing: border-box;
        /* Include padding in width calculation */
    }

    textarea {
        min-height: 100px;
        /* Make textarea taller */
        resize: vertical;
        /* Allow vertical resizing */
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="tel"]:focus,
    textarea:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .required-star {
        color: red;
        margin-left: 2px;
    }

    .help-text {
        font-size: 0.9em;
        color: #666;
        margin-top: 5px;
    }

    .error {
        color: red;
        font-size: 0.9em;
        margin-top: 5px;
        margin-bottom: 15px;
        /* Add space below errors */
    }

    .submit-button,
    .logout-button {
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: auto;
        /* Adjust to content */
    }


    .submit-button {
        background-color: #ff0000;
        color: white;
        border-radius: 10px;
        align-items: center;
        width: 200px;
    }

    .logout-button {
        background-color: #dc3545;
        /* Red for logout */
        color: white;
        display: block;
        /* Make it a block element to span full width */
        margin-top: 20px;
        text-align: center;
    }

    .logout-button:hover {
        background-color: #c82333;
    }

    /* Styling for the empty right panel (if you decide to add content later) */
    .right-panel {
        flex: 2;
        /* This panel will take more space */
        background-color: #e9ecef;
        /* Light gray background */
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        display: flex;
        /* For centering text vertically */
        justify-content: center;
        align-items: center;
        color: #666;
        min-height: 200px;
        /* Minimum height */
        text-align: center;
    }
</style>

<body>
    <!-- navbar start -->
    <nav>
        <div class="nav-content">
            <div class="logo">
                <img src="<?php echo base_url() ?>assets/img/logo/mylogo.png" alt="maxtune-logo">
            </div>
            <!-- Tambahkan tombol hamburger menu -->
            <div class="menu-toggle">
                <i class="bi bi-list"></i>
            </div>
            <ul class="nav-links">
                <li class="center"><a href="<?php echo base_url() . 'maxtune' ?>">Beranda</a></li>
                <li class="center"><a href="<?php echo base_url() . 'maxtune/about' ?>">Tentang</a></li>
                <li class="center"><a href="<?php echo base_url() . 'maxtune/services' ?>">Servis</a></li>
                <li class="center"><a href="<?php echo base_url() . 'maxtune/berita' ?>">Berita</a></li>
                <li class="center"><a href="<?php echo base_url() . 'maxtune/contact' ?>">Kontak</a></li>
                <li class="center"><a href="<?php echo base_url() . 'maxtune/loginuser' ?>">Login</a></li>
                <li class="center"><a href="<?php echo base_url() . 'maxtune/profiluser' ?>">Akun Saya</a></li>


            </ul>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- jumbotron start -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="profile-header">
                <div class="profile-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <h3>Haikal sita fajri ramadhan</h3>
                <p>haikalsitafajriramadhan@gmail.com</p>
            </div>
        </div>


    </div>

    <!-- jumbotron end -->

    <!-- title bar start -->
    <div class="d-flex justify-content-center">
        <div class="col-10 title-bar p-10 m-10">
            <h1 class="judul"><?php echo $judul ?></h1>
        </div>
    </div>
    <!-- FORM -->
    <div class="form">
        <div class="form-container">
            <?php echo form_open('user/submit_form'); ?>

            <?php if (validation_errors()): ?>
                <div class="error">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <div class="form-field">
                    <label for="first_name">First name <span class="required-star">*</span></label>
                    <input type="text" id="first_name" name="first_name" disabled value="<?php echo set_value('first_name'); ?>">
                </div>

                <div class="form-field">
                    <label for="last_name">Last name <span class="required-star">*</span></label>
                    <input type="text" id="last_name" name="last_name" disabled value="<?php echo set_value('last_name'); ?>">
                </div>
            </div>

            <div class="form-group full-width">
                <div class="form-field">
                    <label for="display_name">Display name <span class="required-star">*</span></label>
                    <input type="text" id="display_name" name="display_name" disabled value="<?php echo set_value('display_name'); ?>">
                    <p class="help-text">This will be how your name will be displayed in the account section and in reviews</p>
                </div>
            </div>

            <div class="form-group full-width">
                <div class="form-field">
                    <label for="email_address">Email address <span class="required-star">*</span></label>
                    <input type="email" id="email_address" name="email_address" disabled value="<?php echo set_value('email_address'); ?>">
                </div>
            </div>

            <div class="form-group full-width">
                <button type="logout" class="submit-button">Logout</button>
            </div>

            <?php echo form_close(); ?>
        </div>
        <!-- title bar end -->
</body>

</html>