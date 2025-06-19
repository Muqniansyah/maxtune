<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginuser extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('simple_login_customer');
    }

    public function index() {
        $valid = $this->form_validation;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $valid->set_rules('username', 'Username', 'required');
        $valid->set_rules('password', 'Password', 'required');

        if ($valid->run()) {
            // Gunakan simple_login_customer
            $this->simple_login_customer->login($username, $password, base_url('maxtune'), base_url('loginuser'));
        }

        $this->load->view('account/pelanggan/v_login');
    }

    public function logout() {
        $this->simple_login_customer->logout();
    }
}
