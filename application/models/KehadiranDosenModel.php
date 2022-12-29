<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KehadiranDosenModel extends CI_Model
{
    protected $now;

    public function __construct()
    {
		date_default_timezone_set('Asia/Jakarta');
        $this->now = date('Y-m-d H:i:s');
    }

    public function get_all()
    {
        return $this->db->query("SELECT * FROM kehadiran_dosen k, dosen d WHERE k.id_dosen=d.id_dosen ORDER BY d.nama_dosen")->result();
    }

    public function get_all_union($id_dosen)
    {
        return $this->db->query("SELECT * FROM kehadiran_dosen, dosen WHERE kehadiran_dosen.id_dosen = dosen.id_dosen AND dosen.id_dosen = $id_dosen
        UNION
        SELECT * FROM kehadiran_dosen, dosen WHERE kehadiran_dosen.id_dosen = dosen.id_dosen AND dosen.id_dosen != $id_dosen")->result();
    }

    public function get_all_by_id($id_dosen)
    {
        return $this->db->query("SELECT * FROM kehadiran_dosen k, dosen d WHERE k.id_dosen=d.id_dosen AND k.id_dosen != $id_dosen")->result();
    }

    public function get_all_order_by_aktif()
    {
        return $this->db->query("SELECT * FROM kehadiran_dosen k, dosen d WHERE k.id_dosen=d.id_dosen ORDER BY k.status ASC")->result();
    }

    public function get_by_dosen($id_dosen)
    {
        return $this->db->query("SELECT * FROM kehadiran_dosen k, dosen d WHERE k.id_dosen=d.id_dosen AND k.id_dosen=$id_dosen")->row();
    }

    public function get_where($nip, $password)
    {
        return $this->db->query("SELECT * FROM dosen d, login_dosen l WHERE d.id_dosen = l.id_dosen AND d.nip_dosen = '$nip' AND l.password = '$password'")->row();
    }

    public function update_hadir($data)
    {
        $this->db->query("UPDATE kehadiran_dosen SET status = 'Hadir', keterangan = '$data[keterangan]', last_updated = '$this->now' WHERE id_dosen = '$data[id_dosen]'");
    }
    public function update_hadir_status($data)
    {
        var_dump($this->db->query("UPDATE kehadiran_dosen SET status = '$data[status]', last_updated = '$this->now' WHERE id_dosen = '$data[id_dosen]'"));
        
    }
    public function update_hadir_keterangan($data)
    {
        $this->db->query("UPDATE kehadiran_dosen SET keterangan = '$data[keterangan]', last_updated = '$this->now' WHERE id_dosen = '$data[id_dosen]'");
    }

    public function update_tidak_hadir($data)
    {
        $this->db->query("UPDATE kehadiran_dosen SET status = 'Tidak Hadir', keterangan = '$data[keterangan]', last_updated = '$this->now' WHERE id_dosen = '$data[id_dosen]'");
    }
}