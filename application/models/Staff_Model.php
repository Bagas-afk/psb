<?php

class Staff_Model extends CI_Model
{
    function cari_staff_semua()
    {
        return $this->db->get('tb_staff');
    }

    function cari_id($id)
    {
        $this->db->where('id_staff', $id);
        return $this->db->get('tb_staff');
    }

    function update_profile($staff, $id)
    {
        $this->db->where('id_staff', $id);
        return $this->db->update('tb_staff', $staff);
    }

    function cari_email_staff($email)
    {
        $this->db->where('email_staff', $email);
        return $this->db->get('tb_staff');
    }

    function ganti_password($password, $email)
    {
        $this->db->set('password', $password);
        $this->db->where('email_staff', $email);
        return $this->db->update('tb_staff');
    }
}
