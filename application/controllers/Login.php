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
        if (!$this->session->userdata('level')) {
            $this->load->view('login');
        }
        if ($this->session->userdata('level') == 1) {
            // return header('location:/inventory/admin');
            echo "sudah login";
        }
        if ($this->session->userdata('level') == 2) {
            return header("location:/admin/admin");
        }
        if ($this->session->userdata('level') == 3) {
            return header("location:/siswa/siswa");
        }
        if ($this->session->userdata('level') == 4) {
            return header("location:/user/user");
        }
    }

    public  function auth()
    {
        if (!$this->session->userdata('userdata')) {

            $cariData = $this->Loginmodel->cek();
            if ($cariData) {
                $data_session = [
                    'username' => $cariData[0]['username'],
                    'status' => "login",
                    'level' => $cariData[0]['level']
                ];
                $this->session->set_userdata($data_session);
                echo 'berhasil login';
                if ($cariData[0]['level'] == 1) {
                    return header('location:/inventory/admin');
                }
                if ($cariData[0]['level'] == 2) {
                    return header('location:/superadmin/superadmin');
                }
                if ($cariData[0]['level'] == 3) {
                    return header('location:/siswa/siswa');
                }
                if ($cariData[0]['level'] == 4) {
                    return header('location:/user/user');
                }
            } else {
                // $error['danger'] = "";
                echo 'gagal';
            }
        }
    }
    public  function register()
    {
        $this->load->view('register');
    }

    public  function logout()
    {
        $this->session->sess_destroy();
        $this->index();
    }
}
