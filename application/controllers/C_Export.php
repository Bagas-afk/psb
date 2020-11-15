<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_export extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar_Model');
        $this->load->model('Tahun_Ajaran_Model');
        $this->load->model('Penilaian_Model');
        $this->load->model('Sekolah_Model');
        $this->load->model('Pembayaran_Model');
    }

    function cetak_kartu_ujian()
    {
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();
        $data['judul'] = 'Cetak Kartu Ujian - ' . $data['user']->nama_pendaftar;
        $sekolah = $this->Sekolah_Model->tampil_data_sekolah()->row();
        $data['logo_sekolah'] = $sekolah->logo_sekolah;
        $data['foto'] = $data['user']->foto;
        $data['nama_sekolah'] = strtoupper($sekolah->nama_sekolah);
        $data['no_reg'] = $this->Pembayaran_Model->cari_noreg_pendaftar(md5($this->session->userdata('id_user')))->row();
        $this->load->library('pdf');
        $this->pdf->filename = "Kartu Ujian - " . $data['user']->nama_pendaftar . " - " . time() . ".pdf";
        $this->pdf->cetak('pendaftar/cetak_kartu_pdf', $data, 'A4', 'landscape');
    }

    function cetak_bukti_kelulusan()
    {
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();
        $data['judul'] = 'Cetak Bukti Kelulusan - ' . $data['user']->nama_pendaftar;
        $sekolah = $this->Sekolah_Model->tampil_data_sekolah()->row();
        $data['logo_sekolah'] = $sekolah->logo_sekolah;
        $data['kepala_sekolah'] = $sekolah->kepala_sekolah;
        $data['alamat_sekolah'] = $sekolah->alamat_sekolah;
        $data['foto'] = $data['user']->foto;
        $data['nama_sekolah'] = strtoupper($sekolah->nama_sekolah);
        $data['no_reg'] = $this->Pembayaran_Model->cari_noreg_pendaftar(md5($this->session->userdata('id_user')))->row();
        $data['penilaian'] = $this->Penilaian_Model->cari_nilai_pendaftar($this->session->userdata('id_user'))->row();
        $this->load->library('pdf');
        $this->pdf->filename = "Bukti Kelulusan - Nama - " . time() . ".pdf";
        $this->pdf->cetak('pendaftar/cetak_kelulusan_pdf', $data, 'A4', 'potrait');
    }

    function cetak_laporan_kelulusan($id_tahun_ajaran)
    {
        $sekolah = $this->Sekolah_Model->tampil_data_sekolah()->row();
        $data['logo_sekolah'] = $sekolah->logo_sekolah;
        $data['kepala_sekolah'] = $sekolah->kepala_sekolah;
        $data['alamat_sekolah'] = $sekolah->alamat_sekolah;
        $data['nama_sekolah'] = strtoupper($sekolah->nama_sekolah);
        $data['tahun_ajaran'] = $this->Tahun_Ajaran_Model->data_tahun_ajaran($id_tahun_ajaran)->row();
        $data['judul'] = 'Laporan Kelulusan - Tahun Ajaran ' . str_replace('/', '-', $data['tahun_ajaran']->tahun_ajaran);
        $data['cetak'] = $this->Pendaftar_Model->cetak_laporan_kelulusan($id_tahun_ajaran)->result();

        $this->load->view('staff/cetak_xls', $data);
    }
}
