<?php

class Sekolah_Model extends CI_Model
{
    function tampil_data_sekolah()
    {
        return $this->db->get('tb_profile_sekolah');
    }

    function cari_id_sekolah($id)
    {
        $this->db->where('id_sekolah', $id);
        return $this->db->get('tb_profile_sekolah');
    }

    function update_data_sekolah($data, $id)
    {
        $this->db->where('id_sekolah', $id);
        return $this->db->update('tb_profile_sekolah', $data);
    }
}
