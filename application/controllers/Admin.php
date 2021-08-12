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

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        //$data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //echo $data['users']['name'];
        //echo $this->session->userdata('email');
        //$judul['title'] = "Selamat Datang " . $data['users']['name'];
        //$this->load->view('templates/auth_header', $judul);
        $data['title'] = 'Dashboard';

        $this->db->from('dosen_peserta');
        $this->db->order_by('vektor_v', 'desc');
        $data['dosenWP'] = $this->db->get()->result_array();

        $this->db->from('dosen_peserta');
        $this->db->order_by('total_nilai_saw', 'desc');
        $data['dosenSAW'] = $this->db->get()->result_array();

        $jurusan = $this->input->get('jurusan');

        if ($jurusan) {
            $this->db->where('jurusan', $jurusan);
            $this->db->from('dosen_peserta');
            $this->db->order_by('vektor_v', 'desc');
            $data['dosenWP'] = $this->db->get()->result_array();

            $this->db->where('jurusan', $jurusan);
            $this->db->from('dosen_peserta');
            $this->db->order_by('total_nilai_saw', 'desc');
            $data['dosenSAW'] = $this->db->get()->result_array();
        }

        $this->db->from('tendik_peserta');
        $this->db->order_by('vektor_v', 'desc');
        $data['tendikWP'] = $this->db->get()->result_array();


        $this->db->from('tendik_peserta');
        $this->db->order_by('nilai_total_saw', 'desc');
        $data['tendikSAW'] = $this->db->get()->result_array();

        $jurusanTendik = $this->input->get('jurusanTendik');
        $tendik = $this->input->get('tendik');
        $where_tendik = [
            'jurusan' => $jurusan,
            'tendik' => $tendik
        ];

        if ($jurusanTendik && $tendik) {
            $this->db->where('jurusan', $jurusanTendik);
            $this->db->where('tendik', $tendik);
            $this->db->from('tendik_peserta');
            $this->db->order_by('vektor_v', 'desc');
            $data['tendikWP'] = $this->db->get()->result_array();

            $this->db->where('jurusan', $jurusanTendik);
            $this->db->where('tendik', $tendik);
            $this->db->from('tendik_peserta');
            $this->db->order_by('nilai_total_saw', 'desc');
            $data['tendikSAW'] = $this->db->get()->result_array();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
        //$this->load->view(('templates/auth_footer'));
    }
    public function changepassword()
    {
        $data['admin'] = $this->db->get_where('admin', ['user_admin' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('New_password1', 'New Password', 'required|trim|min_length[3]|matches[New_password2]');
        $this->form_validation->set_rules('New_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[New_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/changepassword');
            $this->load->view('templates/footer');
            //$this->load->view(('templates/auth_footer'));
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('New_password1');
            if ($current_password != $data['admin']['password_admin']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Current Password wrong!. 
                   </div>'); //membuat session
                redirect('admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    New Password cannot be the same as current password!. 
                   </div>'); //membuat session
                    redirect('admin/changepassword');
                } else {
                    //password ok
                    $password = $new_password;
                    $this->db->set('password_admin', $password);
                    $this->db->where('user_admin', $this->session->userdata('username'));
                    $this->db->update('admin');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Changed!. 
                   </div>'); //membuat session
                    redirect('admin/changepassword');
                }
            }
        }
    }


    public function dataDosen()
    {
        // $data['dosen'] = $this->db->get('dosen_peserta')->result_array();


        $this->db->select('nilai_dosen.*');
        $this->db->group_by('nip');
        $this->db->from('nilai_dosen');
        $data['dosen'] = $this->db->get()->result_array();


        $jurusan = $this->input->get('jurusan');

        if ($jurusan) {
            $data['dosen'] = $this->db->get_where('nilai_dosen', ['jurusan' => $jurusan])->result_array();
        }

        $data['title'] = 'Data Dosen';
        $data['form_dosen'] = $this->db->get('dosen_peserta')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/dataDosen');
        $this->load->view('templates/footer');
    }

    public function tambahDosen()
    {

        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[dosen_peserta.nip]');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[nilai_dosen.email]', [
            'is_unique' => 'This Email has already exist!'
        ]);
        //$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required|trim');
        //$this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Dosen';

            $this->db->select('nilai_dosen.*');
            $this->db->group_by('nip');
            $this->db->from('nilai_dosen');
            $data['dosen'] = $this->db->get()->result_array();

            $jurusan = $this->input->get('jurusan');

            $this->db->group_by('nip');
            $data['cariDosen'] = $this->db->get_where('nilai_dosen', ['jurusan' => $jurusan])->result_array();
            $data['form_dosen'] = $this->db->get('dosen_peserta')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/dataDosen');
            $this->load->view('templates/footer');
        } else {
            $nip = $this->input->post('nip');
            $email = $this->input->post('email');
            $password = $nip;
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip'), true),
                'nama' => htmlspecialchars($this->input->post('nama'), true),
                'jurusan' => $this->input->post('jurusan'),
                'alamat' => htmlspecialchars($this->input->post('alamat'), true)
            ];

            $user_dosen = [
                'nip' => htmlspecialchars($this->input->post('nip'), true),
                'nama' => htmlspecialchars($this->input->post('nama'), true),
                'jurusan' => $this->input->post('jurusan'),
                'email' => $email,
                'password' => $password,
                'alamat' => htmlspecialchars($this->input->post('alamat'), true)
            ];
            $this->db->insert('nilai_dosen', $user_dosen);
            $this->db->insert('dosen_peserta', $data);


            //$jabatan = $this->input->post('jabatan');
            //$pendidikan = $this->input->post('pendidikan');

            // if ($pendidikan == "S1") {
            //     $c4 = 1;
            //     $c4_saw = 5;
            // } else if ($pendidikan == "S2") {
            //     $c4 = 3;
            //     $c4_saw = 3;
            // } else if ($pendidikan == "S3") {
            //     $c4 = 5;
            //     $c4_saw = 1;
            // } else {
            //     $c4 = 1;
            //     $c4_saw = 5;
            // }

            // if ($jabatan == "Guru Besar") {
            //     $c10 = 5;
            //     $c10_saw = 1;
            // } else if ($jabatan == "Lektor Kepala") {
            //     $c10 = 4;
            //     $c10_saw = 2;
            // } else if ($jabatan == "Lektor") {
            //     $c10 = 3;
            //     $c10_saw = 3;
            // } else if ($jabatan == "Asisten Ahli") {
            //     $c10 = 2;
            //     $c10_saw = 4;
            // } else if ($jabatan == "Pengajar") {
            //     $c10 = 1;
            //     $c10_saw = 5;
            // } else {
            //     $c10 = 1;
            //     $c10_saw = 5;
            // }

            // $nilai = [
            //     'c4' => $c4,
            //     'c10' => $c10,
            //     'c4_saw' => $c4_saw,
            //     'c10_saw' => $c10_saw
            // ];
            // $this->db->where('nip', $nip);
            // $this->db->update('dosen_peserta', $nilai);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                    Dosen berhasil ditambahkan!. 
                  </div>');
            redirect('admin/dataDosen');
        }
    }

    public function editDosen($nip)
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required|trim');

        //$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required|trim');
        //$this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Dosen';
            $this->db->select('nilai_dosen.*');
            $this->db->group_by('nip');
            $this->db->from('nilai_dosen');
            $data['dosen'] = $this->db->get()->result_array();


            $jurusan = $this->input->get('jurusan');
            $this->db->group_by('nip');
            $data['cariDosen'] = $this->db->get_where('nilai_dosen', ['jurusan' => $jurusan])->result_array();
            $data['form_dosen'] = $this->db->get('dosen_peserta')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/dataDosen');
            $this->load->view('templates/footer');
        } else {
            $nipbaru = $this->input->post('nip');
            $email = $this->input->post('email');
            $password = $nip;


            // $jabatan = $this->input->post('jabatan');
            // $pendidikan = $this->input->post('pendidikan');

            // if ($pendidikan == "S1") {
            //     $c4 = 1;
            //     $c4_saw = 5;
            // } else if ($pendidikan == "S2") {
            //     $c4 = 3;
            //     $c4_saw = 3;
            // } else if ($pendidikan == "S3") {
            //     $c4 = 5;
            //     $c4_saw = 1;
            // } else {
            //     $c4 = 1;
            //     $c4_saw = 5;
            // }

            // if ($jabatan == "Guru Besar") {
            //     $c10 = 5;
            //     $c10_saw = 1;
            // } else if ($jabatan == "Lektor Kepala") {
            //     $c10 = 4;
            //     $c10_saw = 2;
            // } else if ($jabatan == "Lektor") {
            //     $c10 = 3;
            //     $c10_saw = 3;
            // } else if ($jabatan == "Asisten Ahli") {
            //     $c10 = 2;
            //     $c10_saw = 4;
            // } else if ($jabatan == "Pengajar") {
            //     $c10 = 1;
            //     $c10_saw = 5;
            // } else {
            //     $c10 = 1;
            //     $c10_saw = 5;
            // }

            // $nilai = [
            //     'c4' => $c4,
            //     'c10' => $c10,
            //     'c4_saw' => $c4_saw,
            //     'c10_saw' => $c10_saw
            // ];

            $user_dosen = [
                'nip' => $nipbaru,
                'nama' => htmlspecialchars($this->input->post('nama'), true),
                'jurusan' => $this->input->post('jurusan'),
                'email' => $email,
                'password' => $password,
                'alamat' => htmlspecialchars($this->input->post('alamat'), true)
            ];

            $data = [
                'nip' => $nipbaru,
                'nama' => htmlspecialchars($this->input->post('nama'), true),
                'jurusan' => $this->input->post('jurusan'),
                'alamat' => htmlspecialchars($this->input->post('alamat'), true)
            ];

            $data1 = $this->db->get_where('nilai_dosen', ['nip' => $nip])->row_array();
            $nip = $data1['nip'];
            $data2 = $this->db->get_where('dosen_peserta', ['nip' => $nip])->row_array();

            if ($data2 == NULL) {
                $this->db->where('nip', $nip);
                $this->db->insert('dosen_peserta', $user_dosen);
            }

            $this->db->where('nip', $nip);
            $this->db->update('nilai_dosen', $user_dosen);
            $this->db->where('nip', $nip);
            $this->db->update('dosen_peserta', $data);



            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Dosen berhasil diupdate!. 
      </div>');
            redirect('admin/dataDosen');
        }
    }

    public function hapusDosen($nip)
    {
        $data['dosen'] = $this->db->get_where('nilai_dosen', ['nip' => $nip])->row_array();
        $nip = $data['dosen']['nip'];
        $this->db->delete('dosen_peserta', ['nip' => $nip]);
        $this->db->delete('nilai_dosen', ['nip' => $nip]);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Dosen berhasil dihapus!. 
      </div>');
        redirect('admin/dataDosen');
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
        $data['title'] = 'Tabel Keputusan WP Dosen';
        $jurusan = $this->input->get('jurusan');
        $data['nilaiDosen'] = $this->db->get('dosen_peserta')->result_array();

        if ($jurusan) {

            $data['nilaiDosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
        }
        $data['bobot'] = $this->db->get('tb_kriteria')->result_array();
        //$this->db->select('sum(bobot) as sum');
        //$this->db->from('tb_kriteria');
        //$data['sumBobot'] = $this->db->get()->result_array();
        //$query = "SELECT SUM(bobot) AS sum FROM tb_kriteria";
        //$data['sumB'] = $this->db->query($query)->row_array();

        $queryHitung = "SELECT *FROM dosen_peserta WHERE jurusan = '$jurusan'";
        $data['hitung'] = $this->db->query($queryHitung)->result_array();


        $query = "SELECT *FROM dosen_peserta WHERE jurusan = '$jurusan'";
        $data['vektor'] = $this->db->query($query)->result_array();
        //var_dump($query);
        $query2 = "SELECT *FROM dosen_peserta WHERE jurusan = '$jurusan'ORDER BY vektor_v DESC";
        //$this->db->order_by('vektor_v', 'desc');
        $data['vektor'] = $this->db->query($query2)->result_array();

        $result = "SELECT nama FROM dosen_peserta WHERE jurusan = '$jurusan' ORDER BY vektor_v DESC";
        $data['result'] = $this->db->query($result)->row_array();
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
        $data['title'] = 'Tabel Keputusan SAW Dosen';
        $jurusan = $this->input->get('jurusan');

        $data['dosen'] = $this->db->get('dosen_peserta')->result_array();

        if ($jurusan) {
            $data['dosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
        }
        $data['bobot'] = $this->db->get('tb_kriteria')->result_array();

        //$this->->('');

        for ($c = 1; $c <= 10; $c++) {
            $this->db->select_max('c' . $c);
        }
        $this->db->where('jurusan', $jurusan);
        $this->db->from('dosen_peserta');
        //$query = "SELECT MAX(c1), MAX(c2), MAX(c3), MAX(c4), MAX(c5), MAX(c6), MAX(c7), MAX(c8), MAX(c9), MAX(c10) FROM dosen_peserta";
        //$data['max'] = $this->db->query($query);
        $data['max'] = $this->db->get()->result_array();


        // for ($c = 4; $c <= 10; $c++) {
        //     $this->db->select_min('c' . $c . '_saw');
        // }
        // $this->db->where('jurusan', $jurusan);
        // $this->db->from('dosen_peserta');
        // $data['min'] = $this->db->get()->result_array();

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
        $data['rank'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
        //$this->->('');
        //$data['total'];
        // $this->db->select('bobot_baru');
        // $this->db->from('tb_kriteria');
        // $data['bobot1'] = $this->db->get()->result_array();
        //var_dump($data['bobot1'][0]);
        $data['bobot_baru'] = $this->db->get('tb_bobot_baru')->result_array();
        $this->db->select('dosen_peserta.*, tb_bobot_baru.*');
        $this->db->where('jurusan', $jurusan);
        $this->db->from('dosen_peserta, tb_bobot_baru');
        $this->db->order_by('total_nilai_saw', 'desc');
        $data['rank'] = $this->db->get()->result_array();

        $result = "SELECT nama FROM dosen_peserta WHERE jurusan = '$jurusan' ORDER BY total_nilai_saw DESC";
        $data['result'] = $this->db->query($result)->row_array();



        $akhir = microtime(true);
        $data['waktu'] = $akhir - $awal;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/normalisasiSAW');
        $this->load->view('templates/footer');
    }


    public function dataTendik()
    {
        $data['dataTendik'] = $this->db->get('tendik_peserta')->result_array();

        if ($this->input->get('tendik')) {
            $this->db->where('jurusan', $this->input->get('jurusan'));
            $this->db->where('tendik', $this->input->get('tendik'));
            $this->db->from('tendik_peserta');
            $data['dataTendik'] = $this->db->get()->result_array();
        }

        // $tendik = $this->input->get('tendik');
        // $data['cariTendik'] = $this->db->get_where('tendik_peserta', ['tendik' => $tendik])->result_array();
        $data['title'] = 'Data Tendik';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/dataTendik');
        $this->load->view('templates/footer');
    }

    public function tambahTendik()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[tendik_peserta.nip]');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required|trim');
        $this->form_validation->set_rules('tendik', 'Tendik', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Tendik';
            $data['dataTendik'] = $this->db->get('tendik_peserta')->result_array();
            $tendik = $this->input->get('tendik');
            $data['cariTendik'] = $this->db->get_where('tendik_peserta', ['tendik' => $tendik])->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/dataTendik');
            $this->load->view('templates/footer');
            //redirect('admin/dataTendik');
        } else {
            $nip = $this->input->post('nip');
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip'), true),
                'nama' => htmlspecialchars($this->input->post('nama'), true),
                'tendik' => $this->input->post('tendik'),
                'jurusan' => $this->input->post('jurusan')
            ];

            $this->db->insert('tendik_peserta', $data);
            //$this->db->update('tendik_peserta', $nilai);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                    Dosen berhasil ditambahkan!. 
                  </div>');
            redirect('admin/dataTendik');
        }
    }

    public function editTendik($id)
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required|trim');
        $this->form_validation->set_rules('tendik', 'Tendik', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Tendik';
            $data['dataTendik'] = $this->db->get('tendik_peserta')->result_array();
            $tendik = $this->input->get('tendik');
            $data['cariTendik'] = $this->db->get_where('tendik_peserta', ['tendik' => $tendik])->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/dataTendik');
            $this->load->view('templates/footer');
            //redirect('admin/dataTendik');
        } else {
            $nip = $this->input->post('nip');
            $data = [
                'id_tendik' => htmlspecialchars($this->input->post('id_tendik'), true),
                'nip' => htmlspecialchars($this->input->post('nip'), true),
                'nama' => htmlspecialchars($this->input->post('nama'), true),
                'tendik' => $this->input->post('tendik'),
                'jurusan' => $this->input->post('jurusan')
            ];
            $this->db->where('id_tendik', $id);
            $this->db->update('tendik_peserta', $data);
            //$this->db->update('tendik_peserta', $nilai);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                    Dosen berhasil diupdate!. 
                  </div>');
            redirect('admin/dataTendik');
        }
    }

    public function hapusTendik($id)
    {

        $this->db->delete('tendik_peserta', ['id_tendik' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                    Dosen berhasil dihapus!. 
                  </div>');
        redirect('admin/dataTendik');
    }

    public function dataKriteria_tendik()
    {
        $data['title'] = 'Data Kriteria Tendik';
        $data['kriteria'] = $this->db->get('tb_kriteria_tendik')->result_array();
        $hmpKriteria = $this->input->get('nama_kriteria');
        $data['himpunan'] = $this->db->get_where('tb_hmp_kriteria_tendik', ['nama_kriteria' => $hmpKriteria])->result_array();
        //var_dump($data['himpunan']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/dataKriteria_tendik');
        $this->load->view('templates/footer');
    }

    public function normalisasi_tendik_WP()
    {
        $awal = microtime(true);
        $data['title'] = 'Tabel Keputusan WP Tendik';

        $jurusan = $this->input->get('jurusan');
        $tendik = $this->input->get('tendik');
        $data['nilaitendik'] = $this->db->get('tendik_peserta')->result_array();

        $where = [
            'jurusan' => $this->input->get('jurusan'),
            'tendik' => $this->input->get('tendik')
        ];
        if ($jurusan && $tendik) {

            $data['nilaitendik'] = $this->db->get_where('tendik_peserta', $where)->result_array();
        }


        $data['bobot'] = $this->db->get('tb_kriteria_tendik')->result_array();
        $data['hitung'] = $this->db->get_where('tendik_peserta', $where)->result_array();
        //$this->db->select('sum(bobot) as sum');
        //$this->db->from('tb_kriteria');
        //$data['sumBobot'] = $this->db->get()->result_array();
        //$query = "SELECT SUM(bobot) AS sum FROM tb_kriteria";
        //$data['sumB'] = $this->db->query($query)->row_array();
        $query = "SELECT *FROM tendik_peserta WHERE jurusan = '$jurusan' AND tendik = '$tendik'";
        $data['vektor_s'] = $this->db->query($query)->result_array();
        //var_dump($query);
        $query2 = "SELECT *FROM tendik_peserta WHERE jurusan = '$jurusan' AND tendik = '$tendik' ORDER BY vektor_v DESC";
        //$this->db->order_by('vektor_v', 'desc');
        $data['vektor'] = $this->db->query($query2)->result_array();
        $result = "SELECT nama FROM tendik_peserta WHERE jurusan = '$jurusan' AND tendik = '$tendik' ORDER BY vektor_v DESC";
        $data['result'] = $this->db->query($result)->row_array();

        $akhir = microtime(true);
        $data['waktu'] = $akhir - $awal;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/normalisasiWP_tendik');
        $this->load->view('templates/footer');
    }
    public function normalisasi_tendik_SAW()
    {
        $awal = microtime(true);
        $data['title'] = 'Tabel Keputusan SAW Tendik';
        $jurusan = $this->input->get('jurusan');
        $tendik = $this->input->get('tendik');

        $data['dataTendik'] = $this->db->get('tendik_peserta')->result_array();
        $where = [
            'jurusan' => $this->input->get('jurusan'),
            'tendik' => $this->input->get('tendik')
        ];
        if ($jurusan && $tendik) {

            $data['dataTendik'] = $this->db->get_where('tendik_peserta', $where)->result_array();
        }

        $data['bobot'] = $this->db->get('tb_kriteria_tendik')->result_array();

        //$this->->('');
        $normalisasi = $this->db->get_where('tendik_peserta', $where)->result_array();
        foreach ($normalisasi as $n) {
            if ($n['c1'] == 0 && $n['c2'] == 0 && $n['c3'] == 0 && $n['c4'] == 0 && $n['c5'] == 0 && $n['c6'] == 0) { }
        }

        $this->db->select_min('c1_saw');
        $this->db->where('jurusan', $jurusan);
        $this->db->where('tendik', $tendik);
        $this->db->from('tendik_peserta');
        $data['min'] = $this->db->get()->result_array();
        for ($c = 2; $c <= 6; $c++) {
            $this->db->select_max('c' . $c);
        }
        $this->db->where('jurusan', $jurusan);
        $this->db->where('tendik', $tendik);
        $this->db->from('tendik_peserta');
        $data['max'] = $this->db->get()->result_array();
        //$this->db->select('t1.c1');
        //$this->db->select('t1.*, t2.bobot_baru');
        // for ($c = 1; $c <= 10; $c++) {
        //     $this->db->select('t1.c1' . $c);
        // }
        //$this->db->from('tendik_peserta AS t1, tb_kriteria AS t2');
        // for ($c = 1; $c <= 10; $c++) {
        //     $this->db->order_by('c' . $c . ' desc');
        // }
        //$this->db->select('tendik_peserta.*, tb_kriteria.*');
        //$this->db->from('tendik_peserta, tb_kriteria');
        //$query = "SELECT tendik_peserta"
        $data['rank'] = $this->db->get_where('tendik_peserta', $where)->result_array();
        //$this->->('');
        //$data['total'];
        // $this->db->select('bobot_baru');
        // $this->db->from('tb_kriteria');
        // $data['bobot1'] = $this->db->get()->result_array();
        //var_dump($data['bobot1'][0]);
        $data['bobot_baru'] = $this->db->get('tb_bobot_baru_tendik')->result_array();
        $this->db->select('tendik_peserta.*, tb_bobot_baru_tendik.*');
        $this->db->where('jurusan', $jurusan);
        $this->db->where('tendik', $tendik);
        $this->db->from('tendik_peserta, tb_bobot_baru_tendik');
        $this->db->order_by('nilai_total_saw', 'desc');
        $data['rank'] = $this->db->get()->result_array();

        $result = "SELECT nama FROM tendik_peserta WHERE jurusan = '$jurusan' AND tendik = '$tendik' ORDER BY nilai_total_saw DESC";
        $data['result'] = $this->db->query($result)->row_array();

        $akhir = microtime(true);
        $data['waktu'] = $akhir - $awal;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/normalisasiSAW_tendik');
        $this->load->view('templates/footer');
    }

    public function mahasiswa()
    {


        //$jurusan = $this->input->get('jurusan');

        $data['title'] = 'Mahasiswa';
        $this->db->select('nim, nama, jurusan,id_mhs');
        $this->db->from('nilai_mhs');
        $this->db->group_by('nama');
        $data['mahasiswa'] = $this->db->get()->result_array();


        $jurusan = $this->input->get('jurusan');

        if ($jurusan) {
            $data['mahasiswa'] = $this->db->get_where('nilai_mhs', ['jurusan' => $jurusan])->result_array();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/mahasiswa');
        $this->load->view('templates/footer');
    }

    public function tambahmahasiswa()
    {

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        if ($this->form_validation->run() == false) { //ketika dijalankan / run
            $data['title'] = 'Mahasiswa';
            $data['mahasiswa'] = $this->db->get('nilai_mhs')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/mahasiswa');
            $this->load->view('templates/footer');
        } else {

            $nim = $this->input->post('nim', true);
            $domain = "@ftumj.ac.id";
            $email = "$nim" . "$domain";
            $password = $nim;
            $mahasiswa = [
                'nim' => $nim,
                'nama' => $this->input->post('nama', true),
                'jurusan' => $this->input->post('jurusan', true),
                'email' => $email,
                'password' => $password
            ];

            $this->db->insert('nilai_mhs', $mahasiswa);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! user mahasiswa berhasil ditambahkan.  
          </div>');
            redirect('admin/mahasiswa');
        }
    }

    public function editmahasiswa($nim)
    {
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['title'] = 'Mahasiswa';
            $this->db->select('nim, nama, jurusan,id_mhs');
            $this->db->from('nilai_mhs');
            $this->db->group_by('nama');
            $data['mahasiswa'] = $this->db->get()->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/mahasiswa');
            $this->load->view('templates/footer');
        } else {
            # code...
            $nim = $this->input->post('nim', true);
            $domain = "@ftumj.ac.id";
            $email = "$nim" . "$domain";
            $password = $nim;

            $data = [
                'nim' => $nim,
                'nama' => $this->input->post('nama', true),
                'jurusan' => $this->input->post('jurusan', true),
                'email' => $email,
                'password' => $password
            ];

            $this->db->where('nim', $nim);
            $this->db->update('nilai_mhs', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! user mahasiswa berhasil diedit.  
          </div>');
            redirect('admin/mahasiswa');
        }
    }

    public function hapusmahasiswa($nim)
    {
        $data['mahasiswa'] = $this->db->get_where('nilai_mhs', ['nim' => $nim])->row_array();
        //$nim = $data['mahasiswa']['nim'];
        $this->db->delete('nilai_mhs', ['nim' => $nim]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        data berhasil dihapus.  
      </div>');
        redirect('admin/mahasiswa');
    }

    public function dosen()
    {
        $data['title'] = 'Dosen';
        $data['dosen'] = $this->db->get('dosen_peserta')->result_array();

        $jurusan = $this->input->get('jurusan');

        if ($jurusan) {
            $data['dosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/dosen');
        $this->load->view('templates/footer');
    }



    public function pimpinan()
    {
        $data['title'] = 'Pimpinan';
        $this->db->select('nilai_pimpinan_tendik.*');
        $this->db->from('nilai_pimpinan_tendik');
        $this->db->group_by('nama');
        $data['pimpinan'] = $this->db->get()->result_array();

        $jurusan = $this->input->get('jurusan');
        $tendik = $this->input->get('tendik');

        if ($jurusan) {
            $this->db->group_by('nama');
            $data['pimpinan'] = $this->db->get_where('nilai_pimpinan_tendik', ['jurusan' => $jurusan])->result_array();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/pimpinan');
        $this->load->view('templates/footer');
    }

    public function tambahpimpinan()
    {
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');


        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['title'] = 'Pimpinan';
            $data['pimpinan'] = $this->db->get('nilai_pimpinan_tendik')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/pimpinan');
            $this->load->view('templates/footer');
        } else {
            # code...
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $jurusan = $this->input->post('jurusan');
            $jabatan = $this->input->post('jabatan');
            $email = $this->input->post('email');
            $password = $nip;

            if ($jabatan == "Kepala Laboratorium") {
                $tendik = "Laboratorium";
            } else if ($jabatan == "Kepala Program Studi") {
                $tendik = "Administrasi Prodi";
            } else if ($jabatan == "Kepala Perpustakaan") {
                $tendik = "Perpustakaan";
            }

            $data = [
                'nip' => $nip,
                'nama' => $nama,
                'jurusan' => $jurusan,
                'tendik' => $tendik,
                'jabatan' => $jabatan,
                'email' => $email,
                'password' => $password
            ];
            $data2 = [
                'nip' => $nip,
                'nama' => $nama,
                'jurusan' => $jurusan,
                'email' => $email,
                'password' => $password
            ];

            if ($jabatan == "Kepala Program Studi" && $jurusan != "Perpustakaan") {
                $this->db->insert('nilai_pimpinan_tendik', $data);
                $this->db->insert('nilai_pimpinan', $data2);
            } else {
                $this->db->insert('nilai_pimpinan_tendik', $data);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! data berhasil ditambahkan  
          </div>');
            redirect('admin/pimpinan');
        }
    }

    public function editpimpinan($id)
    {
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');


        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['title'] = 'Pimpinan';
            $data['pimpinan'] = $this->db->get('nilai_pimpinan_tendik')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/pimpinan');
            $this->load->view('templates/footer');
        } else {
            # code...
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $jurusan = $this->input->post('jurusan');
            $jabatan = $this->input->post('jabatan');
            $email = $this->input->post('email');
            $password = $nip;

            if ($jabatan == "Kepala Laboratorium") {
                $tendik = "Laboratorium";
            } else if ($jabatan == "Kepala Program Studi") {
                $tendik = "Administrasi Prodi";
            } else if ($jabatan == "Kepala Perpustakaan") {
                $tendik = "Perpustakaan";
            }

            $data = [
                'nip' => $nip,
                'nama' => $nama,
                'jurusan' => $jurusan,
                'tendik' => $tendik,
                'jabatan' => $jabatan,
                'email' => $email,
                'password' => $password

            ];
            $data2 = [
                'nip' => $nip,
                'nama' => $nama,
                'jurusan' => $jurusan,
                'email' => $email,
                'password' => $password
            ];
            $data3 = $this->db->get_where('nilai_pimpinan_tendik', ['id_pimpinan' => $id])->row_array();
            $nip = $data3['nip'];

            var_dump($nip);

            $data4 = $this->db->get_where('nilai_pimpinan', ['nip' => $nip])->row_array();
            $nip2 = $data4['nip'];
            if ($data4 && $data3) {
                $this->db->where('nip', $nip);
                $this->db->update('nilai_pimpinan_tendik', $data);
                $this->db->where('nip', $nip2);
                $this->db->update('nilai_pimpinan', $data2);
            } else if ($jabatan == "Kepala Program Studi" && $jurusan != "Perpustakaan") {
                $this->db->where('nip', $nip2);
                $this->db->insert('nilai_pimpinan', $data2);
                $this->db->where('nip', $nip);
                $this->db->update('nilai_pimpinan_tendik', $data);
            } else {
                $this->db->where('nip', $nip);
                $this->db->update('nilai_pimpinan_tendik', $data);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! data berhasil diedit.  
          </div>');
            redirect('admin/pimpinan');
        }
    }

    public function hapuspimpinan($id)
    {
        $data['pimpinan'] = $this->db->get_where('nilai_pimpinan_tendik', ['id_pimpinan' => $id])->row_array();
        $nip = $data['pimpinan']['nip'];

        $this->db->delete('nilai_pimpinan_tendik', ['nip' => $nip]);
        $this->db->delete('nilai_pimpinan', ['nip' => $nip]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        data berhasil dihapus.  
      </div>');
        redirect('admin/pimpinan');
    }

    public function ukm()
    {

        $data['title'] = "User UKM";
        $this->db->group_by('nama');
        $data['ukm'] = $this->db->get('data_lppm')->result_array();

        // var_dump($data['data_ukm']);
        //$data['ukm'] = $this->db->distinct()->select('nip')->get('data_lppm');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/ukm');
        $this->load->view('templates/footer');
    }

    public function tambahukm()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');


        $data['ukm'] = $this->db->get('data_lppm')->result_array();
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $email = $this->input->post('email');
        $password = $nip;



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/ukm');
            $this->load->view('templates/footer');
        } else {
            # code...
            $data = [
                'nip' => $nip,
                'nama' => $nama,
                'email' => $email,
                'password' => $password
            ];
            $this->db->insert('data_lppm', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! data berhasil ditambahkan.  
          </div>');
            redirect('admin/ukm');
        }
    }

    public function editukm($nip)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $data['ukm'] = $this->db->get('data_lppm')->result_array();
        $nama = $this->input->post('nama');
        $nip_baru = $this->input->post('nip');
        $email = $this->input->post('email');
        $password = $nip;



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/ukm');
            $this->load->view('templates/footer');
        } else {
            # code...
            $data = [
                'nip' => $nip_baru,
                'nama' => $nama,
                'email' => $email,
                'password' => $password
            ];

            $this->db->where('nip', $nip);
            $this->db->update('data_lppm', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! data berhasil diedit.  
          </div>');
            redirect('admin/ukm');
        }
    }

    public function hapusukm($nip)
    {
        $data['ukm'] = $this->db->get_where('data_lppm', ['nip' => $nip])->row_array();
        $nip = $data['ukm']['nip'];
        $this->db->delete('data_lppm', ['nip' => $nip]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        data berhasil dihapus.  
      </div>');
        redirect('admin/ukm');
    }
}
