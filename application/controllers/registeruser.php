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
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[customer.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[customer.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim'); // tidak required karena opsional
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'trim|numeric'); // juga opsional

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('account/pelanggan/v_register');
        } else {
            $data = [
                'username'      => $this->input->post('username'),
                'password'      => md5($this->input->post('password')), // gunakan password_hash di produksi
                'email'         => $this->input->post('email'),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'no_telepon'    => $this->input->post('no_telepon')
            ];

            $this->Customer_model->create_user($data);

            $this->session->set_flashdata('success', 'Pendaftaran berhasil. Silakan login.');
            redirect('loginuser');
        }
    }
}
