<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_Model');
        $this->load->model('Pendaftar_Model');
        if ($this->session->userdata('id_role') !== '1') {
            redirect('auth/cek_session');
        }
    }

    function index()
    {
        $data['judul'] = "Dashboard";
        $data['selected'] = ['', '', '', '', '', ''];
        $data['active'] = ['', '', '', '', '', ''];
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
        $data['selected'] = ['', '', '', '', '', ''];
        $data['active'] = ['', '', '', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();
        $data['pendaftar'] = $this->Pendaftar_Model->tampil_pendaftar()->result();

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
        $data['selected'] = ['', '', '', '', '', ''];
        $data['active'] = ['', '', '', '', '', ''];
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
        $data['selected'] = ['', '', '', '', '', ''];
        $data['active'] = ['', '', '', '', '', ''];
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
        $data['selected'] = ['', '', '', '', '', ''];
        $data['active'] = ['', '', '', '', '', ''];
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
        $data['selected'] = ['', '', '', '', '', ''];
        $data['active'] = ['', '', '', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/profile_sekolah');
        $this->load->view('templates/footer');
    }

    function tahun_ajaran()
    {
        $data['judul'] = "Tahun Ajaran";
        $data['selected'] = ['', '', '', '', '', ''];
        $data['active'] = ['', '', '', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/tahun_ajaran');
        $this->load->view('templates/footer');
    }

    function data_kelulusan()
    {
        $data['judul'] = "Data Kelulusan";
        $data['selected'] = ['', '', '', '', '', ''];
        $data['active'] = ['', '', '', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/data_kelulusan');
        $this->load->view('templates/footer');
    }
}
