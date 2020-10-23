<?php

class Pembayaran_Model extends CI_Model
{
    function cari_pembayaran_pendaftar($id)
    {
        $this->db->where('md5(id_pendaftar)', $id);
        return $this->db->get('tb_pendaftar');
    }

    function pembayaran($data, $id_pendaftar)
    {
        return $this->db->update('tb_pendaftar', $data, ['md5(id_pendaftar)' => $id_pendaftar]);
    }

    function tambah_registrasi($data)
    {
        return $this->db->insert('tb_pembayaran', $data);
    }
}
