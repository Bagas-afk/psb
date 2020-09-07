<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar_Model');
        if ($this->session->userdata('id_role') !== '2') {
            redirect('auth/cek_session');
        }
    }

    function index()
    {
        $data['judul'] = "Dashboard";
        $data['selected'] = ['selected', '', ''];
        $data['active'] = ['active', '', ''];
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_pendaftar');
        $this->load->view('pendaftar/index');
        $this->load->view('templates/footer');
    }

    function data_pendaftar()
    {
        $data['judul'] = "Data Pendaftar";
        $data['selected'] = ['', 'selected', ''];
        $data['active'] = ['', 'active', ''];
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_pendaftar');
        $this->load->view('pendaftar/data_pendaftar');
        $this->load->view('templates/footer');
    }

    function my_profile()
    {
        $data['judul'] = "My Profile";
        $data['selected'] = ['', 'selected', ''];
        $data['active'] = ['', 'active', ''];
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_pendaftar');
        $this->load->view('pendaftar/my_profile');
        $this->load->view('templates/footer');
    }

    function pengumuman()
    {
        $data['judul'] = "Pengumuman Kelulusan";
        $data['selected'] = ['', '', 'selected'];
        $data['active'] = ['', '', 'active'];
        $data['user'] = $this->Pendaftar_Model->cari_data_pendaftar(md5($this->session->userdata('id_user')))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_pendaftar');
        $this->load->view('pendaftar/pengumuman');
        $this->load->view('templates/footer');
    }
}
