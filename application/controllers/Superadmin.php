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
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
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
		$this->load->view('superadmin/index');
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function kategori()
	{
		$data['kategori'] = $this->mymodel->getKategori();
		$this->load->view('template/admin/header');
		$this->load->view('superadmin/kategori', $data);
		$this->load->view('template/admin/footer');
	}

	public function data_penyewa()
	{
		$data['penyewa'] = $this->mymodel->getPenyewa();
		//mengirimkan data ke view
		$this->load->view('template/admin/header');
		$this->load->view('superadmin/data_penyewa', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function addPenyewa()
	{
		$this->mymodel->addPenyewa();

		redirect(base_url('superadmin/data_penyewa'));
	}

	public function editPenyewa()
	{
		$this->mymodel->editPenyewa();

		redirect(base_url('superadmin/data_penyewa'));
	}

	public function hapusPenyewa()
	{
		$id_penyewa = $this->input->post('id_penyewa1');
		$this->mymodel->hapusPenyewa($id_penyewa);

		redirect(base_url('superadmin/data_penyewa'));
	}

	public function data_admin()
	{
		$data['admin'] = $this->mymodel->getAdmin();
		//mengirimkan data ke view
		$this->load->view('template/admin/header');
		$this->load->view('superadmin/data_admin', $data);
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
		$data = $this->session->userdata('id_admin');
		var_dump($data);
	}

	public function addKategori()
	{
		$this->mymodel->addKategori();
		redirect(base_url('superadmin/kategori'));
	}

	public function editKategori()
	{
		$this->mymodel->editKategori();

		redirect(base_url('superadmin/kategori'));
	}

	public function hapusKategori()
	{
		$id_kategori = $this->input->post('id_kategori1');
		$this->mymodel->hapusKategori($id_kategori);

		redirect(base_url('superadmin/kategori'));
	}
	public function getInventory()
	{
		$data['ruang'] = $this->mymodel->getInventory();
		$data['kategori'] = $this->mymodel->getKategori();
		$this->load->view('template/admin/header');
		$this->load->view('superadmin/data_inventory', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function filter()
	{
		$data = [
			'ruang' => $this->mymodel->filter(),
			'kategori' => $this->mymodel->getKategori(),
			'kat_title' => $this->mymodel->katTitle()
		];
		$this->load->view('template/admin/header');
		$this->load->view('superadmin/data_filter', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data['kat_title']);
	}
	public function updateInventory()
	{
		$config['upload_path'] = 'assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 2000;


		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$error = array('error' => $this->upload->display_errors());
			echo "<script>alert('" . $error['error'] . "'); document.location = '" . base_url('superadmin/getInventory') . "';</script>";
		} else {
			$data = $this->upload->data();
			$this->mymodel->updateInventory($data);
			// var_dump($data);
			redirect(base_url('superadmin/getInventory'));
		}
	}

	public function addInventory()
	{
		$config['upload_path'] = 'assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 2000;


		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$error = array('error' => $this->upload->display_errors());
			echo "<script>alert('" . $error['error'] . "'); document.location = '" . base_url('superadmin/getInventory') . "';</script>";
		} else {
			$data = $this->upload->data();
			$this->mymodel->addInventory($data);
			// var_dump($data);
			redirect(base_url('superadmin/getInventory'));
		}
	}

	public function delInventory()
	{
		$id_inv = $this->input->post('id_inventory1');
		$this->mymodel->delInventory($id_inv);
		// var_dump($data);
		redirect(base_url('superadmin/getInventory'));
	}

	public function getPemesanan()
	{
		$data = [
			'pemesanan' => $this->mymodel->getPemesanan()
		];
		$this->load->view('template/admin/header');
		$this->load->view('superadmin/pemesanan', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function getKonfpemesanan()
	{
		$data = [
			'konf_pemesanan' => $this->mymodel->getKonfpemesanan()
		];
		$this->load->view('template/admin/header');
		$this->load->view('superadmin/konf_pemesanan', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}
	public function api()
	{
		$catid = intval($_GET['catid']);
		$data = $this->mymodel->getSwdetail($catid);
		echo json_encode($data);
	}
	public function test1()
	{
		$this->load->view('template/admin/header');
		$this->load->view('superadmin/test');
		$this->load->view('template/admin/footer');
	}
}
