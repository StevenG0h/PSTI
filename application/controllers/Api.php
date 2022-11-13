<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->model("KehadiranDosenModel");
    }

    function getKehadiranDosen() 
    {
        header("Access-Control-Allow-Origin: *");
        $data = $this->KehadiranDosenModel->get_all();
        $this->output->set_content_type('application/json')->set_output(json_encode(["status" => "success", "data" => $data]));
    }

    function getKehadiranDosenUnion($id_dosen) 
    {
        header("Access-Control-Allow-Origin: *");        
        $data = $this->KehadiranDosenModel->get_all_by_id($id_dosen);
        $this->output->set_content_type('application/json')->set_output(json_encode(["status" => "success", "data" => $data]));
    }
    
    function getKehadiranDosenbyDosen($id_dosen)
    {
        header("Access-Control-Allow-Origin: *");
        if ($id_dosen != null) {
            $data = $this->KehadiranDosenModel->get_by_dosen($id_dosen);
            if ($data != null) {
                $response = array(
                    'status' => 'success',
                    'data' => $data
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'data' => null
                );
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    function getKehadiranDosenLogin($id_dosen)
    {
        header("Access-Control-Allow-Origin: *");
        if ($id_dosen != null) {
            $data = $this->KehadiranDosenModel->get_by_dosen($id_dosen);
            if ($data != null) {
                $response = array(
                    'status' => 'success',
                    'data' => [$data]
                );
            } else {
                $response = array(
                    'status' => 'error',
                    'data' => null
                );
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    function getLoginDosen($nip, $password)
    {
        header("Access-Control-Allow-Origin: *");
        $data = $this->KehadiranDosenModel->get_where($nip, $password);
        if ($data != null) {
            $response = array(
                'status' => 'success',
                'data' => $data
            );
        } else {
            $data = array(
                "id_dosen" => "-1",
                "nama_dosen" => "error",
                "inisial_dosen" => "error",
                "nip_dosen" => "error",
                "email_dosen" => "error",
                "kompetensi_dosen" => "error",
                "makul_dosen" => "error",
                "gambar_dosen" => "error",
                "id_login_dosen" => "error",
                "password" => "error",
                "level" => "error"
            );
            $response = array(
                'status' => 'success',
                'data' => $data
            );
        } 
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    
    function updateDosenHadir()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");

        $formdata = json_decode(file_get_contents('php://input'), true);

        if (!empty($formdata)) {
            $this->KehadiranDosenModel->update_hadir($formdata);

            $response = array(
                'status' => 'success',
                'message' => 'Data berhasil diubah'
            );
        } else    $response = array('status' => 'error' ,'message' => 'Data gagal diubah');

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    function updateDosenTidakHadir()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");

        $formdata = json_decode(file_get_contents('php://input'), true);

        if (!empty($formdata)) {
            $this->KehadiranDosenModel->update_tidak_hadir($formdata);

            $response = array(
                'status' => 'success',
                'message' => 'Data berhasil diubah'
            );
        } else    $response = array('status' => 'error' ,'message' => 'Data gagal diubah');

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}