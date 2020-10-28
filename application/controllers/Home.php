<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sekolah_Model');
    }

    function index()
    {
        $data['title'] = 'PPDB - SMP TAZKIA INSANI';
        $sekolah = $this->Sekolah_Model->tampil_data_sekolah()->row();
        $data['logo_sekolah'] = $sekolah->logo_sekolah;
        $data['kepala_sekolah'] = $sekolah->kepala_sekolah;
        $data['alamat_sekolah'] = $sekolah->alamat_sekolah;
        $data['deskripsi_sekolah'] = $sekolah->deskripsi_sekolah;
        $data['foto_kepala_sekolah'] = $sekolah->foto_kepala_sekolah;
        $data['sambutan_kepala_sekolah'] = $sekolah->sambutan_kepala_sekolah;
        $data['nama_sekolah'] = strtoupper($sekolah->nama_sekolah);
        $this->load->view('home/index', $data);
    }
}
