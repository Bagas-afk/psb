<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_Model');
        $this->load->model('Pendaftar_Model');
        $this->load->model('Tahun_Ajaran_Model');
        $this->load->model('Sekolah_Model');
        if ($this->session->userdata('id_role') !== '1') {
            redirect('auth/cek_session');
        }
    }

    function index()
    {
        $data['judul'] = "Dashboard";
        $data['selected'] = ['selected', '', '', '', '', '', ''];
        $data['active'] = ['active', '', '', '', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/index');
        $this->load->view('templates/footer');
    }

    function my_profile()
    {
        $data['judul'] = "My Profile";
        $data['selected'] = ['', '', '', '', '', ''];
        $data['active'] = ['', '', '', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/my_profile');
        $this->load->view('templates/footer');
    }

    function data_pendaftar()
    {
        $data['judul'] = "Data Pendaftar";
        $data['selected'] = ['', '', '', 'selected', '', '', ''];
        $data['active'] = ['', '', '', 'active', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();
        $data['pendaftar'] = $this->Pendaftar_Model->tampil_data_pendaftar()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/data_pendaftar');
        $this->load->view('templates/footer');
    }

    function ubah_pendaftar($id_pendaftar)
    {
        $id_pendaftar = $this->uri->segment(3);
        $data['judul'] = "Ubah Data Pendaftar";
        $data['selected'] = ['', '', '', 'selected', '', '', ''];
        $data['active'] = ['', '', '', 'active', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();
        $data['data_pendaftar'] = $this->Pendaftar_Model->cari_data_pendaftar($id_pendaftar)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/ubah_pendaftar');
        $this->load->view('templates/footer');
    }

    function data_peringkat()
    {
        $data['judul'] = "Data Peringkat";
        $data['selected'] = ['', '', '', '', '', '', ''];
        $data['active'] = ['', '', '', '', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/data_peringkat');
        $this->load->view('templates/footer');
    }
    function data_nilai()
    {
        $data['judul'] = "Data Nilai";
        $data['selected'] = ['', '', '', '', 'selected', '', ''];
        $data['active'] = ['', '', '', '', 'active', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/data_nilai');
        $this->load->view('templates/footer');
    }
    function profile_sekolah()
    {
        $data['judul'] = "Profile Sekolah";
        $data['selected'] = ['', 'selected', '', '', '', '', ''];
        $data['active'] = ['', 'active', '', '', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();
        $data['sekolah'] = $this->Sekolah_Model->tampil_data_sekolah()->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/profile_sekolah');
        $this->load->view('templates/footer');
    }

    function tahun_ajaran()
    {
        $data['judul'] = "Tahun Ajaran";
        $data['selected'] = ['', '', 'selected', '', '', '', ''];
        $data['active'] = ['', '', 'active', '', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();
        $data['tampil_tahun_ajaran'] = $this->Tahun_Ajaran_Model->tampil_tahun_ajaran()->result();
        $data['tahun_ajaran_sebelum'] = $this->Tahun_Ajaran_Model->cari_tahun_ajaran_terakhir()->row();
        $tahun_awal = substr($data['tahun_ajaran_sebelum']->tahun_ajaran, 0, 4);
        $tahun_akhir = substr($data['tahun_ajaran_sebelum']->tahun_ajaran, 7, 4);
        $data['tahun_ajaran_sekarang'] = ($tahun_awal + 1) . ' / ' . ($tahun_akhir + 1);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/tahun_ajaran');
        $this->load->view('templates/footer');
    }

    function data_kelulusan()
    {
        $data['judul'] = "Data Kelulusan";
        $data['selected'] = ['', '', '', '', '', 'selected', ''];
        $data['active'] = ['', '', '', '', '', 'active', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/data_kelulusan');
        $this->load->view('templates/footer');
    }

    function cetak_laporan()
    {
        $data['judul'] = "Cetak Laporan";
        $data['selected'] = ['', '', '', '', '', '', 'selected'];
        $data['active'] = ['', '', '', '', '', '', 'active'];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();
        $data['tahun_ajaran'] = $this->Tahun_Ajaran_Model->tampil_tahun_ajaran()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/cetak_laporan');
        $this->load->view('templates/footer');
    }
}
