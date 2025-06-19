<?php
defined('BASEPATH') or exit('No direct script access allowed');

class registeruser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    // ... (metode login() dan index() lainnya)
    public function index()
    {
        // Panggil fungsi login untuk menampilkan form atau memproses login
        {
            // Fungsi Login
            $valid = $this->form_validation;
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $valid->set_rules('username', 'Username', 'required');
            $valid->set_rules('password', 'Password', 'required');

            if ($valid->run()) {
                $this->simple_login->loginuser($username, $password, base_url('maxtune'), base_url('loginuser'));
            }

            // End fungsi login
            $this->load->view('account/v_registeruser');
        }
    }


    /**
     * Fungsi untuk menampilkan dan memproses registrasi pengguna baru.
     */
    public function register()
    {
        // Jika user sudah login, redirect ke dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('maxtune'); // Sesuaikan dengan controller dashboard Anda
        }

        // Set aturan validasi untuk setiap field registrasi
        // is_unique[users.username] akan cek apakah username sudah ada di tabel 'users'
        // is_unique[users.email] akan cek apakah email sudah ada di tabel 'users'
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|min_length[4]|alpha_numeric|is_unique[users.username]',
            array('is_unique' => 'Username ini sudah digunakan. Pilih username lain.')
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[users.email]',
            array('is_unique' => 'Email ini sudah terdaftar. Gunakan email lain atau login.')
        );
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules(
            'passconf',
            'Konfirmasi Password',
            'required|matches[password]',
            array('matches' => 'Konfirmasi password tidak cocok dengan password.')
        );
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|max_length[100]');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'trim|numeric|max_length[20]');


        // Jalankan validasi form
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal (form belum disubmit atau ada input tidak valid),
            // tampilkan halaman registrasi
            $this->load->view('account/v_registeruser');
        } else {
            // Jika validasi sukses, kumpulkan data untuk disimpan
            $data = array(
                'username'      => $this->input->post('username'),
                'email'         => $this->input->post('email'),
                // PENTING! HASH PASSWORD sebelum disimpan ke database menggunakan PASSWORD_BCRYPT
                'password'      => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'no_telepon'    => $this->input->post('no_telepon'),
                'created_at'    => date('Y-m-d H:i:s'), // Waktu pembuatan akun
                'updated_at'    => date('Y-m-d H:i:s')  // Waktu update (sama dengan created_at saat baru dibuat)
            );

            // Panggil fungsi create_user dari User_model untuk menyimpan data
            if ($this->Customer_model->create_user($data)) {
                // Jika registrasi berhasil:
                $this->session->set_flashdata('success', 'Registrasi berhasil! Silahkan login dengan akun Anda.');
                // Arahkan ke halaman login
                redirect('account/v_loginuser');
            } else {
                // Jika registrasi gagal (misal ada masalah database)
                $this->session->set_flashdata('error', 'Registrasi gagal. Silahkan coba lagi.');
                // Arahkan kembali ke halaman registrasi
                redirect('account/v_registeruser');
            }
        }
    }

    // ... (metode logout() lainnya)
}
