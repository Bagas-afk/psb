<?php

class Pendaftar_Model extends CI_Model
{
    function tampil_data_pendaftar()
    {
        $this->db->join('tb_pembayaran', 'tb_pembayaran.id_pendaftar = tb_pendaftar.id_pendaftar', 'left');
        $this->db->join('tb_staff', 'tb_pembayaran.id_staff = tb_staff.id_staff', 'left');
        $this->db->order_by('id_tahun_ajaran', 'desc');
        return $this->db->get('tb_pendaftar');
    }

    function cari_data_pendaftar($id_pendaftar)
    {
        $this->db->where('md5(id_pendaftar)', $id_pendaftar);
        return $this->db->get('tb_pendaftar');
    }

    function cari_nisn_pendaftar($nisn)
    {
        $this->db->where('nisn', $nisn);
        return $this->db->get('tb_pendaftar');
    }

    function ganti_password($password, $nisn, $nama)
    {
        $this->db->set('password', $password);
        $this->db->where('nisn', $nisn);
        $this->db->where('nama', $nama);
        return $this->db->update('tb_pendaftar');
    }

    function simpan_registrasi($data)
    {
        return $this->db->insert('tb_pendaftar', $data);
    }
}
