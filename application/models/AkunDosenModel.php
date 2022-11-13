<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AkunDosenModel extends CI_Model
{
    public $nama_dosen;
    public $nip_dosen;
    public $password;
    public $level;

    public function get_all()
    {
        return $this->db->query("SELECT * FROM login_dosen")->result();
    }

    public function get_where()
    {
        return $this->db->query("SELECT * FROM dosen d, login_dosen l WHERE d.id_dosen = l.id_dosen")->result();
    }

    public function tambah_akun($data)
    {
        $this->db->insert('login_dosen', $data);
    }

    public function ubah_akun($data)
    {        
        $this->db->update('login_dosen', $data, array('id_login_dosen' =>  $data['id_login_dosen']));
    }

    public function hapus_akun($id)
    {
        return $this->db->delete('login_dosen', array('id_login_dosen' => $id));
    }

}