<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model{
    //konstruktor untuk memuat library database
    public function __construct() {
        parent::__construct();
        // Load database library
        $this->load->database();
    }

    public function cekData($data = null) {
        return $this->db->get_where('users', $data);
    }

    // masukkan data
    function daftar($data) {
        $this->db->insert('users',$data);
    }

    function langganan($data) {
        $this->db->insert('subscribe',$data);
        return $this->db->insert_id();
    }

    function formsSave($data) {
        $this->db->insert('booking',$data);
        return $this->db->insert_id();
    }

    function formkontak($data) {
        $this->db->insert('formkontak', $data);
        return $this->db->insert_id();
    }

    // untuk menghitung jumlah baris dalam sebuah tabel atau menghitung total baris pada tabel 
    public function getFormCount() {
        return $this->db->count_all('booking');
    }

    public function getFormKontakCount() {
        return $this->db->count_all('formkontak');
    }

    public function getSubscribeCount() {
        return $this->db->count_all('subscribe');
    }

    // hapus data
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    // reset auto increment
    function reset_auto_increment($table) {
        // Atur ulang id dan auto increment
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE $table SET id = @num := (@num+1);");
        $this->db->query("ALTER TABLE $table AUTO_INCREMENT = 1;");
    }

    // edit data
    function edit_data($where,$table){		
        return $this->db->get_where($table,$where);
    }

    // update data
    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    // Ambil semua data pembayaran beserta nama servis dan data booking
    public function getAllPembayaran() {
        $this->db->select('
            pembayaran.*, 
            booking.nama AS nama_pelanggan, 
            jenis_servis.nama AS nama_servis,
            jenis_servis.harga
        ');
        $this->db->from('pembayaran');
        $this->db->join('booking', 'pembayaran.booking_id = booking.id', 'left');
        $this->db->join('jenis_servis', 'booking.jenis_servis = jenis_servis.id_servis', 'left');
        return $this->db->get()->result_array();
    }

    // untuk mengambil data dari tabel jenis_servis
    public function getAllJenisServis() {
        return $this->db->get('jenis_servis')->result_array();
    }

    // Booking per bulan (6 bulan terakhir)
    public function getBookingPerMonth() {
        $this->db->select("MONTH(jadwal) AS bulan, COUNT(*) AS total");
        $this->db->from("booking");
        $this->db->where("jadwal >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)");
        $this->db->group_by("MONTH(jadwal)");
        return $this->db->get()->result_array();
    }

    // Jumlah masing-masing jenis servis
    public function getServisDistribusi() {
        $this->db->select("jenis_servis.nama AS label, COUNT(*) AS total");
        $this->db->from("booking");
        $this->db->join("jenis_servis", "booking.jenis_servis = jenis_servis.id_servis", "left");
        $this->db->group_by("booking.jenis_servis");
        return $this->db->get()->result_array();
    }

    // Total status pembayaran
    public function getStatusPembayaran() {
        $this->db->select("status, COUNT(*) AS total");
        $this->db->from("pembayaran");
        $this->db->group_by("status");
        return $this->db->get()->result_array();
    }
}
