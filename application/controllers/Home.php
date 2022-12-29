<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ArtikelModel');
        $this->load->model('DosenModel');
        $this->load->model('AsistenDosenModel');
        $this->load->model('KehadiranDosenModel');
        $this->load->model('KurikulumModel');
    }

    public function index()
    {
        $data['prestasi'] = $this->ArtikelModel->get_new_prestasi();
        $data['berita'] = $this->ArtikelModel->get_new_berita();
        $data['slider'] = $this->ArtikelModel->get_gambar_slider();
        // die(var_dump(uniqid()));
        $data['kurikulum'] = $this->KurikulumModel->get_all_kurikulum_nama_id();
        $k_aktif = $this->KurikulumModel->get_kurikulum_aktif();
        $data['profil'] = $this->KurikulumModel->get_all_active_pl();
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('home/index');
        $this->load->view('templates/home_footer');
    }

    public function berita($request = null)
    {
        if($request != null){
            $data['artikel'] = $this->ArtikelModel->get_all_artikel_by_year($request);
        }else{
            $data['artikel'] = $this->ArtikelModel->get_all_artikel();
        }
        $data['kurikulum'] = $this->KurikulumModel->get_all_kurikulum_nama_id();
        $data['all_kurikulum'] = $this->KurikulumModel->get_all();
        
        $years = $this->ArtikelModel->get_all_artikel();
        $temp_year = null;
        $articleYear = [];
        foreach($years as $year){
            if(date('Y',strtotime($year['tanggal_artikel']))  != $temp_year){
                array_push($articleYear, date('Y',strtotime($year['tanggal_artikel'])));
                $temp_year = date('Y',strtotime($year['tanggal_artikel']));
            }
        }
        $p_years = $this->ArtikelModel->get_all_prestasi();
        $temp_p_year = null;
        $prestasi_year = [];
        foreach($p_years as $p_year){
            if(date('Y',strtotime($p_year['tanggal_artikel']))  != $temp_p_year){
                array_push($prestasi_year, date('Y',strtotime($p_year['tanggal_artikel'])));
                $temp_p_year = date('Y',strtotime($p_year['tanggal_artikel']));
            }
        }
        $data['artikels'] = $articleYear;
        $data['prestasi'] = $prestasi_year;
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('home/berita', $data);
        $this->load->view('templates/home_footer');
    }

    public function berita_detail($id)
    {
        $data['artikel_detail'] = $this->ArtikelModel->get_by_id($id);
        $data['heading'] = 'Detail Berita';
        $data['kurikulum'] = $this->KurikulumModel->get_all_kurikulum_nama_id();
        $data['all_kurikulum'] = $this->KurikulumModel->get_all();
        
        $years = $this->ArtikelModel->get_all_artikel();
        $temp_year = null;
        $articleYear = [];
        foreach($years as $year){
            if(date('Y',strtotime($year['tanggal_artikel']))  != $temp_year){
                array_push($articleYear, date('Y',strtotime($year['tanggal_artikel'])));
                $temp_year = date('Y',strtotime($year['tanggal_artikel']));
            }
        }
        $p_years = $this->ArtikelModel->get_all_prestasi();
        $temp_p_year = null;
        $prestasi_year = [];
        foreach($p_years as $p_year){
            if(date('Y',strtotime($p_year['tanggal_artikel']))  != $temp_p_year){
                array_push($prestasi_year, date('Y',strtotime($p_year['tanggal_artikel'])));
                $temp_p_year = date('Y',strtotime($p_year['tanggal_artikel']));
            }
        }
        $data['artikel'] = $articleYear;
        $data['prestasi'] = $prestasi_year;
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('home/artikel_detail', $data);
        $this->load->view('templates/home_footer');
    }

    public function profil_prodi()
    {
        $data['kurikulum'] = $this->KurikulumModel->get_all_kurikulum_nama_id();
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('home/profil_prodi');
        $this->load->view('templates/home_footer');
    }

    public function kurikulum($id)
    {   
        $data['profil_lulusan'] = $this->KurikulumModel->get_all_pl_by_kur($id);
        $data['capaian_pembelajaran'] = $this->KurikulumModel->get_all_cp_by_kur($id);
        $data['kurikulum_aktif'] = $this->KurikulumModel->get_kurikulum_by_id($id);
        $data['semester'] = $this->KurikulumModel->get_semester_by_id($id);
        $data['all_kurikulum'] = $this->KurikulumModel->get_all();
        $years = $this->ArtikelModel->get_all_artikel();
        $temp_year = null;
        $articleYear = [];
        foreach($years as $year){
            if(date('Y',strtotime($year['tanggal_artikel']))  != $temp_year){
                array_push($articleYear, date('Y',strtotime($year['tanggal_artikel'])));
                $temp_year = date('Y',strtotime($year['tanggal_artikel']));
            }
        }
        $p_years = $this->ArtikelModel->get_all_prestasi();
        $temp_p_year = null;
        $prestasi_year = [];
        foreach($p_years as $p_year){
            if(date('Y',strtotime($p_year['tanggal_artikel']))  != $temp_p_year){
                array_push($prestasi_year, date('Y',strtotime($p_year['tanggal_artikel'])));
                $temp_p_year = date('Y',strtotime($p_year['tanggal_artikel']));
            }
        }
        $data['artikels'] = $articleYear;
        $data['prestasi'] = $prestasi_year;
        $data['kurikulum'] = $this->KurikulumModel->get_all_kurikulum_nama_id();
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('home/kurikulum');
        $this->load->view('templates/home_footer');
    }

    public function kurikulum_lama($id_kurikulum)
    {
        $data['semester'] = $this->KurikulumModel->get_all_semester($id_kurikulum);
        $data['kurikulum'] = $this->KurikulumModel->get_kurikulum_by_id($id_kurikulum);
        $data['kurikulum'] = $this->KurikulumModel->get_all_kurikulum_nama_id();
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('home/kurikulum_lama', $data);
        $this->load->view('templates/home_footer');
    }

    public function prestasi($request = null)
    {

        if($request != null){
            $data['artikel'] = $this->ArtikelModel->get_all_prestasi_by_year($request);
        }else{
            $data['artikel'] = $this->ArtikelModel->get_all_prestasi();
        }
        $data['kurikulum'] = $this->KurikulumModel->get_all_kurikulum_nama_id();
        $data['all_kurikulum'] = $this->KurikulumModel->get_all();
        
        $years = $this->ArtikelModel->get_all_artikel();
        $temp_year = null;
        $articleYear = [];
        foreach($years as $year){
            if(date('Y',strtotime($year['tanggal_artikel']))  != $temp_year){
                array_push($articleYear, date('Y',strtotime($year['tanggal_artikel'])));
                $temp_year = date('Y',strtotime($year['tanggal_artikel']));
            }
        }
        $p_years = $this->ArtikelModel->get_all_prestasi();
        $temp_p_year = null;
        $prestasi_year = [];
        foreach($p_years as $p_year){
            if(date('Y',strtotime($p_year['tanggal_artikel']))  != $temp_p_year){
                array_push($prestasi_year, date('Y',strtotime($p_year['tanggal_artikel'])));
                $temp_p_year = date('Y',strtotime($p_year['tanggal_artikel']));
            }
        }
        $data['artikels'] = $articleYear;
        $data['prestasi'] = $prestasi_year;
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('home/prestasi', $data);
        $this->load->view('templates/home_footer');
    }

    public function prestasi_detail($id)
    {
        $data['artikel_detail'] = $this->ArtikelModel->get_by_id($id);
        $data['heading'] = 'Detail Prestasi';
        $data['kurikulum'] = $this->KurikulumModel->get_all_kurikulum_nama_id();
        $data['all_kurikulum'] = $this->KurikulumModel->get_all();
        
        $years = $this->ArtikelModel->get_all_artikel();
        $temp_year = null;
        $articleYear = [];
        foreach($years as $year){
            if(date('Y',strtotime($year['tanggal_artikel']))  != $temp_year){
                array_push($articleYear, date('Y',strtotime($year['tanggal_artikel'])));
                $temp_year = date('Y',strtotime($year['tanggal_artikel']));
            }
        }
        $p_years = $this->ArtikelModel->get_all_prestasi();
        $temp_p_year = null;
        $prestasi_year = [];
        foreach($p_years as $p_year){
            if(date('Y',strtotime($p_year['tanggal_artikel']))  != $temp_p_year){
                array_push($prestasi_year, date('Y',strtotime($p_year['tanggal_artikel'])));
                $temp_p_year = date('Y',strtotime($p_year['tanggal_artikel']));
            }
        }
        $data['artikels'] = $articleYear;
        $data['prestasi'] = $prestasi_year;
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('home/artikel_detail', $data);
        $this->load->view('templates/home_footer');
    }

    public function profil_dosen()
    {
        $data['dosen'] = $this->DosenModel->get_all();
        $data['kurikulum'] = $this->KurikulumModel->get_all_kurikulum_nama_id();
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('home/profil_dosen', $data);
        $this->load->view('templates/home_footer');
    }

    public function profil_asisten()
    {
        $data['asisten_dosen'] = $this->AsistenDosenModel->get_all();
        $data['kurikulum'] = $this->KurikulumModel->get_all_kurikulum_nama_id();
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('home/profil_asisten', $data);
        $this->load->view('templates/home_footer');
    }

    public function kehadiran_dosen()
    {
        $data['kehadiran_dosen'] = $this->KehadiranDosenModel->get_all();
        $data['kurikulum'] = $this->KurikulumModel->get_all_kurikulum_nama_id();
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('home/kehadiran_dosen', $data);
        $this->load->view('templates/home_footer');
    }

    public function kontak()
    {
        $data['kurikulum'] = $this->KurikulumModel->get_all_kurikulum_nama_id();
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar',$data);
        $this->load->view('home/kontak');
        $this->load->view('templates/home_footer');
    }
}
