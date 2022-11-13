<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    // public function index()
    // {
    //     $this->form_validation->set_rules('username', 'Username', 'required|trim');
    //     $this->form_validation->set_rules('password', 'Password', 'required|trim');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/auth_header');
    //         $this->load->view('auth/login');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $username = $this->input->post('username');
    //         $password = $this->input->post('password');

    //         $user = $this->db->get_where('user', ['username' => $username])->row_array();

    //         if ($user) {
    //             if ($password == $user['password']) {
    //                 $data = [
    //                     'username'  => $user['username']
    //                 ];
    //                 $this->session->set_userdata($data);
    //                 redirect('admin/artikel');
    //             } else {
    //                 $this->session->set_flashdata('pesan', '<div class="alert alert-warning
    //                 role="alert">
    //                 Password salah, silahkan ulang</div>');
    //                 redirect('auth');
    //             }
    //         } else {
    //             $this->session->set_flashdata('pesan', '<div class="alert alert-warning
    //             role="alert">
    //             Username salah, silahkan ulang</div>');
    //             redirect('auth');
    //         }
    //     }
    // }
    public function index()
    {
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/dosen_login');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $profil = $this->db->get_where('dosen',['email_dosen'=> $email])->row_array();
            $dsn = $this->db->get_where('login_dosen', ['id_dosen' => $profil['id_dosen']])->row_array();
            if ($profil) {
                if ($password == $dsn['password']) {
                    $data = [
                        'id'=>$profil['id_dosen'],
                        'username'  => $profil['nama_dosen'],
                        'email'=>$profil['email_dosen'],
                        'level'=>$dsn['level']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin/artikel');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning
                    role="alert">
                    Password salah, silahkan ulang</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning
                role="alert">
                Username salah, silahkan ulang</div>');
                redirect('auth');
            }
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('pesan', '<div class="alert alert-info" role="alert">
        Anda sudah keluar</div>');
        redirect('auth');
    }
}
