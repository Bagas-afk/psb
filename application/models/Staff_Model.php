<?php

class Staff_Model extends CI_Model
{
    function cari_user_semua()
    {
        return $this->db->get('tb_user');
    }

    function cari_email_staff($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('tb_staff');
    }
}
