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
        $this->db->insert('form',$data);
        return $this->db->insert_id();
    }

    function formkontak($data) {
        $this->db->insert('formkontak', $data);
        return $this->db->insert_id();
    }

    // untuk menghitung jumlah baris dalam sebuah tabel atau menghitung total baris pada tabel 
    public function getFormCount() {
        return $this->db->count_all('form');
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
}
