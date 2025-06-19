<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginuser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Memuat model User_model untuk berinteraksi dengan tabel users
        $this->load->model('Customer_model');
        // Memuat library form_validation untuk validasi input form
        $this->load->library('form_validation');
        // Memuat library session untuk mengelola sesi pengguna (login/logout)
        $this->load->library('session');
        // Memuat helper 'url' untuk fungsi-fungsi terkait URL seperti redirect()
        $this->load->helper('url');
        // Memuat helper 'form' untuk fungsi-fungsi form HTML (misal: form_open())
        $this->load->helper('form');
    }

    /**
     * Halaman utama untuk proses Login
     * Jika user sudah login, akan diarahkan ke dashboard.
     * Jika belum, akan menampilkan form login.
     */
    public function index()
    {
        // Panggil fungsi login untuk menampilkan form atau memproses login
        {
            // Fungsi Login
            $valid = $this->form_validation;
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $valid->set_rules('username', 'Username', 'required');
            $valid->set_rules('password', 'Password', 'required');

            if ($valid->run()) {
                $this->simple_login->loginuser($username, $password, base_url('maxtune'), base_url('loginuser'));
            }

            // End fungsi login
            $this->load->view('account/v_loginuser');
        }
    }

    /**
     * Fungsi untuk menampilkan dan memproses login pengguna.
     */
    public function login()
    {
        // Cek apakah pengguna sudah login
        if ($this->session->userdata('logged_in')) {
            // Jika sudah login, arahkan ke halaman dashboard
            redirect('maxtune'); // Ubah 'dashboard' sesuai dengan controller/method dashboard Anda
        }

        // Set aturan validasi untuk field username dan password
        // 'required' berarti tidak boleh kosong
        // 'trim' akan menghapus spasi di awal dan akhir input
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        // Jalankan validasi form
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal (form belum disubmit atau input tidak valid),
            // tampilkan halaman login
            $this->load->view('account/v_loginuser');
        } else {
            // Jika validasi sukses, ambil data input dari form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Panggil fungsi get_user_by_username dari User_model
            // untuk mendapatkan data pengguna berdasarkan username
            $user = $this->User_model->get_user_by_username($username);

            // Cek apakah pengguna ditemukan di database
            if ($user) {
                // Jika pengguna ditemukan, verifikasi password yang diinput
                // dengan password hash yang tersimpan di database
                if ($this->User_model->verify_password($password, $user->password)) {
                    // Jika password cocok (login berhasil):

                    // Buat array data yang akan disimpan ke dalam session
                    $user_data = array(
                        'user_id'    => $user->id,       // Simpan ID pengguna
                        'username'   => $user->username,  // Simpan username
                        'logged_in'  => TRUE              // Tandai bahwa pengguna sudah login
                    );

                    // Set data pengguna ke dalam session CodeIgniter
                    $this->session->set_userdata($user_data);

                    // Set flashdata untuk pesan sukses (akan hilang setelah refresh halaman)
                    $this->session->set_flashdata('success', 'Selamat datang, ' . $user->username . '!');

                    // Arahkan pengguna ke halaman dashboard
                    redirect('maxtune/index'); // Ubah 'dashboard' sesuai dengan controller/method dashboard Anda
                } else {
                    // Jika password tidak cocok:
                    // Set flashdata error untuk ditampilkan di halaman login
                    $this->session->set_flashdata('error', 'Password salah.');
                    // Arahkan kembali ke halaman login
                    redirect('account/v_loginuser');
                }
            } else {
                // Jika pengguna (username) tidak ditemukan:
                // Set flashdata error untuk ditampilkan di halaman login
                $this->session->set_flashdata('error', 'Username tidak ditemukan.');
                // Arahkan kembali ke halaman login
                redirect('account/v_loginuser');
            }
        }
    }

    /**
     * Fungsi untuk menampilkan dan memproses registrasi pengguna baru.
     */
    public function register()
    {
        // Cek apakah pengguna sudah login (mungkin ingin mencegah registrasi saat sudah login)
        if ($this->session->userdata('logged_in')) {
            redirect('maxtune'); // Arahkan ke dashboard jika sudah login
        }

        // Set aturan validasi untuk setiap field registrasi
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]|min_length[4]|alpha_numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|max_length[100]');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'trim|numeric|max_length[20]');

        // Jalankan validasi form
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan halaman registrasi
            $this->load->view('account/v_registeruser');
        } else {
            // Jika validasi sukses, kumpulkan data untuk disimpan
            $data = array(
                'username'      => $this->input->post('username'),
                'email'         => $this->input->post('email'),
                // HASH PASSWORD sebelum disimpan ke database!
                'password'      => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'nama_lengkap'  => $this->input->post('nama_lengkap'),
                'no_telepon'    => $this->input->post('no_telepon'),
                'created_at'    => date('Y-m-d H:i:s'), // Set waktu pembuatan
                'updated_at'    => date('Y-m-d H:i:s')  // Set waktu update (sama dengan created_at saat baru dibuat)
            );

            // Panggil fungsi create_user dari User_model untuk menyimpan data
            if ($this->User_model->create_user($data)) {
                // Jika registrasi berhasil:
                // Set flashdata sukses
                $this->session->set_flashdata('success', 'Registrasi berhasil! Silahkan login dengan akun Anda.');
                // Arahkan ke halaman login
                redirect('account/v_loginuser');
            } else {
                // Jika registrasi gagal (misal ada masalah database):
                // Set flashdata error
                $this->session->set_flashdata('error', 'Registrasi gagal. Silahkan coba lagi.');
                // Arahkan kembali ke halaman registrasi
                redirect('auth/register');
            }
        }
    }

    /** 
     * Fungsi untuk proses logout pengguna.
     * Akan menghapus data session dan mengarahkan ke halaman login.
     */
    public function logout()
    {
        // Hapus data pengguna dari session
        $this->session->unset_userdata(array('user_id', 'username', 'logged_in'));

        // Hancurkan seluruh session (opsional, tergantung kebutuhan.
        // Jika hanya ingin menghapus data user, cukup unset_userdata.
        // Jika ingin menghapus semua data session termasuk flashdata, gunakan sess_destroy())
        $this->session->sess_destroy();

        // Set flashdata untuk pesan logout (opsional)
        $this->session->set_flashdata('success', 'Anda telah berhasil logout.');

        // Arahkan kembali ke halaman login
        redirect('account/v_loginuser');
    }
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */