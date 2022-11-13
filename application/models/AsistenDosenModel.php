<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AsistenDosenModel extends CI_Model
{
    public $nama_asisten;
    public $makul_asisten;
    public $gambar_asisten;

    public function get_all()
    {
        return $this->db->query("SELECT * FROM asisten_dosen")->result();
    }

    public function get_by_id($id)
    {
        return $this->db->query("SELECT * FROM asisten_dosen WHERE id_asisten = $id")->row();
    }

    public function tambah_asisten_dosen($data)
    {
        // $post = $this->input->post();
        // $this->nama_asisten       = $post['nama_asisten'];
        // $this->makul_asisten      = $post['makul_asisten'];
        // $this->gambar_asisten     = $post['gambar_asisten'];
        $this->db->insert('asisten_dosen', $data);
    }

    public function ubah_asisten_dosen($data)
    {
        // $post = $this->input->post();
        // $this->nama_asisten       = $post['nama_asisten'];
        // $this->makul_asisten      = $post['makul_asisten'];
        // $this->gambar_asisten     = $post['gambar_asisten'];
        $this->db->update('asisten_dosen', $data, array('id_asisten' =>  $data['id_asisten']));
    }

    public function hapus_asisten_dosen($id)
    {
        return $this->db->delete('asisten_dosen', array('id_asisten' => $id));
    }
}
