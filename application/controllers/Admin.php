<?php
defined('BASEPATH') or exit('No direct script access allowed');

// session_start();
// if (!isset($_SESSION['email'])) {
//     header("Location: Auth");
// }

class Admin extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     //is_logged_in();
    //     if (!$this->session->userdata('email')) {
    //         redirect('auth');
    //     } else if ($this->session->userdata('role_id') == 2) {
    //         redirect('auth/goToDefaultPage');
    //     }
    // }

    public function index()
    {
        //$data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //echo $data['users']['name'];
        //echo $this->session->userdata('email');
        //$judul['title'] = "Selamat Datang " . $data['users']['name'];
        //$this->load->view('templates/auth_header', $judul);
        $data['title'] = 'Admin';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
        //$this->load->view(('templates/auth_footer'));
    }

    public function dataDosen()
    {
        $data['dosen'] = $this->db->get('dosen_peserta')->result_array();

        $jurusan = $this->input->get('jurusan');
        $data['cariDosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
        $data['title'] = 'Data Dosen';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/dataDosen');
        $this->load->view('templates/footer');
    }

    public function tambahDosen()
    {

        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Dosen';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/dataDosen');
            $this->load->view('templates/footer');
        } else {
            $nip = $this->input->post('nip');
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip'), true),
                'nama' => htmlspecialchars($this->input->post('nama'), true),
                'jurusan' => $this->input->post('jurusan'),
                'pendidikan' => $this->input->post('pendidikan'),
                'jabatan' => $this->input->post('jabatan'),
                'alamat' => htmlspecialchars($this->input->post('alamat'), true)
            ];

            $this->db->insert('dosen_peserta', $data);


            $jabatan = $this->input->post('jabatan');
            $pendidikan = $this->input->post('pendidikan');

            if ($pendidikan == "S1") {
                $c4 = 1;
            } else if ($pendidikan == "S2") {
                $c4 = 3;
            } else if ($pendidikan == "S3") {
                $c4 = 5;
            } else {
                $c4 = 1;
            }

            if ($jabatan == "Guru Besar") {
                $c10 = 5;
            } else if ($jabatan == "Lektor Kepala") {
                $c10 = 4;
            } else if ($jabatan == "Lektor") {
                $c10 = 3;
            } else if ($jabatan == "Asisten Ahli") {
                $c10 = 2;
            } else if ($jabatan == "Pengajar") {
                $c10 = 1;
            } else {
                $c10 = 1;
            }

            $nilai = [
                'c4' => $c4,
                'c10' => $c10
            ];
            $this->db->where('nip', $nip);
            $this->db->update('dosen_peserta', $nilai);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                    Dosen berhasil ditambahkan!. 
                  </div>');
            redirect('admin/dataDosen');
        }
    }

    public function editDosen($id)
    {
    }

    public function hapusDosen($id)
    {
    }

    public function dataKriteria()
    {

        $data['title'] = 'Data Kriteria';
        $data['kriteria'] = $this->db->get('tb_kriteria')->result_array();
        $hmpKriteria = $this->input->get('nama_kriteria');
        $data['himpunan'] = $this->db->get_where('tb_hmp_kriteria', ['nama_kriteria' => $hmpKriteria])->result_array();
        //var_dump($data['himpunan']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/dataKriteria');
        $this->load->view('templates/footer');
    }
    public function normalisasi()
    {
        $awal = microtime(true);
        $data['title'] = 'Normalisasi';
        $data['nilaiDosen'] = $this->db->get('dosen_peserta')->result_array();
        $data['bobot'] = $this->db->get('tb_kriteria')->result_array();
        //$this->db->select('sum(bobot) as sum');
        //$this->db->from('tb_kriteria');
        //$data['sumBobot'] = $this->db->get()->result_array();
        //$query = "SELECT SUM(bobot) AS sum FROM tb_kriteria";
        //$data['sumB'] = $this->db->query($query)->row_array();
        $data['vektor'] = $this->db->get('dosen_peserta')->result_array();
        $this->db->from('dosen_peserta');
        $this->db->order_by('vektor_v', 'desc');
        $data['vektor'] = $this->db->get()->result_array();
        $akhir = microtime(true);
        $data['waktu'] = $akhir - $awal;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/normalisasi');
        $this->load->view('templates/footer');
    }

    public function normalisasiSAW()
    {
        $awal = microtime(true);
        $data['title'] = 'Normalisasi';
        $data['dosen'] = $this->db->get('dosen_peserta')->result_array();
        $data['bobot'] = $this->db->get('tb_kriteria')->result_array();

        //$this->->('');

        for ($c = 1; $c <= 10; $c++) {
            $this->db->select_max('c' . $c);
        }
        $this->db->from('dosen_peserta');
        //$query = "SELECT MAX(c1), MAX(c2), MAX(c3), MAX(c4), MAX(c5), MAX(c6), MAX(c7), MAX(c8), MAX(c9), MAX(c10) FROM dosen_peserta";
        //$data['max'] = $this->db->query($query);
        $data['max'] = $this->db->get()->result_array();
        //$this->db->select('t1.c1');
        //$this->db->select('t1.*, t2.bobot_baru');
        // for ($c = 1; $c <= 10; $c++) {
        //     $this->db->select('t1.c1' . $c);
        // }
        //$this->db->from('dosen_peserta AS t1, tb_kriteria AS t2');
        // for ($c = 1; $c <= 10; $c++) {
        //     $this->db->order_by('c' . $c . ' desc');
        // }
        //$this->db->select('dosen_peserta.*, tb_kriteria.*');
        //$this->db->from('dosen_peserta, tb_kriteria');
        //$query = "SELECT dosen_peserta"
        $data['bbt'] = $this->db->get('tb_kriteria')->row_array();
        $data['rank'] = $this->db->get('dosen_peserta')->result_array();
        //$this->->('');
        //$data['total'];
        $this->db->select('bobot_baru');
        $this->db->from('tb_kriteria');
        $data['bobot1'] = $this->db->get()->result_array();
        //var_dump($data['bobot1'][0]);
        $data['bobot_baru'] = $this->db->get('tb_bobot_baru')->result_array();

        // for ($i = 1; $i <= 10; $i++) {
        //     $this->db->select();
        // }
        $this->db->select('dosen_peserta.*, tb_bobot_baru.*');
        $this->db->from('dosen_peserta, tb_bobot_baru');
        $this->db->order_by('total_nilai_saw', 'desc');
        $data['rank'] = $this->db->get()->result_array();

        $akhir = microtime(true);
        $data['waktu'] = $akhir - $awal;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/normalisasiSAW');
        $this->load->view('templates/footer');
    }
}
