<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('User_Model');
        if ($this->session->userdata('role') !== '1') {
            redirect('auth/cek_session');
        }
    }

    public function index()
    {
        $data['judul'] = "Dashboard - PSB Tazkia Insani";
        $data['active'] = "active";
        $data['menu'] = [
            ['Data Siswa', '', 'staff/data_siswa'],
            ['Data Nilai', '', 'staff/data_nilai']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('staff/index');
        $this->load->view('templates/footer');
    }
}
