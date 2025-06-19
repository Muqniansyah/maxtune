<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // Load database library
        $this->load->database();
    }

    /**
     * Get user by username
     *
     * @param string $username
     * @return object|null User data object or null if not found
     */
    public function get_user_by_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('customer');

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan satu baris objek
        }
        return NULL;
    }

    /**
     * Create a new user
     *
     * @param array $data Associative array of user data
     * @return bool True on success, false on failure
     */
    public function create_user($data)
    {
        // Pastikan password sudah di-hash sebelum memanggil fungsi ini dari controller
        // Contoh: $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        return $this->db->insert('customer', $data);
    }

    /**
     * Verify a plain text password against a hashed password
     *
     * @param string $plain_password The password provided by the user
     * @param string $hashed_password The hashed password from the database
     * @return bool True if passwords match, false otherwise
     */
    public function verify_password($plain_password, $hashed_password)
    {
        return password_verify($plain_password, $hashed_password);
    }

    /**
     * Get user by ID (optional, useful for retrieving user data from session)
     *
     * @param int $id User ID
     * @return object|null User data object or null if not found
     */
    public function get_user_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('customer');

        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return NULL;
    }

    /**
     * Check if username already exists
     *
     * @param string $username
     * @return bool True if username exists, false otherwise
     */
    public function username_exists($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('customer');
        return ($query->num_rows() > 0);
    }

    /**
     * Check if email already exists
     *
     * @param string $email
     * @return bool True if email exists, false otherwise
     */
    public function email_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('customer');
        return ($query->num_rows() > 0);
    }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */