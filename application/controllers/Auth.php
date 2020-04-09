<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // if ($this->session->userdata('role_id') == 1) {
        //     redirect('admin');
        // } else if ($this->session->userdata('role_id') == 2) {
        //     redirect('user');
        // } else {
        //     // jika ada role_id yg lain maka tambahkan disini
        // }
        // //membuat rules form valid
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login.php');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user['email'] == $email) {
            if ($user['password'] == $password) {
                $data = [
                    'email' => $user['email'],
                    'role'  => $user['role']
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 'Mahasiswa') {
                    redirect('mahasiswa');
                } else {
                    redirect('pimpinan');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                     Wrong Password. 
                   </div>');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                     Email salah. 
                   </div>');
        }
    }
    // public function _login()
    // {
    //     $email = $this->input->post('email');
    //     $password = $this->input->post('password');

    //     //query
    //     $user = $this->db->get_where('user', ['email' => $email])->row_array();

    //     if ($user) {
    //         if ($user['is_active'] == 1) {

    //             if (password_verify($password, $user['password'])) {

    //                 $data = [
    //                     'email' => $user['email'],
    //                     'role_id' => $user['role_id']
    //                 ];
    //                 $this->session->set_userdata($data);

    //                 if ($user['role_id'] == 1) {
    //                     redirect('admin');
    //                 } else {
    //                     redirect('user'); //controler user
    //                 }
    //             } else {
    //                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //                 Wrong Password. 
    //               </div>');
    //             }
    //         }

    //         //email blm aktif
    //         else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //             This email has been not active. 
    //           </div>');
    //         }
    //     }

    //     //email blm terdaftar
    //     else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //         Email is not registered. 
    //       </div>');
    //     }
    //     redirect('auth');
    // }

    public function registration()
    {
        // if ($this->session->userdata('role_id') == 1) {
        //     redirect('admin');
        // } else if ($this->session->userdata('role_id') == 2) {
        //     redirect('user');
        // } else {
        //     // jika ada role_id yg lain maka tambahkan disini
        // }

        //buat rule form validation
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim'); //set_rules('name/index','alias','required/wajib|trim untuk spasi ga masuk db)
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This Email has already exist!'
        ]); //is_unique[table.field] dia ngecek sudah ada atau belum emailnya di db
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]); //set_rules('name/index','alias','required/wajib|trim untuk spasi ga masuk db)
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]'); //set_rules('name/index','alias','required/wajib|trim untuk spasi ga masuk db)
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        if ($this->form_validation->run() == false) { //ketika dijalankan / run
            $data['title'] = 'WPU Registration'; //untuk title regist
            $this->load->view('templates/auth_header', $data); //memanggil isi $data
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            // $data = [
            //     /*nama field table user 'name','email'*/
            //     'nama' => htmlspecialchars($this->input->post('name'), true),
            //     'email' => htmlspecialchars($this->input->post('email'), true),
            //     'role' => $this->input->post('username'), true,
            //     'jurusan' => $this->input->post('jurusan'), true,
            //     'username' => htmlspecialchars($this->input->post('username'), true),
            //     'password' => $this->input->post('password1'), true
            // ];
            $post = $this->input->post();
            $this->nama = $post['nama'];
            $this->email = $post['email'];
            $this->role = $post['role'];
            $this->jurusan = $post['jurusan'];
            $this->username = $post['username'];
            $this->password = $post['password1'];

            $this->db->insert('user', $this);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! your account has been created.  
          </div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        // $this->session->unset_userdata('email'); //menghapus session
        // $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       You have been logged out. 
      </div>'); //membuat session
        redirect('auth');
    }

    // public function goToDefaultPage()
    // {
    //     if ($this->session->userdata('role_id') == 1) {
    //         redirect('admin');
    //     } else if ($this->session->userdata('role_id') == 2) {
    //         redirect('user');
    //     } else {
    //         // jika ada role_id yg lain maka tambahkan disini
    //     }
    // }
}
