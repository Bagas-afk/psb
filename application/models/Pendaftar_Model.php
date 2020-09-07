<?php

class Pendaftar_Model extends CI_Model
{
    function cari_data_pendaftar($id_pendaftar)
    {
        $this->db->where('md5(id_pendaftar)', $id_pendaftar);
        return $this->db->get('tb_pendaftar');
    }

    function cari_email_pendaftar($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('tb_pendaftar');
    }
}
