<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('cookie');
    }

    public function index()
    {
        $this->goToDefaultPage();
        // //membuat rules form valid
        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

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
        $id = $this->input->post('id');
        $role = $this->input->post('role');
        $password = $this->input->post('password');

        if ($role == "Pimpinan") {
            $user = $this->db->get_where('nilai_pimpinan', ['nip' => $id])->row_array();
            //var_dump($user);
            //$user['password'];
            //die;
            if ($user) {
                if ($password == $user['password']) {
                    $data = [
                        'nip' => $user['nip'],
                        'id_dosen' => $user['id_dosen'],
                        'role' => $role
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Login Berhasil  
              </div>');
                    redirect('pimpinan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Salah
                </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                         NIDN/NIM atau role Salah. 
                     </div>');
                redirect('auth');
            }
        }
        if ($role == "Mahasiswa") {
            $user = $this->db->get_where('nilai_mhs', ['nim' => $id])->row_array();
            //var_dump($user);
            //die;
            if ($user) {
                if ($password == $user['password']) {
                    $data = [
                        'nim' => $user['nim'],
                        'id_dosen' => $user['id_dosen'],
                        'role' => $role
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Login Berhasil  
              </div>');
                    redirect('mahasiswa');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                             Password Salah. 
                         </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                         NIDN/NIM atau role Salah. 
                     </div>');
                redirect('auth');
            }
        }
        if ($role == "Dosen") {
            $user = $this->db->get_where('nilai_dosen', ['nip' => $id])->row_array();
            //var_dump($user);
            //die;
            if ($user) {
                if ($password == $user['password']) {
                    $data = [
                        'nip' => $user['nip'],
                        'id_dosen' => $user['id_dosen'],
                        'role' => $role
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Login Berhasil  
              </div>');
                    redirect('dosen');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Salah
                </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                         NIDN/NIM atau role Salah. 
                     </div>');
                redirect('auth');
            }
        }
        if ($role == "LPPM") {
            $user = $this->db->get_where('data_lppm', ['nip' => $id])->row_array();

            if ($user) {
                if ($password == $user['password']) {
                    $data = [
                        'nip' => $user['nip'],
                        'id_dosen' => $user['id_dosen'],
                        'role' => $role
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Login Berhasil  
              </div>');
                    redirect('lppm');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Salah
                </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                         NIDN/NIM atau role Salah. 
                     </div>');
                redirect('auth');
            }
        }
    }


    public function auth_admin()
    {
        $this->goToDefaultPage();
        // //membuat rules form valid
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page Admin';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login_admin.php');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_loginAdmin();
        }
    }
    public function _loginAdmin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['user_admin' => $username])->row_array();
        if ($admin) {
            if ($password == $admin['password_admin']) {
                $data = [
                    'username' => $username
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Login Berhasil  
          </div>');
                if ($this->input->post('remember')) {

                    // $cookie = array(

                    //     'name'   => 'username',
                    //     'value'  => $username,
                    //     'expire' => '3000',
                    //     'secure' => TRUE
                    // );
                    // $cookie2 = array(

                    //     'name'   => 'password',
                    //     'value'  => $password,
                    //     'expire' => '30000',
                    //     'secure' => TRUE
                    // );
                    set_cookie('username', $username, '360000');
                    set_cookie('password', $password, '360000');
                } else {
                    $this->input->set_cookie('username', '');
                    $this->input->set_cookie('password', '');
                }
                redirect('admin');
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">username atau password salah  
          </div>');
        redirect('auth/auth_admin');
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
        $this->goToDefaultPage();
        //buat rule form validation
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim'); //set_rules('name/index','alias','required/wajib|trim untuk spasi ga masuk db)
        //    // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
        //         'is_unique' => 'This Email has already exist!'
        //     ]); //is_unique[table.field] dia ngecek sudah ada atau belum emailnya di db
        // //$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short!'
        // ]); //set_rules('name/index','alias','required/wajib|trim untuk spasi ga masuk db)
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]'); //set_rules('name/index','alias','required/wajib|trim untuk spasi ga masuk db)
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        //$this->form_validation->set_rules('nim', 'Nim', 'required|trim');
        if ($this->form_validation->run() == false) { //ketika dijalankan / run
            $data['title'] = 'Registrasi'; //untuk title regist
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
            //$post = $this->input->post();
            // $this->nim = $post['nim'];
            // $this->nip = $post['nip'];
            // $this->nama = $post['nama'];
            // $this->email = $post['email'];
            // $this->role = $post['role'];
            // $this->jurusan = $post['jurusan'];

            $mahasiswa = [
                'nim' => $this->input->post('nim', true),
                'nama' => $this->input->post('nama', true),
                'jurusan' => $this->input->post('jurusan', true)
            ];
            $dosen = [
                'nip' => $this->input->post('nip', true),
                'nama' => $this->input->post('nama', true),
                'jurusan' => $this->input->post('jurusan', true)
            ];
            $pimpinan = [
                'nip' => $this->input->post('nip', true),
                'nama' => $this->input->post('nama', true),
                'jurusan' => $this->input->post('jurusan', true)
            ];

            $role = $this->input->post('role');
            if ($role == "Pimpinan") {
                $this->db->insert('nilai_pimpinan', $pimpinan);
            } else if ($role == "Mahasiswa") {
                $this->db->insert('nilai_mhs', $mahasiswa);
            } else {
                $this->db->insert('nilai_dosen', $dosen);
            }




            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! akun berhasil ditambahkan.  
          </div>');
            redirect('auth');
        }
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

    public function auth_tendik()
    {
        $this->goToDefaultPage();
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        //$this->form_validation->set_rules('tendik', 'Tendik', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page Pimpinan Tendik';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth_tendik/login.php');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_loginTendik();
        }
    }

    public function _loginTendik()
    {
        $nip = $this->input->post('nip', true);
        $password = $this->input->post('password');


        $user = $this->db->get_where('nilai_pimpinan_tendik', ['nip' => $nip])->row_array();
        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'nip' => $user['nip'],
                    'tendik' => $user['tendik'],
                    'jurusan' => $user['jurusan']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Login Berhasil  
              </div>');
                redirect('tendik');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password Salah
              </div>');
                redirect('auth/auth_tendik');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            NIP Salah
          </div>');
            redirect('auth/auth_tendik');
        }
    }

    public function registration_tendik()
    {
        $this->goToDefaultPage();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim'); //set_rules('name/index','alias','required/wajib|trim untuk spasi ga masuk db)
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        if ($this->form_validation->run() == false) { //ketika dijalankan / run
            $data['title'] = 'Registrasi'; //untuk title regist
            $this->load->view('templates/auth_header', $data); //memanggil isi $data
            $this->load->view('auth_tendik/registration');
            $this->load->view('templates/auth_footer');
        } else {


            $jabatan = $this->input->post('jabatan');
            if ($jabatan == "Kepala Program Studi") {
                $tendik = "Administrasi Prodi";
            } else if ($jabatan == "Kepala Laboratorium") {
                $tendik = "Laboratorium";
            } else {
                $tendik = "Perpustakaan";
            }
            $data_pimpinan = [
                'nip' => $this->input->post('nip', true),
                'nama' => $this->input->post('nama', true),
                'jabatan' => $this->input->post('jabatan', true),
                'tendik' => $tendik,
                'jurusan' => $this->input->post('jurusan', true)
            ];

            $this->db->insert('nilai_pimpinan_tendik', $data_pimpinan);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! akun berhasil ditambahkan.  
          </div>');
            redirect('auth/auth_tendik');
        }
    }
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => '2016470057@ftumj.ac.id',
            'smtp_pass' => 'alkatheo',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('2016470057@ftumj.ac.id', 'Syaifudin Alkatiri - Developer');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link you account: <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'lupa') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik ini untuk reset Password: <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function lupa_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['title'] = 'Lupa Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/lupa_password.php');
            $this->load->view('templates/auth_footer');
        } else {
            # code...
            $email = $this->input->post('email');
            $data_email = [
                'mahasiswa' => $this->db->get_where('nilai_mhs', ['email' => $email])->row_array(),
                'dosen' => $this->db->get_where('nilai_dosen', ['email' => $email])->row_array(),
                'pimpinan' => $this->db->get_where('nilai_pimpinan', ['email' => $email])->row_array(),
                'pimpinan_tendik' => $this->db->get_where('nilai_pimpinan_tendik', ['email' => $email])->row_array(),
                'lppm' => $this->db->get_where('data_lppm', ['email' => $email])->row_array()
            ];

            //var_dump($data_email);

            if ($data_email['mahasiswa'] || $data_email['dosen'] || $data_email['pimpinan'] || $data_email['pimpinan_tendik'] || $data_email['lppm']) {
                //code ..
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'lupa');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Silahkan cek email untuk reset Password.  
          </div>');
                redirect('auth/lupa_password');



                // if ($data_email['mahasiswa']) {
                //     $this->db->insert('nilai_mhs', $user_token);
                // } else if ($data_email['dosen']) {
                //     $this->db->insert('nilai_dosen', $user_token);
                // } else if ($data_email['pimpinan']) {
                //     $this->db->insert('nilai_pimpinan', $user_token);
                // } else if ($data_email['pimpinan_tendik']) {
                //     $this->db->insert('nilai_pimpinan_tendik', $user_token);
                // } else if ($data_email['lppm']) {
                //     $this->db->insert('data_lppm', $user_token);
                // }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar!  
          </div>');
                redirect('auth/lupa_password');
            }
        }
    }

    public function resetpassword()
    {
        $token = $this->input->get('token');
        $email = $this->input->get('email');

        $users = [
            'mahasiswa' => $this->db->get_where('nilai_mhs', ['email' => $email])->row_array(),
            'dosen' => $this->db->get_where('nilai_dosen', ['email' => $email])->row_array(),
            'pimpinan' => $this->db->get_where('nilai_pimpinan', ['email' => $email])->row_array(),
            'pimpinan_tendik' => $this->db->get_where('nilai_pimpinan_tendik', ['email' => $email])->row_array(),
            'lppm' => $this->db->get_where('data_lppm', ['email' => $email])->row_array()
        ];


        if ($users['mahasiswa'] || $users['dosen'] || $users['pimpinan'] || $users['pimpinan_tendik'] || $users['lppm']) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Reset Password gagal, Token Salah.  
              </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset Password gagal, Email Salah.  
          </div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]); //set_rules('name/index','alias','required/wajib|trim untuk spasi ga masuk db)
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');


        if ($this->form_validation->run() == FALSE) {
            # code...
            $data['title'] = 'Ganti Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change_password.php');
            $this->load->view('templates/auth_footer');
        } else {
            # code...
            $password = $this->input->post('password1');
            $email = $this->session->userdata('reset_email');
            $users = [
                'mahasiswa' => $this->db->get_where('nilai_mhs', ['email' => $email])->row_array(),
                'dosen' => $this->db->get_where('nilai_dosen', ['email' => $email])->row_array(),
                'pimpinan' => $this->db->get_where('nilai_pimpinan', ['email' => $email])->row_array(),
                'pimpinan_tendik' => $this->db->get_where('nilai_pimpinan_tendik', ['email' => $email])->row_array(),
                'lppm' => $this->db->get_where('data_lppm', ['email' => $email])->row_array()
            ];


            if ($users['mahasiswa'] || $users['dosen'] || $users['pimpinan'] || $users['pimpinan_tendik'] || $users['lppm']) {
                if ($users['mahasiswa']) {
                    $this->db->update('nilai_mhs', ['password' => $password]);
                } else if ($users['dosen']) {
                    $this->db->update('nilai_dosen', ['password' => $password]);
                } else if ($users['pimpinan']) {
                    $this->db->update('nilai_pimpinan', ['password' => $password]);
                } else if ($users['pimpinan_tendik']) {
                    $this->db->update('nilai_pimpinan_tendik', ['password' => $password]);
                } else if ($users['lppm']) {
                    $this->db->update('data_lppm', ['password' => $password]);
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Password berhasil diganti.  
              </div>');
                $this->session->unset_userdata('reset_email');
                redirect('auth');
            }
        }
    }




    public function logout()
    {
        $this->session->unset_userdata('nip'); //menghapus session
        $this->session->unset_userdata('nim'); //menghapus session
        $this->session->unset_userdata('id_dosen');
        $this->session->unset_userdata('tendik');
        $this->session->unset_userdata('jurusan');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       You have been logged out. 
      </div>'); //membuat session
        redirect('auth');
    }

    public function goToDefaultPage()
    {
        if ($this->session->userdata('username') == "admin") {
            redirect('admin');
        }

        if ($this->session->userdata('tendik')) {
            redirect('tendik');
        }

        if ($this->session->userdata('role') == "Mahasiswa") {
            redirect('mahasiswa');
        }
        if ($this->session->userdata('role') == "Pimpinan") {
            redirect('pimpinan');
        }
        if ($this->session->userdata('role') == "Dosen") {
            redirect('dosen');
        }
        if ($this->session->userdata('role') == "LPPM") {
            redirect('lppm');
        }
    }
}
