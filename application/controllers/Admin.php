<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
		$this->load->model('M_Admin');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
		if ($this->session->userdata('level') != 2) {
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$data = $this->M_Admin->dashboard();
		$this->load->view('template/admin/header');
		$this->load->view('admin/index', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function kategori()
	{
		$data['kategori'] = $this->M_Admin->getKategori();
		$this->load->view('template/admin/header');
		$this->load->view('admin/kategori', $data);
		$this->load->view('template/admin/footer');
	}

	public function data_penyewa()
	{
		$data['penyewa'] = $this->M_Admin->getPenyewa();
		$this->load->view('template/admin/header');
		$this->load->view('admin/data_penyewa', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function addPenyewa()
	{
		$this->M_Admin->addPenyewa();

		redirect(base_url('admin/data_penyewa'));
	}

	public function editPenyewa()
	{
		$this->M_Admin->editPenyewa();

		redirect(base_url('admin/data_penyewa'));
	}

	public function hapusPenyewa()
	{
		$id_penyewa = $this->input->post('id_penyewa1');
		$this->M_Admin->hapusPenyewa($id_penyewa);

		redirect(base_url('admin/data_penyewa'));
	}

	public function addKategori()
	{
		$this->M_Admin->addKategori();
		redirect(base_url('admin/kategori'));
	}

	public function editKategori()
	{
		$this->M_Admin->editKategori();

		redirect(base_url('admin/kategori'));
	}

	public function hapusKategori()
	{
		$id_kategori = $this->input->post('id_kategori1');
		$this->M_Admin->hapusKategori($id_kategori);

		redirect(base_url('admin/kategori'));
	}
	public function getInventory()
	{
		$data['ruang'] = $this->M_Admin->getInventory();
		$data['kategori'] = $this->M_Admin->getKategori();
		$this->load->view('template/admin/header');
		$this->load->view('admin/data_inventory', $data);
		$this->load->view('template/admin/footer');
	}

	public function filter()
	{
		$data = [
			'ruang' => $this->M_Admin->filter(),
			'kategori' => $this->M_Admin->getKategori(),
			'kat_title' => $this->M_Admin->katTitle()
		];
		$this->load->view('template/admin/header');
		$this->load->view('admin/data_filter', $data);
		$this->load->view('template/admin/footer');
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
			$this->M_Admin->updateInventory($dataimg);
			// var_dump($data);
			redirect(base_url('admin/getInventory'));
		}
		$dataimg = $this->upload->data();
		$this->M_Admin->updateInventory($dataimg);
		// var_dump($data);
		redirect(base_url('admin/getInventory'));
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
			echo "<script>alert('" . $error['error'] . "'); document.location = '" . base_url('admin/getInventory') . "';</script>";
		} else {
			$data = $this->upload->data();
			$this->M_Admin->addInventory($data);
			// var_dump($data);
			redirect(base_url('admin/getInventory'));
		}
	}

	public function delInventory()
	{
		$id_inv = $this->input->post('id_inventory1');
		$this->M_Admin->delInventory($id_inv);
		// var_dump($data);
		redirect(base_url('admin/getInventory'));
	}

	public function getPemesanan()
	{
		$data = [
			'pemesanan' => $this->M_Admin->getPemesanan()
		];
		$this->load->view('template/admin/header');
		$this->load->view('admin/pemesanan', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function getKonfpemesanan()
	{
		$data = [
			'konf_pemesanan' => $this->M_Admin->getKonfpemesanan()
		];
		$this->load->view('template/admin/header');
		$this->load->view('admin/konf_pemesanan', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}
	public function api()
	{
		$catid = intval($_GET['catid']);
		$data = $this->M_Admin->getSwdetail($catid);
		echo json_encode($data);
	}
	public function updatePemesanan()
	{
		$this->M_Admin->updatePemesanan();
		redirect(base_url('admin/getPemesanan'));
		// echo $_POST['action'];
	}
	public function updateKonfpemesanan()
	{
		$this->M_Admin->updatePemesanan();
		redirect(base_url('admin/getKonfpemesanan'));
	}

	public function getHistory()
	{
		$data = [
			'history' => $this->M_Admin->getHistory()
		];
		$this->load->view('template/admin/header');
		$this->load->view('admin/history', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}
	public function filterstatus()
	{
		$data = [
			'history' => $this->M_Admin->filterhistory()
		];
		$this->load->view('template/admin/header');
		$this->load->view('admin/history', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data['kat_title']);
	}

	public function getPesananSelesai()
	{
		$data = [
			'history' => $this->M_Admin->getPesananSelesai(),
			'title' => 'pesanan selesai'
		];
		$this->load->view('template/admin/header');
		$this->load->view('admin/history', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function getPesananDibatalkan()
	{
		$data = [
			'history' => $this->M_Admin->getHistory(),
			'title' => 'pesanan dibatalkan'
		];
		$this->load->view('template/admin/header');
		$this->load->view('admin/history', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function getLaporan()
	{
		$data['laporan'] = $this->M_Admin->getLaporan();
		foreach ($data['laporan'] as $r) {
			$sum[] = $r['sub_total'];
		};
		if (!$data['laporan']) {
			$data['total'] = 0;
		} else {

			$data['total'] = array_sum($sum);
		}
		$this->load->view('template/admin/header');
		$this->load->view('admin/laporan', $data);
		$this->load->view('template/admin/footer');
		// var_dump($total);
	}
	public function getLapstock()
	{
		$data['laporan'] = $this->M_Admin->getInventory();
		$data['kategori'] = $this->M_Admin->getKategori();
		$this->load->view('template/admin/header');
		$this->load->view('admin/lapstock', $data);
		$this->load->view('template/admin/footer');
		// var_dump($total);
	}

	public function profil()
	{
		$data['profil'] = $this->M_Admin->getProfil();
		$this->load->view('template/admin/header', $data);
		$this->load->view('admin/profil', $data);
		$this->load->view('template/admin/footer');
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
			$this->M_Admin->editProfil($dataimg);
			redirect(base_url('admin/profil'));
		}
		$dataimg = $this->upload->data();
		var_dump($dataimg);
		$this->M_Admin->editProfil($dataimg);
		redirect(base_url('admin/profil'));
	}
	public function cek()
	{
		$this->load->view('admin/laporan_sewa');
	}
	public function pdf()
	{

		$this->load->library('pdf');
		$option = $this->pdf->getOptions();
		$option->set(['isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true]);
		$data['laporan'] = $this->M_Admin->getLaporandate();
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
	public function searchPenyewa()
	{
		$data['penyewa'] = $this->M_Admin->searchPenyewa();
		$this->load->view('template/admin/header');
		$this->load->view('admin/data_penyewa', $data);
		$this->load->view('template/admin/footer');
	}

	public function searchInventory()
	{
		$data['ruang'] = $this->M_Admin->searchInventory();
		$data['kategori'] = $this->M_Admin->getKategori();
		$this->load->view('template/admin/header');
		$this->load->view('admin/data_inventory', $data);
		$this->load->view('template/admin/footer');
	}
	public function searchPemesanan()
	{
		$data = [
			'pemesanan' => $this->M_Admin->searchPemesanan()
		];
		$this->load->view('template/admin/header');
		$this->load->view('admin/pemesanan', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}
	public function searchKonf()
	{
		$data = [
			'konf_pemesanan' => $this->M_Admin->searchKonf()
		];
		$this->load->view('template/admin/header');
		$this->load->view('admin/konf_pemesanan', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function searchPesananSelesai()
	{
		$data = [
			'history' => $this->M_Admin->searchPesananSelesai(),
			'title' => 'pesanan selesai'
		];
		$this->load->view('template/admin/header');
		$this->load->view('admin/history', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}
	public function searchPesananDibatalkan()
	{
		$data = [
			'history' => $this->M_Admin->searchPesananDibatalkan(),
			'title' => 'pesanan dibatalkan'
		];
		$this->load->view('template/admin/header');
		$this->load->view('admin/history', $data);
		$this->load->view('template/admin/footer');
		// var_dump($data);
	}

	public function searchLaporan()
	{
		if ($_POST['submit'] == "filter") {
			$data['laporan'] = $this->M_Admin->searchLapdate();
			foreach ($data['laporan'] as $r) {
				$sum[] = $r['sub_total'];
			};
			if (!$data['laporan']) {
				$data['total'] = 0;
			} else {

				$data['total'] = array_sum($sum);
			}
		} elseif ($_POST['submit'] == "search") {
			$data['laporan'] = $this->M_Admin->searchLaporan();
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
			$data['laporan'] = $this->M_Admin->searchLapdate();
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
			$this->pdf->setPaper('A4', 'landscape');
			$this->pdf->load_html($html);
			$this->pdf->render();
			$this->pdf->stream('laporan_sewa.pdf', array('Attachment' => 0));


			$this->pdf->filename = "laporan-data-siswa.pdf";
		}
		$this->load->view('template/admin/header');
		$this->load->view('admin/laporans', $data);
		$this->load->view('template/admin/footer');
	}
	public function searchLapstock()
	{
		if ($_POST['submit'] == "filter") {
			$data['laporan'] = $this->M_Admin->getlapstock();
			$data['kategoris'] = $this->M_Admin->getKategoris();
			$data['kategori'] = $this->M_Admin->getKategori();
			$this->load->view('template/admin/header');
			$this->load->view('admin/lapstock_s', $data);
			$this->load->view('template/admin/footer');
			// echo "lap stck";
			// var_dump($this->input->post());
		} elseif ($_POST['submit'] == "search") {
			$data['laporan'] = $this->M_Admin->searchLapstock();
			$data['kategoris'] = $this->M_Admin->getKategoris();
			$data['kategori'] = $this->M_Admin->getKategori();
			$this->load->view('template/admin/header');
			$this->load->view('admin/lapstock_s', $data);
			$this->load->view('template/admin/footer');
		} else {
			$this->load->library('pdf');
			$option = $this->pdf->getOptions();
			$option->set(['isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true]);
			$data['laporan'] = $this->M_Admin->getlapstock();

			// var_dump($data);
			$this->load->view('admin/laporan_stock', $data);
			$html = $this->output->get_output();
			$this->pdf->setPaper('A4', 'landscape');
			$this->pdf->load_html($html);
			$this->pdf->render();
			$this->pdf->stream('laporan_sewa.pdf', array('Attachment' => 0));


			$this->pdf->filename = "laporan-data-siswa.pdf";
		}
	}
}
