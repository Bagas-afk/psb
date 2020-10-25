<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Penilaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penilaian_Model');
        $this->load->model('Tahun_Ajaran_Model');
    }

    function update_nilai()
    {
        $id_penilaian_pendaftar = $this->input->post('id_penilaian_pendaftar', TRUE);
        $data = [
            'pilihan_ganda_benar'   => $this->input->post('pilihan_ganda_benar'),
            'nilai_btq'             => $this->input->post('nilai_btq', TRUE)
        ];

        if ($this->Penilaian_Model->update_nilai($id_penilaian_pendaftar, $data)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Update Nilai Pendaftar");
            $this->session->set_flashdata('pesan', "Penilaian Pendaftar Berhasil Diubah.");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Update Nilai Pendaftar");
            $this->session->set_flashdata('pesan', "Penilaian Pendaftar Gagal Diubah.");
        }

        redirect('staff/data_nilai');
    }

    function update_kelulusan()
    {
        $id_penilaian_pendaftar = $this->input->post('id_penilaian_pendaftar', TRUE);
        $data = ['keterangan_kelulusan' => $this->input->post('keterangan_kelulusan')];

        if ($this->Penilaian_Model->update_nilai($id_penilaian_pendaftar, $data)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Update Kelulusan");
            $this->session->set_flashdata('pesan', "Data kelulusan Pendaftar Berhasil Diubah.");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Update Nilai Pendaftar");
            $this->session->set_flashdata('pesan', "Data kelulusan Pendaftar Gagal Diubah.");
        }

        redirect('staff/data_kelulusan');
    }

    function verifikasi_penilaian($id_tahun_ajaran)
    {
        $cari_keterangan = $this->Penilaian_Model->cari_keterangan($id_tahun_ajaran)->row();
        if ($cari_keterangan->keterangan_kelulusan != '') {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Gagal Verifikasi Nilai");
            $this->session->set_flashdata('pesan', "Penilaian Telah Diverifikasi Sebelumnya.");
            redirect('staff/data_nilai');
        }

        $data_penilaian_semua = $this->Penilaian_Model->tampil_semua_nilai($id_tahun_ajaran)->result();
        // Yang Dipakai Sekolah 
        // $jumlah_pilihan_ganda = $this->Penilaian_Model->jumlah_pilihan_ganda($id_tahun_ajaran)->row();
        // $pembagi = 100 / $jumlah_pilihan_ganda->jumlah_pilihan_ganda;
        // $data = [];
        // for ($i = 0; $i < count($data_penilaian_semua); $i++) {
        //     $id_pendaftar[$i] = $data_penilaian_semua[$i]->id_pendaftar;
        //     $score[$i] = (($data_penilaian_semua[$i]->pilihan_ganda_benar * $pembagi) + $data_penilaian_semua[$i]->nilai_btq) / 2;
        //     if ($score[$i] >= 70) {
        //         array_push($data, [
        //             'id_pendaftar' => $id_pendaftar[$i],
        //             'score_kelulusan' => $score[$i],
        //             'coba' => 'Lulus'
        //         ]);
        //     } else {
        //         array_push($data, [
        //             'id_pendaftar' => $id_pendaftar[$i],
        //             'score_kelulusan' => $score[$i],
        //             'coba' => 'Tidak Lulus'
        //         ]);
        //     }
        // }
        // print_r($data);
        // die;
        // End Yang Dipakai Sekolah

        // Yang Dipakai Untuk Skripsi
        $bobot = $this->Penilaian_Model->cari_bobot($id_tahun_ajaran)->row_array();
        // penjumlahan Bobot
        $wa = array_sum($bobot);

        foreach ($bobot as $bobot) {
            $normalisasi_bobot[] = $bobot / $wa;
        }
        // echo $normalisasi_bobot[1];

        // print_r($wa);

        foreach ($data_penilaian_semua as $data) {
            $penilaian_1 = pow(intval($data->pilihan_ganda_benar) * 2, $normalisasi_bobot[0]);
            $penilaian_2 = pow(intval($data->nilai_btq), $normalisasi_bobot[1]);
            $Si[] = $penilaian_1 * $penilaian_2;
        }

        $Sj = array_sum($Si);
        $rangking = [];
        for ($i = 0; $i < count($Si); $i++) {
            $Vi[$i] = $Si[$i] / $Sj;
            $Vi[$i] = $Vi[$i] * 100;
            $id_penilaian_pendaftar[$i] = $data_penilaian_semua[$i]->id_penilaian_pendaftar;
            $rangking[$i] = [
                'score_penilaian' => round($Vi[$i], 2)
            ];
            // simpan score ke database where id_pendaftar
            $this->Penilaian_Model->update_nilai($id_penilaian_pendaftar[$i], $rangking[$i]);
        }
        // Sorting Score dari Yang Terbesar
        $tampil_nilai = $this->Penilaian_Model->tampil_sorting_nilai($id_tahun_ajaran)->result();
        $jumlah_pendaftar_lulus = $this->Tahun_Ajaran_Model->jumlah_pendaftar_lulus($id_tahun_ajaran)->row();
        // rsort($rangking);

        for ($k = 0; $k < count($tampil_nilai); $k++) {
            $id_penilaian_pendaftar[$k] = $tampil_nilai[$k]->id_penilaian_pendaftar;
            if ($k < $jumlah_pendaftar_lulus->jumlah_pendaftar_lulus) {
                $keterangan[$k] = ['keterangan_kelulusan' => 'Lulus'];
            } else {
                $keterangan[$k] = ['keterangan_kelulusan' => 'Tidak Lulus'];
            }
            // Simpan Keterangan Kelulusan where id_pendaftar
            $this->Penilaian_Model->update_nilai($id_penilaian_pendaftar[$k], $keterangan[$k]);
        }
        // End Yang Dipakai Untuk Skripsi
        die;
    }
}
