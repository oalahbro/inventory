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
        if (!$id_penyewa) {
            $data = [
                'get' => $get,
                'cart' => 0,
                'dtl' => NULL
            ];
        } else {
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
        if (!$cart['dtl']) {
            $data = [
                'result' => NULL,
                'cart' => $cart['cart']
            ];
        } else {
            $result =  $this->db->select('sewa_detail.id_sewa_detail,inventory.nama AS nama_inventory,inventory.harga,penyewa.nama,sewa.status,sewa_detail.sub_total,sewa_detail.jumlah,inventory.image,inventory.id_inventory,sewa.total')
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
                'tgl_booking' => date("Y-m-d"),
                'total' => 0
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
            $datasewa = [
                'total' => $result[0]['total'] + $post['jumlah'] * $post['harga']
            ];
            $this->db->where(array(
                'id_sewa' => $result[0]['id_sewa']
            ));
            $this->db->update('sewa', $datasewa);
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
                $datasewa = [
                    'total' => $result[0]['total'] + $post['jumlah'] * $post['harga']
                ];
                $this->db->where(array(
                    'id_sewa' => $result[0]['id_sewa']
                ));
                $this->db->update('sewa', $datasewa);
            } else {
                $datadetail = [
                    'jumlah' => $resultinv[0]['jumlah'] + $post['jumlah'],
                    'sub_total' => $resultinv[0]['sub_total'] + $post['jumlah'] * $post['harga']
                ];
                $this->db->where(array(
                    'id_inventory' => $resultinv[0]['id_inventory']
                ));
                $this->db->update('sewa_detail', $datadetail);

                $datasewa = [
                    'total' => $result[0]['total'] + $post['jumlah'] * $post['harga']
                ];
                $this->db->where(array(
                    'id_sewa' => $result[0]['id_sewa']
                ));
                $this->db->update('sewa', $datasewa);
            }
        }
    }

    public function delCart($id_inv)
    {
        $this->db->where(array('id_sewa_detail' => $id_inv));
        $this->db->delete('sewa_detail');
    }
    public function transaksi()
    {
        $cart = $this->getData();

        $batal =  $this->db->select('sewa.id_penyewa,sewa_detail.id_sewa_detail,inventory.nama AS nama_inventory,inventory.harga,penyewa.nama,sewa.status,sewa_detail.sub_total,sewa_detail.jumlah,inventory.image,inventory.id_inventory')
            ->from('sewa')
            ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
            // ->join('admin', 'sewa.id_admin = admin.id_admin')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')
            ->where(array('sewa.id_penyewa' => $this->session->userdata('id_penyewa'), 'sewa.status' => 0))
            ->get()->result_array();
        $selesai =  $this->db->select('sewa.id_penyewa,sewa_detail.id_sewa_detail,inventory.nama AS nama_inventory,inventory.harga,penyewa.nama,sewa.status,sewa_detail.sub_total,sewa_detail.jumlah,inventory.image,inventory.id_inventory')
            ->from('sewa')
            ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
            // ->join('admin', 'sewa.id_admin = admin.id_admin')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')
            ->where(array('sewa.id_penyewa' => $this->session->userdata('id_penyewa'), 'sewa.status' => 3))
            ->get()->result_array();
        $pesan =  $this->db->select('sewa.id_penyewa,sewa_detail.id_sewa_detail,inventory.nama AS nama_inventory,inventory.harga,penyewa.nama,sewa.status,sewa_detail.sub_total,sewa_detail.jumlah,inventory.image,inventory.id_inventory')
            ->from('sewa')
            ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
            // ->join('admin', 'sewa.id_admin = admin.id_admin')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')
            ->where(array('sewa.id_penyewa' => $this->session->userdata('id_penyewa'), 'sewa.status' => 2))
            ->get()->result_array();
        $proses =  $this->db->select('sewa.id_penyewa,sewa_detail.id_sewa_detail,inventory.nama AS nama_inventory,inventory.harga,penyewa.nama,sewa.status,sewa_detail.sub_total,sewa_detail.jumlah,inventory.image,inventory.id_inventory')
            ->from('sewa')
            ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
            // ->join('admin', 'sewa.id_admin = admin.id_admin')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')
            ->where(array('sewa.id_penyewa' => $this->session->userdata('id_penyewa'), 'sewa.status' => 1))
            ->get()->result_array();
        $data = [
            'batal' => $batal,
            'selesai' => $selesai,
            'pesan' => $pesan,
            'proses' => $proses,
            'cart' => $cart['cart']
        ];

        return $data;
    }
}
