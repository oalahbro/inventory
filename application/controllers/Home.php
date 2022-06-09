<?php

use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Stmt\Echo_;

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
		$this->load->model('M_Landing');
	}

	public function index()
	{
		// load data from model
		$data = array(
			'planet' => $this->M_Landing->getData(),
			'title' => 'All Inventory'
		);
		//mengirimkan data ke view
		$this->load->view('template/home/header');
		$this->load->view('home/home', $data);
		$this->load->view('template/home/footer');
		// var_dump($data);
	}

	public function ruang()
	{
		// load data from model
		$data = array(
			'planet' => $this->M_Landing->getRuang(),
			'title' => 'Ruang'
		);
		//mengirimkan data ke view
		$this->load->view('template/home/header');
		$this->load->view('home/home', $data);
		$this->load->view('template/home/footer');
		// var_dump($data);
	}

	public function barang()
	{
		// load data from model
		$data = array(
			'planet' => $this->M_Landing->getBarang(),
			'title' => 'Barang'
		);
		//mengirimkan data ke view
		$this->load->view('template/home/header');
		$this->load->view('home/home', $data);
		$this->load->view('template/home/footer');
		// var_dump($data);
	}

	public function detail()
	{
		$vhid = intval($_GET['vhid']);
		$this->load->library('format_rupiah');
		//load data from model
		$data = array('planet' => $this->M_Landing->product_full($vhid));
		//mengirimkan data ke view
		$this->load->view('template/home/header');
		$this->load->view('home/detail', $data);
		$this->load->view('template/home/footer');
		// var_dump($data);
	}

	public function test()
	{
		$data['data'] = $this->mymodel->getKategori();
		$this->load->view('test', $data);
	}
}
