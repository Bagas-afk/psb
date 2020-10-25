<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Export extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar_Model');
        $this->load->model('Penilaian_Model');
    }

    function cetak_kartu_ujian()
    {
        $data['judul'] = $this->session->userdata('id_user');
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();
        $data['logo_sekolah'] = 'logo_sekolah.png';
        $data['foto'] = 'default.jpg';
        $data['nama_sekolah'] = strtoupper('smp tazkia insani');
        $this->load->library('pdf');
        $this->pdf->filename = "Kartu Ujian - Nama - " . time() . ".pdf";
        $this->pdf->cetak('pendaftar/cetak_kartu_pdf', $data, 'A4', 'landscape');
    }

    function cetak_bukti_ujian()
    {
        $data['judul'] = $this->session->userdata('id_user');
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();
        $data['logo_sekolah'] = 'logo_sekolah.png';
        $data['foto'] = 'default.jpg';
        $data['nama_sekolah'] = strtoupper('smp tazkia insani');
        $this->load->library('pdf');
        $this->pdf->filename = "Bukti Kelulusan - Nama - " . time() . ".pdf";
        $this->pdf->cetak('pendaftar/cetak_kelulusan_pdf', $data, 'A4', 'potrait');
    }
}
