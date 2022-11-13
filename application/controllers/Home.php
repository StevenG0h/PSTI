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
        $data['artikel'] = $this->ArtikelModel->get_new_artikel();
        $data['slider'] = $this->ArtikelModel->get_gambar_slider();
        // die(var_dump(uniqid()));
        
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar');
        $this->load->view('home/index', $data);
        $this->load->view('templates/home_footer');
    }

    public function berita()
    {
        $data['artikel'] = $this->ArtikelModel->get_all();

        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar');
        $this->load->view('home/berita', $data);
        $this->load->view('templates/home_footer');
    }

    public function berita_detail($id)
    {
        $data['artikel_detail'] = $this->ArtikelModel->get_by_id($id);
        $data['heading'] = 'Detail Berita';

        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar');
        $this->load->view('home/artikel_detail', $data);
        $this->load->view('templates/home_footer');
    }

    public function profil_prodi()
    {
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar');
        $this->load->view('home/profil_prodi');
        $this->load->view('templates/home_footer');
    }

    public function kurikulum()
    {
        $data['profil_lulusan'] = $this->KurikulumModel->get_all_pl();
        $data['capaian_pembelajaran'] = $this->KurikulumModel->get_all_cp();
        $data['kurikulum_aktif'] = $this->KurikulumModel->get_kurikulum_aktif();
        $data['semester'] = $this->KurikulumModel->get_semester_by_kurikulum_aktif();
        $data['kurikulum_tidak_aktif'] = $this->KurikulumModel->get_kurikulum_tidak_aktif();

        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar');
        $this->load->view('home/kurikulum', $data);
        $this->load->view('templates/home_footer');
    }

    public function kurikulum_lama($id_kurikulum)
    {
        $data['semester'] = $this->KurikulumModel->get_all_semester($id_kurikulum);
        $data['kurikulum'] = $this->KurikulumModel->get_kurikulum_by_id($id_kurikulum);

        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar');
        $this->load->view('home/kurikulum_lama', $data);
        $this->load->view('templates/home_footer');
    }

    public function prestasi()
    {
        $data['artikel'] = $this->ArtikelModel->get_all_prestasi();

        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar');
        $this->load->view('home/prestasi', $data);
        $this->load->view('templates/home_footer');
    }

    public function prestasi_detail($id)
    {
        $data['artikel_detail'] = $this->ArtikelModel->get_by_id($id);
        $data['heading'] = 'Detail Prestasi';

        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar');
        $this->load->view('home/artikel_detail', $data);
        $this->load->view('templates/home_footer');
    }

    public function profil_dosen()
    {
        $data['dosen'] = $this->DosenModel->get_all();

        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar');
        $this->load->view('home/profil_dosen', $data);
        $this->load->view('templates/home_footer');
    }

    public function profil_asisten()
    {
        $data['asisten_dosen'] = $this->AsistenDosenModel->get_all();

        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar');
        $this->load->view('home/profil_asisten', $data);
        $this->load->view('templates/home_footer');
    }

    public function kehadiran_dosen()
    {
        $data['kehadiran_dosen'] = $this->KehadiranDosenModel->get_all();

        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar');
        $this->load->view('home/kehadiran_dosen', $data);
        $this->load->view('templates/home_footer');
    }

    public function kontak()
    {
        $this->load->view('templates/home_header');
        $this->load->view('templates/home_navbar');
        $this->load->view('home/kontak');
        $this->load->view('templates/home_footer');
    }
}
