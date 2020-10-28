<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar_Model');
        $this->load->model('Penilaian_Model');
        $this->load->model('Tahun_Ajaran_Model');
        $this->load->model('Sekolah_Model');
        $this->load->model('Pembayaran_Model');
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
        $sekolah = $this->Sekolah_Model->tampil_data_sekolah()->row();
        $data['logo_sekolah'] = $sekolah->logo_sekolah;
        $data['nama_sekolah'] = strtoupper($sekolah->nama_sekolah);

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
        error_reporting(0);
        $data['judul'] = "Data Pendaftar";
        $data['selected'] = ['', 'selected', '', '', ''];
        $data['active'] = ['', 'active', '', '', ''];
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();
        if (($data['user']->tempat_lahir && $data['user']->tanggal_lahir && $data['user']->alamat && $data['user']->dusun && $data['user']->kelurahan && $data['user']->kecamatan && $data['user']->kota && $data['user']->provinsi) == '') {
            $this->session->set_flashdata('notif_perintah', "Lengkapi Data Peserta");
            $this->session->set_flashdata('notif_pesan', "Data Peserta Belum Lengkap. Silahkan Melengkapi Data Peserta");
        }
        $data['beasiswa_pendaftar'] = $this->Pendaftar_Model->tampil_beasiswa_pendaftar(md5($this->session->userdata('id_user')))->result();
        $data['prestasi_pendaftar'] = $this->Pendaftar_Model->tampil_prestasi_pendaftar(md5($this->session->userdata('id_user')))->result();
        $data['pengasuh_pendaftar'] = $this->Pendaftar_Model->tampil_pengasuh_pendaftar(md5($this->session->userdata('id_user')))->result();

        if ($data['user']->agama == 'Islam') {
            $data['agama'] = ['selected', '', '', '', ''];
        } else if ($data['user']->agama == 'Kristen') {
            $data['agama'] = ['', 'selected', '', '', ''];
        } else if ($data['user']->agama == 'Budha') {
            $data['agama'] = ['', '', 'selected', '', ''];
        } else if ($data['user']->agama == 'Hindu') {
            $data['agama'] = ['', '', '', 'selected', ''];
        } else if ($data['user']->agama == 'Lainnya') {
            $data['agama'] = ['', '', '', '', 'selected'];
        } else {
            $data['agama'] = ['', '', '', '', ''];
        }

        if ($data['pengasuh_pendaftar'][0]) {
            $data['ayah'] = $data['pengasuh_pendaftar'][0];
            $data['checked_ayah'] = 'checked';
        } else {
            $data['checked_ayah'] = '';
        }

        if ($data['pengasuh_pendaftar'][1]) {
            $data['ibu'] = $data['pengasuh_pendaftar'][1];
            $data['checked_ibu'] = 'checked';
        } else {
            $data['checked_ibu'] = '';
        }

        if ($data['pengasuh_pendaftar'][2]) {
            $data['wali'] = $data['pengasuh_pendaftar'][2];
            $data['checked_wali'] = 'checked';
        } else {
            $data['checked_wali'] = '';
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
        $data['detail_pembayaran'] = $this->Pembayaran_Model->cari_pembayaran_pendaftar(md5($this->session->userdata('id_user')))->row();

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
        $sekolah = $this->Sekolah_Model->tampil_data_sekolah()->row();
        $data['logo_sekolah'] = $sekolah->logo_sekolah;
        $data['foto'] = $data['user']->foto;
        $data['nama_sekolah'] = strtoupper($sekolah->nama_sekolah);
        $data['no_reg'] = $this->Pembayaran_Model->cari_noreg_pendaftar(md5($this->session->userdata('id_user')))->row();

        if ($data['user']->status_pembayaran == 'Belum Dibayar') {
            $this->session->set_flashdata('notif_perintah', "Belum Melakukan Pembayaran");
            $this->session->set_flashdata('notif_pesan', "Harap melakukan pembayaran terlebih dahulu. Terima kasih");
            $this->session->set_flashdata('notif_color', "info");
        } else if ($data['user']->status_pembayaran == 'Processing') {
            $this->session->set_flashdata('notif_perintah', "Pembayaran Sedang Diverifikasi");
            $this->session->set_flashdata('notif_pesan', "Harap menunggu proses pengecekan terhadap pembayaran. Terima Kasih");
            $this->session->set_flashdata('notif_color', "warning");
        } else if ($data['user']->status_pembayaran == 'Ditolak') {
            $this->session->set_flashdata('notif_perintah', "Pembayaran Tidak Diverifikasi");
            $this->session->set_flashdata('notif_pesan', "Harap mengupload ulang bukti pembayaran. Terima Kasih");
            $this->session->set_flashdata('notif_color', "danger");
        }

        if (($data['user']->tempat_lahir && $data['user']->tanggal_lahir && $data['user']->alamat && $data['user']->dusun && $data['user']->kelurahan && $data['user']->kecamatan && $data['user']->kota && $data['user']->provinsi) == '') {
            $this->session->set_flashdata('notif_perintah', "Lengkapi Data Peserta");
            $this->session->set_flashdata('notif_pesan', "Data Peserta Belum Lengkap. Silahkan Melengkapi Data Peserta");
            $this->session->set_flashdata('notif_color', "info");
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
            $this->session->set_flashdata('notif_color', "info");
        }
        if ($data['user']->status_pembayaran == 'Belum Dibayar') {
            $this->session->set_flashdata('notif_perintah', "Belum Melakukan Pembayaran");
            $this->session->set_flashdata('notif_pesan', "Harap melakukan pembayaran terlebih dahulu. Terima kasih");
            $this->session->set_flashdata('notif_color', "info");
        } else if ($data['user']->status_pembayaran == 'Processing') {
            $this->session->set_flashdata('notif_perintah', "Pembayaran Sedang Diverifikasi");
            $this->session->set_flashdata('notif_pesan', "Harap menunggu proses pengecekan terhadap pembayaran. Terima Kasih");
            $this->session->set_flashdata('notif_color', "warning");
        } else if ($data['user']->status_pembayaran == 'Ditolak') {
            $this->session->set_flashdata('notif_perintah', "Pembayaran Tidak Diverifikasi");
            $this->session->set_flashdata('notif_pesan', "Harap mengupload ulang bukti pembayaran. Terima Kasih");
            $this->session->set_flashdata('notif_color', "danger");
        }

        if (($data['user']->tempat_lahir && $data['user']->tanggal_lahir && $data['user']->alamat && $data['user']->dusun && $data['user']->kelurahan && $data['user']->kecamatan && $data['user']->kota && $data['user']->provinsi) == '') {
            $this->session->set_flashdata('notif_perintah', "Lengkapi Data Peserta");
            $this->session->set_flashdata('notif_pesan', "Data Peserta Belum Lengkap. Silahkan Melengkapi Data Peserta");
            $this->session->set_flashdata('notif_color', "info");
        }

        $data['penilaian'] = $this->Penilaian_Model->cari_nilai_pendaftar($this->session->userdata('id_user'))->row();
        $data['tahun_ajaran'] = $this->Tahun_Ajaran_Model->jumlah_pendaftar_lulus($data['user']->id_tahun_ajaran)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_pendaftar');
        $this->load->view('pendaftar/pengumuman');
        $this->load->view('templates/footer');
    }
}
