<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ArtikelModel extends CI_Model
{
    public $judul_artikel;
    public $isi_artikel;
    public $tanggal_artikel;
    public $kategori_artikel;

    public function get_all()
    {
        return $this->db->query("SELECT * FROM artikel ORDER BY tanggal_artikel DESC")->result();
    }

    public function get_new_artikel()
    {
        return $this->db->query("SELECT * FROM artikel ORDER BY tanggal_artikel DESC limit 3")->result();
    }

    public function get_gambar_slider()
    {
        return $this->db->query("SELECT gambar_artikel FROM artikel ORDER BY tanggal_artikel DESC LIMIT 3")->result();
    }

    public function get_all_prestasi()
    {
        return $this->db->query("SELECT * FROM artikel WHERE kategori_artikel = 'Prestasi' ORDER BY tanggal_artikel DESC")->result_array();
    }
    public function get_all_artikel()
    {
        return $this->db->query("SELECT * FROM artikel WHERE kategori_artikel = 'Berita' ORDER BY tanggal_artikel DESC")->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->query("SELECT * FROM artikel WHERE id_artikel = $id")->row();
    }

    public function tambah_artikel($data)
    {
        // $post = $this->input->post();
        // $this->judul_artikel        = $post['judul_artikel'];
        // $this->isi_artikel          = $post['isi_artikel'];
        // $this->kategori_artikel     = $post['kategori_artikel'];
        // $this->gambar_artikel       = $post['gambar_artikel'];
        $this->db->insert('artikel', $data);
    }

    public function ubah_artikel($data)
    {
        // $post = $this->input->post();
        // $this->judul_artikel        = $post['judul_artikel'];
        // $this->isi_artikel          = $post['isi_artikel'];
        // $this->kategori_artikel     = $post['kategori_artikel'];
        // $this->gambar_artikel       = $post['gambar_artikel'];
        $this->db->update('artikel', $data, array('id_artikel' =>  $data['id_artikel']));
    }

    public function hapus_artikel($id)
    {
        return $this->db->delete('artikel', array('id_artikel' => $id));
    }
}
