<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tendik extends CI_Controller
{

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
            'id_tendik' => $id_tendik
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
            'id_tendik' => $id_tendik,
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
            $this->db->where('id_tendik', $id_tendik);
            $this->db->update('nilai_pimpinan', $data);
        } else {
            $this->db->insert('nilai_pimpinan', $pimpinan);
        }
        $num = $this->db->get_where('nilai_pimpinan', ['id_tendik' => $id_tendik])->num_rows();
        //var_dump($num['avg']);
        $cek = $this->db->get_where('nilai_pimpinan', ['id_tendik' => $id_tendik])->result_array();
        //$avg = $this->db->get_where('nilai_pimpinan', ['id_tendik' => $id_tendik])->row_array();
        // $sum_avg = 0;
        // foreach ($cek as $c) {
        //     $sum_avg = $sum_avg + $c['avg'];
        // var_dump($avg['avg']);
        //die;
        // }

        $c2 = $rata;

        $tendik_peserta = [
            'c2' => $c2
        ];
        $this->db->where('id_tendik', $id_tendik);
        $this->db->update('tendik_peserta', $tendik_peserta);
        redirect('pimpinan');
    }
}
