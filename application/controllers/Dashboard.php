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
        $data['judul'] = "Detail Form";
        $this->load->view('v_dashboard2', $data);
    }

    public function contact() {
        $data['judul'] = "Detail Contact";
        $this->load->view('v_dashboard3', $data);
    }

    public function subscribe() {
        $data['judul'] = "Detail Subscriber";
        $this->load->view('v_dashboard4', $data);
    }

    // fungsi hapus
    function hapussubscribe($id) {
        $this->load->model('M_account'); // Memuat model M_account
    
        $where = array('id' => $id); // mencari berdasarkan id
        $this->M_account->hapus_data($where, 'subscribe'); // hapus table subscribe
        $this->M_account->hapus_data($where, 'temporary_subscribe'); // hapus table temporary_subscribe
    
        // Atur ulang id dan auto increment
        $this->M_account->reset_auto_increment('subscribe');
        $this->M_account->reset_auto_increment('temporary_subscribe');

        $this->session->set_flashdata('message', 'Data berhasil dihapus'); // set flash data
    
        redirect('dashboard/subscribe');
    }

    function hapuskontak($id) {
        $this->load->model('M_account'); // Memuat model M_account
    
        $where = array('id' => $id); // mencari berdasarkan id
        $this->M_account->hapus_data($where, 'formkontak'); // hapus table formkontak
        $this->M_account->hapus_data($where, 'temporary_formkontak'); // hapus table temporary_formkontak
    
        // Atur ulang id dan auto increment
        $this->M_account->reset_auto_increment('formkontak');
        $this->M_account->reset_auto_increment('temporary_formkontak');

        $this->session->set_flashdata('message', 'Data berhasil dihapus'); // set flash data
    
        redirect('dashboard/contact');
    }
    
    function hapusform($id) {
        $this->load->model('M_account'); // Memuat model M_account
    
        $where = array('id' => $id); // mencari berdasarkan id
        $this->M_account->hapus_data($where, 'form'); // hapus table form
        $this->M_account->hapus_data($where, 'temporary_form'); // hapus table temporary_form
    
        // Atur ulang id dan auto increment
        $this->M_account->reset_auto_increment('form');
        $this->M_account->reset_auto_increment('temporary_form');

        $this->session->set_flashdata('message', 'Data berhasil dihapus'); // set flash data
    
        redirect('dashboard/form');
    }

    // fungsi edit
    function editsubscribe($id){
        $this->load->model('M_account'); // Memuat model M_account

        $where = array('id' => $id); // mencari berdasarkan id
        $data['subscribe'] = $this->M_account->edit_data($where, 'subscribe')->row(); // Ambil satu baris data sebagai objek
        $data['temporary_subscribe'] = $this->M_account->edit_data($where, 'temporary_subscribe')->row(); // Ambil satu baris data sebagai objek
        $this->load->view('content/v_subscribes', $data);
    }

    function editkontak($id){
        $this->load->model('M_account'); // Memuat model M_account

        $where = array('id' => $id); // mencari berdasarkan id
        $data['formkontak'] = $this->M_account->edit_data($where, 'formkontak')->row(); // Ambil satu baris data sebagai objek
        $data['temporary_formkontak'] = $this->M_account->edit_data($where, 'temporary_formkontak')->row(); // Ambil satu baris data sebagai objek
        $this->load->view('content/v_contacts', $data);
    }

    function editform($id){
        $this->load->model('M_account'); // Memuat model M_account

        $where = array('id' => $id); // mencari berdasarkan id
        $data['form'] = $this->M_account->edit_data($where, 'form')->row(); // Ambil satu baris data sebagai objek
        $data['temporary_form'] = $this->M_account->edit_data($where, 'temporary_form')->row(); // Ambil satu baris data sebagai objek
        $this->load->view('content/v_forms', $data);
    }

    // membuat aksi yang menghandle update data 
    function updatesubscribe(){
        $this->load->model('M_account'); // Memuat model M_account
        
        $id = $this->input->post('id');
        $email = $this->input->post('email');

        $data = array(
            'email' => $email,
        );

        $where = array(
            'id' => $id
        );

        $this->M_account->update_data($where,$data,'subscribe');
        $this->M_account->update_data($where,$data,'temporary_subscribe');
        
        $this->session->set_flashdata('message', 'Data berhasil diupdate'); // set flash data

        redirect('dashboard/subscribe');
    }

    function updatekontak() {
        $this->load->model('M_account'); // Memuat model M_account

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $pesan = $this->input->post('pesan');

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'pesan' => $pesan,
        );

        $where = array(
            'id' => $id
        );

        $this->M_account->update_data($where, $data, 'formkontak');
        $this->M_account->update_data($where, $data, 'temporary_formkontak');

        $this->session->set_flashdata('message', 'Data berhasil diupdate'); // set flash data

        redirect('dashboard/contact');
    }

    function updateform(){
        $this->load->model('M_account'); // Memuat model M_account

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nohp = $this->input->post('nohp');
        $alamat = $this->input->post('alamat');
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $motor = $this->input->post('motor');
        $jenis_servis = $this->input->post('jenis_servis');
        $jadwal = $this->input->post('jadwal');
        $jam = $this->input->post('jam');

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'nohp' => $nohp,
            'alamat' => $alamat,
            'provinsi' => $provinsi,
            'kota' => $kota,
            'motor' => $motor,
            'jenis_servis' => $jenis_servis,
            'jadwal' => $jadwal,
            'jam' => $jam
        );

        $where = array(
            'id' => $id
        );

        $this->M_account->update_data($where, $data, 'form');
        $this->M_account->update_data($where, $data, 'temporary_form');

        $this->session->set_flashdata('message', 'Data berhasil diupdate'); // set flash data

        redirect('dashboard/form');
    }

    // new add data
    public function cetak() {
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
            $this->load->view('v_dashboard2');
            $this->session->set_flashdata('message', 'Data error'); // set flash data
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

            $this->session->set_flashdata('message', 'Data berhasil ditambahkan'); // set flash data
            // Redirect kembali ke halaman sebelumnya
            redirect('dashboard/form');   
        }
    } 
}