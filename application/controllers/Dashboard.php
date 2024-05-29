<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->simple_login->cek_login();
    }

    //Load Halaman dashboard
    public function index() {
        $this->load->model('M_account'); // Memuat model M_account
        $data['form_count'] = $this->M_account->getFormCount();
        $data['formkontak_count'] = $this->M_account->getFormKontakCount();
        $data['subscribe_count'] = $this->M_account->getSubscribeCount();
        $this->load->view('v_dashboard', $data); // Load view with data
    }

    public function form() {
        $this->load->view('v_dashboard2');
    }

    public function contact() {
        $this->load->view('v_dashboard3');
    }

    public function subscribe() {
        $this->load->view('v_dashboard4');
    }

    public function subscribe() {
        $this->load->view('v_dashboard5');
    }
}