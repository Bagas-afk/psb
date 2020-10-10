<?php

class Pembayaran_Model extends CI_Model
{
    function cari_pembayaran_pendaftar($id)
    {
        $this->db->where('md5(id_pendaftar)', $id);
        return $this->db->get('tb_pembayaran');
    }
}
