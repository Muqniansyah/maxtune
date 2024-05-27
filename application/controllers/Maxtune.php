<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Maxtune extends CI_Controller {

    function __construct(){       
        parent::__construct();
        // pengaktifan helper url.
        $this->load->helper('url');
        $this->load->model('M_account');
    }

    public function index() {
        $data['judul'] = "~ Home ~";

        // render halaman view
        $this->load->view("v_header", $data);
        $this->load->view('pages/v_about', $data);
        $this->load->view('pages/v_services', $data);
        $this->load->view('pages/v_berita', $data);
        $this->load->view('pages/v_contact', $data);
        $this->load->view("v_footer", $data);
    }

    public function about() {
        $data['judul'] = "~ About ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_about', $data);
        $this->load->view('v_footer', $data);
    }

    public function services() {
        $data['judul'] = "~ Services ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_services', $data);
        $this->load->view('v_footer', $data);
    }

    public function berita() {
        $data['judul'] = "~ Berita ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_berita', $data);
        $this->load->view('v_footer', $data);
    }

    public function contact() {
        $data['judul'] = "~ Contact ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_contact', $data);
        $this->load->view('v_footer', $data);
    }

    public function subscribee() {
        // Memuat library session
        $this->load->library('session');

        // Validasi Data
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan kembali form
            $this->load->view('v_footer');
        } else {
            // Ambil data dari form
            $data = [
                'email' => $this->input->post('email'),
            ];
        
            // Simpan data ke database
            $insert_id = $this->M_account->langganan($data);
            if ($insert_id) {
                // Jika penyimpanan berhasil, simpan pesan dalam session
                $this->session->set_flashdata('message', 'Berhasil subscribe!');

                // Jika penyimpanan berhasil, ambil semua data siswa
                $subs_list = $this->M_account->alldata();

                // Tampilkan file v_subscribes dengan data siswa yang baru saja ditambahkan
                $this->load->view('content/v_subscribes',['subs_list' => $subs_list]);
            } else {
                // Jika penyimpanan gagal, simpan pesan error dalam session
                $this->session->set_flashdata('message', 'Gagal subscribe.');
            }
    
            // Redirect kembali ke halaman sebelumnya
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function cetak() {
        // Validasi Data
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nohp', 'No. HP', 'required|min_length[10]|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('motor', 'Motor', 'required');
        $this->form_validation->set_rules('jenis_servis', 'Jenis Servis', 'required');
        $this->form_validation->set_rules('jadwal', 'Jadwal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
    
        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan kembali form
            $this->load->view('v_services');
        } else {
            // Ambil data dari form
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'nohp' => $this->input->post('nohp'),
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'motor' => $this->input->post('motor'),
                'jenis_servis' => $this->input->post('jenis_servis'),
                'jadwal' => $this->input->post('jadwal'),
                'jam' => $this->input->post('jam')
            ];
    
            // Simpan data ke database
            $insert_id = $this->M_account->formsSave($data);
            if ($insert_id) {
                // Jika penyimpanan berhasil, simpan pesan dalam session
                $this->session->set_flashdata('message', 'Berhasil !');

                // Jika penyimpanan berhasil, ambil semua data siswa
                $list_form = $this->M_account->alldata2();

                // Tampilkan file v_forms dengan data siswa yang baru saja ditambahkan
                $this->load->view('content/v_forms',['list_form' => $list_form]);
            } else {
                // Jika penyimpanan gagal, simpan pesan error dalam session
                $this->session->set_flashdata('message', 'Gagal.');
            }
    
            // Redirect kembali ke halaman sebelumnya
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    
    
}




?>