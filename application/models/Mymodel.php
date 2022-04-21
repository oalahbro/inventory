<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mymodel extends CI_Model
{
    public function getData()
    {
        $sql = "SELECT kamera.*, merek.* FROM kamera, merek WHERE merek.id_merek = kamera.id_merek";
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
