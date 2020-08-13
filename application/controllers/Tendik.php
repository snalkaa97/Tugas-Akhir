<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tendik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        if (!$this->session->userdata('tendik')) {
            redirect('auth');
        }
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('nilai_pimpinan_tendik', ['nip' => $this->session->userdata('nip')])->row_array();
        $jurusan = $data['user']['jurusan'];
        $jabatan = $data['user']['jabatan'];
        $tendik = $data['user']['tendik'];

        $where = [
            'jurusan' => $jurusan,
            'tendik' => $tendik
        ];
        $data['peserta'] = $this->db->get_where('tendik_peserta', $where)->result_array();

        $data['title'] = $jabatan . " - $jurusan";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar_user');
        $this->load->view('tendik/index');
        $this->load->view('templates/footer');
    }
    public function changepassword()
    {
        $data['user'] = $this->db->get_where('nilai_pimpinan_tendik', ['nip' => $this->session->userdata('nip')])->row_array();
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
                redirect('tendik/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    New Password cannot be the same as current password!. 
                   </div>'); //membuat session
                    redirect('tendik/changepassword');
                } else {
                    //password ok
                    $password = $new_password;
                    $this->db->set('password', $password);
                    $this->db->where('nip', $this->session->userdata('nip'));
                    $this->db->update('nilai_pimpinan_tendik');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Changed!. 
                   </div>'); //membuat session
                    redirect('tendik/changepassword');
                }
            }
        }
    }
    public function kuesioner($id_tendik)
    {
        $data['user'] = $this->db->get_where('nilai_pimpinan_tendik', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['title'] = 'Pimpinan - Isi Kuesioner';
        $data['peserta'] = $this->db->get_where('tendik_peserta', ['id_tendik' => $id_tendik])->row_array();

        $where = [
            'nip' => $this->session->userdata('nip'),
            'id_tendik' => $id_tendik
        ];
        $data['num'] = $this->db->get_where('nilai_pimpinan_tendik', $where)->row_array();
        $data['cek'] = $this->db->get_where('nilai_pimpinan_tendik', $where)->result_array();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar_user');
        $this->load->view('tendik/kuesioner');
        $this->load->view('templates/footer');
    }

    public function input_nilai()
    {

        $data['user'] = $this->db->get_where('nilai_pimpinan_tendik', ['nip' => $this->session->userdata('nip')])->row_array();
        $nip = $this->session->userdata('nip');
        $id_tendik = $this->input->post('id_tendik');
        $nama = $data['user']['nama'];
        $jurusan = $data['user']['jurusan']; //var_dump($nama);
        $jabatan = $data['user']['jabatan'];
        $tendik = $data['user']['tendik'];
        $email = $data['user']['email'];
        $password = $data['user']['password'];

        $q1 = $this->input->post('q1');
        if ($q1 == 5) {
            $q1_saw = 1;
        } else if ($q1 == 4) {
            $q1_saw = 2;
        } else if ($q1 == 3) {
            $q1_saw = 3;
        } else if ($q1 == 2) {
            $q1_saw = 4;
        } else if ($q1 == 1) {
            $q1_saw = 5;
        } else {
            $q1_saw = 5;
        }


        $q2 = $this->input->post('q2');
        if ($q2 == 5) {
            $q2_saw = 1;
        } else if ($q2 == 4) {
            $q2_saw = 2;
        } else if ($q2 == 3) {
            $q2_saw = 3;
        } else if ($q2 == 2) {
            $q2_saw = 4;
        } else if ($q2 == 1) {
            $q2_saw = 5;
        } else {
            $q2_saw = 5;
        }

        $q3 = $this->input->post('q3');
        if ($q3 == 5) {
            $q3_saw = 1;
        } else if ($q3 == 4) {
            $q3_saw = 2;
        } else if ($q3 == 3) {
            $q3_saw = 3;
        } else if ($q3 == 2) {
            $q3_saw = 4;
        } else if ($q3 == 1) {
            $q3_saw = 5;
        } else {
            $q3_saw = 5;
        }
        $q4 = $this->input->post('q4');
        if ($q4 = 5) {
            $q4_saw = 1;
        } else if ($q4 = 4) {
            $q4_saw = 2;
        } else if ($q4 == 3) {
            $q4_saw = 3;
        } else if ($q4 == 2) {
            $q4_saw = 4;
        } else if ($q4 == 1) {
            $q4_saw = 5;
        } else {
            $q4_saw = 5;
        }
        $q5 = $this->input->post('q5');
        if ($q5 == 5) {
            $q5_saw = 1;
        } else if ($q5 == 4) {
            $q5_saw = 2;
        } else if ($q5 == 3) {
            $q5_saw = 3;
        } else if ($q5 == 2) {
            $q5_saw = 4;
        } else if ($q5 == 1) {
            $q5_saw = 5;
        } else {
            $q5_saw = 5;
        }
        $q6 = $this->input->post('q6');
        if ($q6 = 5) {
            $q6_saw = 1;
        } else if ($q6 = 4) {
            $q6_saw = 2;
        } else if ($q6 = 3) {
            $q6_saw = 3;
        } else if ($q6 = 2) {
            $q6_saw = 4;
        } else if ($q6 = 1) {
            $q6_saw = 5;
        } else {
            $q6_saw = 5;
        }
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
        $q21 = $this->input->post('q21');
        $q22 = $this->input->post('q22');
        $q23 = $this->input->post('q23');
        $q24 = $this->input->post('q24');
        $q25 = $this->input->post('q25');
        $q26 = $this->input->post('q26');
        $q27 = $this->input->post('q27');
        $q28 = $this->input->post('q28');
        $q29 = $this->input->post('q29');


        // $rata = ($q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10 + $q11 + $q12 + $q13 + $q14 + $q15 + $q16 + $q17 + $q18 + $q19 + $q20 + $q21 + $q22 + $q23 + $q24 + $q25 + $q26 + $q27 + $q28 + $q29) / 29;

        // var_dump($rata);



        //Kehadiran





        $rata_kehadiran_saw = ($q1_saw + $q2_saw + $q3_saw + $q4_saw + $q5_saw + $q6_saw) / 6;
        $rata_kehadiran = ($q1 + $q2 + $q3 + $q4 + $q5 + $q6) / 6;
        //var_dump($rata_kehadiran);
        //var_dump($rata_kehadiran_saw);

        //Tanggung jawab

        $rata_tanggungjawab = ($q7 + $q8 + $q9 + $q10 + $q11) / 5;
        //kerjasama
        $rata_kerjasama = ($q12 + $q13 + $q14 + $q15 + $q16) / 5;
        //Loyalitas
        $rata_loyalitas = ($q17 + $q18 + $q19 + $q20) / 4;
        //kearsipan
        $rata_kearsipan = ($q21 + $q22 + $q23 + $q24) / 4;
        //pelayanan
        $rata_pelayanan = ($q25 + $q26 + $q27 + $q28 + $q29) / 5;



        $where = [
            'nip' => $nip,
            'id_tendik' => $id_tendik
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
            'q21' => $q21,
            'q22' => $q22,
            'q23' => $q23,
            'q24' => $q24,
            'q25' => $q25,
            'q26' => $q26,
            'q27' => $q27,
            'q28' => $q28,
            'q29' => $q29,
            'rata_kehadiran' => $rata_kehadiran,
            'rata_tanggungjawab' => $rata_tanggungjawab,
            'rata_kerjasama' => $rata_kerjasama,
            'rata_loyalitas' => $rata_loyalitas,
            'rata_kearsipan' => $rata_kearsipan,
            'rata_pelayanan' => $rata_pelayanan
        ];

        $pimpinan = [
            'nip' => $nip,
            'nama' => $nama,
            'jabatan' => $jabatan,
            'tendik' => $tendik,
            'jurusan' => $jurusan,
            'email' => $email,
            'password' => $password,
            'id_tendik' => $id_tendik,
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
            'q21' => $q21,
            'q22' => $q22,
            'q23' => $q23,
            'q24' => $q24,
            'q25' => $q25,
            'q26' => $q26,
            'q27' => $q27,
            'q28' => $q28,
            'q29' => $q29,
            'rata_kehadiran' => $rata_kehadiran,
            'rata_tanggungjawab' => $rata_tanggungjawab,
            'rata_kerjasama' => $rata_kerjasama,
            'rata_loyalitas' => $rata_loyalitas,
            'rata_kearsipan' => $rata_kearsipan,
            'rata_pelayanan' => $rata_pelayanan

        ];
        $cek = $this->db->get_where('nilai_pimpinan_tendik', $where)->row_array();
        //var_dump($cek);

        if ($cek) {
            $this->db->where('nip', $nip);
            $this->db->where('id_tendik', $id_tendik);
            $this->db->update('nilai_pimpinan_tendik', $data);
        } else {
            $this->db->insert('nilai_pimpinan_tendik', $pimpinan);
        }
        //$num = $this->db->get_where('nilai_pimpinan', ['id_tendik' => $id_tendik])->num_rows();
        //var_dump($num['avg']);
        //$cek = $this->db->get_where('nilai_pimpinan', ['id_tendik' => $id_tendik])->result_array();
        //$avg = $this->db->get_where('nilai_pimpinan', ['id_tendik' => $id_tendik])->row_array();
        // $sum_avg = 0;
        // foreach ($cek as $c) {
        //     $sum_avg = $sum_avg + $c['avg'];
        // var_dump($avg['avg']);
        //die;
        // }

        $tendik_peserta = [
            'c1' => $rata_kehadiran,
            'c2' => $rata_tanggungjawab,
            'c3' => $rata_kerjasama,
            'c4' => $rata_loyalitas,
            'c5' => $rata_kearsipan,
            'c6' => $rata_pelayanan,
            'c1_saw' => $rata_kehadiran_saw
        ];
        $this->db->where('id_tendik', $id_tendik);
        $this->db->update('tendik_peserta', $tendik_peserta);


        $data['peserta'] = $this->db->get_where('tendik_peserta', ['nip' => $id_tendik])->result_array();
        //$tendik = $data['peserta']['nama'];
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert"> Penilaian berhasil ditambahkan!. 
      </div>');
        redirect('tendik');
    }
}
