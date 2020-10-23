<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Tahun_Ajaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tahun_Ajaran_Model');
    }

    function simpan_tahun_ajaran()
    {
        if ($this->session->userdata('id_role') !== '1') {
            redirect('auth/cek_session');
        }
        $data = [
            'id_tahun_ajaran'               => '',
            'tahun_ajaran'                  => $this->input->post('tahun_ajaran', TRUE),
            'tanggal_pembukaan_pendaftaran' => $this->input->post('tanggal_pembukaan', TRUE),
            'tanggal_penutup_pendaftaran'   => $this->input->post('tanggal_penutupan', TRUE),
            'tanggal_pengumuman'            => $this->input->post('tanggal_pengumuman', TRUE)
        ];

        $simpan_tahun_ajaran = true;
        if ($simpan_tahun_ajaran) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Ubah Tahun Ajaran");
            $this->session->set_flashdata('pesan', "Data Tahun Ajaran Berhasil Ditambahkan.");
            redirect('staff/tahun_ajaran');
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Ubah Tahun Ajaran");
            $this->session->set_flashdata('pesan', "Data Tahun Ajaran Gagal Ditambahkan");
            redirect('staff/tahun_ajaran');
        }
    }

    function update_tahun_ajaran()
    {
        if ($this->session->userdata('id_role') !== '1') {
            redirect('auth/cek_session');
        }
        $id_tahun_ajaran = $this->input->post('id_tahun_ajaran', TRUE);
        $data = [
            'tahun_ajaran'                  => $this->input->post('tahun_ajaran', TRUE),
            'tanggal_pembukaan_pendaftaran' => $this->input->post('tanggal_pembukaan', TRUE),
            'tanggal_penutup_pendaftaran'   => $this->input->post('tanggal_penutupan', TRUE),
            'tanggal_pengumuman'            => $this->input->post('tanggal_pengumuman', TRUE)
        ];

        $update_tahun_ajaran = $this->Tahun_Ajaran_Model->update_tahun_ajaran($data, $id_tahun_ajaran);;
        if ($update_tahun_ajaran) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Ubah Tahun Ajaran");
            $this->session->set_flashdata('pesan', "Data Tahun Ajaran Berhasil Diubah.");
            redirect('staff/tahun_ajaran');
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Ubah Tahun Ajaran");
            $this->session->set_flashdata('pesan', "Data Tahun Ajaran Gagal Diubah.");
            redirect('staff/tahun_ajaran');
        }
    }

    function cari_tahun_ajaran($id_tahun_ajaran)
    {
        $data = $this->Tahun_Ajaran_Model->cari_tahun_ajaran($id_tahun_ajaran)->row();
        echo json_encode($data);
    }
}
