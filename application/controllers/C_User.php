<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Staff_Model');
		$this->load->model('Pendaftar_Model');
		$this->load->model('Pembayaran_Model');
	}

	function update_my()
	{
		$password_plain = $this->input->post('password', TRUE);
		$password_confirm = $this->input->post('password_confirm', TRUE);

		if ($password_plain != "") {
			if ($password_plain == $password_confirm) {
				if ($_FILES['foto']['name']) {
					if ($this->session->userdata('id_role') == '1') {
						$staff = [
							'nama_staff'	=> $this->input->post('nama', TRUE),
							'tanggal_lahir'	=> $this->input->post('tanggal_lahir', TRUE),
							'email_staff'	=> $this->input->post('email', TRUE),
							'password'		=> password_hash($password_plain, PASSWORD_DEFAULT),
							'foto'			=> $this->upload_gambar_staff($this->input->post('foto', TRUE))
						];
					} else {
						$pendaftar = [
							'nama_pendaftar'	=> $this->input->post('nama', TRUE),
							'nisn'				=> $this->input->post('nisn', TRUE),
							'email_pendaftar'	=> $this->input->post('email', TRUE),
							'password'			=> password_hash($password_plain, PASSWORD_DEFAULT),
							'foto'				=> $this->upload_gambar_pendaftar($this->input->post('foto', TRUE))
						];
					}
					$this->session->set_flashdata('notif', 'Berhasil');
					$this->session->set_flashdata('perintah', 'Ubah Data Profile');
					$this->session->set_flashdata('pesan', 'Data Profile dan Password Berhasil Diubah');
				} else {
					if ($this->session->userdata('id_role') == '1') {
						$staff = [
							'nama_staff'	=> $this->input->post('nama', TRUE),
							'tanggal_lahir'	=> $this->input->post('tanggal_lahir', TRUE),
							'email_staff'	=> $this->input->post('email', TRUE),
							'password'		=> password_hash($password_plain, PASSWORD_DEFAULT)
						];
					} else {
						$pendaftar = [
							'nama_pendaftar'	=> $this->input->post('nama', TRUE),
							'nisn'				=> $this->input->post('nisn', TRUE),
							'email_pendaftar'	=> $this->input->post('email', TRUE),
							'password'			=> password_hash($password_plain, PASSWORD_DEFAULT)
						];
					}
					$this->session->set_flashdata('notif', 'Berhasil');
					$this->session->set_flashdata('perintah', 'Ubah Data Profile');
					$this->session->set_flashdata('pesan', 'Data Profile dan Password Berhasil Diubah');
				}
			} else {
				$this->session->set_flashdata('notif', 'Gagal');
				$this->session->set_flashdata('perintah', 'Ubah Data Profile');
				$this->session->set_flashdata('pesan', 'Gagal Merubah Data Profile. Password Harus Sama');
			}
		} else {
			if ($_FILES['foto']['name']) {
				if ($this->session->userdata('id_role') == '1') {
					$staff = [
						'nama_staff'	=> $this->input->post('nama', TRUE),
						'tanggal_lahir'	=> $this->input->post('tanggal_lahir', TRUE),
						'email_staff'	=> $this->input->post('email', TRUE),
						'foto'			=> $this->upload_gambar_staff($this->input->post('foto', TRUE))
					];
				} else {
					$pendaftar = [
						'nama_pendaftar'	=> $this->input->post('nama', TRUE),
						'nisn'				=> $this->input->post('nisn', TRUE),
						'email_pendaftar'	=> $this->input->post('email', TRUE),
						'foto'				=> $this->upload_gambar_pendaftar($this->input->post('foto', TRUE))
					];
				}
				$this->session->set_flashdata('notif', 'Berhasil');
				$this->session->set_flashdata('perintah', 'Ubah Data Profile');
				$this->session->set_flashdata('pesan', 'Data Profile Berhasil Diubah');
			} else {
				if ($this->session->userdata('id_role') == '1') {
					$staff = [
						'nama_staff'	=> $this->input->post('nama', TRUE),
						'tanggal_lahir'	=> $this->input->post('tanggal_lahir', TRUE),
						'email_staff'	=> $this->input->post('email', TRUE),
					];
				} else {
					$pendaftar = [
						'nama_pendaftar'	=> $this->input->post('nama', TRUE),
						'nisn'				=> $this->input->post('nisn', TRUE),
						'email_pendaftar'	=> $this->input->post('email', TRUE),
					];
				}
				$this->session->set_flashdata('notif', 'Berhasil');
				$this->session->set_flashdata('perintah', 'Ubah Data Profile');
				$this->session->set_flashdata('pesan', 'Data Profile Berhasil Diubah');
			}
		}
		if ($this->session->userdata('id_role') == '1') {
			if ($staff['foto']) {
				$udata = $this->Staff_Model->cari_id($this->session->userdata('id_user'))->row();
				$nama_gambar = $udata->foto;
				if ($nama_gambar != 'default.jpg') {
					$this->hapus_profile($nama_gambar);
				}
			}
			$this->Staff_Model->update_profile($staff, $this->session->userdata('id_user'));
			redirect('staff/my_profile');
		} else {
			if ($pendaftar['foto']) {
				$udata = $this->Pendaftar_Model->cari_id($this->session->userdata('id_user'))->row();
				$nama_gambar = $udata->foto;
				if ($nama_gambar != 'default.jpg') {
					$this->hapus_profile($nama_gambar);
				}
			}
			$this->Pendaftar_Model->update_profile($pendaftar, $this->session->userdata('id_user'));
			redirect('pendaftar/my_profile');
		}
	}

	function upload_gambar_pendaftar($nama)
	{
		$config['upload_path']          = './assets/img/profile/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['file_name']            = $nama;
		$config['max_size']             = 2048;
		$config['encrypt_name']         = TRUE;
		$config['overwrite']            = TRUE;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			$config['image_library'] = 'gd2';
			$config['width'] = "150px";
			$config['height'] = "200px";
			$config['maintain_ratio'] = FALSE;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			return $this->upload->data('file_name');
		} else {
			return $this->upload->display_errors();
		}
	}

	function upload_gambar_staff($nama)
	{
		$config['upload_path']          = './assets/img/profile/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['file_name']            = $nama;
		$config['max_size']             = 2048;
		$config['encrypt_name']         = TRUE;
		$config['overwrite']            = TRUE;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			$config['image_library'] = 'gd2';
			$config['width'] = "200px";
			$config['height'] = "200px";
			$config['maintain_ratio'] = FALSE;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			return $this->upload->data('file_name');
		} else {
			return $this->upload->display_errors();
		}
	}

	function hapus_profile($nama)
	{
		unlink('assets/img/profile/' . $nama);
	}
}
