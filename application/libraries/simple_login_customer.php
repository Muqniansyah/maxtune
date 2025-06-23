<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login_customer {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model('Customer_model');
    }

    public function login($username, $password, $success_redirect, $failed_redirect) {
        $user = $this->CI->Customer_model->get_user_by_username($username);

        if (!$user) {
            // Username tidak ditemukan
            $this->CI->session->set_flashdata('error', 'Akun tidak terdaftar');
            redirect($failed_redirect);
        } elseif ($user && md5($password) !== $user->password) {
            // Username cocok tapi password salah
            $this->CI->session->set_flashdata('error', 'Password salah');
            redirect($failed_redirect);
        } else {
            // ✅ Login berhasil, simpan data lengkap ke session
            $this->CI->session->set_userdata('customer_logged_in', true);
            $this->CI->session->set_userdata('customer', [
                'id_customer'   => $user->id_customer,
                'username'      => $user->username,
                'nama_lengkap'  => $user->nama_lengkap,
                'email'         => $user->email,
                'no_telepon'    => $user->no_telepon
            ]);

            redirect($success_redirect);
        }
    }

    public function logout() {
        // ✅ Hapus semua data session customer
        $this->CI->session->unset_userdata('customer_logged_in');
        $this->CI->session->unset_userdata('customer');
        $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
        redirect('maxtune');
    }

    public function cek_login() {
        if (!$this->CI->session->userdata('customer_logged_in')) {
            $this->CI->session->set_flashdata('sukses', 'Silakan login terlebih dahulu');
            redirect('loginuser');
        }
    }
}
