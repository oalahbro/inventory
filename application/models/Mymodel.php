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

    public function getAdmin()
    {
        $sql = "SELECT * from admin";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }

    public function hapus($id_admin)
    {
        $this->db->where(array('id_admin' => $id_admin));
        $this->db->delete('admin');
    }

    public function addAdmin()
    {
        $data = [
            'username' => $this->input->post('username'),
            'level' => $this->input->post('level'),
            'status' => $this->input->post('status'),
            'password' => md5($this->input->post('password'))
        ];

        $result =  $this->db->insert('admin', $data);
        return $result;
    }

    public function editAdmin()
    {

        if (!$this->input->post('password')) {
            $data = [
                'id_admin' => $this->input->post('id_admin'),
                'username' => $this->input->post('username'),
                'level' => $this->input->post('level'),
                'status' => $this->input->post('status')
            ];
        } else {
            $data = [
                'id_admin' => $this->input->post('id_admin'),
                'username' => $this->input->post('username'),
                'level' => $this->input->post('level'),
                'status' => $this->input->post('status'),
                'password' => md5($this->input->post('password'))
            ];
        }
        $result =  $this->db->where(array(
            'id_admin' => $data['id_admin']
        ));
        $this->db->update('admin', $data);
        return $result;
    }

    public function getKategori()
    {
        $sql = "SELECT * from kategori";
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

    public function getRuang()
    {
        $sql = "SELECT inventory.id_inventory,admin.username,kategori.nama_kategori,inventory.nama,inventory.tahun,inventory.jumlah, inventory.deskripsi,inventory.harga,inventory.image FROM kategori JOIN inventory ON kategori.id_kategori=inventory.id_kategori JOIN admin ON inventory.id_admin=admin.id_admin WHERE inventory.id_kategori=1";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }

    public function updateRuang()
    {
        if (!$this->input->post('image')) {
            $data = [
                'id_inventory' => $this->input->post('id_inventory'),
                'nama' => $this->input->post('nama'),
                'id_admin' => $this->session->userdata('id_admin'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tahun' => date('Y-m-d', strtotime($this->input->post('tahun'))),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga')
            ];
        } else {
            $data = [
                'id_inventory' => $this->input->post('id_inventory'),
                'id_admin' => $this->session->userdata('id_admin'),
                'nama' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tahun' => date('Y-m-d', strtotime($this->input->post('tahun'))),
                'image' => $this->input->post('image'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga')
            ];
        }
        $this->db->where(array(
            'id_inventory' => $data['id_inventory']
        ));
        $this->db->update('inventory', $data);
        return $data;
    }

    public function addRuang()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tahun' => date('Y-m-d', strtotime($this->input->post('tahun'))),
            'image' => $this->input->post('image'),
            'jumlah' => $this->input->post('jumlah'),
            'id_kategori' => "1",
            'id_admin' => $this->session->userdata('id_admin'),
            'harga' => $this->input->post('harga')

        ];

        $result =  $this->db->insert('inventory', $data);
        return $result;
    }
    public function delRuang($id_ruang)
    {
        $this->db->where(array('id_inventory' => $id_ruang));
        $this->db->delete('inventory');
    }

    public function getBarang()
    {
        $sql = "SELECT inventory.id_inventory,admin.username,kategori.nama_kategori,inventory.nama,inventory.tahun,inventory.jumlah, inventory.deskripsi,inventory.harga,inventory.image FROM kategori JOIN inventory ON kategori.id_kategori=inventory.id_kategori JOIN admin ON inventory.id_admin=admin.id_admin WHERE inventory.id_kategori=2";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }

    public function updateBarang()
    {
        if (!$this->input->post('image')) {
            $data = [
                'id_inventory' => $this->input->post('id_inventory'),
                'nama' => $this->input->post('nama'),
                'id_admin' => $this->session->userdata('id_admin'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tahun' => date('Y-m-d', strtotime($this->input->post('tahun'))),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga')
            ];
        } else {
            $data = [
                'id_inventory' => $this->input->post('id_inventory'),
                'id_admin' => $this->session->userdata('id_admin'),
                'nama' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'tahun' => date('Y-m-d', strtotime($this->input->post('tahun'))),
                'image' => $this->input->post('image'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga')
            ];
        }
        $this->db->where(array(
            'id_inventory' => $data['id_inventory']
        ));
        $this->db->update('inventory', $data);
        return $data;
    }

    public function addBarang()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tahun' => date('Y-m-d', strtotime($this->input->post('tahun'))),
            'image' => $this->input->post('image'),
            'jumlah' => $this->input->post('jumlah'),
            'id_kategori' => "2",
            'id_admin' => $this->session->userdata('id_admin'),
            'harga' => $this->input->post('harga')

        ];

        $result =  $this->db->insert('inventory', $data);
        return $result;
    }

    public function delBarang($id_ruang)
    {
        $this->db->where(array('id_inventory' => $id_ruang));
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
}
