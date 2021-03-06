<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->model('Staff_Model');
      $this->load->model('Pendaftar_Model');
      $this->load->model('Tahun_Ajaran_Model');
      $this->load->model('Sekolah_Model');
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
         $sekolah = $this->Sekolah_Model->tampil_data_sekolah()->row();
         $data['logo_sekolah'] = $sekolah->logo_sekolah;
         $data['nama_sekolah'] = strtoupper($sekolah->nama_sekolah);
         $this->load->view('login/staff', $data);
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
                  'email'     => $staff_data->email_staff,
                  'id_role'   => '1',
               ];
               $this->session->set_userdata($data_user);
               redirect('auth/cek_session');
            } else {
               $this->session->set_flashdata('notif', "Gagal");
               $this->session->set_flashdata('perintah', "Gagal Login");
               $this->session->set_flashdata('pesan', "Password Yang Anda Masukan Salah. Silahkan Cek Kembali!");
               redirect('auth/staff');
            }
         } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Gagal Login");
            $this->session->set_flashdata('pesan', "Email Tidak Terdaftar. Silahkan Cek Kembali!");
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
            'field'  => 'nisn',
            'label'  => 'NISN',
            'rules'  => 'required|trim|numeric|max_length[10]|min_length[10]',
            'errors' => [
               'max_length'   => 'NISN Harus 10 Digit Angka',
               'min_length'   => 'NISN Harus 10 Digit Angka',
               'required'     => 'NISN Harus Diisi.'
            ]
         ],
         [
            'field'  => 'password',
            'label'  => 'Password',
            'rules'  => 'required|min_length[8]',
            'errors' => [
               'required'     => 'Password Harus Diisi.'
            ]
         ]
      ];

      $this->form_validation->set_rules($config_form_pendaftar);

      if ($this->form_validation->run() == FALSE) {
         // jika gagal
         $sekolah = $this->Sekolah_Model->tampil_data_sekolah()->row();
         $data['logo_sekolah'] = $sekolah->logo_sekolah;
         $data['nama_sekolah'] = strtoupper($sekolah->nama_sekolah);
         $this->load->view('login/pendaftar', $data);
      } else {
         // jika berhasil
         $nisn = trim($this->input->post('nisn', TRUE));
         $password = trim($this->input->post('password', TRUE));

         $pendaftar = $this->Pendaftar_Model->cari_nisn_pendaftar($nisn);

         if ($pendaftar->num_rows() > 0) {
            $pendaftar_data = $pendaftar->row();
            if (password_verify($password, $pendaftar_data->password)) {
               $data_user = [
                  'id_user'   => $pendaftar_data->id_pendaftar,
                  'nisn'      => $pendaftar_data->nisn,
                  'id_role'   => '2',
               ];
               $this->session->set_userdata($data_user);
               redirect('auth/cek_session');
            } else {
               $this->session->set_flashdata('notif', "Gagal");
               $this->session->set_flashdata('perintah', "Ubah Password");
               $this->session->set_flashdata('pesan', "Password yang anda masukan salah!");
               redirect('auth/pendaftar');
            }
         } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Ubah Password");
            $this->session->set_flashdata('pesan', "NISN Tidak Terdaftar! Silahkan Mendaftar");
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
            'rules'  => 'required|trim|numeric|min_length[10]|max_length[10]|is_unique[tb_pendaftar.nisn]',
            'errors' => [
               'required'     => 'NISN Harus Diisi.',
               'max_length'   => 'NISN Harus 10 Karakter',
               'min_length'   => 'NISN Harus 10 Karakter',
               'is_unique'    => 'NISN sudah terdaftar',
               'numeric'      => 'NISN Harus Angka'

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
         $sekolah = $this->Sekolah_Model->tampil_data_sekolah()->row();
         $data['logo_sekolah'] = $sekolah->logo_sekolah;
         $data['nama_sekolah'] = strtoupper($sekolah->nama_sekolah);
         $this->load->view('registrasi/index', $data);
      } else {
         // jika berhasil
         $nama = trim($this->input->post('nama', TRUE));
         $nisn = trim($this->input->post('nisn', TRUE));
         $password = password_hash(trim($this->input->post('password', TRUE)), PASSWORD_DEFAULT);
         $tahun_ajaran = $this->Tahun_Ajaran_Model->cari_tahun_ajaran_terakhir()->row();

         $data = [
            'id_pendaftar'    => '',
            'nama_pendaftar'  => $nama,
            'password'        => $password,
            'nisn'            => $nisn,
            'id_tahun_ajaran' => $tahun_ajaran->id_tahun_ajaran,
            'foto'            => 'default.png',
            'date_created'    => date('Y-m-d H:i:s')
         ];

         $simpan_registrasi = $this->Pendaftar_Model->simpan_registrasi($data);

         if ($simpan_registrasi) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Registrasi Berhasil");
            $this->session->set_flashdata('pesan', "Berhasil Registrasi! Silahkan Login.");
            redirect('auth/pendaftar');
         } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Gagal Registrasi");
            $this->session->set_flashdata('pesan', "Registrasi Gagal! Silahkan Cek Data Kembali.");
            redirect('auth/registrasi');
         }
      }
   }

   public function cek_session()
   {
      if ($this->session->userdata('id_role') == 1) {
         redirect('staff');
      } elseif ($this->session->userdata('id_role') == 2) {
         redirect('pendaftar');
      } else {
         $this->session->set_flashdata('notif', "Gagal");
         $this->session->set_flashdata('perintah', "Gagal Login");
         $this->session->set_flashdata('pesan', "Harus Login Terlebih Dahulu. Silahkan Login!");
         redirect(base_url());
      }
   }

   function staff_password()
   {
      $sekolah = $this->Sekolah_Model->tampil_data_sekolah()->row();
      $data['logo_sekolah'] = $sekolah->logo_sekolah;
      $data['nama_sekolah'] = strtoupper($sekolah->nama_sekolah);
      $this->load->view('lupa_password/staff', $data);
   }

   function lupa_password()
   {
      $sekolah = $this->Sekolah_Model->tampil_data_sekolah()->row();
      $data['logo_sekolah'] = $sekolah->logo_sekolah;
      $data['nama_sekolah'] = strtoupper($sekolah->nama_sekolah);
      $this->load->view('lupa_password/pendaftar', $data);
   }

   function staff_password_aksi()
   {
      $email = $this->input->post('email', TRUE);
      $tanggal_lahir = $this->input->post('tanggal_lahir', TRUE);
      $data = $this->Staff_Model->cari_email_staff($email)->row();
      if ($data) {
         if ($data->tanggal_lahir == $tanggal_lahir) {
            $tanggal_lahir = str_replace('-', '', $data->tanggal_lahir);
            $password_default = 'staff#' . substr($tanggal_lahir, 2);
            $pass_hash = password_hash($password_default, PASSWORD_DEFAULT);
            if ($this->Staff_Model->ganti_password($pass_hash, $email)) {
               $this->session->set_flashdata('notif', "Berhasil");
               $this->session->set_flashdata('perintah', "Ubah Password");
               $this->session->set_flashdata('pesan', "Password Anda Sekarang Adalah '" . $password_default . "' Silahkan Login dengan Password Baru");
               redirect('auth/staff');
            }
         } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Ubah Password");
            $this->session->set_flashdata('pesan', "Email dan Tanggal Lahir Tidak Valid. Silahkan Koreksi Kembali");
            redirect('auth/staff_password');
         }
      } else {
         $this->session->set_flashdata('notif', "Gagal");
         $this->session->set_flashdata('perintah', "Ubah Password");
         $this->session->set_flashdata('pesan', "Email Yang Anda Masukan Tidak Terdaftar. Silahkan Koreksi Kembali");
         redirect('auth/staff_password');
      }
   }

   function lupa_password_aksi()
   {
      $nisn = $this->input->post('nisn', TRUE);
      $nama = $this->input->post('nama', TRUE);
      $cari_data = $this->Pendaftar_Model->cari_nisn_pendaftar($nisn);
      if ($cari_data->num_rows() > 0) {
         $cari_data_user = $cari_data->row();
         if ($cari_data_user->nama_pendaftar == $nama) {
            $password_default = 'pendaftar#' . substr($nisn, 5);
            $pass_hash = password_hash($password_default, PASSWORD_DEFAULT);
            if ($this->Pendaftar_Model->ganti_password($pass_hash, $nisn, $nama)) {
               $this->session->set_flashdata('notif', "Berhasil");
               $this->session->set_flashdata('perintah', "Ubah Password");
               $this->session->set_flashdata('pesan', "Password Anda Sekarang Adalah '" . $password_default . "' Silahkan Login dengan Password Baru");
               redirect('auth/pendaftar');
            }
         } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Ubah Password");
            $this->session->set_flashdata('pesan', "Nama Yang Anda Masukan Tidak Sesuai");
            redirect('auth/lupa_password');
         }
      } else {
         $this->session->set_flashdata('notif', "Gagal");
         $this->session->set_flashdata('perintah', "Ubah Password");
         $this->session->set_flashdata('pesan', "NISN Yang Anda Masukan Salah. Silahkan Koreksi Kembali");
         redirect('auth/lupa_password');
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
      $this->session->set_flashdata('notif', "Berhasil");
      $this->session->set_flashdata('perintah', "Berhasil Logout");
      $this->session->set_flashdata('pesan', "Selamat Anda Berhasil Melakukan Logout.");
      redirect('');
   }
}
