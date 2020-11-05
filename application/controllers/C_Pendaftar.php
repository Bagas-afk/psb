<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Pendaftar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_Model');
        $this->load->model('Penilaian_Model');
        $this->load->model('Pendaftar_Model');
        $this->load->model('Tahun_Ajaran_Model');
    }

    function hapus_pendaftar($id_pendaftar)
    {
        $cari_pembayaran_pendaftar = $this->Pembayaran_Model->cari_pembayaran_pendaftar($id_pendaftar)->row();
        $cari_nilai_pendaftar = $this->Penilaian_Model->cari_nilai($id_pendaftar)->row();
        if (($cari_pembayaran_pendaftar->status_pembayaran == '' || $cari_pembayaran_pendaftar->status_pembayaran == 'Belum Dibayar') && ($cari_nilai_pendaftar->score_penilaian == '' || $cari_nilai_pendaftar->score_penilaian == '0')) {
            // Berhasil
            $this->Pendaftar_Model->hapus_pendaftar($id_pendaftar);
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Hapus Data Pendaftar");
            $this->session->set_flashdata('pesan', "Data Pendaftar Berhasil Dihapus.");
        } else {
            // Gagal
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Hapus Data Pendaftar");
            $this->session->set_flashdata('pesan', "Data Pendaftar Gagal Dihapus.");
        }
        redirect('staff/data_pendaftar');
    }

    function update_data_pendaftar()
    {
        if (!$this->session->userdata('id_role')) {
            redirect('auth/cek_session');
        }

        $id_pendaftar = $this->input->post('id_pendaftar', TRUE);
        $id_prestasi_pendaftar = $this->input->post('id_prestasi', TRUE);
        $id_beasiswa_pendaftar = $this->input->post('id_beasiswa', TRUE);
        $id_pengasuh_pendaftar = $this->input->post('id_pengasuh', TRUE);

        $pendaftar = [
            'id_pendaftar'              => $id_pendaftar,
            'nama_pendaftar'            => $this->input->post('nama_pendaftar', TRUE),
            'email_pendaftar'           => $this->input->post('email_pendaftar', TRUE),
            'nisn'                      => $this->input->post('nisn', TRUE),
            'jenis_kelamin'             => $this->input->post('jenis_kelamin', TRUE),
            'nis'                       => $this->input->post('nis', TRUE),
            'no_ijazah'                 => $this->input->post('no_ijazah', TRUE),
            'no_skhun'                  => $this->input->post('no_skhun', TRUE),
            'no_un'                     => $this->input->post('no_un', TRUE),
            'nik'                       => $this->input->post('nik', TRUE),
            'tempat_lahir'              => $this->input->post('tempat_lahir', TRUE),
            'tanggal_lahir'             => $this->input->post('tanggal_lahir_pendaftar', TRUE),
            'agama'                     => $this->input->post('agama', TRUE),
            'berkebutuhan_khusus'       => $this->input->post('berkebutuhan_khusus_pendaftar', TRUE),
            'alamat'                    => $this->input->post('alamat', TRUE),
            'dusun'                     => $this->input->post('dusun', TRUE),
            'kelurahan'                 => $this->input->post('kelurahan', TRUE),
            'kecamatan'                 => $this->input->post('kecamatan', TRUE),
            'kota'                      => $this->input->post('kota', TRUE),
            'provinsi'                  => $this->input->post('provinsi', TRUE),
            'transportasi'              => $this->input->post('transportasi', TRUE),
            'jenis_tinggal'             => $this->input->post('jenis_tinggal', TRUE),
            'no_telp'                   => $this->input->post('no_telp', TRUE),
            'no_hp'                     => $this->input->post('no_hp', TRUE),
            'kps'                       => $this->input->post('kps', TRUE),
            'no_kps'                    => $this->input->post('no_kps', TRUE),
            'tinggi_badan'              => $this->input->post('tinggi_badan', TRUE),
            'jarak'                     => $this->input->post('jarak', TRUE),
            'waktu'                     => $this->input->post('waktu', TRUE),
            'jumlah_saudara_kandung'    => $this->input->post('jumlah_saudara', TRUE)
        ];

        if ($_FILES['foto']['name']) {
            $foto = ['foto' => $this->upload_gambar_pendaftar($this->input->post('foto', TRUE))];
            $pendaftar = array_merge($pendaftar, $foto);
        }

        if ($pendaftar['foto']) {
            $udata = $this->Pendaftar_Model->cari_id($this->session->userdata('id_user'))->row();
            $nama_gambar = $udata->foto;
            if ($nama_gambar != 'default.png') {
                $this->hapus_profile($nama_gambar);
            }
        }

        $this->Pendaftar_Model->update_profile($pendaftar, $id_pendaftar);

        $index_prestasi = 0;
        $prestasi_pendaftar = [];
        foreach ($id_prestasi_pendaftar as $id) {
            array_push($prestasi_pendaftar, [
                'id_prestasi_pendaftar'     => $id,
                'nama_prestasi'             => $this->input->post('nama_prestasi', TRUE)[$index_prestasi],
                'jenis_prestasi'            => $this->input->post('jenis_prestasi', TRUE)[$index_prestasi],
                'tingkat'                   => $this->input->post('tingkat_prestasi', TRUE)[$index_prestasi],
                'tahun'                     => $this->input->post('tahun_prestasi', TRUE)[$index_prestasi],
                'penyelenggara'             => $this->input->post('penyelenggara_prestasi', TRUE)[$index_prestasi],
                'id_pendaftar'              => $id_pendaftar
            ]);
            if ($prestasi_pendaftar[$index_prestasi]['id_prestasi_pendaftar'] == '') {
                $this->Pendaftar_Model->simpan_prestasi_pendaftar($prestasi_pendaftar[$index_prestasi]);
            } else {
                $this->Pendaftar_Model->update_prestasi_pendaftar($prestasi_pendaftar[$index_prestasi], $prestasi_pendaftar[$index_prestasi]['id_prestasi_pendaftar'], $id_pendaftar);
            }
            $index_prestasi++;
        }

        $index_beasiswa = 0;
        $beasiswa_pendaftar = [];
        foreach ($id_beasiswa_pendaftar as $id) {
            array_push($beasiswa_pendaftar, [
                'id_beasiswa_pendaftar' => $id,
                'nama_beasiswa'         => $this->input->post('nama_beasiswa', TRUE)[$index_beasiswa],
                'jenis_beasiswa'        => $this->input->post('jenis_beasiswa', TRUE)[$index_beasiswa],
                'penyelenggara'          => $this->input->post('penyelenggara_beasiswa', TRUE)[$index_beasiswa],
                'tahun_mulai'           => $this->input->post('tahun_mulai', TRUE)[$index_beasiswa],
                'tahun_selesai'         => $this->input->post('tahun_selesai', TRUE)[$index_beasiswa],
                'id_pendaftar'          => $id_pendaftar
            ]);
            if ($beasiswa_pendaftar[$index_beasiswa]['id_beasiswa_pendaftar'] == '') {
                $this->Pendaftar_Model->simpan_beasiswa_pendaftar($beasiswa_pendaftar[$index_beasiswa]);
            } else {
                $this->Pendaftar_Model->update_beasiswa_pendaftar($beasiswa_pendaftar[$index_beasiswa], $beasiswa_pendaftar[$index_beasiswa]['id_beasiswa_pendaftar'], $id_pendaftar);
            }
            $index_beasiswa++;
        }

        $index_pengasuh = 0;
        $pengasuh_pendaftar = [];
        foreach ($id_pengasuh_pendaftar as $id) {
            array_push($pengasuh_pendaftar, [
                'id_pengasuh_pendaftar' => $id,
                'nama'                  => $this->input->post('nama_pengasuh', TRUE)[$index_pengasuh],
                'tanggal_lahir'         => $this->input->post('tanggal_lahir_pengasuh', TRUE)[$index_pengasuh],
                'berkebutuhan_khusus'   => $this->input->post('berkebutuhan_khusus_pengasuh', TRUE)[$index_pengasuh],
                'pekerjaan'             => $this->input->post('pekerjaan', TRUE)[$index_pengasuh],
                'pendidikan'            => $this->input->post('pendidikan', TRUE)[$index_pengasuh],
                'penghasilan'           => $this->input->post('penghasilan', TRUE)[$index_pengasuh],
                'keterangan'            => $this->input->post('keterangan', TRUE)[$index_pengasuh],
                'id_pendaftar'          => $id_pendaftar,
            ]);
            if ($pengasuh_pendaftar[$index_pengasuh]['id_pengasuh_pendaftar'] == '') {
                if ($pengasuh_pendaftar[$index_pengasuh]['nama'] != '') {
                    $this->Pendaftar_Model->simpan_pengasuh_pendaftar($pengasuh_pendaftar[$index_pengasuh]);
                }
            } else {
                $this->Pendaftar_Model->update_pengasuh_pendaftar($pengasuh_pendaftar[$index_pengasuh], $pengasuh_pendaftar[$index_pengasuh]['id_pengasuh_pendaftar'], $id_pendaftar);
            }
            $index_pengasuh++;
        }

        if ($this->Pendaftar_Model->update_profile($pendaftar, $id_pendaftar)) {
            $this->session->set_flashdata('notif', "Berhasil");
            $this->session->set_flashdata('perintah', "Ubah Data Pendaftar");
            $this->session->set_flashdata('pesan', "Data Pendaftar Berhasil Diubah.");
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Ubah Data Pendaftar");
            $this->session->set_flashdata('pesan', "Data Pendaftar Gagal Diubah.");
        }

        if ($this->session->userdata('id_role') == '1') {
            redirect('staff/data_pendaftar');
        } else {
            redirect('pendaftar/data_pendaftar');
        }
    }

    function simpan_pendaftar()
    {
        $password = $this->input->post('password', TRUE);
        $password_confirm = $this->input->post('password_confirm', TRUE);
        if ($password == $password_confirm) {
            $tahun_ajaran = $this->Tahun_Ajaran_Model->cari_tahun_ajaran_terakhir()->row();
            $data = [
                'id_pendaftar'    => '',
                'nama_pendaftar'  => $this->input->post('nama_pendaftar', TRUE),
                'password'        => password_hash($password, PASSWORD_DEFAULT),
                'nisn'            => $this->input->post('nisn', TRUE),
                'id_tahun_ajaran' => $tahun_ajaran->id_tahun_ajaran,
                'foto'            => 'default.png',
                'date_created'    => date('Y-m-d H:i:s')
            ];
            if ($this->Pendaftar_Model->simpan_registrasi($data)) {
                $this->session->set_flashdata('notif', "Berhasil");
                $this->session->set_flashdata('perintah', "Simpan Data Pendaftar");
                $this->session->set_flashdata('pesan', "Data Pendaftar Berhasil Disimpan.");
            } else {
                $this->session->set_flashdata('notif', "Gagal");
                $this->session->set_flashdata('perintah', "Simpan Data Pendaftar");
                $this->session->set_flashdata('pesan', "Data Pendaftar Gagal Disimpan.");
            }
        } else {
            $this->session->set_flashdata('notif', "Gagal");
            $this->session->set_flashdata('perintah', "Simpan Data Pendaftar");
            $this->session->set_flashdata('pesan', "Data Pendaftar Gagal Disimpan. Password Harus Sama");
        }

        redirect('staff/data_pendaftar');
    }

    function upload_gambar_pendaftar($nama)
    {
        $config['upload_path']          = './assets/img/profile/';
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

    function hapus_profile($nama)
    {
        unlink('assets/img/profile/' . $nama);
    }
}
