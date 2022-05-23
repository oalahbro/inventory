<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginmodel extends CI_Model
{
    public function cek()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }

    public function product_full($vhid)
    {
        $sql = "SELECT kamera.*, merek.* from kamera, merek WHERE merek.id_merek=kamera.id_merek AND kamera.id_kamera='$vhid'";
        $result =  $this->db->query($sql)->result_array();
        return $result;
        // $data = array('planet' => $result);
    }
}
