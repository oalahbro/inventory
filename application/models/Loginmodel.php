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

    public function cekPenyewa()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $sql = "SELECT * FROM penyewa WHERE email='$username' AND password='$password'";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }
    public function cekGoogle($setuser)
    {

        $sql = "SELECT * FROM penyewa WHERE email='" . $setuser['email'] . "'";
        $result =  $this->db->query($sql)->result_array();
        return $result;
    }
    public function resgister()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'telp' => $this->input->post('telp'),
            'no_identitas' => $this->input->post('no_identitas'),
            'alamat' => $this->input->post('alamat'),
            'level' => '3',
            'password' => md5($this->input->post('password'))
        ];

        $result =  $this->db->insert('penyewa', $data);
        return $result;
    }

    public function registerGoogle($data)
    {
        $data = [
            'nama' => $data['given_name'] . " " . $data['family_name'],
            'email' => $data['email'],
            'level' => '3'
        ];

        $result =  $this->db->insert('penyewa', $data);
        return $result;
    }
}
