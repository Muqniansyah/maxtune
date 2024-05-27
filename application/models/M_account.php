<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model{

    //konstruktor untuk memuat library database
    public function __construct() {
        parent::__construct();
        // Load database library
        $this->load->database();
    }

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

    //untuk memasukan data form kontak dari pelanggan kedalam database
    function formkontak($data)
    {
        $this->db->insert('formkontak', $data);

        return $this->db->insert_id();
    }

    // method yang digunakan untuk mengambil semua data subscribe dari tabel 'subscribe' dalam database.
    public function alldata(){
        //  mengembalikan semua data subscribe dari tabel 'subscribe' dalam bentuk array asosiatif.
        return $this->db->get('subscribe')->result_array();
    }

    // method yang digunakan untuk mengambil semua data form dari tabel 'form' dalam database.
    public function alldata2(){
        //  mengembalikan semua data form dari tabel 'form' dalam bentuk array asosiatif.
        return $this->db->get('form')->result_array();
    }

    //method untuk mengambil semua data formkontak dari tabel 'formkontak' didalam database :)
    public function alldata3(){
        
        return $this->db->get('formkontak')->result_array();
    }
}
