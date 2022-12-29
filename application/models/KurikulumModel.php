<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KurikulumModel extends CI_Model
{
    public $kurikulum;

    public function get_all()
    {
        return $this->db->query("SELECT * FROM kurikulum")->result();
    }
    public function get_all_kurikulum_nama_id()
    {
        return $this->db->query("SELECT id_kurikulum,kurikulum FROM kurikulum")->result();
    }
    
    public function get_kurikulum_by_id($id_kurikulum)
    {
        return $this->db->query("SELECT * FROM kurikulum WHERE id_kurikulum = $id_kurikulum")->row();
    }

    public function get_semester_by_kurikulum_aktif()
    {
        return $this->db->query("SELECT * FROM kurikulum k, semester s
        WHERE k.id_kurikulum = s.id_kurikulum 
        AND k.status = 1
        ORDER BY s.semester ASC")->result();
    }

    public function get_kurikulum_tidak_aktif()
    {
        return $this->db->query("SELECT * FROM kurikulum WHERE status = 0")->result();
    }

    public function get_kurikulum_aktif()
    {
        return $this->db->query("SELECT * FROM kurikulum WHERE status = 1")->row();
    }

    public function tambah_kurikulum($data)
    {
        $this->db->insert('kurikulum', $data);
    }

    public function ubah_kurikulum($data)
    {
        $this->db->update('kurikulum', $data, array('id_kurikulum' =>  $data['id_kurikulum']));
    }

    public function hapus_kurikulum($id)
    {
        // return $this->db->delete('kurikulum', array('id_kurikulum' => $id));
        $semester = $this->get_all_semester($id);
        foreach ($semester as $key => $value) {
            unlink('uploads/semester/'.$value->file_gambar);
        }
        $query1 = $this->db->query("DELETE FROM semester WHERE id_kurikulum = $id");
        $query2 = $this->db->query("DELETE FROM kurikulum WHERE id_kurikulum = $id");

        return $query1 && $query2;
    }

    public function get_all_semester($id_kurikulum)
    {
        return $this->db->query("SELECT * FROM semester WHERE id_kurikulum = $id_kurikulum")->result();
    }

    public function tambah_semester($data)
    {
        $this->db->insert('semester', $data);
    }

    public function ubah_semester($data)
    {
        $this->db->update('semester', $data, array('id_semester' =>  $data['id_semester']));
    }

    public function get_semester_by_id($id_semester)
    {
        return $this->db->query("SELECT * FROM semester WHERE id_kurikulum = $id_semester")->result();
    }

    public function hapus_semester($id)
    {
        return $this->db->delete('semester', array('id_semester' => $id));
    }

    public function get_all_pl_by_kur($id)
    {
        return $this->db->query("SELECT * FROM profil_lulusan where kode_kurikulum = $id")->result();
    }
    public function get_all_active_pl()
    {
        return $this->db->query("SELECT * FROM profil_lulusan where tampilkan = 1")->result();
    }
    public function get_all_pl()
    {
        return $this->db->query("SELECT * FROM profil_lulusan")->result();
    }

    public function get_pl_by_id($id)
    {
        return $this->db->query("SELECT * FROM profil_lulusan where id_profil_lulusan = $id")->result();
    }

    public function tambah_profil_lulusan($data)
    {
        $this->db->insert('profil_lulusan', $data);
    }

    public function ubah_profil_lulusan($data)
    {        
        $this->db->update('profil_lulusan', $data, array('id_profil_lulusan' =>  $data['id_profil_lulusan']));
    }

    public function hapus_profil_lulusan($id)
    {
        return $this->db->delete('profil_lulusan', array('id_profil_lulusan' => $id));
    }

    public function get_all_cp()
    {
        return $this->db->query("SELECT * FROM capaian_pembelajaran")->result();
    }
    public function get_all_cp_by_kur($id)
    {
        return $this->db->query("SELECT * FROM capaian_pembelajaran where kode_kurikulum = $id")->result();
    }

    public function tambah_capaian_pembelajaran($data)
    {
        $this->db->insert('capaian_pembelajaran', $data);
    }

    public function ubah_capaian_pembelajaran($data)
    {        
        $this->db->update('capaian_pembelajaran', $data, array('id_capaian_pembelajaran' =>  $data['id_capaian_pembelajaran']));
    }

    public function hapus_capaian_pembelajaran($id)
    {
        return $this->db->delete('capaian_pembelajaran', array('id_capaian_pembelajaran' => $id));
    }
}
