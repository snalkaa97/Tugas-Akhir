<?php
defined('BASEPATH') or exit('No direct script access allowed');

// session_start();
// if (!isset($_SESSION['email'])) {
//     header("Location: Auth");
// }

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        // var_dump($this->session->userdata('role'));
        // die;
        if (!$this->session->userdata('role') == "Mahasiswa") {
            redirect('auth');
        }
        //var_dump($this->session->userdata('role'));
    }

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

    public function changepassword()
    {
        $data['user'] = $this->db->get_where('nilai_mhs', ['nim' => $this->session->userdata('nim')])->row_array();
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
                redirect('mahasiswa/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    New Password cannot be the same as current password!. 
                   </div>'); //membuat session
                    redirect('admin/changepassword');
                } else {
                    //password ok
                    $password = $new_password;
                    $this->db->set('password', $password);
                    $this->db->where('nim', $this->session->userdata('nim'));
                    $this->db->update('nilai_mhs');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Changed!. 
                   </div>'); //membuat session
                    redirect('mahasiswa/changepassword');
                }
            }
        }
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
        $email = $data['user']['email'];
        $password = $data['user']['password'];
        //var_dump($nama);

        $q1 = $this->input->post('q1');
        //var_dump($q1);
        $q2 = $this->input->post('q2');
        $q3 = $this->input->post('q3');
        $q4 = $this->input->post('q4');
        $q5 = $this->input->post('q5');
        $q6 = $this->input->post('q6');
        $q7 = $this->input->post('q7');
        $q8 = $this->input->post('q8');
        $q9 = $this->input->post('q9');
        $q10 = $this->input->post('q10');
        $q11 = $this->input->post('q11');
        $q12 = $this->input->post('q12');
        $q13 = $this->input->post('q13');
        $q14 = $this->input->post('q14');
        $q15 = $this->input->post('q15');
        $q16 = $this->input->post('q16');
        $q17 = $this->input->post('q17');
        $q18 = $this->input->post('q18');
        $q19 = $this->input->post('q19');
        $q20 = $this->input->post('q20');

        $rata = ($q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q11 + $q12 + $q13 + $q14 + $q15 + $q16 + $q17 + $q18 + $q19 + $q20) / 20;

        //var_dump($rata);

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
            'q6' => $q6,
            'q7' => $q7,
            'q8' => $q8,
            'q9' => $q9,
            'q10' => $q10,
            'q11' => $q11,
            'q12' => $q12,
            'q13' => $q13,
            'q14' => $q14,
            'q15' => $q15,
            'q16' => $q16,
            'q17' => $q17,
            'q18' => $q18,
            'q19' => $q19,
            'q20' => $q20,
            'avg' => $rata

        ];

        $mahasiswa = [
            'nim' => $nim,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'email' => $email,
            'password' => $password,
            'id_dosen' => $id_dosen,
            'q1' => $q1,
            'q2' => $q2,
            'q3' => $q3,
            'q4' => $q4,
            'q5' => $q5,
            'q6' => $q6,
            'q7' => $q7,
            'q8' => $q8,
            'q9' => $q9,
            'q10' => $q10,
            'q11' => $q11,
            'q12' => $q12,
            'q13' => $q13,
            'q14' => $q14,
            'q15' => $q15,
            'q16' => $q16,
            'q17' => $q17,
            'q18' => $q18,
            'q19' => $q19,
            'q20' => $q20,
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
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Penilaian berhasil ditambahkan  
          </div>');
        redirect('mahasiswa');
    }
}
