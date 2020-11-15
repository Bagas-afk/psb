<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_sekolah extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Sekolah_Model');
	}

	function ubah_profile_sekolah()
	{
		$id_sekolah = $this->input->post('id_sekolah', TRUE);
		if ($_FILES['logo_sekolah']['name']) {
			if ($_FILES['foto_kepala_sekolah']['name']) {
				$data = [
					'nama_sekolah'				=> $this->input->post('nama_sekolah', TRUE),
					'alamat_sekolah'			=> $this->input->post('alamat_sekolah', TRUE),
					'deskripsi_sekolah'			=> $this->input->post('deskripsi_sekolah', TRUE),
					'kepala_sekolah'			=> $this->input->post('kepala_sekolah', TRUE),
					'sambutan_kepala_sekolah'	=> $this->input->post('sambutan_kepala_sekolah', TRUE),
					'foto_kepala_sekolah'		=> $this->upload_foto($this->input->post('foto_kepala_sekolah', TRUE)),
					'logo_sekolah'				=> $this->upload_gambar($this->input->post('logo_sekolah', TRUE))
				];
			} else {
				$data = [
					'nama_sekolah'				=> $this->input->post('nama_sekolah', TRUE),
					'alamat_sekolah'			=> $this->input->post('alamat_sekolah', TRUE),
					'deskripsi_sekolah'			=> $this->input->post('deskripsi_sekolah', TRUE),
					'kepala_sekolah'			=> $this->input->post('kepala_sekolah', TRUE),
					'sambutan_kepala_sekolah'	=> $this->input->post('sambutan_kepala_sekolah', TRUE),
					'logo_sekolah'				=> $this->upload_gambar($this->input->post('logo_sekolah', TRUE))
				];
			}
		} else {
			if ($_FILES['foto_kepala_sekolah']['name']) {
				$data = [
					'nama_sekolah'				=> $this->input->post('nama_sekolah', TRUE),
					'alamat_sekolah'			=> $this->input->post('alamat_sekolah', TRUE),
					'deskripsi_sekolah'			=> $this->input->post('deskripsi_sekolah', TRUE),
					'kepala_sekolah'			=> $this->input->post('kepala_sekolah', TRUE),
					'foto_kepala_sekolah'		=> $this->upload_foto($this->input->post('foto_kepala_sekolah', TRUE)),
					'sambutan_kepala_sekolah'	=> $this->input->post('sambutan_kepala_sekolah', TRUE)
				];
			} else {
				$data = [
					'nama_sekolah'				=> $this->input->post('nama_sekolah', TRUE),
					'alamat_sekolah'			=> $this->input->post('alamat_sekolah', TRUE),
					'deskripsi_sekolah'			=> $this->input->post('deskripsi_sekolah', TRUE),
					'kepala_sekolah'			=> $this->input->post('kepala_sekolah', TRUE),
					'sambutan_kepala_sekolah'	=> $this->input->post('sambutan_kepala_sekolah', TRUE)
				];
			}
		}

		if ($data['logo_sekolah']) {
			$udata = $this->Sekolah_Model->cari_id_sekolah($id_sekolah)->row();
			$nama_gambar = $udata->logo_sekolah;
			if ($nama_gambar != '') {
				$this->hapus_gambar($nama_gambar);
			}
		}

		if ($data['foto_kepala_sekolah']) {
			$udata = $this->Sekolah_Model->cari_id_sekolah($id_sekolah)->row();
			$nama_gambar = $udata->foto_kepala_sekolah;
			if ($nama_gambar != '') {
				$this->hapus_gambar($nama_gambar);
			}
		}

		if ($this->Sekolah_Model->update_data_sekolah($data, $id_sekolah)) {
			$this->session->set_flashdata('notif', 'Berhasil');
			$this->session->set_flashdata('perintah', 'Ubah Profile Sekolah');
			$this->session->set_flashdata('pesan', 'Data Profile Sekolah Berhasil Diubah');
			redirect('staff/profile_sekolah');
		} else {
			$this->session->set_flashdata('notif', 'Berhasil');
			$this->session->set_flashdata('perintah', 'Ubah Profile Sekolah');
			$this->session->set_flashdata('pesan', 'Data Profile Sekolah Berhasil Diubah');
			redirect('staff/profile_sekolah');
		}
	}

	function upload_gambar($nama)
	{
		$config['upload_path']          = './assets/img/sekolah/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['file_name']            = $nama;
		$config['encrypt_name']         = TRUE;
		$config['overwrite']            = TRUE;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('logo_sekolah')) {
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

	function upload_foto($nama)
	{
		$config['upload_path']          = './assets/img/sekolah/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['file_name']            = $nama;
		$config['encrypt_name']         = TRUE;
		$config['overwrite']            = TRUE;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto_kepala_sekolah')) {
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

	function hapus_gambar($nama)
	{
		unlink('assets/img/sekolah/' . $nama);
	}
}
