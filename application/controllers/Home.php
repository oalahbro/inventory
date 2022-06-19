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
		if (!$this->session->userdata('levelpenyewa')) {
			$this->load->view('template/home/header_noauth');
		} else {
			$this->load->view('template/home/header', $data['planet']);
		}

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
		if (!$data['planet']) {
			show_404();
		} else {
			$this->load->view('template/home/header', $data['planet']);
			$this->load->view('home/detail', $data);
			$this->load->view('template/home/footer');
		}
		// var_dump($data['planet']['cart']);
	}

	public function test()
	{
		$data['data'] = $this->mymodel->getKategori();
		$this->load->view('test', $data);
	}

	public function addCart()
	{
		if (!$this->session->userdata('levelpenyewa')) {
			$data['error'] =  '<script>
								swal({
								title: "Gagal menambah barang!",
								text: "Silahkan login terlebih dahulu!",
								type: "error"
								}).then(function() {
								window.location = "' . base_url() . 'home/detail?vhid=' . $this->input->post('id_inventory') . '";
								});
								</script>';
			$this->load->view('test', $data);
		} else {
			$data = $this->M_Landing->addCart();
			$data['error'] =  '<script>
								swal({
								title: "Berhasil menambah barang!",
								text: "Silahkan cek kranjang anda!",
								type: "success"
								}).then(function() {
								window.location = "' . base_url() . 'home/detail?vhid=' . $this->input->post('id_inventory') . '";
								});
								</script>';
			$this->load->view('test', $data);
		}
	}

	public function cart()
	{
		$data['planet'] = $this->M_Landing->cart();
		//mengirimkan data ke view
		$this->load->view('template/home/header', $data['planet']);
		$this->load->view('home/cart', $data);
		$this->load->view('template/home/footer');
		// var_dump($data);
	}
}
