<?php

use function PHPUnit\Framework\callback;

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
            redirect(base_url());
        }
        if ($this->session->userdata('levelpenyewa') == 2) {
            redirect(base_url());
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
                    'levelpenyewa' => $cariDatapenyewa[0]['level'],
                    'id_penyewa' => $cariDatapenyewa[0]['id_penyewa']
                ];
                $this->session->set_userdata($data_session);

                redirect(base_url());
            } else {
                // $error['danger'] = "";
                echo 'gagal';
            }
        } else {
            redirect(base_url("login"));
        }
    }

    public  function register()
    {
        $this->load->view('register');
    }

    public  function signup()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('telp', 'telp', 'required|regex_match[/^(^\+62|62|^08)(\d{3,4}-?){2}\d{3,4}$/]');
        $this->form_validation->set_rules('no_identitas', 'no_identitas', 'required|min_length[3]');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[5]|matches[cpassword]');
        $this->form_validation->set_rules('cPassword', 'password', 'required|min_length[5]');
        if ($this->form_validation->run() != false) {
            $cariDatapenyewa = $this->Loginmodel->cekPenyewa();
            $cek = $this->Loginmodel->resgister();
        } else {
            $this->load->view('register');
        }
    }

    public  function logout()
    {
        $this->session->sess_destroy();
        $this->index();
    }
}
