<?php
defined('BASEPATH') or exit('No direct script access allowed');

// session_start();
// if (!isset($_SESSION['email'])) {
//     header("Location: Auth");
// }

class Pimpinan extends CI_Controller
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
        $data['user'] = $this->db->get_where('nilai_pimpinan', ['nip' => $this->session->userdata('nip')])->row_array();
        $jurusan = $data['user']['jurusan'];
        $data['dosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
        $data['title'] = 'Pimpinan atau Kajur';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar_user');
        $this->load->view('pimpinan/index');
        $this->load->view('templates/footer');
        //$this->load->view(('templates/auth_footer'));

    }
    public function kuesioner($id_dosen)
    {
        $data['user'] = $this->db->get_where('nilai_pimpinan', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['title'] = 'Pimpinan - Isi Kuesioner';
        $data['dosen'] = $this->db->get_where('dosen_peserta', ['id_dosen' => $id_dosen])->row_array();

        $where = [
            'nip' => $this->session->userdata('nip'),
            'id_dosen' => $id_dosen
        ];
        $data['num'] = $this->db->get_where('nilai_pimpinan', $where)->row_array();
        $data['cek'] = $this->db->get_where('nilai_pimpinan', $where)->result_array();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar_user');
        $this->load->view('pimpinan/kuesioner');
        $this->load->view('templates/footer');
    }

    public function input_nilai()
    {
        $data['user'] = $this->db->get_where('nilai_pimpinan', ['nip' => $this->session->userdata('nip')])->row_array();
        $nip = $this->session->userdata('nip');
        $id_dosen = $this->input->post('id_dosen');
        $nama = $data['user']['nama'];
        $jurusan = $data['user']['jurusan']; //var_dump($nama);

        $q1 = $this->input->post('q1');
        //var_dump($q1);
        $q2 = $this->input->post('q2');
        $q3 = $this->input->post('q3');
        $q4 = $this->input->post('q4');
        $q5 = $this->input->post('q5');
        $rata = ($q1 + $q2 + $q3 + $q4 + $q5) / 5;

        //var_dump($rata);

        $where = [
            'nip' => $nip,
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

        $pimpinan = [
            'nip' => $nip,
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
        $cek = $this->db->get_where('nilai_pimpinan', $where)->row_array();
        //var_dump($cek);

        if ($cek) {
            $this->db->where('nip', $nip);
            $this->db->where('id_dosen', $id_dosen);
            $this->db->update('nilai_pimpinan', $data);
        } else {
            $this->db->insert('nilai_pimpinan', $pimpinan);
        }
        $num = $this->db->get_where('nilai_pimpinan', ['id_dosen' => $id_dosen])->num_rows();
        //var_dump($num['avg']);
        $cek = $this->db->get_where('nilai_pimpinan', ['id_dosen' => $id_dosen])->result_array();
        //$avg = $this->db->get_where('nilai_pimpinan', ['id_dosen' => $id_dosen])->row_array();
        // $sum_avg = 0;
        // foreach ($cek as $c) {
        //     $sum_avg = $sum_avg + $c['avg'];
        // var_dump($avg['avg']);
        //die;
        // }

        $c2 = $rata;

        $dosen_peserta = [
            'c2' => $c2
        ];
        $this->db->where('id_dosen', $id_dosen);
        $this->db->update('dosen_peserta', $dosen_peserta);
        redirect('pimpinan');
    }
}
