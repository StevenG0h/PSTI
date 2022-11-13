<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DosenModel extends CI_Model
{
    public $nama_dosen;
    public $nip_dosen;
    public $email_dosen;
    public $kompetensi_dosen;
    public $makul_dosen;
    public $gambar_dosen;

    public function get_all()
    {
        return $this->db->query("SELECT * FROM dosen")->result();
    }

    public function get_all_dosen_not_registered()
    {
        return $this->db->query("SELECT * FROM dosen WHERE id_dosen NOT IN (SELECT id_dosen FROM login_dosen);")->result();
    }

    public function get_by_id($id)
    {
        return $this->db->query("SELECT * FROM dosen WHERE id_dosen = $id")->row();
    }

    public function tambah_dosen($data)
    {
        $this->db->insert('dosen', $data);
    }

    public function ubah_dosen($data)
    {
        $this->db->update('dosen', $data, array('id_dosen' =>  $data['id_dosen']));
    }

    public function hapus_dosen($id)
    {
        return $this->db->delete('dosen', array('id_dosen' => $id));
    }
}
