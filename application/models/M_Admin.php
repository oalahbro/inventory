<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
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

    public function getKategori()
    {
        $sql = "SELECT * from kategori";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }
    public function katTitle()
    {
        $catid = intval($_GET['catid']);
        if (!$catid) {
            $catid = "Inventory";
        }
        $sql = "SELECT * from kategori where id_kategori='$catid'";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }

    public function addKategori()
    {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')

        ];

        $result =  $this->db->insert('kategori', $data);
        return $result;
    }

    public function editKategori()
    {

        $data = [
            'id_kategori' => $this->input->post('id_kategori'),
            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        $result =  $this->db->where(array(
            'id_kategori' => $data['id_kategori']
        ));
        $this->db->update('kategori', $data);
        return $result;
    }

    public function hapusKategori($id_kategori)
    {
        $this->db->where(array('id_kategori' => $id_kategori));
        $this->db->delete('kategori');
    }
    //SELECT inventory.id_inventory,admin.username,kategori.nama_kategori,inventory.nama,inventory.tahun,inventory.jumlah, inventory.deskripsi,inventory.harga,inventory.image FROM kategori JOIN inventory ON kategori.id_kategori=inventory.id_kategori JOIN admin ON inventory.id_admin=admin.id_admin

    public function getInventory()
    {
        $sql = "SELECT inventory.id_inventory,admin.username,kategori.nama_kategori,kategori.id_kategori,inventory.nama,inventory.tahun,inventory.jumlah,inventory.dipinjam,inventory.deskripsi,inventory.harga,inventory.image FROM kategori JOIN inventory ON kategori.id_kategori=inventory.id_kategori JOIN admin ON inventory.id_admin=admin.id_admin";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }


    public function filter()
    {
        $catid = intval($_GET['catid']);
        $sql = "SELECT inventory.id_inventory,admin.username,kategori.nama_kategori,kategori.id_kategori,inventory.nama,inventory.tahun,inventory.jumlah, inventory.deskripsi,inventory.harga,inventory.image FROM kategori JOIN inventory ON kategori.id_kategori=inventory.id_kategori JOIN admin ON inventory.id_admin=admin.id_admin where inventory.id_kategori='$catid'";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }

    public function updateInventory($dataimg)
    {
        if (!$dataimg['file_ext']) {
            $data = [
                'id_inventory' => $this->input->post('id_inventory'),
                'nama' => $this->input->post('nama'),
                'id_admin' => $this->session->userdata('id_admin'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tahun' => date('Y-m-d', strtotime($this->input->post('tahun'))),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
                'id_kategori' => $this->input->post('kategori')
            ];
        } else {
            $data = [
                'id_inventory' => $this->input->post('id_inventory'),
                'id_admin' => $this->session->userdata('id_admin'),
                'nama' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tahun' => date('Y-m-d', strtotime($this->input->post('tahun'))),
                'image' => $dataimg['file_name'],
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
                'id_kategori' => $this->input->post('kategori')
            ];
        }
        $this->db->where(array(
            'id_inventory' => $data['id_inventory']
        ));
        $this->db->update('inventory', $data);
        return $data;
    }

    public function addInventory($data)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tahun' => date('Y-m-d', strtotime($this->input->post('tahun'))),
            'image' => $data['file_name'],
            'jumlah' => $this->input->post('jumlah'),
            'id_kategori' => $this->input->post('kategori'),
            'id_admin' => $this->session->userdata('id_admin'),
            'harga' => $this->input->post('harga')

        ];

        $result =  $this->db->insert('inventory', $data);
        return $result;
    }
    public function delInventory($id_inv)
    {
        $this->db->where(array('id_inventory' => $id_inv));
        $this->db->delete('inventory');
    }

    public function getPenyewa()
    {
        $sql = "SELECT * from penyewa";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }

    public function addPenyewa()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'telp' => $this->input->post('telp'),
            'no_identitas' => $this->input->post('no_identitas'),
            'alamat' => $this->input->post('alamat'),
            'level' => $this->input->post('level')
        ];

        $result =  $this->db->insert('penyewa', $data);
        return $result;
    }

    public function editPenyewa()
    {

        if (!$this->input->post('password')) {
            $data = [
                'id_penyewa' => $this->input->post('id_penyewa'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telp' => $this->input->post('telp'),
                'no_identitas' => $this->input->post('no_identitas'),
                'alamat' => $this->input->post('alamat'),
                'level' => $this->input->post('level'),
            ];
        } else {
            $data = [
                'id_penyewa' => $this->input->post('id_penyewa'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telp' => $this->input->post('telp'),
                'no_identitas' => $this->input->post('no_identitas'),
                'alamat' => $this->input->post('alamat'),
                'level' => $this->input->post('level'),
                'password' => md5($this->input->post('password'))
            ];
        }
        $result =  $this->db->where(array(
            'id_penyewa' => $data['id_penyewa']
        ));
        $this->db->update('penyewa', $data);
        return $result;
    }

    public function hapusPenyewa($id_penyewa)
    {
        $this->db->where(array('id_penyewa' => $id_penyewa));
        $this->db->delete('penyewa');
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

    public function getkonfPemesanan()
    {

        $result =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where(array('sewa.status' => 1))
            ->get()->result_array();
        return $result;
    }

    public function getSwdetail($catid)
    {

        $result =  $this->db->select('sewa_detail.id_sewa_detail,inventory.id_inventory,inventory.nama AS nama_inventory,inventory.harga,penyewa.nama,sewa.status,sewa.bukti_bayar,sewa_detail.sub_total,sewa_detail.jumlah')
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

    public function updatePemesanan()
    {
        if ($_POST['action'] == 'konfirmasi') {
            $inv = $this->getSwdetail($this->input->post('id_sewa'));
            if (!$inv[0]['bukti_bayar']) {
                $inv = $this->getSwdetail($this->input->post('id_sewa'));
                $no = 1;
                foreach ($inv as $i) {
                    $get[$no] =  $this->db->query("SELECT * FROM inventory where id_inventory=" . $i['id_inventory'])->result_array();
                    $dat[] = [
                        'id_inventory' => $get[$no][0]['id_inventory'],
                        'jumlah' => $get[$no][0]['jumlah'] - $i['jumlah'],
                        'dipinjam' => $get[$no][0]['dipinjam'] + $i['jumlah']
                    ];
                    $no++;
                }
                $this->db->update_batch('inventory', $dat, 'id_inventory');
            }
            $data = [
                'id_sewa' => $this->input->post('id_sewa'),
                'status' => 1
            ];
        } else if ($_POST['action'] == 'selesai') {
            $data = [
                'id_sewa' => $this->input->post('id_sewa'),
                'status' => 3
            ];

            $inv = $this->getSwdetail($this->input->post('id_sewa'));
            $no = 1;
            foreach ($inv as $i) {
                $get[$no] =  $this->db->query("SELECT * FROM inventory where id_inventory=" . $i['id_inventory'])->result_array();
                $dat[] = [
                    'id_inventory' => $get[$no][0]['id_inventory'],
                    'jumlah' => $get[$no][0]['jumlah'] + $i['jumlah'],
                    'dipinjam' => $get[$no][0]['dipinjam'] - $i['jumlah']

                ];
                $no++;
            }
            $this->db->update_batch('inventory', $dat, 'id_inventory');
        } else {
            $data = [
                'id_sewa' => $this->input->post('id_sewa'),
                'status' => 0
            ];

            $inv = $this->getSwdetail($this->input->post('id_sewa'));
            if ($inv[0]['bukti_bayar']) {
                $no = 1;
                foreach ($inv as $i) {
                    $get[$no] =  $this->db->query("SELECT * FROM inventory where id_inventory=" . $i['id_inventory'])->result_array();
                    $dat[] = [
                        'id_inventory' => $get[$no][0]['id_inventory'],
                        'jumlah' => $get[$no][0]['jumlah'] + $i['jumlah'],
                        'dipinjam' => $get[$no][0]['dipinjam'] - $i['jumlah']
                    ];
                    $no++;
                }
                $this->db->update_batch('inventory', $dat, 'id_inventory');
            }
        }
        $result =  $this->db->where(array(
            'id_sewa' => $data['id_sewa']
        ));
        $this->db->update('sewa', $data);
        return $result;
        // return $inv;
    }

    public function getHistory()
    {

        $result =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where('sewa.status', '0')
            ->get()->result_array();
        return $result;
    }

    public function filterhistory()
    {
        $stts = intval($_GET['stts']);
        $result =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where(array('sewa.status' => $stts))
            ->get()->result_array();
        return $result;
    }

    public function getPesananSelesai()
    {

        $result =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where('sewa.status', '3')
            ->get()->result_array();
        return $result;
    }

    public function getPesananDibatalkan()
    {

        $result =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where('sewa.status', '0')
            ->get()->result_array();
        return $result;
    }

    public function getLaporan()
    {
        $notw = [4];
        $result =  $this->db->select('sewa.id_sewa,penyewa.nama as nama_penyewa,inventory.nama,sewa_detail.harga,sewa_detail.jumlah,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa_detail.sub_total')
            ->from('sewa')
            ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')

            ->where_not_in('sewa.status', $notw)
            ->get()->result_array();
        return $result;
    }
    public function searchLapstock()
    {
        $query = $this->input->post('query');
        $result = $this->db->select('inventory.id_inventory,admin.username,kategori.nama_kategori,kategori.id_kategori,inventory.nama,inventory.tahun,inventory.jumlah,inventory.dipinjam,inventory.deskripsi,inventory.harga,inventory.image')
            ->from('kategori')
            ->join('inventory', 'kategori.id_kategori = inventory.id_kategori')
            ->join('admin', 'inventory.id_admin = admin.id_admin')
            ->where(array(
                'inventory.nama LIKE' => '%' . $query . '%'
            ))
            ->get()->result_array();
        return $result;
    }
    public function getlapstock()
    {
        if ($this->input->post('kategori') && $this->input->post('stock') == 1) {
            $result = $this->db->select('inventory.id_inventory,admin.username,kategori.nama_kategori,kategori.id_kategori,inventory.nama,inventory.tahun,inventory.jumlah,inventory.dipinjam,inventory.deskripsi,inventory.harga,inventory.image')
                ->from('kategori')
                ->join('inventory', 'kategori.id_kategori = inventory.id_kategori')
                ->join('admin', 'inventory.id_admin = admin.id_admin')
                ->where(array(
                    'inventory.dipinjam >' => 0,
                    'inventory.id_kategori' => $this->input->post('kategori')
                ))
                ->get()->result_array();
            return $result;
        } elseif ($this->input->post('kategori') && $this->input->post('stock') == 2) {
            $result = $this->db->select('inventory.id_inventory,admin.username,kategori.nama_kategori,kategori.id_kategori,inventory.nama,inventory.tahun,inventory.jumlah,inventory.dipinjam,inventory.deskripsi,inventory.harga,inventory.image')
                ->from('kategori')
                ->join('inventory', 'kategori.id_kategori = inventory.id_kategori')
                ->join('admin', 'inventory.id_admin = admin.id_admin')
                ->where(array(
                    'inventory.jumlah >' => 0,
                    'inventory.id_kategori' => $this->input->post('kategori')
                ))
                ->get()->result_array();
            return $result;
        } elseif ($this->input->post('kategori')) {
            $result = $this->db->select('inventory.id_inventory,admin.username,kategori.nama_kategori,kategori.id_kategori,inventory.nama,inventory.tahun,inventory.jumlah,inventory.dipinjam,inventory.deskripsi,inventory.harga,inventory.image')
                ->from('kategori')
                ->join('inventory', 'kategori.id_kategori = inventory.id_kategori')
                ->join('admin', 'inventory.id_admin = admin.id_admin')
                ->where(array(
                    'inventory.id_kategori' => $this->input->post('kategori')
                ))
                ->get()->result_array();
            return $result;
        } elseif ($this->input->post('stock') == 1) {
            $result = $this->db->select('inventory.id_inventory,admin.username,kategori.nama_kategori,kategori.id_kategori,inventory.nama,inventory.tahun,inventory.jumlah,inventory.dipinjam,inventory.deskripsi,inventory.harga,inventory.image')
                ->from('kategori')
                ->join('inventory', 'kategori.id_kategori = inventory.id_kategori')
                ->join('admin', 'inventory.id_admin = admin.id_admin')
                ->where(array(
                    'inventory.dipinjam >' => 0
                ))
                ->get()->result_array();
            return $result;
        } elseif ($this->input->post('stock') == 2) {
            $result = $this->db->select('inventory.id_inventory,admin.username,kategori.nama_kategori,kategori.id_kategori,inventory.nama,inventory.tahun,inventory.jumlah,inventory.dipinjam,inventory.deskripsi,inventory.harga,inventory.image')
                ->from('kategori')
                ->join('inventory', 'kategori.id_kategori = inventory.id_kategori')
                ->join('admin', 'inventory.id_admin = admin.id_admin')
                ->where(array(
                    'inventory.jumlah >' => 0
                ))
                ->get()->result_array();
            return $result;
        } else {
            $result = $this->db->select('inventory.id_inventory,admin.username,kategori.nama_kategori,kategori.id_kategori,inventory.nama,inventory.tahun,inventory.jumlah,inventory.dipinjam,inventory.deskripsi,inventory.harga,inventory.image')
                ->from('kategori')
                ->join('inventory', 'kategori.id_kategori = inventory.id_kategori')
                ->join('admin', 'inventory.id_admin = admin.id_admin')
                ->get()->result_array();
            return $result;
        }
    }

    public function searchLapdate()
    {
        $start_date = strtotime($this->input->post('tgl_mulai'));
        $end_date = strtotime($this->input->post('tgl_selesai'));
        if ($start_date && $end_date) {
            $result =  $this->db->select('sewa.id_sewa,penyewa.nama as nama_penyewa,inventory.nama,sewa_detail.harga,sewa_detail.jumlah,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa_detail.sub_total')
                ->from('sewa')
                ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
                ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
                ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')
                ->where(array(
                    'sewa.tgl_mulai >=' =>  date('Y-m-d H:i:s', $start_date),
                    'sewa.tgl_selesai <=' =>  date('Y-m-d H:i:s',  $end_date)
                ))

                ->get()->result_array();
            return $result;
        } elseif ($start_date) {
            $result =  $this->db->select('sewa.id_sewa,penyewa.nama as nama_penyewa,inventory.nama,sewa_detail.harga,sewa_detail.jumlah,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa_detail.sub_total')
                ->from('sewa')
                ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
                ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
                ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')
                ->where(array(
                    'sewa.tgl_mulai >=' =>  date('Y-m-d H:i:s', $start_date)
                ))

                ->get()->result_array();
            return $result;
        } elseif ($end_date) {
            $result =  $this->db->select('sewa.id_sewa,penyewa.nama as nama_penyewa,inventory.nama,sewa_detail.harga,sewa_detail.jumlah,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa_detail.sub_total')
                ->from('sewa')
                ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
                ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
                ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')
                ->where(array(
                    'sewa.tgl_selesai <=' =>  date('Y-m-d H:i:s',  $end_date)
                ))

                ->get()->result_array();
            return $result;
        } else {
            $result =  $this->db->select('sewa.id_sewa,penyewa.nama as nama_penyewa,inventory.nama,sewa_detail.harga,sewa_detail.jumlah,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa_detail.sub_total')
                ->from('sewa')
                ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
                ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
                ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')

                ->get()->result_array();
            return $result;
        }
    }
    public function getLaporandate()
    {
        $start_date = strtotime($this->input->post('tgl_mulai'));
        $end_date = strtotime($this->input->post('tgl_selesai'));
        $result =  $this->db->select('sewa.id_sewa,penyewa.nama as nama_penyewa,inventory.nama,sewa_detail.harga,sewa_detail.jumlah,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa_detail.sub_total')
            ->from('sewa')
            ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')
            ->where(array(
                'sewa.tgl_mulai >' =>  date('Y-m-d H:i:s', $start_date),
                'sewa.tgl_selesai <' =>  date('Y-m-d H:i:s',  $end_date)
            ))
            // ->where('date BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"')
            ->get()->result_array();
        return $result;
    }
    public function getProfil()
    {
        $sql = "SELECT * from admin where id_admin=" . $this->session->userdata('id_admin');
        $result =  $this->db->query($sql)->result_array();
        return $result;
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
                'id_admin' => $this->session->userdata('id_admin'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'image' => $img
            ];
        } else {
            $data = [
                'id_admin' => $this->session->userdata('id_admin'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'image' => $img
            ];
        }
        $result =  $this->db->where(array(
            'id_admin' => $data['id_admin']
        ));
        $this->db->update('admin', $data);
        return $result;
    }

    public function dashboard()
    {
        $totinventory = $this->db->get('inventory')->num_rows();
        $totpesan = $this->db->get_where('sewa', array('status =' => 2))->num_rows();
        $totkonf = $this->db->get_where('sewa', array('status =' => 1))->num_rows();
        $totselesai = $this->db->get_where('sewa', array('status =' => 3))->num_rows();
        $data = [
            'totinventory' => $totinventory,
            'totpesan' => $totpesan,
            'totkonf' => $totkonf,
            'totselesai' => $totselesai
        ];
        return $data;
    }
    public function searchPenyewa()
    {
        $search = $this->input->post('query');
        $sql = "SELECT * from penyewa where nama LIKE '%$search%'";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }

    public function searchInventory()
    {
        $search = $this->input->post('query');
        $sql = "SELECT * from inventory where nama LIKE '%$search%'";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }

    public function searchPemesanan()
    {
        $search = $this->input->post('query');
        $result =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where(array('sewa.status' => 2, 'penyewa.nama LIKE' => '%' . $search . '%'))
            ->get()->result_array();
        return $result;
    }

    public function searchKonf()
    {
        $search = $this->input->post('query');
        $result =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where(array('sewa.status' => 1, 'penyewa.nama LIKE' => '%' . $search . '%'))
            ->get()->result_array();
        return $result;
    }

    public function searchPesananSelesai()
    {
        $search = $this->input->post('query');
        $result =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where(array('sewa.status' => 3, 'penyewa.nama LIKE' => '%' . $search . '%'))
            ->get()->result_array();
        return $result;
    }

    public function searchPesananDibatalkan()
    {
        $search = $this->input->post('query');
        $result =  $this->db->select('sewa.id_sewa,penyewa.nama,sewa.status,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa.bukti_bayar')
            ->from('sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->where(array('sewa.status' => 0, 'penyewa.nama LIKE' => '%' . $search . '%'))
            ->get()->result_array();
        return $result;
    }
    public function searchLaporan()
    {
        $search = $this->input->post('query');
        $result =  $this->db->select('sewa.id_sewa,penyewa.nama as nama_penyewa,inventory.nama,sewa_detail.harga,sewa_detail.jumlah,sewa.tgl_mulai,sewa.tgl_selesai,sewa.tgl_booking,sewa_detail.sub_total')
            ->from('sewa')
            ->join('sewa_detail', 'sewa.id_sewa = sewa_detail.id_sewa')
            ->join('penyewa', 'sewa.id_penyewa = penyewa.id_penyewa')
            ->join('inventory', 'sewa_detail.id_inventory = inventory.id_inventory')
            ->where(array('penyewa.nama LIKE' => '%' . $search . '%'))
            ->get()->result_array();
        return $result;
    }
    public function getKategoris()
    {
        $id = (int)$this->input->post('kategori');
        $sql = "SELECT * from kategori where id_kategori=$id";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }
}
