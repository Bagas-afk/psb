<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

   /**
    * Index Page for this controller.
    *
    * Maps to the following URL
    * 		http://example.com/index.php/welcome
    *	- or -
    * 		http://example.com/index.php/welcome/index
    *	- or -
    * Since this controller is set as the default controller in
    * config/routes.php, it's displayed at http://example.com/
    *
    * So any other public methods not prefixed with an underscore will
    * map to /index.php/welcome/<method_name>
    * @see https://codeigniter.com/user_guide/general/urls.html
    */

   public function __construct()
   {
      parent::__construct();
      $this->load->model('User_Model');
   }

   public function index()
   {
      if ($this->session->userdata('role') !== null) {
         redirect('auth/cek_session');
      }

      $config_form_login = [
         [
            'field'  => 'email',
            'label'  => 'Email',
            'rules'  => 'required|valid_email|trim',
            'errors' => [
               'required'     => 'Email Harus Diisi.',
               'valid_email'  => 'Email Harus Benar.'
            ]
         ],
         [
            'field'  => 'password',
            'label'  => 'Password',
            'rules'  => 'required|min_length[2]',
            'errors' => [
               'required'     => 'Password Harus Diisi.',
               'min_length'   => 'Password Minimal 8 Karakter'
            ]
         ]
      ];

      $this->form_validation->set_rules($config_form_login);

      if ($this->form_validation->run() == FALSE) {
         // jika gagal
         $this->load->view('login/index');
      } else {
         // jika berhasil
         $email = htmlspecialchars($this->input->post('email'));
         $password = htmlspecialchars($this->input->post('password'));

         $user = $this->User_Model->cari_user_login($email);

         if ($user->num_rows() > 0) {
            $user_data = $user->row();
            if ($user_data->is_active == '1') {
               if (password_verify($password, $user_data->password)) {
                  $data_user = [
                     'email'  => $user_data->email,
                     'nama'   => $user_data->nama,
                     'role'   => $user_data->id_role,
                  ];
                  $this->session->set_userdata($data_user);
                  redirect('auth/cek_session');
               } else {
                  $this->session->set_flashdata('gagal', "Password yang anda masukan salah!");
                  redirect('auth');
               }
            } elseif ($user_data->is_active == '2') {
               $this->session->set_flashdata('gagal', "Email Anda Sudah Tidak Bisa Terpakai!");
               redirect('auth');
            } elseif ($user_data->is_active == '0') {
               $this->session->set_flashdata('gagal', "Silahkan Konfirmasi Email Anda!");
               redirect('auth');
            }
         } else {
            $this->session->set_flashdata('gagal', "Email Tidak Terdaftar! Silahkan Mendaftar");
            redirect('auth');
         }
      }
   }

   public function registrasi()
   {
      if ($this->session->userdata('role') !== null) {
         redirect('auth/cek_session');
      }

      $config_form_registrasi = [
         [
            'field'  => 'nama',
            'label'  => 'Nama',
            'rules'  => 'required|trim|max_length[50]',
            'errors' => [
               'required'     => 'Nama Harus Diisi.',
               'max_length'   => 'Nama Tidak Boleh Lebih dari 50 Karakter'

            ]
         ],
         [
            'field'  => 'email',
            'label'  => 'Email',
            'rules'  => 'required|valid_email|trim|is_unique[tb_user.email]',
            'errors' => [
               'required'     => 'Email Harus Diisi.',
               'valid_email'  => 'Email Harus Benar.',
               'is_unique'    => 'Email Sudah Terdaftar'
            ]
         ],
         [
            'field'  => 'password',
            'label'  => 'Password',
            'rules'  => 'required|min_length[8]|matches[password_confirm]',
            'errors' => [
               'required'     => 'Password Harus Diisi.',
               'min_length'   => 'Password Minimal 8 Karakter',
               'matches'      => 'Password Harus Sama'
            ]
         ],
         [
            'field'  => 'password_confirm',
            'label'  => 'Password Confirmasi',
            'rules'  => 'required'
         ]
      ];

      $this->form_validation->set_rules($config_form_registrasi);

      if ($this->form_validation->run() == FALSE) {
         // jika gagal
         $this->load->view('registrasi/index');
      } else {
         // jika berhasil
         $nama = htmlspecialchars($this->input->post('nama'));
         $email = htmlspecialchars($this->input->post('email'));
         $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

         $data = [
            'nama'         => $nama,
            'email'        => $email,
            'password'     => $password,
            'id_role'      => '2',
            'is_active'    => '1',
            'date_created' => date('Y-m-d H:i:s')
         ];

         $simpan_registrasi = $this->User_Model->simpan_data_registrasi($data);

         if ($simpan_registrasi) {
            $this->session->set_flashdata('berhasil', "Segera Lakukan Verifikasi Email");
            redirect('auth');
         }
      }
   }

   public function cek_session()
   {
      if ($this->session->userdata('role') == 1) {
         $this->session->set_flashdata('gagal', "Tidak Bisa Mengunjungi Halaman Tersebut!");
         redirect('staff');
      } elseif ($this->session->userdata('role') == 2) {
         $this->session->set_flashdata('gagal', "Tidak Bisa Mengunjungi Halaman Tersebut!");
         redirect('siswa');
      } else {
         $this->session->set_flashdata('gagal', "Anda Harus Login Terlebih Dahulu!");
         redirect('auth');
      }
   }

   public function logout()
   {
      if ($this->session->userdata('role') === null) {
         redirect('auth/cek_session');
      }

      $data_user = [
         'email', 'nama', 'role'
      ];

      $this->session->set_flashdata('berhasil', 'Selamat! Anda Berhasil Logout.');
      $this->session->unset_userdata($data_user);
      redirect('auth');
   }
}
