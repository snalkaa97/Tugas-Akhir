<?php
defined('BASEPATH') or exit('No direct script access allowed');

// session_start();
// if (!isset($_SESSION['email'])) {
//     header("Location: Auth");
// }

class Lppm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        if (!$this->session->userdata('nim') && !$this->session->userdata('nip')) {
            redirect('auth');
        } else if (!$this->session->userdata('role') == "LPPM") {
            redirect('auth/goToDefaultPage');
        }
    }


    public function index()
    {
        //$data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //echo $data['users']['name'];
        //echo $this->session->userdata('email');
        //$judul['title'] = "Selamat Datang " . $data['users']['name'];
        //$this->load->view('templates/auth_header', $judul);
        $data['user'] = $this->db->get_where('data_lppm', ['nip' => $this->session->userdata('nip')])->row_array();
        //$jurusan = $data['user']['jurusan'];
        //$data['dosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
        $data['title'] = 'Unit Kendali Mutu (UKM)';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar_user');
        $this->load->view('lppm/index');
        $this->load->view('templates/footer');
        //$this->load->view(('templates/auth_footer'));

    }

    public function data_jurnal($id_dosen)
    {
        $data['user'] = $this->db->get_where('data_lppm', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['title'] = 'UKM - Isi Kuesioner';
        $data['dosen'] = $this->db->get_where('dosen_peserta', ['id_dosen' => $id_dosen])->row_array();
        $where = [
            'nip' => $this->session->userdata('nip'),
            'id_dosen' => $id_dosen
        ];
        $data['num'] = $this->db->get_where('data_lppm', $where)->row_array();
        $data['cek'] = $this->db->get_where('data_lppm', $where)->result_array();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar_user');
        $this->load->view('lppm/jurnal');
        $this->load->view('templates/footer');
    }

    public function input_nilai()
    {
        $data['user'] = $this->db->get_where('data_lppm', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['title'] = 'UKM - Isi Kuesioner';
        //$data['dosen'] = $this->db->get_where('dosen_peserta', ['id_dosen' => $id_dosen])->row_array();
        $id_dosen = $this->input->post('id_dosen');
        $nama = $data['user']['nama'];

        $nip = $this->session->userdata('nip');


        $jml_pn = $this->input->post('jml_pn');
        $jml_jia = $this->input->post('jml_jia');
        $jml_ji = $this->input->post('jml_ji');
        $jml_jna = $this->input->post('jml_jna');
        $jml_jn = $this->input->post('jml_jn');
        $jml_jl = $this->input->post('jml_jl');
        $jml_pl = $this->input->post('jml_pl');
        $jml_sm = $this->input->post('jml_sm');
        $jml_pg = $this->input->post('jml_pg');

        $where = [
            'nip' => $nip,
            'id_dosen' => $id_dosen
        ];

        $data = [
            'jml_pn' => $jml_pn,
            'jml_jia' => $jml_jia,
            'jml_ji' => $jml_ji,
            'jml_jna' => $jml_jna,
            'jml_jn' => $jml_jn,
            'jml_jl' => $jml_jl,
            'jml_pl' => $jml_pl,
            'jml_sm' => $jml_sm,
            'jml_pg' => $jml_pg
        ];

        $lppm = [
            'nip' => $nip,
            'nama' => $nama,
            'id_dosen' => $id_dosen,
            'jml_pn' => $jml_pn,
            'jml_jia' => $jml_jia,
            'jml_ji' => $jml_ji,
            'jml_jna' => $jml_jna,
            'jml_jn' => $jml_jn,
            'jml_jl' => $jml_jl,
            'jml_pl' => $jml_pl,
            'jml_sm' => $jml_sm,
            'jml_pg' => $jml_pg
        ];

        if ($jml_pn != "" && $jml_pl != "" && $jml_sm != "" && $jml_pg != "") {
            if ($jml_jia != "" || $jml_ji != "" || $jml_jna != "" || $jml_jn != "" || $jml_jl != "") {
                $cek = $this->db->get_where('data_lppm', $where)->row_array();
                if ($cek) {
                    $this->db->where('nip', $nip);
                    $this->db->where('id_dosen', $id_dosen);
                    $query =  $this->db->update('data_lppm', $data);
                } else {
                    $query = $this->db->insert('data_lppm', $lppm);
                }

                if ($jml_pn >= 4) {
                    $c5 = 5;
                    $c5_saw = 1;
                } else if ($jml_pn == 3) {
                    $c5 = 4;
                    $c5_saw = 2;
                } else if ($jml_pn == 2) {
                    $c5 = 3;
                    $c5_saw = 3;
                } else if ($jml_pn == 1) {
                    $c5 = 2;
                    $c5_saw = 4;
                } else if ($jml_pn == 0) {
                    $c5 = 1;
                    $c5_saw = 5;
                } else {
                    $c5_saw = 5;
                    $c5 = 1;
                }

                if ($jml_pl >= 4) {
                    $c7 = 5;
                    $c7_saw = 1;
                } else if ($jml_pl == 3) {
                    $c7 = 4;
                    $c7_saw = 2;
                } else if ($jml_pl == 2) {
                    $c7 = 3;
                    $c7_saw = 3;
                } else if ($jml_pl == 1) {
                    $c7 = 2;
                    $c7_saw = 4;
                } else if ($jml_pl == 0) {
                    $c7 = 1;
                    $c7_saw = 5;
                } else {
                    $c7 = 1;
                    $c7_saw = 5;
                }

                if ($jml_sm >= 4) {
                    $c8 = 5;
                    $c8_saw = 1;
                } else if ($jml_sm == 3) {
                    $c8 = 4;
                    $c8_saw = 2;
                } else if ($jml_sm == 2) {
                    $c8 = 3;
                    $c8_saw = 3;
                } else if ($jml_sm == 1) {
                    $c8 = 2;
                    $c8_saw = 4;
                } else if ($jml_sm == 0) {
                    $c8 = 1;
                    $c8_saw = 5;
                } else {
                    $c8_saw = 5;
                    $c8 = 1;
                }

                if ($jml_pg >= 4) {
                    $c9 = 5;
                    $c9_saw = 1;
                } else if ($jml_pg == 3) {
                    $c9 = 4;
                    $c9_saw = 2;
                } else if ($jml_pg == 2) {
                    $c9 = 3;
                    $c9_saw = 3;
                } else if ($jml_pg == 1) {
                    $c9 = 1;
                    $c9_saw = 4;
                } else if ($jml_pg == 0) {
                    $c9 = 1;
                    $c9_saw = 5;
                } else {
                    $c9 = 1;
                    $c9_saw = 5;
                }

                if ($jml_jia >= 1) {
                    $c6 = 5;
                    $c6_saw = 1;
                } else if ($jml_jna >= 3) {
                    $c6 = 4;
                    $c6_saw = 2;
                } else if ($jml_jna < 3 && $jml_jna > 0 || $jml_ji >= 1 || $jml_jn >= 3) {
                    $c6 = 3;
                    $c6_saw = 3;
                } else if ($jml_jn < 3 && $jml_jn > 0 || $jml_jl >= 3) {
                    $c6 = 2;
                    $c6_saw = 4;
                } else if ($jml_jl < 3 && $jml_jl > 0) {
                    $c6 = 1;
                    $c6_saw = 5;
                } else {
                    $c6 = 1;
                    $c6_saw = 5;
                }

                $nilai = [
                    'c5' => $c5,
                    'c6' => $c6,
                    'c7' => $c7,
                    'c8' => $c8,
                    'c9' => $c9,
                    'c5_saw' => $c5_saw,
                    'c6_saw' => $c6_saw,
                    'c7_saw' => $c7_saw,
                    'c8_saw' => $c8_saw,
                    'c9_saw' => $c9_saw
                ];
                $this->db->where('id_dosen', $id_dosen);
                $this->db->update('dosen_peserta', $nilai);

                if ($query) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil disimpan. 
                </div>');
                    redirect('lppm');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal disimpan.
                    </div>');
                    redirect('lppm');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data jurnal belum diisi. 
                </div>');
                redirect('lppm/data_jurnal/' . $id_dosen);
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Kualifikasi penelitian dosen belum lengkap. 
                </div>');
            redirect('lppm/data_jurnal/' . $id_dosen);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Penilaian berhasil ditambahkan  
          </div>');
        redirect('lppm');
    }
}
