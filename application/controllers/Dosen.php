<?php
defined('BASEPATH') or exit('No direct script access allowed');

// session_start();
// if (!isset($_SESSION['email'])) {
//     header("Location: Auth");
// }

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();


        if (!$this->session->userdata('role') == "Dosen") {
            redirect('auth');
        }
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('nilai_dosen', ['nip' => $this->session->userdata('nip')])->row_array();
        //echo $data['users']['name'];
        //echo $this->session->userdata('email');
        //$judul['title'] = "Selamat Datang " . $data['users']['name'];
        //$this->load->view('templates/auth_header', $judul);
        $jurusan = $data['user']['jurusan'];
        $data['dosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();

        $data['title'] = 'Dosen Sejawat';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar_user');
        $this->load->view('dosen/index');
        $this->load->view('templates/footer');
        //$this->load->view(('templates/auth_footer'));
    }
    public function changepassword()
    {
        $data['user'] = $this->db->get_where('nilai_dosen', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('New_password1', 'New Password', 'required|trim|min_length[3]|matches[New_password2]');
        $this->form_validation->set_rules('New_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[New_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user');
            $this->load->view('templates/topbar');
            $this->load->view('changepassword.php');
            $this->load->view('templates/footer');
            //$this->load->view(('templates/auth_footer'));
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('New_password1');
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Current Password wrong!. 
                   </div>'); //membuat session
                redirect('dosen/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    New Password cannot be the same as current password!. 
                   </div>'); //membuat session
                    redirect('dosen/changepassword');
                } else {
                    //password ok
                    $password = $new_password;
                    $this->db->set('password', $password);
                    $this->db->where('nip', $this->session->userdata('nip'));
                    $this->db->update('nilai_dosen');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Changed!. 
                   </div>'); //membuat session
                    redirect('dosen/changepassword');
                }
            }
        }
    }

    public function kuesioner($id_dosen)
    {
        $data['user'] = $this->db->get_where('nilai_dosen', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['title'] = 'Dosen - Isi Kuesioner';
        $data['dosen'] = $this->db->get_where('dosen_peserta', ['id_dosen' => $id_dosen])->row_array();

        $where = [
            'nip' => $this->session->userdata('nip'),
            'id_dosen' => $id_dosen
        ];

        $data['num'] = $this->db->get_where('nilai_dosen', $where)->row_array();
        $data['cek'] = $this->db->get_where('nilai_dosen', $where)->result_array();


        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar_user');
        $this->load->view('dosen/kuesioner');
        $this->load->view('templates/footer');
    }

    public function input_nilai()
    {
        $data['user'] = $this->db->get_where('nilai_dosen', ['nip' => $this->session->userdata('nip')])->row_array();
        $nip = $this->session->userdata('nip');
        $id_dosen = $this->input->post('id_dosen');
        $nama = $data['user']['nama'];
        $jurusan = $data['user']['jurusan']; //var_dump($nama);
        $email = $data['user']['email']; //var_dump($nama);
        $password = $data['user']['password']; //var_dump($nama);
        $alamat = $data['user']['alamat']; //var_dump($nama);

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
            'email' => $email,
            'password' => $password,
            'alamat' => $alamat,
            'id_dosen' => $id_dosen,
            'q1' => $q1,
            'q2' => $q2,
            'q3' => $q3,
            'q4' => $q4,
            'q5' => $q5,
            'avg' => $rata
        ];
        $cek = $this->db->get_where('nilai_dosen', $where)->row_array();
        //var_dump($cek);

        if ($cek) {
            $this->db->where('nip', $nip);
            $this->db->where('id_dosen', $id_dosen);
            $this->db->update('nilai_dosen', $data);
        } else {
            $this->db->insert('nilai_dosen', $pimpinan);
        }
        $num = $this->db->get_where('nilai_dosen', ['id_dosen' => $id_dosen])->num_rows();
        //var_dump($num['avg']);
        $cek = $this->db->get_where('nilai_dosen', ['id_dosen' => $id_dosen])->result_array();
        $sum_avg = 0;
        foreach ($cek as $c) {
            $sum_avg = $sum_avg + $c['avg'];
        }

        $c2 = round($sum_avg / $num, 4);

        $dosen_peserta = [
            'c2' => $c2
        ];
        $this->db->where('id_dosen', $id_dosen);
        $this->db->update('dosen_peserta', $dosen_peserta);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Penilaian berhasil ditambahkan  
          </div>');
        redirect('dosen');
    }
}
