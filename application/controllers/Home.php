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
			'barang' => $this->M_Landing->getBarang(),
			'ruang' => $this->M_Landing->getRuang(),
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
			if (!$this->session->userdata('levelpenyewa')) {
				$this->load->view('template/home/header_noauth');
			} else {
				$this->load->view('template/home/header', $data['planet']);
			}
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
		$post = $this->M_Landing->cart();
		if (!$post['result']) {
		} else {
			foreach ($post['result'] as $P) {
				$cek = $this->M_Landing->cekQty($P['id_inventory']);
				if ($cek['jumlah'] < $P['jumlah']) {
					$dat = [
						'id_sewa' => $P['id_sewa'],
						'id_inventory' => $P['id_inventory'],
						'respon' => 0,
					];
					$this->M_Landing->updateDetail($dat);
				} else {
					$dat = [
						'id_sewa' => $P['id_sewa'],
						'id_inventory' => $P['id_inventory'],
						'respon' => 1,
					];
					$this->M_Landing->updateDetail($dat);
				}
			}
		}
		$postt = $this->M_Landing->cart();
		if (!$this->session->userdata('levelpenyewa')) {
			$this->load->view('template/home/header_noauth');
		} else {
			$this->load->view('template/home/header', $postt);
		}

		$this->load->view('home/cart', $postt);
		$this->load->view('template/home/footer');
	}

	public function delCart()
	{
		$id_inv = $this->input->post('id_inventory1');
		$this->M_Landing->delCart($id_inv);
		// var_dump($this->M_Landing->delCart($id_inv));
		redirect(base_url('home/cart'));
	}

	public function transaksi()
	{
		$data = $this->M_Landing->transaksi();
		//mengirimkan data ke view
		if (!$this->session->userdata('levelpenyewa')) {
			$this->load->view('template/home/header_noauth');
		} else {
			$this->load->view('template/home/header', $data);
		}
		$this->load->view('home/transaksi', $data);
		$this->load->view('template/home/footer');
		// var_dump($data);
	}

	public function pesan()
	{
		$data = $this->M_Landing->checkout();
		foreach ($data['result'] as $r) {
			$sum[] = $r['sub_total'];
		};
		$data['total'] = array_sum($sum);
		//mengirimkan data ke view
		if (!$this->session->userdata('levelpenyewa')) {
			$this->load->view('template/home/header_noauth');
		} else {
			$this->load->view('template/home/header', $data);
		}
		$this->load->view('home/pesan', $data);
		$this->load->view('template/home/footer');
		// var_dump($data);
	}

	public function profil()
	{
		$data['profil'] = $this->M_Landing->getProfil();
		if (!$this->session->userdata('levelpenyewa')) {
			$this->load->view('template/home/header_noauth');
		} else {
			$this->load->view('template/home/header', $data);
		}
		$this->load->view('home/profil', $data);
		$this->load->view('template/profilhome/footer');
		// var_dump($data);
	}
	public function editProfil()
	{
		$file_name  = substr(uniqid(), 5, 5);
		$config['upload_path'] = 'assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 2000;
		$config['file_name'] = date("Ymd") . $file_name;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$dataimg = $this->upload->data();
			$this->M_Landing->editProfil($dataimg);
			redirect(base_url('home/profil'));
			// var_dump($this->M_Landing->editProfil($dataimg));
		}
		$dataimg = $this->upload->data();
		$this->M_Landing->editProfil($dataimg);
		redirect(base_url('home/profil'));
		// var_dump($this->M_Landing->editProfil($dataimg));
	}

	public function updateSewa()
	{
		$data = $this->M_Landing->checkout();
		$l = $this->M_Landing->updateSewa();
		if (!$this->session->userdata('levelpenyewa')) {
			$this->load->view('template/home/header_noauth');
		} else {
			$this->load->view('template/home/header', $data);
		}
		$this->load->view('home/checkout_end');
		$this->load->view('template/home/footer');

		// echo intval($numberDays);
	}

	public function tentang()
	{

		$data = $this->M_Landing->getData();
		if (!$this->session->userdata('levelpenyewa')) {
			$this->load->view('template/home/header_noauth');
		} else {
			$this->load->view('template/home/header', $data);
		}
		$this->load->view('home/tentangkami');
		$this->load->view('template/home/footer');
		// var_dump($tst);
	}
	public function updatePemesanan()
	{
		$this->M_Landing->updatePemesanan();
		redirect(base_url('superadmin/getPemesanan'));
		// echo $_POST['action'];
	}
	public function api()
	{
		$catid = intval($_GET['catid']);
		$data = $this->M_Landing->getSwdetail($catid);
		echo json_encode($data);
	}

	public function uploadBukti()
	{
		$file_name  = substr(uniqid(), 5, 5);
		$config['upload_path'] = 'assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 2000;
		$config['file_name'] = date("Ymd") . $file_name;


		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$error = array('error' => $this->upload->display_errors());
			echo $error['error'];
			echo "<script>alert('" . $error['error'] . "'); document.location = '" . base_url('home/transaksi') . "';</script>";
		} else {
			$data = $this->upload->data();
			$this->M_Landing->uploadBukti($data);
			// var_dump($mod);
			redirect(base_url('home/transaksi'));
		}
		// var_dump($this->input->post('id_sewa'));
	}
}
