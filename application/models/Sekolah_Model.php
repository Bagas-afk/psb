<?php

class Sekolah_Model extends CI_Model
{
    function tampil_data_sekolah()
    {
        return $this->db->get('tb_profile_sekolah');
    }
}
