<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_Model');
        $this->load->model('Pendaftar_Model');
        $this->load->model('Pembayaran_Model');
        $this->load->model('Tahun_Ajaran_Model');
        $this->load->model('Penilaian_Model');
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
        $data['logo_sekolah'] = "logo_sekolah.png";
        $data['nama_sekolah'] = strtoupper('smp tazkia insani');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/index');
        $this->load->view('templates/footer');
    }

    function my_profile()
    {
        $data['judul'] = "My Profile";
        $data['selected'] = ['', '', '', '', '', '', ''];
        $data['active'] = ['', '', '', '', '', '', ''];
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
        // print_r($data['pendaftar']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/data_pendaftar');
        $this->load->view('templates/footer');
    }

    function detail_pendaftar($id_pendaftar)
    {
        $id_pendaftar = $this->uri->segment(3);
        $data['judul'] = "Detail Pendaftar";
        $data['selected'] = ['', '', '', 'selected', '', '', ''];
        $data['active'] = ['', '', '', 'active', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();
        $data['detail_pendaftar'] = $this->Pendaftar_Model->cari_data_pendaftar($id_pendaftar)->row();
        $data['beasiswa_pendaftar'] = $this->Pendaftar_Model->tampil_beasiswa_pendaftar($id_pendaftar)->result();
        $data['prestasi_pendaftar'] = $this->Pendaftar_Model->tampil_prestasi_pendaftar($id_pendaftar)->result();
        $data['pengasuh_pendaftar'] = $this->Pendaftar_Model->tampil_pengasuh_pendaftar($id_pendaftar)->result();
        // print_r($data['pendaftar']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/detail_pendaftar');
        $this->load->view('templates/footer');
    }

    function ubah_pendaftar($id_pendaftar)
    {
        error_reporting(0);
        $id_pendaftar = $this->uri->segment(3);
        $data['judul'] = "Ubah Data Pendaftar";
        $data['selected'] = ['', '', '', 'selected', '', '', ''];
        $data['active'] = ['', '', '', 'active', '', '', ''];
        $data['user'] = $this->Staff_Model->cari_email_staff($this->session->userdata('email'))->row();
        $data['data_pendaftar'] = $this->Pendaftar_Model->cari_data_pendaftar($id_pendaftar)->row();
        $data['beasiswa_pendaftar'] = $this->Pendaftar_Model->tampil_beasiswa_pendaftar($id_pendaftar)->result();
        $data['prestasi_pendaftar'] = $this->Pendaftar_Model->tampil_prestasi_pendaftar($id_pendaftar)->result();
        $data['pengasuh_pendaftar'] = $this->Pendaftar_Model->tampil_pengasuh_pendaftar($id_pendaftar)->result();

        if ($data['data_pendaftar']->agama == 'Islam') {
            $data['agama'] = ['selected', '', '', '', ''];
        } else if ($data['data_pendaftar']->agama == 'Kristen') {
            $data['agama'] = ['', 'selected', '', '', ''];
        } else if ($data['data_pendaftar']->agama == 'Budha') {
            $data['agama'] = ['', '', 'selected', '', ''];
        } else if ($data['data_pendaftar']->agama == 'Hindu') {
            $data['agama'] = ['', '', '', 'selected', ''];
        } else if ($data['data_pendaftar']->agama == 'Lainnya') {
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
        $this->load->view('templates/sidebar_staff');
        $this->load->view('staff/ubah_pendaftar');
        $this->load->view('templates/footer');
    }

    function tampil_pendaftar_tahun_ajaran($id_tahun_ajaran)
    {
        $id_tahun_ajaran = $this->uri->segment(3);
        $data = $this->Pendaftar_Model->tampil_pendaftar_pertahun($id_tahun_ajaran)->result();
        echo json_encode($data);
    }

    function cari_nilai_pendaftar($id_pendaftar)
    {
        $id_pendaftar = $this->uri->segment(3);
        $data = $this->Penilaian_Model->cari_nilai_pendaftar($id_pendaftar)->result();
        echo json_encode($data);
    }

    function hapus_prestasi()
    {
        $id_prestasi = $this->input->post('id', TRUE);
        if ($this->Pendaftar_Model->hapus_prestasi($id_prestasi)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function hapus_beasiswa()
    {
        $id_beasiswa = $this->input->post('id', TRUE);
        if ($this->Pendaftar_Model->hapus_beasiswa($id_beasiswa)) {
            echo 1;
        } else {
            echo 0;
        }
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
