<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->model('Staff_Model');
      $this->load->model('Pendaftar_Model');
   }

   function staff()
   {
      if ($this->session->userdata('id_role') !== null) {
         redirect('auth/cek_session');
      }

      $config_form_staff = [
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

      $this->form_validation->set_rules($config_form_staff);

      if ($this->form_validation->run() == FALSE) {
         // jika gagal
         $this->load->view('login/staff');
      } else {
         // jika berhasil
         $email = trim($this->input->post('email', TRUE));
         $password = trim($this->input->post('password', TRUE));


         $staff = $this->Staff_Model->cari_email_staff($email);
         // print_r($staff->row());
         // die;

         if ($staff->num_rows() > 0) {
            $staff_data = $staff->row();
            if (password_verify($password, $staff_data->password)) {
               $data_user = [
                  'id_user'   => $staff_data->id_staff,
                  'email'     => $staff_data->email,
                  'id_role'   => '1',
               ];
               $this->session->set_userdata($data_user);
               redirect('auth/cek_session');
            } else {
               $this->session->set_flashdata('gagal', "Password yang anda masukan salah!");
               redirect('auth/staff');
            }
         } else {
            $this->session->set_flashdata('gagal', "Email Tidak Terdaftar!");
            redirect('auth/staff');
         }
      }
   }

   function pendaftar()
   {
      if ($this->session->userdata('id_role') !== null) {
         redirect('auth/cek_session');
      }

      $config_form_pendaftar = [
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

      $this->form_validation->set_rules($config_form_pendaftar);

      if ($this->form_validation->run() == FALSE) {
         // jika gagal
         $this->load->view('login/pendaftar');
      } else {
         // jika berhasil
         $email = trim($this->input->post('email', TRUE));
         $password = trim($this->input->post('password', TRUE));

         $pendaftar = $this->Pendaftar_Model->cari_email_pendaftar($email);

         if ($pendaftar->num_rows() > 0) {
            $pendaftar_data = $pendaftar->row();
            if ($pendaftar_data->is_active == '1') {
               if (password_verify($password, $pendaftar_data->password)) {
                  $data_user = [
                     'id_user'   => $pendaftar_data->id_pendaftar,
                     'email'     => $pendaftar_data->email,
                     'id_role'   => '2',
                  ];
                  $this->session->set_userdata($data_user);
                  redirect('auth/cek_session');
               } else {
                  $this->session->set_flashdata('gagal', "Password yang anda masukan salah!");
                  redirect('auth/pendaftar');
               }
            } elseif ($pendaftar_data->is_active == '2') {
               $this->session->set_flashdata('gagal', "Email Anda Sudah Tidak Bisa Dipakai!");
               redirect('auth/pendaftar');
            } elseif ($pendaftar_data->is_active == '0') {
               $this->session->set_flashdata('gagal', "Email Belum Terverifikasi. Verifikasi Email Anda!");
               redirect('auth/pendaftar');
            }
         } else {
            $this->session->set_flashdata('gagal', "Email Tidak Terdaftar! Silahkan Mendaftar");
            redirect('auth/pendaftar');
         }
      }
   }

   public function registrasi()
   {
      if ($this->session->userdata('id_role') !== null) {
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
            'field'  => 'nisn',
            'label'  => 'NISN',
            'rules'  => 'required|trim|max_length[10]',
            'errors' => [
               'required'     => 'NISN Harus Diisi.',
               'max_length'   => 'NISN Tidak Lebih Dari 10 Karakter'

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
            'label'  => 'Password Konfirmasi',
            'rules'  => 'required'
         ]
      ];

      $this->form_validation->set_rules($config_form_registrasi);

      if ($this->form_validation->run() == FALSE) {
         // jika gagal
         $this->load->view('registrasi/index');
      } else {
         // jika berhasil
         $nama = trim($this->input->post('nama', TRUE));
         $email = trim($this->input->post('email', TRUE));
         $nisn = trim($this->input->post('nisn', TRUE));
         $password = password_hash(trim($this->input->post('password', TRUE)), PASSWORD_DEFAULT);

         $data = [
            'id_pendaftar' => '',
            'nama'         => $nama,
            'email'        => $email,
            'password'     => $password,
            'nisn'         => $nisn,
            'id_role'      => '2',
            'is_active'    => '0',
            'foto'         => 'default.jpg',
            'date_created' => date('Y-m-d H:i:s')
         ];

         $simpan_registrasi = $this->Pendaftar_Model->simpan_registrasi($data);
         $data_pendaftar = $this->Pendaftar_Model->cari_email_pendaftar($email)->row();

         $token = [
            'id_token'     => '',
            'id_pendaftar' => $data_pendaftar->id_pendaftar,
            'token'        => '1',
            'mulai_token'  => date('d-M-Y H:i:s'),
            'akhir_token'  => date('d-M-Y H:i:s', strtotime('+2 Days', date('d-M-Y H:i:s')))
         ];

         $simpan_token = $this->Token_Model->simpan_token($token);

         if ($simpan_registrasi && $simpan_token) {
            $this->session->set_flashdata('berhasil', "Verifikasi Email Terkirim. Segera Lakukan Verifikasi Email Dalam 2 Hari!");
            redirect('auth/pendaftar');
         }
      }
   }

   public function cek_session()
   {
      if ($this->session->userdata('id_role') == 1) {
         $this->session->set_flashdata('gagal', "Tidak Bisa Mengunjungi Halaman Tersebut!");
         redirect('staff');
      } elseif ($this->session->userdata('id_role') == 2) {
         $this->session->set_flashdata('gagal', "Tidak Bisa Mengunjungi Halaman Tersebut!");
         redirect('pendaftar');
      } else {
         $this->session->set_flashdata('gagal', "Anda Harus Login Terlebih Dahulu!");
         redirect('home');
      }
   }

   public function logout()
   {
      if ($this->session->userdata('id_role') === null) {
         redirect('auth/cek_session');
      }

      $data_user = [
         'email', 'id_user', 'id_role'
      ];

      $this->session->unset_userdata($data_user);
      $this->session->set_flashdata('berhasil', 'Selamat! Anda Berhasil Logout.');
      redirect('home');
   }
}
