<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model{

    //konstruktor untuk memuat library database
    public function __construct() {
        parent::__construct();
        // Load database library
        $this->load->database();
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

    // untuk menghitung jumlah baris dalam sebuah tabel
    public function getFormCount() {
        return $this->db->count_all('form');
    }

    public function getFormKontakCount() {
        return $this->db->count_all('formkontak');
    }

    public function getSubscribeCount() {
        return $this->db->count_all('subscribe');
    }
}
