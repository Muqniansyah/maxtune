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

    // fungsi cetak
    public function cetaksubscribe() {
        // Validasi Data
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan kembali form
            $data['judul'] = "~ Home ~";

            // render halaman view
            $this->load->view("v_header", $data);
            $this->load->view('pages/v_about', $data);
            $this->load->view('pages/v_services', $data);
            $this->load->view('pages/v_berita', $data);
            $this->load->view('pages/v_contact', $data);
            $this->load->view("v_footer", $data);
        } else {
            // Ambil data dari form
            $data = [
                'email' => $this->input->post('email'),
            ];
        
            // Simpan data ke dalam tabel sementara
            $this->db->insert('temporary_subscribe', $data);

            // Salin data dari tabel sementara ke tabel 
            $this->db->query('REPLACE INTO subscribe (id, email) SELECT id, email FROM temporary_subscribe');
    
            // Redirect kembali ke halaman sebelumnya
            redirect($_SERVER['HTTP_REFERER']);

            $this->session->set_flashdata('pesan', 'Data berhasil ditambah'); // set flash data
        }
    }

    public function cetakform() {
        // Validasi Data
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nohp', 'No. HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('motor', 'Motor', 'required');
        $this->form_validation->set_rules('jenis_servis', 'Jenis Servis', 'required');
        $this->form_validation->set_rules('jadwal', 'Jadwal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
    
        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan kembali form
            $data['judul'] = "~ Home ~";

            // render halaman view
            $this->load->view("v_header", $data);
            $this->load->view('pages/v_about', $data);
            $this->load->view('pages/v_services', $data);
            $this->load->view('pages/v_berita', $data);
            $this->load->view('pages/v_contact', $data);
            $this->load->view("v_footer", $data);
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
    
            // Simpan data ke dalam tabel sementara
            $this->db->insert('temporary_form', $data);

            // Salin data dari tabel sementara ke tabel 
            $this->db->query('REPLACE INTO form (id, nama, email, nohp, alamat, provinsi, kota, motor, jenis_servis, jadwal, jam) SELECT id, nama, email, nohp, alamat, provinsi, kota, motor, jenis_servis, jadwal, jam FROM temporary_form');

            // Redirect kembali ke halaman sebelumnya
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function cetakkontak() {
        // Validasi Data
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');
        
        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan kembali form
            $data['judul'] = "~ Home ~";

            // render halaman view
            $this->load->view("v_header", $data);
            $this->load->view('pages/v_about', $data);
            $this->load->view('pages/v_services', $data);
            $this->load->view('pages/v_berita', $data);
            $this->load->view('pages/v_contact', $data);
            $this->load->view("v_footer", $data);
        } else {
            // Ambil data dari form
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'pesan' => $this->input->post('pesan')
            ];
            // Simpan data ke dalam tabel sementara
            $this->db->insert('temporary_formkontak', $data);

            // Salin data dari tabel sementara ke tabel 
            $this->db->query('REPLACE INTO formkontak (id, nama, email, pesan) SELECT id, nama, email, pesan FROM temporary_formkontak');
    
            // Redirect kembali ke halaman sebelumnya
            redirect($_SERVER['HTTP_REFERER']);
        }
    
    
    }
}
?>