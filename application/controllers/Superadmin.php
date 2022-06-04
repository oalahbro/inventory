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
	public function data_ruang()
	{
		$data['ruang'] = $this->mymodel->getRuang();
		$this->load->view('template/admin/header');
		$this->load->view('superadmin/data_ruang', $data);
		$this->load->view('template/admin/footer');
	}
	public function updateRuang()
	{
		$data = $this->mymodel->updateRuang();
		redirect(base_url('superadmin/data_ruang'));
		// var_dump($data);
	}

	public function addRuang()
	{
		$data = $this->mymodel->addRuang();
		// var_dump($data);
		redirect(base_url('superadmin/data_ruang'));
	}

	public function delRuang()
	{
		$id_ruang = $this->input->post('id_inventory1');
		$data = $this->mymodel->delRuang($id_ruang);
		// var_dump($data);
		redirect(base_url('superadmin/data_ruang'));
	}

	public function data_barang()
	{
		$data['barang'] = $this->mymodel->getBarang();
		$this->load->view('template/admin/header');
		$this->load->view('superadmin/data_barang', $data);
		$this->load->view('template/admin/footer');
	}

	public function updateBarang()
	{
		$data = $this->mymodel->updateRuang();
		redirect(base_url('superadmin/data_barang'));
		// var_dump($data);
	}

	public function addBarang()
	{
		$data = $this->mymodel->addBarang();
		// var_dump($data);
		redirect(base_url('superadmin/data_barang'));
	}

	public function delBarang()
	{
		$id_ruang = $this->input->post('id_inventory1');
		$data = $this->mymodel->delRuang($id_ruang);
		// var_dump($data);
		redirect(base_url('superadmin/data_barang'));
	}
}
