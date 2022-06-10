<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Loginmodel');
    }
    public  function index()
    {
        if (!$this->session->userdata('level') && !$this->session->userdata('levelpenyewa')) {
            $this->load->view('login');
        }
        if ($this->session->userdata('level') == 1) {
            redirect(base_url("superadmin"));
        }
        if ($this->session->userdata('level') == 2) {
            redirect(base_url("beranda"));
        }
        if ($this->session->userdata('levelpenyewa') == 1) {
            echo "penyewa 1";
        }
        if ($this->session->userdata('levelpenyewa') == 2) {
            echo "penyewa 2";
        }
    }

    public  function auth()
    {
        if (!$this->session->userdata('level') && !$this->session->userdata('levelpenyewa')) {
            $cariDatapenyewa = $this->Loginmodel->cekPenyewa();
            $cariDataadmin = $this->Loginmodel->cek();

            if ($cariDataadmin && $cariDataadmin[0]['status'] == 1) {
                $data_session = [
                    'username' => $cariDataadmin[0]['username'],
                    'status' => "login",
                    'level' => $cariDataadmin[0]['level'],
                    'id_admin' => $cariDataadmin[0]['id_admin']
                ];
                $this->session->set_userdata($data_session);

                if ($cariDataadmin[0]['level'] == 1) {
                    redirect(base_url("superadmin"));
                }
                if ($cariDataadmin[0]['level'] == 2) {
                    redirect(base_url("beranda"));
                }
            } else if ($cariDatapenyewa) {
                $data_session = [
                    'email' => $cariDatapenyewa[0]['email'],
                    'status' => "login",
                    'levelpenyewa' => $cariDatapenyewa[0]['level']
                ];
                $this->session->set_userdata($data_session);

                echo "user";
            } else {
                // $error['danger'] = "";
                echo 'gagal';
            }
        } else {
            $this->index();
        }
    }

    public  function register()
    {
        $this->load->view('register');
    }

    public  function signup()
    {
        $cariDatapenyewa = $this->Loginmodel->cekPenyewa();
        $cek = $this->Loginmodel->resgister();
        var_dump($cek);
    }

    public  function logout()
    {
        $this->session->sess_destroy();
        $this->index();
    }
}
