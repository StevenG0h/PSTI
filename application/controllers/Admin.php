<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('ArtikelModel');
        $this->load->model('DosenModel');
        $this->load->model('AsistenDosenModel');
        $this->load->model('AkunDosenModel');
        $this->load->model('KurikulumModel');
        $this->load->model('KehadiranDosenModel','kehadiran');

        if ($this->session->userdata('username') == null) redirect(site_url('auth'));
    }

    public function artikel()
    {
        $data['judul'] = 'Artikel';

        $data['artikel'] = $this->ArtikelModel->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/artikel', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_artikel()
    {
        if ($this->input->post()) {
            $ext = explode('.', $_FILES["gambar_artikel"]['name']);
            $ext = $ext[count($ext) - 1];
            $new_name = uniqid() . "." . $ext;

            $config['upload_path']          = 'uploads/artikel/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = $new_name;

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            if (!$this->upload->do_upload("gambar_artikel")) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
                return array("status" => false, "error" => $error);
            }

            $data = [
                "judul_artikel"          => $this->input->post('judul_artikel'),
                "isi_artikel"           => $this->input->post('isi_artikel'),
                "kategori_artikel"      => $this->input->post('kategori_artikel'),
                "gambar_artikel"    => $new_name
            ];


            $this->ArtikelModel->tambah_artikel($data);
            redirect('admin/artikel');
        }
    }

    public function ubah_artikel()
    {
        if ($this->input->post()) {
            if ($_FILES['gambar_artikel']['size'] != 0) {
                $gambar = $this->ArtikelModel->get_by_id($this->input->post('id_artikel'));
                if ($gambar->gambar_artikel != null) {
                    unlink('uploads/artikel/' . $gambar->gambar_artikel);
                }
                $ext = explode('.', $_FILES["gambar_artikel"]['name']);
                $ext = $ext[count($ext) - 1];
                $new_name = uniqid() . "." . $ext;

                $config['upload_path']          = 'uploads/artikel/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 2048;
                $config['file_name']            = $new_name;

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if (!$this->upload->do_upload("gambar_artikel")) {
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                    return array("status" => false, "error" => $error);
                }

                $data = [
                    "id_artikel"        => $this->input->post('id_artikel'),
                    "judul_artikel"     => $this->input->post('judul_artikel'),
                    "isi_artikel"       => $this->input->post('isi_artikel'),
                    "kategori_artikel"  => $this->input->post('kategori_artikel'),
                    "gambar_artikel"    => $new_name
                ];
            } else {
                $data = [
                    "id_artikel"        => $this->input->post('id_artikel'),
                    "judul_artikel"     => $this->input->post('judul_artikel'),
                    "isi_artikel"       => $this->input->post('isi_artikel'),
                    "kategori_artikel"  => $this->input->post('kategori_artikel')
                ];
            }
            $this->ArtikelModel->ubah_artikel($data);
            redirect('admin/artikel');
        }
    }

    public function hapus_artikel($id)
    {
        $gambar = $this->ArtikelModel->get_by_id($id);
        unlink('uploads/artikel/' . $gambar->gambar_artikel);
        if ($this->ArtikelModel->hapus_artikel($id)) {
            redirect('admin/artikel');
        }
    }

    public function dosen()
    {
        $data['judul'] = 'Dosen';

        $data['dosen'] = $this->DosenModel->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/dosen', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_dosen()
    {
        if ($this->input->post()) {
            $ext = explode('.', $_FILES["gambar_dosen"]['name']);
            $ext = $ext[count($ext) - 1];
            $new_name = $this->input->post('nip_dosen') . "." . $ext;
            // $new_name = str_replace(" ", "_", $new_name);

            $config['upload_path']          = 'uploads/dosen/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = $new_name;

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            if (!$this->upload->do_upload("gambar_dosen")) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
                return array("status" => false, "error" => $error);
            }

            $data = [
                "nama_dosen"          => $this->input->post('nama_dosen'),
                "inisial_dosen"          => $this->input->post('inisial_dosen'),
                "nip_dosen"           => $this->input->post('nip_dosen'),
                "email_dosen"      => $this->input->post('email_dosen'),
                "kompetensi_dosen"      => $this->input->post('kompetensi_dosen'),
                "makul_dosen"      => $this->input->post('makul_dosen'),
                "gambar_dosen"    => $new_name
            ];


            $this->DosenModel->tambah_dosen($data);
            redirect('admin/dosen');
        }
    }

    public function ubah_dosen()
    {
        if ($this->input->post()) {
            if ($_FILES['gambar_dosen']['size'] != 0) {
                $gambar = $this->DosenModel->get_by_id($this->input->post('id_dosen'));
                if ($gambar->gambar_dosen != null) {
                    unlink('uploads/dosen/' . $gambar->gambar_dosen);
                }
                $ext = explode('.', $_FILES["gambar_dosen"]['name']);
                $ext = $ext[count($ext) - 1];
                $new_name = $this->input->post('nip_dosen') . "." . $ext;
                // $new_name = str_replace(" ", "_", $new_name);

                $config['upload_path']          = 'uploads/dosen/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 2048;
                $config['file_name']            = $new_name;

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if (!$this->upload->do_upload("gambar_dosen")) {
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                    return array("status" => false, "error" => $error);
                }

                $data = [
                    "id_dosen"          => $this->input->post('id_dosen'),
                    "nama_dosen"        => $this->input->post('nama_dosen'),
                    "inisial_dosen"          => $this->input->post('inisial_dosen'),
                    "nip_dosen"         => $this->input->post('nip_dosen'),
                    "email_dosen"       => $this->input->post('email_dosen'),
                    "kompetensi_dosen"  => $this->input->post('kompetensi_dosen'),
                    "makul_dosen"       => $this->input->post('makul_dosen'),
                    "gambar_dosen"      => $new_name
                ];
            } else {
                $data = [
                    "id_dosen"          => $this->input->post('id_dosen'),
                    "nama_dosen"        => $this->input->post('nama_dosen'),
                    "inisial_dosen"          => $this->input->post('inisial_dosen'),
                    "nip_dosen"         => $this->input->post('nip_dosen'),
                    "email_dosen"       => $this->input->post('email_dosen'),
                    "kompetensi_dosen"  => $this->input->post('kompetensi_dosen'),
                    "makul_dosen"       => $this->input->post('makul_dosen')
                ];
            }

            // die(var_dump($data));
            $this->DosenModel->ubah_dosen($data);
            redirect('admin/dosen');
        }
    }

    public function hapus_dosen($id)
    {
        $gambar = $this->DosenModel->get_by_id($id);
        unlink('uploads/dosen/' . $gambar->gambar_dosen);
        if ($this->DosenModel->hapus_dosen($id)) {
            redirect('admin/dosen');
        }
    }

    public function asisten_dosen()
    {
        $data['judul'] = 'Asisten Dosen';

        $data['asisten_dosen'] = $this->AsistenDosenModel->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/asisten_dosen', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_asisten()
    {
        if ($this->input->post()) {
            // $ext = explode('.', $_FILES["gambar_asisten"]['name']);
            // $ext = $ext[count($ext) - 1];
            // $new_name = $this->input->post('nip_dosen') . "." . $ext;
            // $new_name = str_replace(" ", "_", $new_name);

            $config['upload_path']          = 'uploads/ail/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = $_FILES["gambar_asisten"]['name'];

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            if (!$this->upload->do_upload("gambar_asisten")) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
                return array("status" => false, "error" => $error);
            }

            $data = [
                "nama_asisten"          => $this->input->post('nama_asisten'),
                "makul_asisten"           => $this->input->post('makul_asisten'),
                "gambar_asisten"    => $_FILES["gambar_asisten"]['name']
            ];


            $this->AsistenDosenModel->tambah_asisten_dosen($data);
            redirect('admin/asisten_dosen');
        }
    }

    public function ubah_asisten()
    {
        if ($this->input->post()) {
            if ($_FILES['gambar_asisten']['size'] != 0) {
                $gambar = $this->AsistenDosenModel->get_by_id($this->input->post('id_asisten'));
                if ($gambar->gambar_asisten != null) {
                    unlink('uploads/ail/' . $gambar->gambar_asisten);
                }
                // $ext = explode('.', $_FILES["gambar_dosen"]['name']);
                // $ext = $ext[count($ext) - 1];
                // $new_name = $this->input->post('nip_dosen') . "." . $ext;
                // $new_name = str_replace(" ", "_", $new_name);

                $config['upload_path']          = 'uploads/ail/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 2048;
                $config['file_name']            = $_FILES["gambar_asisten"]['name'];

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if (!$this->upload->do_upload("gambar_asisten")) {
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                    return array("status" => false, "error" => $error);
                }

                $data = [
                    "id_asisten"            => $this->input->post('id_asisten'),
                    "nama_asisten"          => $this->input->post('nama_asisten'),
                    "makul_asisten"         => $this->input->post('makul_asisten'),
                    "gambar_asisten"        => $_FILES["gambar_asisten"]['name']
                ];
            } else {
                $data = [
                    "id_asisten"            => $this->input->post('id_asisten'),
                    "nama_asisten"          => $this->input->post('nama_asisten'),
                    "makul_asisten"         => $this->input->post('makul_asisten')
                ];
            }

            // die(var_dump($data));
            $this->AsistenDosenModel->ubah_asisten_dosen($data);
            redirect('admin/asisten_dosen');
        }
    }

    public function hapus_asisten_dosen($id)
    {
        $gambar = $this->AsistenDosenModel->get_by_id($id);
        unlink('uploads/ail/' . $gambar->gambar_asisten);
        if ($this->AsistenDosenModel->hapus_asisten_dosen($id)) {
            redirect('admin/asisten_dosen');
        }
    }

    public function akun_dosen()
    {
        $data['judul'] = 'Akun Dosen';

        $data['dosen'] = $this->DosenModel->get_all_dosen_not_registered();
        $data['akun_dosen'] = $this->AkunDosenModel->get_where();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/akun_dosen', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_akun()
    {
        if ($this->input->post()) {
            $data = [
                "id_dosen" => $this->input->post('id_dosen'),
                "password" => $this->input->post('password'),
                "level"    => $this->input->post('level')
            ];
        }
        $this->AkunDosenModel->tambah_akun($data);
        redirect('admin/akun_dosen');
    }

    public function ubah_akun()
    {
        if ($this->input->post()) {
            $data = [
                "id_login_dosen" => $this->input->post('id_login_dosen'),
                "id_dosen" => $this->input->post('id_dosen'),
                "password" => $this->input->post('password'),
                "level"    => $this->input->post('level')
            ];
        }
        $this->AkunDosenModel->ubah_akun($data);
        redirect('admin/akun_dosen');
    }

    public function hapus_akun($id)
    {
        if ($this->AkunDosenModel->hapus_akun($id)) {
            redirect('admin/akun_dosen');
        }
    }

    public function kurikulum()
    {
        $data['judul'] = 'Kurikulum';

        $data['kurikulum'] = $this->KurikulumModel->get_all();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/kurikulum', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_kurikulum()
    {
        if ($this->input->post()) {
            $ext = explode('.', $_FILES["rincian_kurikulum"]['name']);
            $ext = $ext[count($ext) - 1];
            $new_name = $this->input->post('kurikulum') . "_" . uniqid() . "." . $ext;
            $new_name = str_replace(" ", "_", $new_name);

            $config['upload_path']          = 'uploads/kurikulum/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = $new_name;

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            if (!$this->upload->do_upload("rincian_kurikulum")) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
                return array("status" => false, "error" => $error);
            }

            $data = [
                "id_kurikulum"          => $this->input->post('id_kurikulum'),
                "kurikulum"             => $this->input->post('kurikulum'),
                "rincian_kurikulum"     => $new_name,
                "status"            => $this->input->post('status')
            ];

            $this->KurikulumModel->tambah_kurikulum($data);
            redirect('admin/kurikulum');
        }
    }

    public function ubah_kurikulum()
    {
        if ($this->input->post()) {
            if ($_FILES['rincian_kurikulum']['size'] != 0) {
                $gambar = $this->KurikulumModel->get_kurikulum_by_id($this->input->post('id_kurikulum'));
                if ($gambar->rincian_kurikulum != null) {
                    unlink('uploads/kurikulum/' . $gambar->rincian_kurikulum);
                }
                $ext = explode('.', $_FILES["rincian_kurikulum"]['name']);
                $ext = $ext[count($ext) - 1];
                $new_name = $this->input->post('kurikulum') . "_" . uniqid() . "." . $ext;
                $new_name = str_replace(" ", "_", $new_name);

                $config['upload_path']          = 'uploads/kurikulum/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 2048;
                $config['file_name']            = $new_name;

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if (!$this->upload->do_upload("rincian_kurikulum")) {
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                    return array("status" => false, "error" => $error);
                }

                $data = [
                    "id_kurikulum"            => $this->input->post('id_kurikulum'),
                    "kurikulum"          => $this->input->post('kurikulum'),
                    "rincian_kurikulum"        => $new_name,
                    "status"            => $this->input->post('status')
                ];
            } else {
                $data = [
                    "id_kurikulum"            => $this->input->post('id_kurikulum'),
                    "kurikulum"          => $this->input->post('kurikulum'),
                    "status"            => $this->input->post('status')
                ];
            }

            // die(var_dump($data));
            $this->KurikulumModel->ubah_kurikulum($data);
            redirect('admin/kurikulum');
        }
    }

    public function hapus_kurikulum($id)
    {
        $gambar = $this->KurikulumModel->get_kurikulum_by_id($id);
        unlink('uploads/kurikulum/' . $gambar->rincian_kurikulum);
        if ($this->KurikulumModel->hapus_kurikulum($id)) {
            redirect('admin/kurikulum');
        }
    }

    public function semester($id_kurikulum)
    {
        $data['judul'] = 'Semester';

        $data['semester'] = $this->KurikulumModel->get_all_semester($id_kurikulum);
        $data['id_kurikulum'] = $id_kurikulum;

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/semester', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_semester()
    {
        if ($this->input->post()) {
            $ext = explode('.', $_FILES["file_gambar"]['name']);
            $ext = $ext[count($ext) - 1];
            $new_name = $this->input->post('id_kurikulum') . "_" . $this->input->post('semester') . "_" . uniqid() . "." . $ext;
            $new_name = str_replace(" ", "_", $new_name);

            $config['upload_path']          = 'uploads/semester/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 2048;
            $config['file_name']            = $new_name;

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            if (!$this->upload->do_upload("file_gambar")) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
                return array("status" => false, "error" => $error);
            }

            $data = [
                "id_kurikulum"          => $this->input->post('id_kurikulum'),
                "semester"       => $this->input->post('semester'),
                "file_gambar"    => $new_name
            ];


            $this->KurikulumModel->tambah_semester($data);
            redirect('admin/semester/' . $this->input->post('id_kurikulum'));
        }
    }

    public function ubah_semester()
    {
        if ($this->input->post()) {
            if ($_FILES['file_gambar']['size'] != 0) {
                $gambar = $this->KurikulumModel->get_semester_by_id($this->input->post('id_semester'));
                if ($gambar->file_gambar != null) {
                    unlink('uploads/semester/' . $gambar->file_gambar);
                }
                $ext = explode('.', $_FILES["file_gambar"]['name']);
                $ext = $ext[count($ext) - 1];
                $new_name = $this->input->post('id_kurikulum') . "_" . $this->input->post('semester') . "_" . uniqid() . "." . $ext;
                $new_name = str_replace(" ", "_", $new_name);

                $config['upload_path']          = 'uploads/semester/';
                $config['allowed_types']        = 'jpg|jpeg|png';
                $config['max_size']             = 2048;
                $config['file_name']            = $new_name;

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if (!$this->upload->do_upload("file_gambar")) {
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                    return array("status" => false, "error" => $error);
                }

                $data = [
                    "id_semester"            => $this->input->post('id_semester'),
                    "semester"          => $this->input->post('semester'),
                    "file_gambar"        => $new_name
                ];
            } else {
                $data = [
                    "id_semester"            => $this->input->post('id_semester'),
                    "semester"          => $this->input->post('semester')
                ];
            }

            // die(var_dump($data));
            $this->KurikulumModel->ubah_semester($data);
            redirect('admin/semester/' . $this->input->post('id_kurikulum'));
        }
    }

    public function hapus_semester($id_kurikulum, $id)
    {
        $gambar = $this->KurikulumModel->get_semester_by_id($id);
        unlink('uploads/semester/' . $gambar->file_gambar);
        // die(var_dump($gambar->file_gambar));
        if ($this->KurikulumModel->hapus_semester($id)) {
            redirect('admin/semester/' . $id_kurikulum);
        }
    }

    public function profil_lulusan()
    {
        $data['judul'] = 'Profil Lulusan Teknik Informatika';

        $data['profil_lulusan'] = $this->KurikulumModel->get_all_pl();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/profil_lulusan', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_profil_lulusan()
    {
        if ($this->input->post()) {
            $data = [
                "id_profil_lulusan" => $this->input->post('id_profil_lulusan'),
                "profil_lulusan" => $this->input->post('profil_lulusan'),
                "deskripsi"    => $this->input->post('deskripsi'),
                "kemampuan"    => $this->input->post('kemampuan')
            ];
        }
        $this->KurikulumModel->tambah_profil_lulusan($data);
        redirect('admin/profil_lulusan');
    }

    public function ubah_profil_lulusan()
    {
        if ($this->input->post()) {
            $data = [
                "id_profil_lulusan" => $this->input->post('id_profil_lulusan'),
                "profil_lulusan" => $this->input->post('profil_lulusan'),
                "deskripsi"    => $this->input->post('deskripsi'),
                "kemampuan"    => $this->input->post('kemampuan')
            ];
        }
        $this->KurikulumModel->ubah_profil_lulusan($data);
        redirect('admin/profil_lulusan');
    }

    public function hapus_profil_lulusan($id)
    {
        if ($this->KurikulumModel->hapus_profil_lulusan($id)) {
            redirect('admin/profil_lulusan');
        }
    }

    public function capaian_pembelajaran()
    {
        $data['judul'] = 'Capaian Pembelajaran Teknik Informatika';

        $data['capaian_pembelajaran'] = $this->KurikulumModel->get_all_cp();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/capaian_pembelajaran', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_capaian_pembelajaran()
    {
        if ($this->input->post()) {
            $data = [
                "id_capaian_pembelajaran" => $this->input->post('id_capaian_pembelajaran'),
                "komponen_capaian_pembelajaran" => $this->input->post('komponen_capaian_pembelajaran'),
                "kode"    => $this->input->post('kode'),
                "capaian_pembelajaran_lulusan"    => $this->input->post('capaian_pembelajaran_lulusan')
            ];
        }
        $this->KurikulumModel->tambah_capaian_pembelajaran($data);
        redirect('admin/capaian_pembelajaran');
    }

    public function ubah_capaian_pembelajaran()
    {
        if ($this->input->post()) {
            $data = [
                "id_capaian_pembelajaran" => $this->input->post('id_capaian_pembelajaran'),
                "komponen_capaian_pembelajaran" => $this->input->post('komponen_capaian_pembelajaran'),
                "kode"    => $this->input->post('kode'),
                "capaian_pembelajaran_lulusan"    => $this->input->post('capaian_pembelajaran_lulusan')
            ];
        }
        $this->KurikulumModel->ubah_capaian_pembelajaran($data);
        redirect('admin/capaian_pembelajaran');
    }

    public function hapus_capaian_pembelajaran($id)
    {
        if ($this->KurikulumModel->hapus_capaian_pembelajaran($id)) {
            redirect('admin/capaian_pembelajaran');
        }
    }

    public function kehadiran(){
        $data = $this->kehadiran->get_by_dosen($this->session->userdata('id'));
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/kehadiran', $data);
        $this->load->view('templates/admin_footer', $data);
    }
    public function all_kehadiran_dosen(){
        $data['kehadirans'] = $this->kehadiran->get_all();
        $data['judul'] = "kehadiran semua dosen";
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('admin/all_kehadiran_dosen', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function hadir(){
        $data['id_dosen'] = $this->input->post('id_dosen');
        $data['keterangan'] = $this->input->post('keterangan');
        $this->kehadiran->update_hadir($data);
        redirect('admin/kehadiran');
    }

    public function tidakHadir(){
        $data['id_dosen'] = $this->input->post('id_dosen');
        $data['keterangan'] = $this->input->post('keterangan');
        $this->kehadiran->update_tidak_hadir($data);
        redirect('admin/kehadiran');
    }

}
