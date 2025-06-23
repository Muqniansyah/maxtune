<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registeruser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation']);
        $this->load->helper(['url', 'form']);
        $this->load->model('Customer_model');
    }

    public function index()
    {
        // Aturan validasi
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|callback_username_check');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'trim|required|min_length[12]|numeric|callback_telepon_check');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('account/pelanggan/v_register');
        } else {
            $data = [
                'username'      => $this->input->post('username'),
                'password'      => md5($this->input->post('password')), // lebih baik pakai password_hash() di produksi
                'email'         => $this->input->post('email'),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'no_telepon'    => $this->input->post('no_telepon')
            ];

            $this->Customer_model->create_user($data);

            $this->session->set_flashdata('success', 'Pendaftaran berhasil. Silakan login.');
            redirect('loginuser');
        }
    }

    // Callback: cek username
    public function username_check($username)
    {
        if ($this->Customer_model->username_exists($username)) {
            $this->form_validation->set_message('username_check', 'Username sudah terdaftar.');
            return false;
        }
        return true;
    }

    // Callback: cek email
    public function email_check($email)
    {
        if ($this->Customer_model->email_exists($email)) {
            $this->form_validation->set_message('email_check', 'Email sudah terdaftar.');
            return false;
        }
        return true;
    }

    // Callback: cek no telepon
    public function telepon_check($no_telepon)
    {
        if ($this->Customer_model->telepon_exists($no_telepon)) {
            $this->form_validation->set_message('telepon_check', 'Nomor telepon sudah terdaftar.');
            return false;
        }
        return true;
    }
}
