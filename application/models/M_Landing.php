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

    public function addCart()
    {
        $id_penyewa = $this->session->userdata('id_penyewa');
        $cekcart = "SELECT * FROM sewa where status=4 and id_penyewa=$id_penyewa";
        $result =  $this->db->query($cekcart)->result_array();
        $post = $this->input->post();

        if (!$result) {
            $data = [
                'id_penyewa' => $id_penyewa,
                'status' => 4,
                'tgl_booking' => date("Y-m-d")
            ];
            $this->db->insert('sewa', $data);
            $result =  $this->db->query($cekcart)->result_array();
            $datadetail = [
                'id_sewa' => $result[0]['id_sewa'],
                'id_inventory' => $post['id_inventory'],
                'jumlah' => $post['jumlah'],
                'harga' => $post['harga'],
                'sub_total' => $post['jumlah'] * $post['harga']
            ];
            $this->db->insert('sewa_detail', $datadetail);
        } else {
            $datadetail = [
                'id_sewa' => $result[0]['id_sewa'],
                'id_inventory' => $post['id_inventory'],
                'jumlah' => $post['jumlah'],
                'harga' => $post['harga'],
                'sub_total' => $post['jumlah'] * $post['harga']
            ];
            $this->db->insert('sewa_detail', $datadetail);
        }
    }
}
