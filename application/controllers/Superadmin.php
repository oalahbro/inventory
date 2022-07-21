<?php

use phpDocumentor\Reflection\Types\This;

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
		$data = $this->mymodel->dashboard();
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/index', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($data);
	}

	public function kategori()
	{
		$data['kategori'] = $this->mymodel->getKategori();
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/kategori', $data);
		$this->load->view('template/superadmin/footer');
	}

	public function data_penyewa()
	{
		$data['penyewa'] = $this->mymodel->getPenyewa();
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/data_penyewa', $data);
		$this->load->view('template/superadmin/footer');
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
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/data_admin', $data);
		$this->load->view('template/superadmin/footer');
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
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/data_inventory', $data);
		$this->load->view('template/superadmin/footer');
	}

	public function filter()
	{
		$data = [
			'ruang' => $this->mymodel->filter(),
			'kategori' => $this->mymodel->getKategori(),
			'kat_title' => $this->mymodel->katTitle()
		];
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/data_filter', $data);
		$this->load->view('template/superadmin/footer');
	}
	public function updateInventory()
	{
		$file_name  = substr(uniqid(), 5, 5);
		$config['upload_path'] = 'assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 2000;
		$config['file_name'] = date("Ymd") . $file_name;


		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('image')) {
			var_dump($this->upload->data());
			$dataimg = $this->upload->data();
			$this->mymodel->updateInventory($dataimg);
			// var_dump($data);
			redirect(base_url('superadmin/getInventory'));
		}
		$dataimg = $this->upload->data();
		$this->mymodel->updateInventory($dataimg);
		// var_dump($data);
		redirect(base_url('superadmin/getInventory'));
	}

	public function addInventory()
	{
		$file_name  = substr(uniqid(), 5, 5);
		$config['upload_path'] = 'assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 2000;
		$config['file_name'] = date("Ymd") . $file_name;


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
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/pemesanan', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($data);
	}

	public function getKonfpemesanan()
	{
		$data = [
			'konf_pemesanan' => $this->mymodel->getKonfpemesanan()
		];
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/konf_pemesanan', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($data);
	}
	public function api()
	{
		$catid = intval($_GET['catid']);
		$data = $this->mymodel->getSwdetail($catid);
		echo json_encode($data);
	}
	public function updatePemesanan()
	{
		$this->mymodel->updatePemesanan();
		redirect(base_url('superadmin/getPemesanan'));
		// echo $_POST['action'];
	}

	public function updateKonfpemesanan()
	{
		$this->mymodel->updatePemesanan();
		redirect(base_url('superadmin/getKonfpemesanan'));
	}

	public function getHistory()
	{
		$data = [
			'history' => $this->mymodel->getHistory()
		];
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/history', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($data);
	}
	public function filterstatus()
	{
		$data = [
			'history' => $this->mymodel->filterhistory()
		];
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/history', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($data['kat_title']);
	}

	public function getPesananSelesai()
	{
		$data = [
			'history' => $this->mymodel->getPesananSelesai(),
			'title' => 'pesanan selesai'
		];
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/history', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($data);
	}

	public function getPesananDibatalkan()
	{
		$data = [
			'history' => $this->mymodel->getHistory(),
			'title' => 'pesanan dibatalkan'
		];
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/history', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($data);
	}

	public function getLaporan()
	{
		$data['laporan'] = $this->mymodel->getLaporan();
		foreach ($data['laporan'] as $r) {
			$sum[] = $r['sub_total'];
		};
		if (!$data['laporan']) {
			$data['total'] = 0;
		} else {

			$data['total'] = array_sum($sum);
		}
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/laporan', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($total);
	}
	public function getLapstock()
	{
		$data['laporan'] = $this->mymodel->getInventory();
		$data['kategori'] = $this->mymodel->getKategori();
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/lapstock', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($total);
	}

	public function profil()
	{
		$data['profil'] = $this->mymodel->getProfil();
		$this->load->view('template/superadmin/header', $data);
		$this->load->view('superadmin/profil', $data);
		$this->load->view('template/superadmin/footer');
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
			$this->mymodel->editProfil($dataimg);
			redirect(base_url('superadmin/profil'));
		}
		$dataimg = $this->upload->data();
		var_dump($dataimg);
		$this->mymodel->editProfil($dataimg);
		redirect(base_url('superadmin/profil'));
	}

	public function pdf()
	{

		$this->load->library('pdf');
		$option = $this->pdf->getOptions();
		$option->set(['isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true]);
		$data['laporan'] = $this->mymodel->getLaporandate();
		foreach ($data['laporan'] as $r) {
			$sum[] = $r['sub_total'];
		};
		if (!$data['laporan']) {
			$data['total'] = 0;
		} else {

			$data['total'] = array_sum($sum);
		}
		$data['tgl'] = [
			'tgl_mulai' => date('d-m-Y H:i:s', strtotime($this->input->post('tgl_mulai'))),
			'tgl_selesai' => date('d-m-Y H:i:s', strtotime($this->input->post('tgl_selesai')))

		];
		// var_dump($data);
		$this->load->view('admin/laporan_sewa', $data);
		$html = $this->output->get_output();
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->load_html($html);
		$this->pdf->render();
		$this->pdf->stream('laporan_sewa.pdf', array('Attachment' => 0));


		$this->pdf->filename = "laporan-data-siswa.pdf";
	}

	public function searchAdmin()
	{
		$data['admin'] = $this->mymodel->searchAdmin();
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/data_admin', $data);
		$this->load->view('template/superadmin/footer');
	}

	public function searchPenyewa()
	{
		$data['penyewa'] = $this->mymodel->searchPenyewa();
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/data_penyewa', $data);
		$this->load->view('template/superadmin/footer');
	}

	public function searchInventory()
	{
		$data['ruang'] = $this->mymodel->searchInventory();
		$data['kategori'] = $this->mymodel->getKategori();
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/data_inventory', $data);
		$this->load->view('template/superadmin/footer');
	}
	public function searchPemesanan()
	{
		$data = [
			'pemesanan' => $this->mymodel->searchPemesanan()
		];
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/pemesanan', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($data);
	}
	public function searchKonf()
	{
		$data = [
			'konf_pemesanan' => $this->mymodel->searchKonf()
		];
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/konf_pemesanan', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($data);
	}

	public function searchPesananSelesai()
	{
		$data = [
			'history' => $this->mymodel->searchPesananSelesai(),
			'title' => 'pesanan selesai'
		];
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/history', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($data);
	}
	public function searchPesananDibatalkan()
	{
		$data = [
			'history' => $this->mymodel->searchPesananDibatalkan(),
			'title' => 'pesanan dibatalkan'
		];
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/history', $data);
		$this->load->view('template/superadmin/footer');
		// var_dump($data);
	}
	public function searchLaporan()
	{
		if ($_POST['submit'] == "filter") {
			$data['laporan'] = $this->mymodel->searchLapdate();
			foreach ($data['laporan'] as $r) {
				$sum[] = $r['sub_total'];
			};
			if (!$data['laporan']) {
				$data['total'] = 0;
			} else {

				$data['total'] = array_sum($sum);
			}
		} elseif ($_POST['submit'] == "search") {
			$data['laporan'] = $this->mymodel->searchLaporan();
			foreach ($data['laporan'] as $r) {
				$sum[] = $r['sub_total'];
			};
			if (!$data['laporan']) {
				$data['total'] = 0;
			} else {

				$data['total'] = array_sum($sum);
			}
		} else {
			$this->load->library('pdf');
			$option = $this->pdf->getOptions();
			$option->set(['isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true]);
			$data['laporan'] = $this->mymodel->searchLapdate();
			foreach ($data['laporan'] as $r) {
				$sum[] = $r['sub_total'];
			};
			if (!$data['laporan']) {
				$data['total'] = 0;
			} else {

				$data['total'] = array_sum($sum);
			}
			$data['tgl'] = [
				'tgl_mulai' => date('d-m-Y H:i:s', strtotime($this->input->post('tgl_mulai'))),
				'tgl_selesai' => date('d-m-Y H:i:s', strtotime($this->input->post('tgl_selesai')))

			];
			// var_dump($data);
			$this->load->view('superadmin/laporan_sewa', $data);
			$html = $this->output->get_output();
			$this->pdf->setPaper('A4', 'landscape');
			$this->pdf->load_html($html);
			$this->pdf->render();
			$this->pdf->stream('laporan_sewa.pdf', array('Attachment' => 0));


			$this->pdf->filename = "laporan-data-siswa.pdf";
		}
		$this->load->view('template/superadmin/header');
		$this->load->view('superadmin/laporans', $data);
		$this->load->view('template/superadmin/footer');
	}
	public function searchLapstock()
	{
		if ($_POST['submit'] == "filter") {
			$data['laporan'] = $this->mymodel->getlapstock();
			$data['kategoris'] = $this->mymodel->getKategoris();
			$data['kategori'] = $this->mymodel->getKategori();
			$this->load->view('template/superadmin/header');
			$this->load->view('superadmin/lapstock_s', $data);
			$this->load->view('template/superadmin/footer');
			// echo "lap stck";
			// var_dump($this->input->post());
		} elseif ($_POST['submit'] == "search") {
			$data['laporan'] = $this->mymodel->searchLapstock();
			$data['kategoris'] = $this->mymodel->getKategoris();
			$data['kategori'] = $this->mymodel->getKategori();
			$this->load->view('template/superadmin/header');
			$this->load->view('superadmin/lapstock_s', $data);
			$this->load->view('template/superadmin/footer');
		} else {
			$this->load->library('pdf');
			$option = $this->pdf->getOptions();
			$option->set(['isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true]);
			$data['laporan'] = $this->mymodel->getlapstock();

			// var_dump($data);
			$this->load->view('superadmin/laporan_stock', $data);
			$html = $this->output->get_output();
			$this->pdf->setPaper('A4', 'landscape');
			$this->pdf->load_html($html);
			$this->pdf->render();
			$this->pdf->stream('laporan_sewa.pdf', array('Attachment' => 0));


			$this->pdf->filename = "laporan-data-siswa.pdf";
		}
	}
}
