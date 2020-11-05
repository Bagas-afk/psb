<?php

class Pendaftar_Model extends CI_Model
{
    function tampil_data_pendaftar()
    {
        return $this->db->query("SELECT *, tb_pendaftar.id_pendaftar FROM tb_pendaftar LEFT JOIN tb_pembayaran ON tb_pendaftar.id_pendaftar = tb_pembayaran.id_pendaftar LEFT JOIN tb_staff ON tb_pembayaran.id_staff = tb_staff.id_staff INNER JOIN tb_tahun_ajaran ON tb_tahun_ajaran.id_tahun_ajaran = tb_pendaftar.id_tahun_ajaran ORDER BY tb_pendaftar.id_tahun_ajaran DESC");
    }

    function tampil_pendaftar_telah_bayar()
    {
        $this->db->where('status_pembayaran', 'Processing');
        $this->db->or_where('status_pembayaran', 'Diterima');
        return $this->db->query("SELECT *, tb_pendaftar.id_pendaftar FROM tb_pendaftar INNER JOIN tb_pembayaran ON tb_pendaftar.id_pendaftar = tb_pembayaran.id_pendaftar INNER JOIN tb_staff ON tb_staff.id_staff = tb_pembayaran.id_staff");
    }

    function hapus_pendaftar($id_pendaftar)
    {
        return $this->db->delete('tb_pendaftar', ['md5(id_pendaftar)' => $id_pendaftar]);
    }

    function cari_id($id)
    {
        $this->db->where('id_pendaftar', $id);
        return $this->db->get('tb_pendaftar');
    }

    function update_profile($pendaftar, $id)
    {
        $this->db->where('id_pendaftar', $id);
        return $this->db->update('tb_pendaftar', $pendaftar);
    }

    function tampil_jumlah_beasiswa_semua($id_pendaftar)
    {
        $this->db->select('count(id_beasiswa_pendaftar) as jumlah_beasiswa');
        $this->db->where('id_pendaftar', $id_pendaftar);
        return $this->db->get('tb_beasiswa_pendaftar');
    }

    function tampil_jumlah_prestasi_semua($id_pendaftar)
    {
        $this->db->select('count(id_prestasi_pendaftar) as jumlah_prestasi');
        $this->db->where('id_pendaftar', $id_pendaftar);
        return $this->db->get('tb_prestasi_pendaftar');
    }

    function tampil_beasiswa_pendaftar($id_pendaftar)
    {
        $this->db->join('tb_beasiswa_pendaftar', 'tb_beasiswa_pendaftar.id_pendaftar = tb_pendaftar.id_pendaftar', 'inner');
        $this->db->where('md5(tb_pendaftar.id_pendaftar)', $id_pendaftar);
        return $this->db->get('tb_pendaftar');
    }

    function tampil_prestasi_pendaftar($id_pendaftar)
    {
        $this->db->join('tb_prestasi_pendaftar', 'tb_prestasi_pendaftar.id_pendaftar = tb_pendaftar.id_pendaftar', 'inner');
        $this->db->where('md5(tb_pendaftar.id_pendaftar)', $id_pendaftar);
        return $this->db->get('tb_pendaftar');
    }

    function tampil_pengasuh_pendaftar($id_pendaftar)
    {
        $this->db->join('tb_pengasuh_pendaftar', 'tb_pengasuh_pendaftar.id_pendaftar = tb_pendaftar.id_pendaftar', 'inner');
        $this->db->where('md5(tb_pendaftar.id_pendaftar)', $id_pendaftar);
        return $this->db->get('tb_pendaftar');
    }

    function tampil_pengasuh_ayah($id_pendaftar)
    {
        $this->db->join('tb_pengasuh_pendaftar', 'tb_pengasuh_pendaftar.id_pendaftar = tb_pendaftar.id_pendaftar', 'inner');
        $this->db->where('keterangan', 'Ayah');
        $this->db->where('md5(tb_pendaftar.id_pendaftar)', $id_pendaftar);
        return $this->db->get('tb_pendaftar');
    }

    function tampil_pengasuh_ibu($id_pendaftar)
    {
        $this->db->join('tb_pengasuh_pendaftar', 'tb_pengasuh_pendaftar.id_pendaftar = tb_pendaftar.id_pendaftar', 'inner');
        $this->db->where('keterangan', 'Ibu');
        $this->db->where('md5(tb_pendaftar.id_pendaftar)', $id_pendaftar);
        return $this->db->get('tb_pendaftar');
    }

    function tampil_pengasuh_wali($id_pendaftar)
    {
        $this->db->join('tb_pengasuh_pendaftar', 'tb_pengasuh_pendaftar.id_pendaftar = tb_pendaftar.id_pendaftar', 'inner');
        $this->db->where('keterangan', 'Wali');
        $this->db->where('md5(tb_pendaftar.id_pendaftar)', $id_pendaftar);
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
        $this->db->where('nama_pendaftar', $nama);
        return $this->db->update('tb_pendaftar');
    }

    function simpan_registrasi($data)
    {
        return $this->db->insert('tb_pendaftar', $data);
    }

    function hapus_prestasi($id_prestasi)
    {
        $this->db->where('id_prestasi_pendaftar', $id_prestasi);
        return $this->db->delete('tb_prestasi_pendaftar');
    }

    function hapus_beasiswa($id_beasiswa)
    {
        $this->db->where('id_beasiswa_pendaftar', $id_beasiswa);
        return $this->db->delete('tb_beasiswa_pendaftar');
    }

    function tampil_pendaftar_pertahun($id_tahun_ajaran)
    {
        $this->db->where('status_pembayaran', 'Diterima');
        $this->db->where('id_tahun_ajaran', $id_tahun_ajaran);
        return $this->db->get('tb_pendaftar');
    }

    function simpan_prestasi_pendaftar($data)
    {
        $this->db->insert('tb_prestasi_pendaftar', $data);
    }

    function update_prestasi_pendaftar($data, $id_prestasi_pendaftar, $id_pendaftar)
    {
        $this->db->where('id_pendaftar', $id_pendaftar);
        $this->db->where('id_prestasi_pendaftar', $id_prestasi_pendaftar);
        $this->db->update('tb_prestasi_pendaftar', $data);
    }

    function simpan_beasiswa_pendaftar($data)
    {
        $this->db->insert('tb_beasiswa_pendaftar', $data);
    }

    function update_beasiswa_pendaftar($data, $id_beasiswa_pendaftar, $id_pendaftar)
    {
        $this->db->where('id_pendaftar', $id_pendaftar);
        $this->db->where('id_beasiswa_pendaftar', $id_beasiswa_pendaftar);
        $this->db->update('tb_beasiswa_pendaftar', $data);
    }

    function simpan_pengasuh_pendaftar($data)
    {
        $this->db->insert('tb_pengasuh_pendaftar', $data);
    }

    function update_pengasuh_pendaftar($data, $id_pengasuh_pendaftar, $id_pendaftar)
    {
        $this->db->where('id_pendaftar', $id_pendaftar);
        $this->db->where('id_pengasuh_pendaftar', $id_pengasuh_pendaftar);
        $this->db->update('tb_pengasuh_pendaftar', $data);
    }
}
