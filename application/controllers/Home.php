<?php
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
	public function index()
	{
		// load library
		$this->load->library('format_rupiah');
		// mengambil data dari db
		$sql = "SELECT kamera.*, merek.* FROM kamera, merek WHERE merek.id_merek = kamera.id_merek";
		$result =  $this->db->query($sql)->result_array();
		$data = array('planet' => $result);
		//mengirimkan data ke view
		$this->load->view('template/header');
		$this->load->view('home', $data);
		$this->load->view('template/footer');
	}

	public function product_full()
	{
		$this->load->library('format_rupiah');
		// mengambil data dari db
		$vhid = intval($_GET['vhid']);
		$sql = "SELECT kamera.*, merek.* from kamera, merek WHERE merek.id_merek=kamera.id_merek AND kamera.id_kamera='$vhid'";
		$result =  $this->db->query($sql)->result_array();
		$data = array('planet' => $result);
		//mengirimkan data ke view
		$this->load->view('template/header');
		$this->load->view('detail', $data);
		$this->load->view('template/footer');
		// var_dump($data);
	}
}
