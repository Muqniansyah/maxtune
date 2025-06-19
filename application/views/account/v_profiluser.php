<style>
    /* Custom CSS untuk halaman profil */
    .profile-header {
        background-image: url('https://via.placeholder.com/1500x300/6c757d/ffffff?text=Background+Profile');
        /* Ganti dengan URL gambar background Anda */
        background-size: cover;
        background-position: center;
        padding: 60px 0;
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

    /* Styling untuk tab navigasi */
    .nav-tabs .nav-link {
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

    .card {
        margin-bottom: 20px;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, .075);
    }

    /* Atur lebar kolom form agar responsif */
    .form-row>.col-md-6 {
        padding-right: 15px;
        padding-left: 15px;
    }
</style>

<div class="profile-header">
    <div class="profile-avatar">