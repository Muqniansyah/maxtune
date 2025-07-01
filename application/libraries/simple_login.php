<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* Simple_login Class
* Digunakan untuk login admin, cek akses, dan logout
*/

class Simple_login {
    var $CI = NULL;

    public function __construct() {
        $this->CI =& get_instance();
    }

    // Fungsi login
    public function login($username, $password) {
        // Ambil data user dari tabel users berdasarkan username
        $user = $this->CI->db->get_where('users', ['username' => $username])->row();

        if ($user) {
            if ($user->password === md5($password)) {
                // Jika password cocok, set session lengkap
                $this->CI->session->set_userdata([
                    'username' => $user->username,
                    'email'    => $user->email,
                    'nama'     => $user->nama,
                    'id_user'  => $user->id_user,
                    'admin_logged_in' => true
                ]);

                // Redirect ke dashboard
                redirect(site_url('dashboard'));
            } else {
                // Password salah
                $this->CI->session->set_flashdata('sukses', 'Password salah. Silakan coba lagi.');
                redirect(site_url('login'));
            }
        } else {
            // Username tidak ditemukan
            $this->CI->session->set_flashdata('sukses', 'Akun tidak terdaftar. Silakan daftar terlebih dahulu.');
            redirect(site_url('login'));
        }

        return false;
    }

    /**
     * Cek session login, jika tidak ada, set notifikasi dalam flashdata, lalu dialihkan ke halaman
     * login
     */
    // Fungsi cek login biasa
    public function cek_login() {
         //cek session username
        if ($this->CI->session->userdata('username') == '') {
             //set notifikasi
            $this->CI->session->set_flashdata('sukses','Anda belum login');
            //alihkan ke halaman login
            redirect(site_url('login'));
        }
    }

    // Fungsi cek admin (baru)
    public function cek_admin() {
        if (!$this->CI->session->userdata('admin_logged_in')) {
            $this->CI->session->set_flashdata('sukses', 'Anda belum login sebagai admin.');
            redirect(site_url('login'));
        }
    }

    // Fungsi logout
    public function logout() {
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('email');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('id_user');
        $this->CI->session->unset_userdata('admin_logged_in');

        $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
        redirect(site_url('login'));
    }
}
