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
            $result =  $this->db->select('sewa_detail.status_qty,sewa.id_sewa,sewa_detail.id_sewa_detail,inventory.nama AS nama_inventory,inventory.harga,penyewa.nama,sewa.status,sewa_detail.sub_total,sewa_detail.jumlah,inventory.image,inventory.id_inventory,sewa.total')
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

    public function searchAll()
    {
        $search = $this->input->post('query');
        $sql = "SELECT * FROM inventory where nama LIKE '%$search%'";
        $get =  $this->db->query($sql)->result_array();
        $cart = $this->getData();
        $data = [
            'get' => $get,
            'cart' => $cart['cart']
        ];
        return $data;
    }

    public function searchBarang()
    {
        $search = $this->input->post('query');
        $sql = "SELECT * FROM inventory where nama LIKE '%$search%' and id_kategori=2";
        $get =  $this->db->query($sql)->result_array();

        return $get;
    }
    public function searchRuang()
    {
        $search = $this->input->post('query');
        $sql = "SELECT * FROM inventory where nama LIKE '%$search%' and id_kategori=1";
        $get =  $this->db->query($sql)->result_array();

        return $get;
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
        $cekcart = "SELECT * FROM sewa where status=4 and id_penyewa=" . $this->session->userdata('id_penyewa');
        $result =  $this->db->query($cekcart)->result_array();
        $datasewa = [
            'total' => $result[0]['total'] - $this->input->post('sub_total1')
        ];
        $this->db->where(array(
            'id_sewa' => $result[0]['id_sewa']
        ));
        $this->db->update('sewa', $datasewa);
        if ($this->input->post('sub_total1')) {
            $this->db->where(array('id_sewa_detail' => $id_inv));
            $this->db->delete('sewa_detail');
        }

        // return ($datasewa);
    }
    public function transaksi()
    {
        $cart = $this->getData();

        $batal =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar,sewa.total')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where(array('sewa.status' => 0, 'sewa.id_penyewa' => $this->session->userdata('id_penyewa')))
            ->get()->result_array();
        $selesai =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar,sewa.total')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where(array('sewa.status' => 3, 'sewa.id_penyewa' => $this->session->userdata('id_penyewa')))
            ->get()->result_array();
        $pesan =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar,sewa.total')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where(array('sewa.status' => 2, 'sewa.id_penyewa' => $this->session->userdata('id_penyewa')))
            ->get()->result_array();
        $proses =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar,sewa.total')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where(array('sewa.status' => 1, 'sewa.id_penyewa' => $this->session->userdata('id_penyewa')))
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
    public function getSwdetail($catid)
    {

        $result =  $this->db->select('sewa_detail.id_sewa_detail,inventory.nama AS nama_inventory,inventory.harga,penyewa.nama,sewa.status,sewa_detail.sub_total,sewa_detail.jumlah,sewa_detail.id_inventory')
            ->from('sewa')
            ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')
            ->where(array(
                'sewa_detail.id_sewa' => $catid,
                'sewa_detail.status_qty' => 1
            ))
            ->get()->result_array();
        return $result;
    }

    public function getProfil()
    {
        $cart = $this->getData();
        $sql = "SELECT * from penyewa where id_penyewa=" . $this->session->userdata('id_penyewa');
        $result =  $this->db->query($sql)->result_array();
        $data = [
            'profil' => $result,
            'cart' => $cart
        ];
        return $data;
    }

    public function editProfil($dataimg)
    {

        if (!$dataimg['file_ext']) {
            $img = $this->input->post('img');
        } else {
            $img = $dataimg['file_name'];
        }

        if (!$this->input->post('password')) {
            $data = [
                'id_penyewa' => $this->session->userdata('id_penyewa'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telp' => $this->input->post('telepon'),
                'no_identitas' => $this->input->post('no_identitas'),
                'alamat' => $this->input->post('alamat'),
                'image' => $img
            ];
        } else {
            $data = [
                'id_penyewa' => $this->session->userdata('id_penyewa'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'telp' => $this->input->post('telepon'),
                'no_identitas' => $this->input->post('no_identitas'),
                'alamat' => $this->input->post('alamat'),
                'image' => $img
            ];
        }
        $result =  $this->db->where(array(
            'id_penyewa' => $data['id_penyewa']
        ));
        $this->db->update('penyewa', $data);
        return $result;
    }

    public function cekQty($P)
    {
        $sql = "SELECT * FROM inventory where id_inventory = $P";
        $get =  $this->db->query($sql)->result_array();
        return $get[0];
    }
    public function updateDetail($dat)
    {
        $data = [
            'id_sewa' => $dat['id_sewa'],
            'id_inventory' => $dat['id_inventory'],
            'status_qty' => $dat['respon']
        ];
        $result =  $this->db->where(array(
            'id_sewa' => $data['id_sewa'],
            'id_inventory' => $data['id_inventory']
        ));
        $this->db->update('sewa_detail', $data);
        return $result;
    }
    public function checkout()
    {
        $cart = $this->getData();
        if (!$cart['dtl']) {
            $data = [
                'result' => NULL,
                'cart' => $cart['cart']
            ];
        } else {
            $result =  $this->db->select('sewa_detail.status_qty,sewa.id_sewa,sewa_detail.id_sewa_detail,inventory.nama AS nama_inventory,inventory.harga,penyewa.nama,penyewa.telp,sewa.status,sewa_detail.sub_total,sewa_detail.jumlah,inventory.image,inventory.id_inventory,sewa.total')

                ->from('sewa')
                ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
                // ->join('admin', 'sewa.id_admin = admin.id_admin')
                ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
                ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')
                ->where(array(
                    'sewa_detail.id_sewa' => $cart['dtl'][0]['id_sewa'],
                    'sewa_detail.status_qty' => 1
                ))
                ->get()->result_array();
            $data = [
                'result' => $result,
                'cart' => $cart['cart']
            ];
        }
        return $data;
    }

    public function updateSewa()
    {
        $datetime1 = strtotime($this->input->post('tgl-mulai'));
        $datetime2 = strtotime($this->input->post('tgl-selesai'));
        $interval = abs($datetime2 - $datetime1);
        $numberDays = $interval / 86400;
        $total = $this->input->post('total') * $numberDays;
        $data = [
            'tgl_mulai' => date('Y-m-d H:i:s', $datetime1),
            'tgl_selesai' => date('Y-m-d H:i:s', $datetime2),
            'total' => $total,
            'status' => 2
        ];

        $result =  $this->db->where(array(
            'id_sewa' => $this->input->post('id_sewa'),
        ));

        $this->db->update('sewa', $data);

        $inv = $this->getSwdetail($this->input->post('id_sewa'));

        foreach ($inv as $i) {
            $dati = [
                'id_sewa' => $this->input->post('id_sewa'),
                'sub_total' => $i['sub_total'] * $numberDays
            ];
            $this->db->where(['id_sewa' => $dati['id_sewa'], 'id_inventory' => $i['id_inventory']]);
            $this->db->update('sewa_detail', $dati);
        }
        // $k = $this->db->update_batch('sewa_detail', $dati, 'id_sewa', 'id_inventory');
        $dat = ['data' => $data, 'result' => $result];

        return $dat;
    }

    public function getPemesanan()
    {
        $result =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where(array('sewa.status' => 2))
            ->get()->result_array();
        return $result;
    }
    public function uploadBukti($data)
    {
        $cekbukti = $this->db->query("SELECT bukti_bayar FROM sewa where id_sewa=" . $this->input->post('id_sewa'))->result_array();
        if (!$cekbukti[0]['bukti_bayar']) {
            $data = [
                'bukti_bayar' => $data['file_name']
            ];
            $result =  $this->db->where(array(
                'id_sewa' => $this->input->post('id_sewa'),
            ));
            $this->db->update('sewa', $data);

            $inv = $this->getSwdetail($this->input->post('id_sewa'));
            $no = 1;
            foreach ($inv as $i) {
                $get[$no] =  $this->db->query("SELECT * FROM inventory where id_inventory=" . $i['id_inventory'])->result_array();
                $dat[] = [
                    'id_inventory' => $get[$no][0]['id_inventory'],
                    'jumlah' => $get[$no][0]['jumlah'] - $i['jumlah'],
                    'dipinjam' => $i['jumlah']
                ];
                $no++;
            }
            $k = $this->db->update_batch('inventory', $dat, 'id_inventory');
            return $k;
        } else {
            $data = [
                'bukti_bayar' => $data['file_name']
            ];
            $result =  $this->db->where(array(
                'id_sewa' => $this->input->post('id_sewa'),
            ));
            $this->db->update('sewa', $data);
        }
    }
}
