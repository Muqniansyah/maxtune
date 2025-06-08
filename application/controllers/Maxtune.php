<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Maxtune extends CI_Controller {

    function __construct(){       
        parent::__construct();
        // pengaktifan helper url.
        $this->load->helper('url');
        $this->load->model('M_account');
    }

    public function index() {
        $data['judul'] = "~ Beranda ~";

        // render halaman view
        $this->load->view("v_header", $data);
        $this->load->view('pages/v_about', $data);
        $this->load->view('pages/v_services', $data);
        $this->load->view('pages/v_berita', $data);
        $this->load->view('pages/v_contact', $data);
        $this->load->view("v_footer", $data);
    }

    public function about() {
        $data['judul'] = "~ Tentang ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_about', $data);
        $this->load->view('v_footer', $data);
    }

    public function services() {
        $data['judul'] = "~ Servis ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_services', $data);
        $this->load->view('v_footer', $data);
    }

    public function berita() {
        $data['judul'] = "~ Berita ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_berita', $data);
        $this->load->view('v_footer', $data);
    }

    public function contact() {
        $data['judul'] = "~ Kontak ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/v_contact', $data);
        $this->load->view('v_footer', $data);
    }

    // render halaman blog
    public function blog() {
        $data['judul'] = "~ Blog ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/blog/v_blog', $data);
        $this->load->view('v_footer', $data);
    }

    public function blog_2() {
        $data['judul'] = "~ Blog ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/blog/v_blog_2', $data);
        $this->load->view('v_footer', $data);
    }

    public function blog_3() {
        $data['judul'] = "~ Blog ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/blog/v_blog_3', $data);
        $this->load->view('v_footer', $data);
    }

    public function blog_4() {
        $data['judul'] = "~ Blog ~";

        // render halaman view
        $this->load->view('v_header', $data);
        $this->load->view('pages/blog/v_blog_4', $data);
        $this->load->view('v_footer', $data);
    }

    // fungsi checkout
    public function check() {
        $this->load->model('M_account'); // Memuat model M_account
    
        // Ambil data terbaru dari tabel temporary_form berdasarkan id
        $this->db->order_by('id', 'DESC'); // Mengurutkan berdasarkan id secara descending
        $query = $this->db->get('temporary_form', 1); // Ambil satu baris data terbaru
        
        if ($query->num_rows() > 0) {
            $data['form_data'] = $query->row(); // Ambil satu baris data terbaru
        } else {
            $data['form_data'] = null; // Tidak ada data
        }
    
        // Ambil data form dari session dengan nama 'data'
        $data['form_data'] = $this->session->userdata('data');
    
        // Jika data ada di session, ambil montir berdasarkan motor
        if ($data['form_data']) {
            $motor = $data['form_data']['motor'];
            switch($motor) {
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
                // case 'Motor Bigbike - Rois':
                //     $data['form_data']['montir'] = 'Mohamad Rois Alfariji';
                //     break;
                default:
                    $data['form_data']['montir'] = 'Tidak ada montir yang dipilih';
                    break;
            }
        } else {
            $data['form_data'] = ['montir' => 'Form tidak dikirim dengan benar.'];
        }

        // Render halaman view
        $this->load->view('pages/v_check', $data);
    }

    // FUNGSI bayar
    public function bayar() {
        // render halaman view
        $this->load->view('pages/v_bayar');
    }

    // fungsi cetak
    public function cetaksubscribe() {
        // Validasi Data
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan kembali form
            $data['judul'] = "~ Home ~";

            // render halaman view
            $this->load->view("v_header", $data);
            $this->load->view('pages/v_about', $data);
            $this->load->view('pages/v_services', $data);
            $this->load->view('pages/v_berita', $data);
            $this->load->view('pages/v_contact', $data);
            $this->load->view("v_footer", $data);
        } else {
            // Ambil data dari form
            $data = [
                'email' => $this->input->post('email'),
            ];
        
            // Simpan data ke dalam tabel sementara
            $this->db->insert('temporary_subscribe', $data);

            // Salin data dari tabel sementara ke tabel 
            $this->db->query('REPLACE INTO subscribe (id, email) SELECT id, email FROM temporary_subscribe');
    
            // Redirect kembali ke halaman sebelumnya
            redirect($_SERVER['HTTP_REFERER']);

            $this->session->set_flashdata('pesan', 'Data berhasil ditambah'); // set flash data
        }
    }

    public function cetakform() {
        // Validasi Data
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nohp', 'No. HP', 'required|exact_length[12]|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('motor', 'Motor', 'required');
        $this->form_validation->set_rules('jenis_servis', 'Jenis Servis', 'required');
        $this->form_validation->set_rules('jadwal', 'Jadwal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');

        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan kembali form
            $data['judul'] = "~ Home ~";
            $this->load->view("v_header", $data);
            $this->load->view('pages/v_about', $data);
            $this->load->view('pages/v_services', $data);
            $this->load->view('pages/v_berita', $data);
            $this->load->view('pages/v_contact', $data);
            $this->load->view("v_footer", $data);
        } else {
            // Ambil input
            $jadwal = $this->input->post('jadwal');
            $jam = $this->input->post('jam');
            $email = $this->input->post('email');
            $nohp = $this->input->post('nohp');

            // Cek apakah jadwal dan jam sudah dipesan
            $cek_jadwal = $this->db->get_where('form', [
                'jadwal' => $jadwal,
                'jam' => $jam
            ]);

            if ($cek_jadwal->num_rows() > 0) {
                $this->session->set_flashdata('pesan_error', 'Jadwal dan jam tersebut sudah dipesan. Silakan pilih waktu lain.');
                redirect('maxtune');
            }

            // Cek jika email atau nohp sudah digunakan
            $cek_duplikat = $this->db->get_where('form', [
                'email' => $email
            ])->num_rows() + $this->db->get_where('form', [
                'nohp' => $nohp
            ])->num_rows();

            if ($cek_duplikat > 0) {
                $this->session->set_flashdata('pesan_error', 'Email atau nomor HP sudah terdaftar. Silakan gunakan data lain.');
                redirect('maxtune');
            }

            // Simpan data ke session dan database
            $data = [
                'nama' => $this->input->post('nama'),
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
            $this->db->insert('temporary_form', $data);
            $this->db->query('REPLACE INTO form (id, nama, email, nohp, alamat, provinsi, kota, motor, jenis_servis, jadwal, jam) SELECT id, nama, email, nohp, alamat, provinsi, kota, motor, jenis_servis, jadwal, jam FROM temporary_form');

            redirect('maxtune/check');
        }
    }

    public function cetakkontak() {
        // Validasi Data
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');
        
        if ($this->form_validation->run() == false) {
            // Jika validasi gagal, tampilkan kembali form
            $data['judul'] = "~ Home ~";

            // render halaman view
            $this->load->view("v_header", $data);
            $this->load->view('pages/v_about', $data);
            $this->load->view('pages/v_services', $data);
            $this->load->view('pages/v_berita', $data);
            $this->load->view('pages/v_contact', $data);
            $this->load->view("v_footer", $data);
        } else {
            // Ambil data dari form
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'pesan' => $this->input->post('pesan')
            ];
            // Simpan data ke dalam tabel sementara
            $this->db->insert('temporary_formkontak', $data);

            // Salin data dari tabel sementara ke tabel 
            $this->db->query('REPLACE INTO formkontak (id, nama, email, pesan) SELECT id, nama, email, pesan FROM temporary_formkontak');
    
            // Redirect kembali ke halaman sebelumnya
            redirect($_SERVER['HTTP_REFERER']);
        }
    
    
    }

    // fungsi hapus
    public function hapusform($id = null) {
        // Hapus data dari session dengan nama 'data'
        $this->session->unset_userdata('data');
    
        // Hapus data terbaru dari tabel 'temporary_form' jika $id tidak disediakan
        if ($id === null) {
            // Ambil id data terbaru dari tabel temporary_form
            $this->db->order_by('id', 'DESC'); // Urutkan berdasarkan id secara descending
            $query = $this->db->get('temporary_form', 1); // Ambil satu baris data terbaru
            
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $id = $row->id;
    
                // Hapus data terbaru dari tabel temporary_form berdasarkan id
                $this->db->delete('temporary_form', array('id' => $id));
    
                // Hapus juga data dari tabel form berdasarkan id yang sama
                $this->db->delete('form', array('id' => $id));
    
                // Atur ulang id dan auto increment jika diperlukan
                $this->M_account->reset_auto_increment('temporary_form');
                $this->M_account->reset_auto_increment('form');
            }
        } else {
            // Hapus data dari tabel temporary_form berdasarkan id yang diberikan
            $this->db->delete('temporary_form', array('id' => $id));
    
            // Hapus juga data dari tabel form berdasarkan id yang sama
            $this->db->delete('form', array('id' => $id));
        }
    
        // Redirect kembali ke halaman utama
        redirect('maxtune');
    }
}
?>