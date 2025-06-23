<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Maxtune extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // pengaktifan helper url.
        $this->load->helper('url');
        $this->load->model('M_account');
    }

    public function index()
    {
        $data['judul'] = "~ Beranda ~";

        // render halaman view
        $this->load->view("v_header", $data);
        $this->load->view('pages/v_about', $data);
        $this->load->view('pages/v_services', $data);
        $this->load->view('pages/v_berita', $data);
        $this->load->view('pages/v_contact', $data);
        $this->load->view("v_footer", $data);
    }

    public function about()
    {
        $data['judul'] = "~ Tentang ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_about', $data);
        $this->load->view('pages/v_about2', $data);
        $this->load->view('v_footer', $data);
    }

    public function services()
    {
        $data['judul'] = "~ Servis ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_services', $data);
        $this->load->view('v_footer', $data);
    }

    public function berita()
    {
        $data['judul'] = "~ Berita ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_berita', $data);
        $this->load->view('v_footer', $data);
    }

    public function profiluser()
    {
        $data['judul'] = "~ Akun Saya ~";

        // Pastikan user sudah login
        if (!$this->session->userdata('customer_logged_in')) {
            redirect('loginuser');
        }

        // Ambil data customer dari session
        $id_customer = $this->session->userdata('id_customer');

        // Load model Customer_model
        $this->load->model('Customer_model');
        $customer = $this->Customer_model->get_user_by_id($id_customer);

        $data['customer'] = $customer;

        // Load view dan kirim data
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_headerprofil', $data);
        $this->load->view('v_footer', $data);
    }

    public function contact()
    {
        $data['judul'] = "~ Kontak ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_contact', $data);
        $this->load->view('v_footer', $data);
    }

    // render halaman blog
    public function blog()
    {
        $data['judul'] = "~ Blog ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/blog/v_blog', $data);
        $this->load->view('v_footer', $data);
    }

    public function blog_2()
    {
        $data['judul'] = "~ Blog ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/blog/v_blog_2', $data);
        $this->load->view('v_footer', $data);
    }

    public function blog_3()
    {
        $data['judul'] = "~ Blog ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/blog/v_blog_3', $data);
        $this->load->view('v_footer', $data);
    }

    public function blog_4()
    {
        $data['judul'] = "~ Blog ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/blog/v_blog_4', $data);
        $this->load->view('v_footer', $data);
    }

    // fungsi ganti password
    public function ganti_password()
    {
        // Cek login
        if (!$this->session->userdata('customer_logged_in')) {
            redirect('loginuser');
        }

        // Validasi input
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[5]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password_baru]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('maxtune/profiluser');
        }

        // Ambil data customer dari session
        $customer = $this->session->userdata('customer');
        $id_customer = $customer['id_customer'];

        $this->load->model('Customer_model');
        $user = $this->Customer_model->get_user_by_id($id_customer);

        if (!$user) {
            $this->session->set_flashdata('error', 'Data customer tidak ditemukan.');
            redirect('maxtune/profiluser');
        }

        // Ambil input
        $password_lama = $this->input->post('password_lama');
        $password_baru = $this->input->post('password_baru');

        // Cek kecocokan password lama
        if (md5($password_lama) !== $user->password) {
            $this->session->set_flashdata('error', 'Password lama salah.');
            redirect('maxtune/profiluser');
        }

        // Update password baru
        $this->db->where('id_customer', $id_customer);
        $this->db->update('customer', [
            'password' => md5($password_baru)
        ]);

        $this->session->set_flashdata('success', 'Password berhasil diubah.');
        redirect('maxtune/profiluser');
    }

    // fungsi checkout
    public function check()
    {
        $this->load->model('M_account'); // Memuat model M_account

        // Ambil data terbaru dari tabel booking berdasarkan id
        $this->db->order_by('id', 'DESC'); // Urutkan berdasarkan id secara descending
        $query = $this->db->get('booking', 1); // Ambil satu baris data terbaru

        if ($query->num_rows() > 0) {
            $data['form_data'] = (array) $query->row(); // Ubah ke array agar bisa diakses seperti session
        } else {
            $data['form_data'] = null;
        }

        // Jika data ditemukan, tetapkan montir berdasarkan motor
        if ($data['form_data']) {
            $motor = $data['form_data']['motor'];
            switch ($motor) {
                case 'Motor Sport - Muqni':
                    $data['form_data']['montir'] = 'Muqniansyah Arifin';
                    break;
                case 'Motor Cruiser - Irawan':
                    $data['form_data']['montir'] = 'Irawan Budi Santoso';
                    break;
                case 'Motor Matic - Haikal':
                    $data['form_data']['montir'] = 'Haikal Sita Fajri Ramadhan';
                    break;
                case 'Motor Cub - Saiful':
                    $data['form_data']['montir'] = 'Saifulloh Yusuf';
                    break;
                case 'Motor EV - Fahri':
                    $data['form_data']['montir'] = 'Fachri Fathurrohman';
                    break;
                default:
                    $data['form_data']['montir'] = 'Tidak ada montir yang dipilih';
                    break;
            }
        } else {
            $data['form_data'] = ['montir' => 'Form tidak ditemukan.'];
        }

        // Render halaman view
        $this->load->view('pages/v_check', $data);
    }

    // Fungsi bayar
    public function bayar()
    {
        // render halaman view
        $this->load->view('pages/v_bayar');
    }

    // fungsi upload bukti
    public function upload_bukti()
    {
        if (!empty($_FILES['bukti_pembayaran']['name'])) {
            $config['upload_path']   = './assets/uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']      = 2048;
            $config['file_name']     = 'bukti_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bukti_pembayaran')) {
                $data       = $this->upload->data();
                $nama_file  = $data['file_name'];

                // Ambil data booking terbaru
                $this->db->order_by('id', 'DESC'); // FIX: gunakan 'id' bukan 'id_booking'
                $query = $this->db->get('booking', 1);

                if ($query->num_rows() > 0) {
                    $booking = $query->row();

                    $this->db->insert('pembayaran', [
                        'booking_id'    => $booking->id,
                        'jenis_servis'  => $booking->jenis_servis, // langsung ambil teks
                        'status'        => 'pending',
                        'upload_file'   => $nama_file
                    ]);

                    $this->session->set_flashdata('message', 'Bukti pembayaran berhasil diupload.');
                } else {
                    $this->session->set_flashdata('message', 'Data booking tidak ditemukan.');
                }
            } else {
                $this->session->set_flashdata('message', 'Gagal upload: ' . $this->upload->display_errors());
            }
        } else {
            $this->session->set_flashdata('message', 'Tidak ada file yang dipilih.');
        }

        redirect('maxtune'); // bisa diarahkan ke halaman status
    }

    // fungsi cetak
    public function cetaksubscribe()
    {
        // Validasi Form
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan kembali halaman
            $data['judul'] = "~ Home ~";
            $this->load->view("v_header", $data);
            $this->load->view('pages/v_about', $data);
            $this->load->view('pages/v_services', $data);
            $this->load->view('pages/v_berita', $data);
            $this->load->view('pages/v_contact', $data);
            $this->load->view("v_footer", $data);
        } else {
            $email = $this->input->post('email');

            // Cek apakah email sudah terdaftar
            $cek = $this->db->get_where('subscribe', ['email' => $email])->num_rows();

            if ($cek > 0) {
                // Jika email sudah ada, tampilkan pesan error
                $this->session->set_flashdata('pesan_error_subscribe', 'Email sudah terdaftar!');
            } else {
                // Simpan data ke tabel subscribe
                $data = ['email' => $email];
                $this->db->insert('subscribe', $data);
                $this->session->set_flashdata('pesan_subscribe', 'Berhasil berlangganan!');
            }

            // Redirect kembali ke halaman sebelumnya
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function cetakkontak()
    {
        // Validasi Data
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "~ Home ~";

            $this->load->view("v_header", $data);
            $this->load->view('pages/v_about', $data);
            $this->load->view('pages/v_services', $data);
            $this->load->view('pages/v_berita', $data);
            $this->load->view('pages/v_contact', $data);
            $this->load->view("v_footer", $data);
        } else {
            $email = $this->input->post('email');

            // Cek apakah email sudah pernah mengirim kontak
            $cek_email = $this->db->get_where('formkontak', ['email' => $email])->num_rows();

            if ($cek_email > 0) {
                // Email sudah pernah dipakai
                $this->session->set_flashdata('pesan_error_kontak', 'Email sudah pernah digunakan untuk mengirim pesan.');
            } else {
                // Email belum ada, simpan data
                $data = [
                    'nama' => $this->input->post('nama'),
                    'email' => $email,
                    'pesan' => $this->input->post('pesan')
                ];

                $this->db->insert('formkontak', $data);
                $this->session->set_flashdata('pesan_kontak', 'Pesan berhasil dikirim!');
            }

            // Redirect kembali ke halaman sebelumnya
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function cetakform()
    {
        // Cek apakah user sudah login
        if (!$this->session->userdata('customer_logged_in')) {
            $this->session->set_flashdata('pesan_error', 'Silakan masuk terlebih dahulu untuk melakukan booking.');
            redirect('loginuser');
        }

        $customer = $this->session->userdata('customer'); // Data customer (isi saat login)
        $is_logged_in = $this->session->userdata('customer_logged_in');

        // Validasi Form
        // Nama, email, nohp divalidasi hanya jika belum login (diisi manual)
        if (!$is_logged_in) {
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('nohp', 'No. HP', 'required|exact_length[12]|numeric');
        }

        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('motor', 'Motor', 'required');
        $this->form_validation->set_rules('jenis_servis', 'Jenis Servis', 'required');
        $this->form_validation->set_rules('jadwal', 'Jadwal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');

        if ($this->form_validation->run() == false) {
            // Jika validasi gagal
            $data['judul'] = "~ Home ~";
            $this->load->view("v_header", $data);
            $this->load->view('pages/v_about', $data);
            $this->load->view('pages/v_services', $data);
            $this->load->view('pages/v_berita', $data);
            $this->load->view('pages/v_contact', $data);
            $this->load->view("v_footer", $data);
        } else {
            // Ambil data dari session jika login, atau dari post
            $nama  = $is_logged_in ? $customer['nama_lengkap'] : $this->input->post('nama');
            $email = $is_logged_in ? $customer['email'] : $this->input->post('email');
            $nohp  = $is_logged_in ? $customer['no_telepon'] : $this->input->post('nohp');

            $jadwal = $this->input->post('jadwal');
            $jam = $this->input->post('jam');

            // Cek jadwal & jam bentrok
            $cek_jadwal = $this->db->get_where('booking', [
                'jadwal' => $jadwal,
                'jam' => $jam
            ]);
            if ($cek_jadwal->num_rows() > 0) {
                $this->session->set_flashdata('pesan_error', 'Jadwal dan jam tersebut sudah dipesan. Silakan pilih waktu lain.');
                redirect('maxtune');
            }

            // Cek email/nohp sudah dipakai
            // $cek_duplikat = $this->db->get_where('booking', ['email' => $email])->num_rows()
            //             + $this->db->get_where('booking', ['nohp' => $nohp])->num_rows();

            // if ($cek_duplikat > 0) {
            //     $this->session->set_flashdata('pesan_error', 'Email atau nomor HP sudah terdaftar. Silakan gunakan data lain.');
            //     redirect('maxtune');
            // }

            // Simpan data booking
            $data = [
                'nama' => $nama,
                'email' => $email,
                'nohp' => $nohp,
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
                'motor' => $this->input->post('motor'),
                'jenis_servis' => $this->input->post('jenis_servis'),
                'jadwal' => $jadwal,
                'jam' => $jam
            ];

            $this->session->set_userdata('data', $data);
            $this->db->insert('booking', $data);
            redirect('maxtune/check');
        }
    }

    // fungsi hapus
    public function hapusform($id = null)
    {
        // Hapus data dari session dengan nama 'data'
        $this->session->unset_userdata('data');

        if ($id === null) {
            // Ambil id data terbaru dari tabel booking jika id tidak diberikan
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('booking', 1); // Ambil satu baris data terbaru

            if ($query->num_rows() > 0) {
                $row = $query->row();
                $id = $row->id;

                // Hapus data dari tabel booking berdasarkan id terbaru
                $this->db->delete('booking', ['id' => $id]);

                // Reset auto_increment jika dibutuhkan
                $this->M_account->reset_auto_increment('booking');
            }
        } else {
            // Jika ID diberikan, langsung hapus data berdasarkan ID
            $this->db->delete('booking', ['id' => $id]);
        }

        // Redirect kembali ke halaman utama
        redirect('maxtune');
    }
}
