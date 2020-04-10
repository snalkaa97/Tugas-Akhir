<?php
defined('BASEPATH') or exit('No direct script access allowed');

// session_start();
// if (!isset($_SESSION['email'])) {
//     header("Location: Auth");
// }

class Dosen extends CI_Controller
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
        $data['user'] = $this->db->get_where('nilai_dosen', ['nip' => $this->session->userdata('nip')])->row_array();
        //echo $data['users']['name'];
        //echo $this->session->userdata('email');
        //$judul['title'] = "Selamat Datang " . $data['users']['name'];
        //$this->load->view('templates/auth_header', $judul);
        $jurusan = $data['user']['jurusan'];
        $data['dosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
        $data['title'] = 'Dosen';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar_user');
        $this->load->view('mahasiswa/index');
        $this->load->view('templates/footer');
        //$this->load->view(('templates/auth_footer'));
    }

    public function kuesioner()
    {
        $data['user'] = $this->db->get_where('nilai_dosen', ['nim' => $this->session->userdata('nim')])->row_array();
        $data['title'] = 'Dosen - Isi Kuesioner';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar_user');
        $this->load->view('mahasiswa/kuesioner');
        $this->load->view('templates/footer');
    }
}
