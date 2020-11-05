<?php

class Penilaian_Model extends CI_Model
{
    function cari_nilai_pendaftar($id_pendaftar)
    {
        $this->db->where('id_pendaftar', $id_pendaftar);
        return $this->db->get('tb_penilaian');
    }

    function cari_nilai($id_pendaftar)
    {
        $this->db->where('md5(id_pendaftar)', $id_pendaftar);
        return $this->db->get('tb_penilaian');
    }

    function update_nilai($id_penilaian_pendaftar, $data)
    {
        $this->db->where('id_penilaian_pendaftar', $id_penilaian_pendaftar);
        return $this->db->update('tb_penilaian', $data);
    }

    function tampil_data_nilai()
    {
        $this->db->join('tb_pendaftar', 'tb_pendaftar.id_pendaftar = tb_penilaian.id_pendaftar', 'inner');
        $this->db->join('tb_tahun_ajaran', 'tb_tahun_ajaran.id_tahun_ajaran = tb_penilaian.id_tahun_ajaran', 'inner');
        return $this->db->get('tb_penilaian');
    }

    function tampil_kelulusan()
    {
        $this->db->where('keterangan_kelulusan', 'Lulus');
        $this->db->or_where('keterangan_kelulusan', 'Tidak Lulus');
        $this->db->order_by('score_penilaian', 'DESC');
        $this->db->order_by('tb_penilaian.id_tahun_ajaran', 'DESC');
        $this->db->join('tb_pendaftar', 'tb_pendaftar.id_pendaftar = tb_penilaian.id_pendaftar', 'inner');
        $this->db->join('tb_tahun_ajaran', 'tb_tahun_ajaran.id_tahun_ajaran = tb_penilaian.id_tahun_ajaran', 'inner');
        return $this->db->get('tb_penilaian');
    }

    function tampil_semua_nilai($id_tahun_ajaran)
    {
        $this->db->join('tb_tahun_ajaran', 'tb_tahun_ajaran.id_tahun_ajaran = tb_penilaian.id_tahun_ajaran', 'inner');
        $this->db->where('md5(tb_tahun_ajaran.id_tahun_ajaran)', $id_tahun_ajaran);
        return $this->db->get('tb_penilaian');
    }

    function tampil_sorting_nilai($id_tahun_ajaran)
    {
        $this->db->order_by('score_penilaian', 'DESC');
        $this->db->select('id_penilaian_pendaftar, score_penilaian');
        $this->db->where('md5(id_tahun_ajaran)', $id_tahun_ajaran);
        return $this->db->get('tb_penilaian');
    }

    function cari_bobot($id_tahun_ajaran)
    {
        $this->db->select('bobot_nilai_pilihan_ganda, bobot_nilai_btq');
        $this->db->where('md5(id_tahun_ajaran)', $id_tahun_ajaran);
        return $this->db->get('tb_tahun_ajaran');
    }

    function cari_keterangan($id_tahun_ajaran)
    {
        $this->db->where('md5(id_tahun_ajaran)', $id_tahun_ajaran);
        $this->db->group_by('keterangan_kelulusan');
        return $this->db->get('tb_penilaian');
    }
    // function jumlah_pilihan_ganda($id_tahun_ajaran)
    // {
    //     $this->db->select('jumlah_pilihan_ganda');
    //     $this->db->where('md5(id_tahun_ajaran)', $id_tahun_ajaran);
    //     return $this->db->get('tb_tahun_ajaran');
    // }
}
