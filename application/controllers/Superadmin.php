<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mymodel');
		$this->load->model('mymodel');
		if ($this->session->userdata('level') != 1) {
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		// load library
		// $this->load->library('format_rupiah');
		// load data from model
		// $data = array('planet' => $this->mymodel->getData());
		//mengirimkan data ke view
		$this->load->view('template/admin/header');
		$this->load->view('admin/index');
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function data_barang()
	{
		// $vhid = intval($_GET['vhid']);
		// $this->load->library('format_rupiah');
		// //load data from model
		// $data = array('planet' => $this->mymodel->product_full($vhid));
		//mengirimkan data ke view
		$this->load->view('template/admin/header');
		$this->load->view('admin/data_barang');
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function data_admin()
	{
		$data['admin'] = $this->mymodel->getAdmin();
		//mengirimkan data ke view
		$this->load->view('template/admin/header');
		$this->load->view('admin/data_admin', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function addAdmin()
	{
		$this->mymodel->addAdmin();

		redirect(base_url('superadmin/data_admin'));
	}

	public function editAdmin()
	{
		$this->mymodel->editAdmin();

		redirect(base_url('superadmin/data_admin'));
	}
	public function hapus()
	{
		$id_admin = $this->input->post('id_admin1');
		$this->mymodel->hapus($id_admin);

		redirect(base_url('superadmin/data_admin'));
	}
	public function test()
	{
		$this->load->view('test');
	}
}
