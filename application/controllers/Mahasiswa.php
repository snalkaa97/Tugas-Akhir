<?php
defined('BASEPATH') or exit('No direct script access allowed');

// session_start();
// if (!isset($_SESSION['email'])) {
//     header("Location: Auth");
// }

class Mahasiswa extends CI_Controller
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
        $data['user'] = $this->db->get_where('nilai_mhs', ['nim' => $this->session->userdata('nim')])->row_array();
        //echo $data['users']['name'];
        //echo $this->session->userdata('email');
        //$judul['title'] = "Selamat Datang " . $data['users']['name'];
        //$this->load->view('templates/auth_header', $judul);
        $jurusan = $data['user']['jurusan'];
        //die;
        $data['dosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
        //$this->db->get()->result_array();
        $data['getdosen'] = $this->db->get_where('nilai_mhs', ['id_dosen' => $this->session->userdata('id_dosen')])->row_array();
        //var_dump($data['getdosen']);
        $data['title'] = 'Mahasiswa';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar_user');
        $this->load->view('mahasiswa/index');
        $this->load->view('templates/footer');
        //$this->load->view(('templates/auth_footer'));
    }

    public function kuesioner($id_dosen)
    {

        $data['user'] = $this->db->get_where('nilai_mhs', ['nim' => $this->session->userdata('nim')])->row_array();
        $data['title'] = 'Mahasiswa - Isi Kuesioner';
        $data['dosen'] = $this->db->get_where('dosen_peserta', ['id_dosen' => $id_dosen])->row_array();

        $where = [
            'nim' => $this->session->userdata('nim'),
            'id_dosen' => $id_dosen
        ];
        $data['num'] = $this->db->get_where('nilai_mhs', $where)->row_array();
        $data['cek'] = $this->db->get_where('nilai_mhs', $where)->result_array();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar_user');
        $this->load->view('mahasiswa/kuesioner');
        $this->load->view('templates/footer');
    }

    public function input_nilai()
    {
        $data['user'] = $this->db->get_where('nilai_mhs', ['nim' => $this->session->userdata('nim')])->row_array();
        $nim = $this->session->userdata('nim');
        $id_dosen = $this->input->post('id_dosen');

        $nama = $data['user']['nama'];
        $jurusan = $data['user']['jurusan'];
        //var_dump($nama);

        $q1 = $this->input->post('q1');
        //var_dump($q1);
        $q2 = $this->input->post('q2');
        $q3 = $this->input->post('q3');
        $q4 = $this->input->post('q4');
        $q5 = $this->input->post('q5');

        $rata = ($q1 + $q2 + $q3 + $q4 + $q5) / 5;

        var_dump($rata);

        $where = [
            'nim' => $nim,
            'id_dosen' => $id_dosen
        ];

        $data = [
            'q1' => $q1,
            'q2' => $q2,
            'q3' => $q3,
            'q4' => $q4,
            'q5' => $q5,
            'avg' => $rata

        ];

        $mahasiswa = [
            'nim' => $nim,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'id_dosen' => $id_dosen,
            'q1' => $q1,
            'q2' => $q2,
            'q3' => $q3,
            'q4' => $q4,
            'q5' => $q5,
            'avg' => $rata
        ];
        $cek = $this->db->get_where('nilai_mhs', $where)->row_array();
        //var_dump($cek);

        if ($cek) {
            $this->db->where('nim', $nim);
            $this->db->where('id_dosen', $id_dosen);
            $this->db->update('nilai_mhs', $data);
        } else {
            $this->db->insert('nilai_mhs', $mahasiswa);
        }

        $num = $this->db->get_where('nilai_mhs', ['id_dosen' => $id_dosen])->num_rows();
        //var_dump($num['avg']);
        $cek = $this->db->get_where('nilai_mhs', ['id_dosen' => $id_dosen])->result_array();
        $sum_avg = 0;
        foreach ($cek as $c) {
            $sum_avg = $sum_avg + $c['avg'];
        }

        $c1 = round($sum_avg / $num, 4);

        $dosen_peserta = [
            'c1' => $c1
        ];
        $this->db->where('id_dosen', $id_dosen);
        $this->db->update('dosen_peserta', $dosen_peserta);
        redirect('mahasiswa');
    }
}
