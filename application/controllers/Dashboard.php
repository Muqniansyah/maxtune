<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->simple_login->cek_login();
    }

    public function index() {
        $this->load->model('M_account'); // Memuat model M_account
        $data['form_count'] = $this->M_account->getFormCount();
        $data['formkontak_count'] = $this->M_account->getFormKontakCount();
        $data['subscribe_count'] = $this->M_account->getSubscribeCount();

        $this->load->view('v_dashboard', $data); // Load view with data
    }

    public function profile() {
        $this->load->model('M_account'); // Memuat model M_account
        $data['judul'] = 'Data Admin'; 
        $data['users'] = $this->M_account->cekData(['email' => $this->session->userdata('email')])->row_array(); 
        $data['admin'] = $this->db->get('users')->result_array(); 
        
        $this->load->view('v_dashboard5', $data); // memuat view profile
    }

    public function form() {
        $data['judul'] = "Detail Booking";
        $this->load->model('M_account');

        // Ambil semua booking + join ke jenis_servis
        $this->db->select('booking.*, jenis_servis.nama AS nama_servis');
        $this->db->from('booking');
        $this->db->join('jenis_servis', 'booking.jenis_servis = jenis_servis.id_servis');
        $query = $this->db->get();
        $data['list_form'] = $query->result_array();

        // Ambil semua jenis_servis untuk ditampilkan di <select>
        $data['jenis_servis'] = $this->M_account->getAllJenisServis();

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

    // fungsi pembayaran
    public function pembayaran() {
        $this->load->model('M_account');
        $data['judul'] = "Detail Pembayaran";
        $data['dtbayar'] = $this->M_account->getAllPembayaran(); // ambil data dengan join
        $this->load->view('v_dashboard6', $data);
    }

    public function hapuspembayaran($id) {
        $this->db->where('id_pembayaran', $id);
        $this->db->delete('pembayaran');
        $this->session->set_flashdata('message', 'Data pembayaran berhasil dihapus.');
        redirect('dashboard/pembayaran');
    }

    public function ubahstatus($id) {
        $this->db->where('id_pembayaran', $id);
        $this->db->update('pembayaran', ['status' => 'lunas']);
        $this->session->set_flashdata('message', 'Status pembayaran berhasil diubah menjadi lunas.');
        redirect('dashboard/pembayaran');
    }

    // fungsi hapus
    function hapussubscribe($id) {
        $this->load->model('M_account'); // memuat model M_account
        $where = array('id' => $id); // mencari berdasarkan id
        $this->M_account->hapus_data($where, 'subscribe'); //hapus table subscribe
        $this->M_account->reset_auto_increment('subscribe'); //Atur ulang id dan auto increment
        $this->session->set_flashdata('message', 'Data berhasil dihapus'); //set flash data

        redirect('dashboard/subscribe');
    }

    function hapuskontak($id) {
        $this->load->model('M_account'); // memuat model M_account
        $where = array('id' => $id); // mencari berdasarkan id
        $this->M_account->hapus_data($where, 'formkontak'); //hapus table kontak
        $this->M_account->reset_auto_increment('formkontak'); //Atur ulang id dan auto increment
        $this->session->set_flashdata('message', 'Data berhasil dihapus'); //set flash data

        redirect('dashboard/contact');
    }
    
    function hapusform($id) {
        $this->load->model('M_account'); // memuat model M_account
        $where = array('id' => $id); // mencari berdasarkan id
        $this->M_account->hapus_data($where, 'booking'); //hapus table booking
        $this->M_account->reset_auto_increment('booking'); //Atur ulang id dan auto increment
        $this->session->set_flashdata('message', 'Data berhasil dihapus'); //set flash data

        redirect('dashboard/form');
    }

    // fungsi edit
    function editsubscribe($id){
        $this->load->model('M_account'); // memuat model M_account
        $where = array('id' => $id); // mencari berdasarkan id
        $data['subscribe'] = $this->M_account->edit_data($where, 'subscribe')->row(); // Ambil satu baris data sebagai objek

        $this->load->view('content/v_subscribes', $data);
    }

    function editkontak($id){
        $this->load->model('M_account'); // memuat model M_account
        $where = array('id' => $id); // mencari berdasarkan id
        $data['formkontak'] = $this->M_account->edit_data($where, 'formkontak')->row(); // Ambil satu baris data sebagai objek

        $this->load->view('content/v_contacts', $data);
    }

    function editform($id){
        $this->load->model('M_account'); // memuat model M_account
        $where = array('id' => $id); // mencari berdasarkan id
        $data['booking'] = $this->M_account->edit_data($where, 'booking')->row(); // Ambil satu baris data sebagai objek

        $this->load->view('content/v_forms', $data);
    }

    // fungsi update
    function updatesubscribe(){
        $this->load->model('M_account'); // Memuat model M_account

        $id = $this->input->post('id');
        $email = $this->input->post('email');

        $data = array('email' => $email);
        $where = array('id' => $id);

        $this->M_account->update_data($where,$data,'subscribe');
        $this->session->set_flashdata('message', 'Data berhasil diupdate'); // set flash data

        redirect('dashboard/subscribe');
    }

    function updatekontak() {
        $this->load->model('M_account'); // Memuat model M_account

        $id = $this->input->post('id');

        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'pesan' => $this->input->post('pesan'),
        );

        $where = array('id' => $id);

        $this->M_account->update_data($where, $data, 'formkontak');
        $this->session->set_flashdata('message', 'Data berhasil diupdate'); // set flash data

        redirect('dashboard/contact');
    }

    function updateform(){
        $this->load->model('M_account'); // Memuat model M_account

        $id = $this->input->post('id');

        $data = array(
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
        );

        $where = array('id' => $id);

        $this->M_account->update_data($where, $data, 'booking');
        $this->session->set_flashdata('message', 'Data berhasil diupdate'); // set flash data

        redirect('dashboard/form');
    }

    // fungsi buat data baru
    public function cetak() {
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

            $this->db->insert('booking', $data); // Simpan data ke dalam tabel booking
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan'); // set flash data
            // Redirect kembali ke halaman sebelumnya
            redirect('dashboard/form');   
        }
    }
}
?>
