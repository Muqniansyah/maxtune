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

        if ($user && md5($password) === $user->password) {
            // Set session pelanggan
            $this->CI->session->set_userdata('customer_logged_in', true);
            $this->CI->session->set_userdata('id_customer', $user->id_customer);
            $this->CI->session->set_userdata('customer_username', $user->username);
            redirect($success_redirect);
        } else {
            $this->CI->session->set_flashdata('sukses', 'Username atau password salah');
            redirect($failed_redirect);
        }
    }

    public function logout() {
        $this->CI->session->unset_userdata('customer_logged_in');
        $this->CI->session->unset_userdata('id_customer');
        $this->CI->session->unset_userdata('customer_username');
        $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
        redirect('loginuser');
    }

    public function cek_login() {
        if (!$this->CI->session->userdata('customer_logged_in')) {
            $this->CI->session->set_flashdata('sukses', 'Silakan login terlebih dahulu');
            redirect('loginuser');
        }
    }
}
