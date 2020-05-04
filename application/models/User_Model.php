<?php

class User_Model extends CI_Model
{
    function cari_user_semua()
    {
        return $this->db->get('tb_user');
    }

    function cari_user_login($email)
    {
        $this->db->where('email', $email);
        $this->db->join('tb_role', 'tb_role.id_role = tb_user.id_role', 'inner');
        return $this->db->get('tb_user');
    }

    function simpan_data_registrasi($data)
    {
        return $this->db->insert('tb_user', $data);
    }
}
