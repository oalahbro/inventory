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
    public  function indexx()
    {
        if (!$this->session->userdata('level') && !$this->session->userdata('levelpenyewa')) {
            $this->load->view('login');
        }
        if ($this->session->userdata('level') == 1) {
            redirect(base_url("superadmin"));
        }
        if ($this->session->userdata('level') == 2) {
            redirect(base_url("admin"));
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
                    redirect(base_url("admin"));
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
                $data['error'] =  '<script>
								swal({
								title: "Gagal Login!",
								text: "Username atau Password salah!",
								type: "error"
								}).then(function() {
								window.location = "' . base_url() . 'login";
								});
								</script>';
                $this->load->view('test', $data);
                // var_dump(md5($this->input->post('password')));
            }
        } else {
            redirect(base_url("login"));
        }
    }

    public  function register()
    {
        $this->load->view('register');
    }
    public  function forgot()
    {
        $this->load->view('lupapass');
    }
    public  function send()
    {
        $sql = "SELECT * FROM penyewa where telp =" . $this->input->post('telp');
        $email =  $this->db->query($sql)->result_array();
        if (!$email) {
            $data['error'] =  '<script>
								swal({
								title: "Nomor telp tidak cocok dengan user manapun!",
								text: "Silahkan hubungi administrator!",
								type: "error"
								}).then(function() {
								window.location = "' . base_url() . 'login";
								});
								</script>';
            $this->load->view('test', $data);
        } else {
            $otp = ['otp' => (rand(100, 999)) . (rand(100, 999))];

            $this->session->set_userdata($otp);
            $url = 'http://127.0.0.1:3000/otp';
            $datawa = [
                'pesan' => 'Kode Otp anda ' . $otp['otp'],
                'nomer' => $this->input->post('telp')
            ];
            $options = array(
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($datawa)
                )
            );
            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            if ($result === FALSE) {
            } else {
                $data = [
                    'telp' => $this->input->post('telp'),
                    'email' => $email[0]['email']
                ];
                $this->load->view('otp', $data);
                // var_dump($data);
            }
        }
    }

    public function konf()
    {
        $otp = $this->input->post();
        $impl = substr(implode('', $otp), -6);
        if ($impl == $this->session->userdata('otp')) {
            $data = [
                'email' => $this->input->post('email')
            ];
            $this->load->view('gantipass', $data);
        } else {
            $data['error'] =  '<script>
								swal({
								title: "Code OTP Salah silahkan masukkan kembali",
								text: "atau hubungi administrator!",
								type: "error"
								}).then(function() {
								window.location = "' . base_url() . 'login";
								});
								</script>';
            $this->load->view('test', $data);
        }
    }

    public  function ganti()
    {
        $data = [
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        ];

        $result =  $this->db->where(array(
            'email' => $data['email']
        ));
        $this->db->update('penyewa', $data);
        // return $result;

        $dat['error'] =  '<script>
								swal({
								title: "Password berhasil diganti",
								text: "Silahkan Login menggunakan password baru!",
								type: "success"
								}).then(function() {
								window.location = "' . base_url() . 'login";
								});
								</script>';
        $this->load->view('test', $dat);
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

    // public  function logout()
    // {
    //     $this->session->sess_destroy();
    //     $this->index();
    // }

    public function index()
    {
        if (!$this->session->userdata('level') && !$this->session->userdata('levelpenyewa')) {
            include_once APPPATH . "../vendor/autoload.php";
            $google_client = new Google_Client();
            $google_client->setClientId('315049808973-0n11j2cr3qc9fdva4cuhd0gs6on9tlj3.apps.googleusercontent.com'); //masukkan ClientID anda 
            $google_client->setClientSecret('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'); //masukkan Client Secret Key anda
            $google_client->setRedirectUri(base_url() . 'login'); //Masukkan Redirect Uri anda
            $google_client->addScope('email');
            $google_client->addScope('profile');

            if (isset($_GET["code"])) {
                $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
                if (!isset($token["error"])) {
                    $google_client->setAccessToken($token['access_token']);
                    $this->session->set_userdata('access_token', $token['access_token']);
                    $google_service = new Google_Service_Oauth2($google_client);
                    $data = $google_service->userinfo->get();
                    $current_datetime = date('Y-m-d H:i:s');
                    $user_data = array(
                        'first_name' => $data['given_name'],
                        'last_name'  => $data['family_name'],
                        'email_address' => $data['email'],
                        'profile_picture' => $data['picture'],
                        'updated_at' => $current_datetime
                    );
                    $this->session->set_userdata('user_data', $data);
                }
            }
            $setuser = $this->session->userdata('user_data');
            $goole = $this->Loginmodel->cekGoogle($setuser);
            $login_button = '';
            if (!$this->session->userdata('access_token')) {

                $login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';
                $data['login_button'] = $login_button;
                $this->load->view('login-penyewa', $data);
            } else {
                // echo json_encode($this->session->userdata('access_token'));
                // echo json_encode($this->session->userdata('user_data'), true);

                if (!$goole) {
                    $this->Loginmodel->registerGoogle($data);
                    $cek = $this->Loginmodel->cekGoogle($setuser);
                    $data_session = [
                        'email' => $cek[0]['email'],
                        'status' => "login",
                        'levelpenyewa' => $cek[0]['level'],
                        'id_penyewa' => $cek[0]['id_penyewa']
                    ];
                    $this->session->set_userdata($data_session);
                    redirect(base_url());
                    // var_dump($cek);
                } else {
                    $data_session = [
                        'email' => $goole[0]['email'],
                        'status' => "login",
                        'levelpenyewa' => $goole[0]['level'],
                        'id_penyewa' => $goole[0]['id_penyewa']
                    ];
                    $this->session->set_userdata($data_session);
                    redirect(base_url());
                }
                // var_dump($data);
            }
        } else {
            if ($this->session->userdata('level') == 1) {
                redirect(base_url("superadmin"));
            }
            if ($this->session->userdata('level') == 2) {
                redirect(base_url("admin"));
            }
            if ($this->session->userdata('levelpenyewa') == 1) {
                redirect(base_url());
            }
            if ($this->session->userdata('levelpenyewa') == 2) {
                redirect(base_url());
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('user_data');
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function cekses()
    {
        $cek = $this->session->userdata();
        var_dump($cek);
        // echo "Logout berhasil";
    }
}
