<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Landing extends CI_Model
{
    public function getData()
    {
        $sql = "SELECT * FROM inventory";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }

    public function getRuang()
    {
        $sql = "SELECT * FROM inventory where id_kategori=1";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }

    public function getBarang()
    {
        $sql = "SELECT * FROM inventory where id_kategori=2";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }

    public function product_full($vhid)
    {
        $sql = "SELECT * FROM inventory where id_inventory=$vhid";
        $result =  $this->db->query($sql)->result_array();
        return $result;
        // $data = array('planet' => $result);
    }
}
