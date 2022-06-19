<?php

use LDAP\Result;
use phpDocumentor\Reflection\Types\Null_;

defined('BASEPATH') or exit('No direct script access allowed');

class M_Landing extends CI_Model
{
    public function getData()
    {
        $sql = "SELECT * FROM inventory";
        $get =  $this->db->query($sql)->result_array();
        $id_penyewa = $this->session->userdata('id_penyewa');
        $cekcart = "SELECT * FROM sewa where status=4 and id_penyewa=$id_penyewa";
        $cart =  $this->db->query($cekcart)->result_array();
        if (!$cart) {
            $data = [
                'get' => $get,
                'cart' => 0,
                'dtl' => NULL
            ];
        } else {
            $sqldetail = "SELECT * FROM sewa_detail where id_sewa=" . $cart[0]['id_sewa'];
            $detail =  $this->db->query($sqldetail)->result_array();
            $data = [
                'get' => $get,
                'cart' => count($detail),
                'dtl' => $detail
            ];
        }

        return $data;
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
        $cart = $this->getData();
        $sql = "SELECT * FROM inventory where id_inventory=$vhid";
        $result =  $this->db->query($sql)->result_array();
        $data = [
            'result' => $result,
            'cart' => $cart['cart']
        ];
        return $data;
        // $data = array('planet' => $result);
    }
    public function cart()
    {
        $cart = $this->getData();
        if (!$cart['dtl'][0]['id_sewa']) {
            $data = NULL;
        } else {
            $result =  $this->db->select('sewa_detail.id_sewa_detail,inventory.nama AS nama_inventory,inventory.harga,penyewa.nama,sewa.status,sewa_detail.sub_total,sewa_detail.jumlah')
                ->from('sewa')
                ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
                // ->join('admin', 'sewa.id_admin = admin.id_admin')
                ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
                ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')
                ->where(array('sewa_detail.id_sewa' => $cart['dtl'][0]['id_sewa']))
                ->get()->result_array();
            $data = [
                'result' => $result,
                'cart' => $cart['cart']
            ];
        }
        return $data;
    }
    public function addCart()
    {
        $post = $this->input->post();
        $id_penyewa = $this->session->userdata('id_penyewa');
        $cekcart = "SELECT * FROM sewa where status=4 and id_penyewa=$id_penyewa";

        $result =  $this->db->query($cekcart)->result_array();


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

            $cekinvt = "SELECT * FROM sewa_detail where id_sewa=" . $result[0]['id_sewa'] . " and id_inventory=" . $post['id_inventory'];
            $resultinv =  $this->db->query($cekinvt)->result_array();
            if (!$resultinv) {
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
                    'jumlah' => $resultinv[0]['jumlah'] + $post['jumlah'],
                    'sub_total' => $resultinv[0]['sub_total'] + $post['jumlah'] * $post['harga']
                ];
                $resultup =  $this->db->where(array(
                    'id_sewa' => $result[0]['id_sewa']
                ));
                $this->db->update('sewa_detail', $datadetail);
            }
        }
    }
}
