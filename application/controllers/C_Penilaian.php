<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Penilaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftar_Model');
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
        $cari_tahun_ajaran = $this->Tahun_Ajaran_Model->data_tahun_ajaran($id_tahun_ajaran)->row();
        $cari_keterangan = $this->Penilaian_Model->cari_keterangan($id_tahun_ajaran)->row();
        if ($cari_keterangan->keterangan_kelulusan != '') {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Gagal Verifikasi Nilai");
            $this->session->set_flashdata('pesan', "Penilaian Telah Diverifikasi Sebelumnya.");
            redirect('staff/data_nilai');
        }

        $data_penilaian_semua = $this->Penilaian_Model->tampil_semua_nilai($id_tahun_ajaran)->result();
        // print_r($data_penilaian_semua[5]->id_pendaftar);
        // $data_beasiswa_semua = $this->Pendaftar_Model->tampil_beasiswa_semua($id_tahun_ajaran)->result();
        // $index_beasiswa = 0;
        foreach ($data_penilaian_semua as $data) {
            $beasiswa_pendaftar = $this->Pendaftar_Model->tampil_jumlah_beasiswa_semua($data->id_pendaftar)->row();
            $prestasi_pendaftar = $this->Pendaftar_Model->tampil_jumlah_prestasi_semua($data->id_pendaftar)->row();
            $jumlah_beasiswa_pendaftar[] = $beasiswa_pendaftar->jumlah_beasiswa;
            $jumlah_prestasi_pendaftar[] = $prestasi_pendaftar->jumlah_prestasi;
        }
        // print_r($jumlah_beasiswa_pendaftar);
        // die;
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
        $bobot = [55, 60, 35, 20];
        // penjumlahan Bobot
        $wa = array_sum($bobot);

        foreach ($bobot as $bobot) {
            $normalisasi_bobot[] = $bobot / $wa;
        }

        // print_r($wa);
        $index = 0;
        $pengali = 100 / $cari_tahun_ajaran->jumlah_pilihan_ganda;
        // echo $pengali;
        // die;
        foreach ($data_penilaian_semua as $data) {
            $penilaian_1 = pow(intval($data->pilihan_ganda_benar) * $pengali, $normalisasi_bobot[0]);
            $penilaian_2 = pow(intval($data->nilai_btq), $normalisasi_bobot[1]);

            if ($jumlah_beasiswa_pendaftar[$index] == 0) {
                $penilaian_4 = pow(20, $normalisasi_bobot[3]);
            } else if ($jumlah_beasiswa_pendaftar[$index] == 1) {
                $penilaian_4 = pow(40, $normalisasi_bobot[3]);
            } else if ($jumlah_beasiswa_pendaftar[$index] == 2) {
                $penilaian_4 = pow(60, $normalisasi_bobot[3]);
            } else if ($jumlah_beasiswa_pendaftar[$index] == 3) {
                $penilaian_4 = pow(80, $normalisasi_bobot[3]);
            } else if ($jumlah_beasiswa_pendaftar[$index] >= 4) {
                $penilaian_4 = pow(100, $normalisasi_bobot[3]);
            }

            if ($jumlah_prestasi_pendaftar[$index] == 0) {
                $penilaian_3 = pow(20, $normalisasi_bobot[2]);
            } else if ($jumlah_prestasi_pendaftar[$index] == 1) {
                $penilaian_3 = pow(40, $normalisasi_bobot[2]);
            } else if ($jumlah_prestasi_pendaftar[$index] == 2) {
                $penilaian_3 = pow(60, $normalisasi_bobot[2]);
            } else if ($jumlah_prestasi_pendaftar[$index] == 3) {
                $penilaian_3 = pow(80, $normalisasi_bobot[2]);
            } else if ($jumlah_prestasi_pendaftar[$index] >= 4) {
                $penilaian_3 = pow(100, $normalisasi_bobot[2]);
            }

            $Si[] = $penilaian_1 * $penilaian_2 * $penilaian_3 * $penilaian_4;
            $index++;
            // print_r($penilaian_4 . ', ');
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
        $this->session->set_flashdata('notif', "Berhasil");
        $this->session->set_flashdata('perintah', "Berhasil Verifikasi Nilai");
        $this->session->set_flashdata('pesan', "Penilaian Berhasil Verifikasi.");
        redirect('staff/data_kelulusan');
        // End Yang Dipakai Untuk Skripsi
    }
}
