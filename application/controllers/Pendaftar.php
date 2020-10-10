<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar_Model');
        $this->load->model('Tahun_Ajaran_Model');
        if ($this->session->userdata('id_role') !== '2') {
            redirect('auth/cek_session');
        }
    }

    function index()
    {
        $data['judul'] = "Dashboard";
        $data['selected'] = ['selected', '', '', '', ''];
        $data['active'] = ['active', '', '', '', ''];
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();

        if (($data['user']->tempat_lahir && $data['user']->tanggal_lahir && $data['user']->alamat && $data['user']->dusun && $data['user']->kelurahan && $data['user']->kecamatan && $data['user']->kota && $data['user']->provinsi) == '') {
            $this->session->set_flashdata('notif_perintah', "Lengkapi Data Peserta");
            $this->session->set_flashdata('notif_pesan', "Data Peserta Belum Lengkap. Silahkan Melengkapi Data Peserta");
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_pendaftar');
        $this->load->view('pendaftar/index');
        $this->load->view('templates/footer');
    }

    function data_pendaftar()
    {
        $data['judul'] = "Data Pendaftar";
        $data['selected'] = ['', 'selected', '', '', ''];
        $data['active'] = ['', 'active', '', '', ''];
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();
        if (($data['user']->tempat_lahir && $data['user']->tanggal_lahir && $data['user']->alamat && $data['user']->dusun && $data['user']->kelurahan && $data['user']->kecamatan && $data['user']->kota && $data['user']->provinsi) == '') {
            $this->session->set_flashdata('notif_perintah', "Lengkapi Data Peserta");
            $this->session->set_flashdata('notif_pesan', "Data Peserta Belum Lengkap. Silahkan Melengkapi Data Peserta");
        }

        if ($data['user']->agama == 'Islam') {
            $data['agama'] = ['selected', '', '', '', '', ''];
        } elseif ($data['user']->agama == 'Kristen') {
            $data['agama'] = ['', 'selected', '', '', ''];
        } elseif ($data['user']->agama == 'Budha') {
            $data['agama'] = ['', '', 'selected', '', ''];
        } elseif ($data['user']->agama == 'Hindu') {
            $data['agama'] = ['', '', '', 'selected', ''];
        } elseif ($data['user']->agama == 'Lainnya') {
            $data['agama'] = ['', '', '', '', 'selected'];
        } else {
            $data['agama'] = ['', '', '', '', ''];
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_pendaftar');
        $this->load->view('pendaftar/data_pendaftar');
        $this->load->view('templates/footer');
    }

    function my_profile()
    {
        $data['judul'] = "My Profile";
        $data['selected'] = ['', '', '', '', ''];
        $data['active'] = ['', '', '', '', ''];
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_pendaftar');
        $this->load->view('pendaftar/my_profile');
        $this->load->view('templates/footer');
    }

    function pembayaran()
    {
        $data['judul'] = "Upload Bukti Pembayaran";
        $data['selected'] = ['', '', 'selected', '', ''];
        $data['active'] = ['', '', 'active', '', ''];
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();
        if (($data['user']->tempat_lahir && $data['user']->tanggal_lahir && $data['user']->alamat && $data['user']->dusun && $data['user']->kelurahan && $data['user']->kecamatan && $data['user']->kota && $data['user']->provinsi) == '') {
            $this->session->set_flashdata('notif_perintah', "Lengkapi Data Peserta");
            $this->session->set_flashdata('notif_pesan', "Data Peserta Belum Lengkap. Silahkan Melengkapi Data Peserta");
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_pendaftar');
        $this->load->view('pendaftar/pembayaran');
        $this->load->view('templates/footer');
    }

    function cetak_kartu_ujian()
    {
        $data['judul'] = "Cetak Kartu Ujian";
        $data['selected'] = ['', '', '', 'selected', ''];
        $data['active'] = ['', '', '', 'active', ''];
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();
        if (($data['user']->tempat_lahir && $data['user']->tanggal_lahir && $data['user']->alamat && $data['user']->dusun && $data['user']->kelurahan && $data['user']->kecamatan && $data['user']->kota && $data['user']->provinsi) == '') {
            $this->session->set_flashdata('notif_perintah', "Lengkapi Data Peserta");
            $this->session->set_flashdata('notif_pesan', "Data Peserta Belum Lengkap. Silahkan Melengkapi Data Peserta");
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_pendaftar');
        $this->load->view('pendaftar/cetak_kartu_ujian');
        $this->load->view('templates/footer');
    }

    function pengumuman()
    {
        $data['judul'] = "Pengumuman Kelulusan";
        $data['selected'] = ['', '', '', '', 'selected'];
        $data['active'] = ['', '', '', '', 'active'];
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();
        $data['tanggal_pengumuman'] = $this->Tahun_Ajaran_Model->cari_tahun_ajaran($data['user']->id_tahun_ajaran)->row();
        if (($data['user']->tempat_lahir && $data['user']->tanggal_lahir && $data['user']->alamat && $data['user']->dusun && $data['user']->kelurahan && $data['user']->kecamatan && $data['user']->kota && $data['user']->provinsi) == '') {
            $this->session->set_flashdata('notif_perintah', "Lengkapi Data Peserta");
            $this->session->set_flashdata('notif_pesan', "Data Peserta Belum Lengkap. Silahkan Melengkapi Data Peserta");
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_pendaftar');
        $this->load->view('pendaftar/pengumuman');
        $this->load->view('templates/footer');
    }
}
