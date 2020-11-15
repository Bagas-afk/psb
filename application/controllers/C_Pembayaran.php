<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar_Model');
        $this->load->model('Pembayaran_Model');
    }

    function pembayaran()
    {
        $id_pendaftar = $this->input->post('id_pendaftar', TRUE);
        if ($_FILES['foto']['name']) {
            $data = [
                'upload_time'           => date('Y-m-d H:i:s'),
                'bukti_upload'          => $this->upload_bukti_pembayaran($this->input->post('foto', TRUE)),
                'status_pembayaran'     => 'Processing',
                'keterangan_pembayaran' => 'Non Tunai'
            ];
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Upload Bukti Pembayaran");
            $this->session->set_flashdata('pesan', "Upload Bukti Pembayaran Gagal Diajukan.");
            redirect('pendaftar/pembayaran');
        }

        if ($data['bukti_upload']) {
            $gambar = $this->Pendaftar_Model->cari_data_pendaftar(md5($id_pendaftar))->row();
            $nama_gambar = $gambar->bukti_upload;
            if ($nama_gambar != '') {
                $this->delete_bukti($nama_gambar);
            }
        }

        if ($gambar->bukti_upload != '') {
            $this->delete_bukti($gambar->bukti_upload);
        }

        if ($this->Pembayaran_Model->pembayaran($data, md5($id_pendaftar))) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Upload Bukti Pembayaran");
            $this->session->set_flashdata('pesan', "Upload Bukti Pembayaran Berhasil Diajukan.");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Upload Bukti Pembayaran");
            $this->session->set_flashdata('pesan', "Upload Bukti Pembayaran Gagal Diajukan.");
        }

        redirect('pendaftar/pembayaran');
    }

    function verifikasi_pembayaran()
    {
        $id_pendaftar = $this->input->post('id_pendaftar', TRUE);
        if ($this->input->post('status_pembayaran', TRUE)) {
            $status_pembayaran = str_replace(' ', '', $this->input->post('status_pembayaran', TRUE));
        } else {
            $status_pembayaran = 'Diterima';
        }
        $cari_keterangan = $this->Pembayaran_Model->cari_pembayaran_pendaftar(md5($id_pendaftar))->row();
        if ($cari_keterangan->keterangan_pembayaran != '') {
            $data_pembayaran = [
                'status_pembayaran' => $status_pembayaran
            ];
        } else {
            $data_pembayaran = [
                'keterangan_pembayaran' => 'Tunai',
                'status_pembayaran'     => $status_pembayaran
            ];
        }

        if ($data_pembayaran['status_pembayaran'] == 'Diterima') {
            $data_reg = [
                'id_pembayaran' => '',
                'id_pendaftar'  => $id_pendaftar,
                'id_staff'      => $this->session->userdata('id_user'),
                'no_reg'        => time()
            ];
        } else {
            $this->session->set_flashdata('notif', "Info");
            $this->session->set_flashdata('perintah', "Verifikasi Pembayaran");
            $this->session->set_flashdata('pesan', "Verifikasi Pembayaran Belum Dibayar.");
            redirect('staff/data_pendaftar');
        }

        if ($this->Pendaftar_Model->update_profile($data_pembayaran, $id_pendaftar) && $this->Pembayaran_Model->tambah_registrasi($data_reg)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Verifikasi Pembayaran");
            $this->session->set_flashdata('pesan', "Verifikasi Pembayaran Berhasil Diverifikasi.");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Verifikasi Pembayaran");
            $this->session->set_flashdata('pesan', "Verifikasi Pembayaran Gagal Diverifikasi.");
        }

        redirect('staff/data_pendaftar');
    }

    function tolak_pembayaran($id_pendaftar)
    {
        $id_pendaftar = $this->uri->segment(3);
        $data = [
            'status_pembayaran' => 'Ditolak'
        ];
        // print_r($id_pendaftar);
        // die;
        if ($this->Pembayaran_Model->pembayaran($data, $id_pendaftar)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Verifikasi Pembayaran");
            $this->session->set_flashdata('pesan', "Verifikasi Pembayaran Berhasil Ditolak.");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Verifikasi Pembayaran");
            $this->session->set_flashdata('pesan', "Verifikasi Pembayaran Gagal Ditolak.");
        }
        redirect('staff/data_pendaftar');
    }

    function upload_bukti_pembayaran($nama)
    {
        $config['upload_path']          = './assets/img/bukti_pembayaran/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['file_name']            = $nama;
        $config['encrypt_name']         = TRUE;
        $config['overwrite']            = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $config['image_library'] = 'gd2';
            $config['width'] = "150px";
            $config['height'] = "200px";
            $config['maintain_ratio'] = FALSE;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            return $this->upload->data('file_name');
        } else {
            return $this->upload->display_errors();
        }
    }

    function delete_bukti($nama_gambar)
    {
        unlink('assets/img/bukti_pembayaran/' . $nama_gambar);
    }
}
