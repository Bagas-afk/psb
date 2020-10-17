<?php

class Penilaian_Model extends CI_Model
{
    function cari_nilai_pendaftar($id_pendaftar)
    {
        $this->db->where('id_pendaftar', $id_pendaftar);
        return $this->db->get('tb_penilaian');
    }
}
