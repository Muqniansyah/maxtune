<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create_user($data) {
        return $this->db->insert('customer', $data);
    }

    public function get_user_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('customer');
        return ($query->num_rows() > 0) ? $query->row() : null;
    }

    public function get_user_by_id($id) {
        $this->db->where('id_customer', $id);
        $query = $this->db->get('customer');
        return ($query->num_rows() > 0) ? $query->row() : null;
    }

    public function username_exists($username) {
        $this->db->where('username', $username);
        return ($this->db->get('customer')->num_rows() > 0);
    }

    public function email_exists($email) {
        $this->db->where('email', $email);
        return ($this->db->get('customer')->num_rows() > 0);
    }

    public function telepon_exists($no_telepon) {
        $this->db->where('no_telepon', $no_telepon);
        return ($this->db->get('customer')->num_rows() > 0);
    }

    public function verify_password($plain_password, $hashed_password) {
        return password_verify($plain_password, $hashed_password);
    }
}
