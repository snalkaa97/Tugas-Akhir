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

        if ($jurusan) {
            $data['dosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
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
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Dosen';
            $data['dosen'] = $this->db->get('dosen_peserta')->result_array();

            $jurusan = $this->input->get('jurusan');
            $data['cariDosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
            $data['form_dosen'] = $this->db->get('dosen_peserta')->result_array();
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
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'jurusan', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Dosen';
            $data['dosen'] = $this->db->get('dosen_peserta')->result_array();

            $jurusan = $this->input->get('jurusan');
            $data['cariDosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
            $data['form_dosen'] = $this->db->get('dosen_peserta')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/dataDosen');
            $this->load->view('templates/footer');
        } else {
            $nip = $this->input->post('nip');


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
            $data = [
                'id_dosen' => htmlspecialchars($this->input->post('id_dosen'), true),
                'nip' => htmlspecialchars($this->input->post('nip'), true),
                'nama' => htmlspecialchars($this->input->post('nama'), true),
                'jurusan' => $this->input->post('jurusan'),
                'pendidikan' => $this->input->post('pendidikan'),
                'jabatan' => $this->input->post('jabatan'),
                'alamat' => htmlspecialchars($this->input->post('alamat'), true),
                'c4' => $c4,
                'c10' => $c10
            ];
            $this->db->where('id_dosen', $id);
            $this->db->update('dosen_peserta', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Dosen berhasil diupdate!. 
      </div>');
            redirect('admin/dataDosen');
        }
    }

    public function hapusDosen($id)
    {
        $this->db->delete('dosen_peserta', ['id_dosen' => $id]);
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
        $data['title'] = 'Normalisasi WP';
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
        $query = "SELECT *FROM dosen_peserta WHERE jurusan = '$jurusan'";
        $data['vektor'] = $this->db->query($query)->result_array();
        //var_dump($query);
        $query2 = "SELECT *FROM dosen_peserta WHERE jurusan = '$jurusan'ORDER BY vektor_s DESC";
        //$this->db->order_by('vektor_v', 'desc');
        $data['vektor'] = $this->db->query($query2)->result_array();
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
        $data['title'] = 'Normalisasi SAW';
        $jurusan = $this->input->get('jurusan');

        $data['dosen'] = $this->db->get('dosen_peserta')->result_array();

        if ($jurusan) {
            $data['dosen'] = $this->db->get_where('dosen_peserta', ['jurusan' => $jurusan])->result_array();
        }
        $data['bobot'] = $this->db->get('tb_kriteria')->result_array();

        //$this->->('');

        for ($c = 1; $c <= 3; $c++) {
            $this->db->select_max('c' . $c);
        }
        $this->db->where('jurusan', $jurusan);
        $this->db->from('dosen_peserta');
        //$query = "SELECT MAX(c1), MAX(c2), MAX(c3), MAX(c4), MAX(c5), MAX(c6), MAX(c7), MAX(c8), MAX(c9), MAX(c10) FROM dosen_peserta";
        //$data['max'] = $this->db->query($query);
        $data['max'] = $this->db->get()->result_array();


        for ($c = 4; $c <= 10; $c++) {
            $this->db->select_min('c' . $c);
        }
        $this->db->where('jurusan', $jurusan);
        $this->db->from('dosen_peserta');
        $data['min'] = $this->db->get()->result_array();

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
            $data['dataTendik'] = $this->db->get_where('tendik_peserta', ['tendik' => $this->input->get('tendik')])->result_array();
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

    public function normalisasi_tendik_WP()
    {
        $awal = microtime(true);
        $data['title'] = 'Normalisasi WP Tendik';

        $jurusan = $this->input->get('jurusan');
        $tendik = $this->input->get('tendik');
        $data['nilaitendik'] = $this->db->get('tendik_peserta')->result_array();
        if ($jurusan && $tendik) {
            $where = [
                'jurusan' => $this->input->get('jurusan'),
                'tendik' => $this->input->get('tendik')
            ];
            $data['nilaitendik'] = $this->db->get_where('tendik_peserta', $where)->result_array();
        }


        $data['bobot'] = $this->db->get('tb_kriteria_tendik')->result_array();
        $data['hitung'] = $this->db->get('tendik_peserta')->result_array();
        //$this->db->select('sum(bobot) as sum');
        //$this->db->from('tb_kriteria');
        //$data['sumBobot'] = $this->db->get()->result_array();
        //$query = "SELECT SUM(bobot) AS sum FROM tb_kriteria";
        //$data['sumB'] = $this->db->query($query)->row_array();
        $query = "SELECT *FROM tendik_peserta WHERE jurusan = '$jurusan' AND tendik = '$tendik'";
        $data['vektor'] = $this->db->query($query)->result_array();
        //var_dump($query);
        $query2 = "SELECT *FROM tendik_peserta WHERE jurusan = '$jurusan' AND tendik = '$tendik' ORDER BY vektor_s DESC";
        //$this->db->order_by('vektor_v', 'desc');
        $data['vektor'] = $this->db->query($query2)->result_array();
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
        $data['title'] = 'Normalisasi SAW Tendik';
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
            if ($n['c1'] == 0 && $n['c2'] == 0 && $n['c3'] == 0 && $n['c4'] == 0 && $n['c5'] == 0 && $n['c6'] == 0) {
            }
        }

        $this->db->select_min('c1');
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

        $akhir = microtime(true);
        $data['waktu'] = $akhir - $awal;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/normalisasiSAW_tendik');
        $this->load->view('templates/footer');
    }
}
