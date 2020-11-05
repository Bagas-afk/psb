<?php

class Tahun_Ajaran_Model extends CI_Model
{
    function cari_tahun_ajaran_terakhir()
    {
        $this->db->order_by('id_tahun_ajaran', 'desc');
        $this->db->limit(1);
        return $this->db->get('tb_tahun_ajaran');
    }

    function tampil_tahun_ajaran()
    {
        $this->db->order_by('id_tahun_ajaran', 'desc');
        return $this->db->get('tb_tahun_ajaran');
    }

    function data_tahun_ajaran($id_tahun_ajaran)
    {
        $this->db->where('md5(id_tahun_ajaran)', $id_tahun_ajaran);
        return $this->db->get('tb_tahun_ajaran');
    }

    function simpan_tahun_ajaran($data)
    {
        return $this->db->insert('tb_tahun_ajaran', $data);
    }

    function update_tahun_ajaran($data, $id_tahun_ajaran)
    {
        $this->db->where('id_tahun_ajaran', $id_tahun_ajaran);
        return $this->db->update('tb_tahun_ajaran', $data);
    }

    function cari_tahun_ajaran($id_tahun_ajaran)
    {
        $this->db->where('id_tahun_ajaran', $id_tahun_ajaran);
        return $this->db->get('tb_tahun_ajaran');
    }

    function jumlah_pendaftar_lulus($id_tahun_ajaran)
    {
        $this->db->select('jumlah_pendaftar_lulus');
        $this->db->where('md5(id_tahun_ajaran)', $id_tahun_ajaran);
        return $this->db->get('tb_tahun_ajaran');
    }
}
