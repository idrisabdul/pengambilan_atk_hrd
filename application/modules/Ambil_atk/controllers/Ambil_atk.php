<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ambil_atk extends CI_Controller
{
    public function getAtk($nm_barang)
    {
        $sql1 = "SELECT SUM(qty) as qtyatk,nm_barang,kat_barang,kd_barang,satuan,nama_pt FROM tb_barang WHERE nm_barang = '$nm_barang' GROUP BY nm_barang";
        $data['stok_atk'] = $this->db->query($sql1)->result_array();
        $sqluser = "SELECT nama FROM db_sso.user_ho";
        $data['user_nama'] = $this->db->query($sqluser)->result_array();
        // echo "<pre>";
        // var_dump($data['stok_atk']);
        // echo "</pre>";
        $this->template->load('template', 'v_ambilatk', $data);
    }

    public function insert($nm_barang)
    {
        $sql1 = "SELECT SUM(qty) as qtyatk,nm_barang,kat_barang,kd_barang,satuan,nama_pt FROM tb_barang WHERE nm_barang = '$nm_barang' GROUP BY nm_barang";
        $data['stok_atk'] = $this->db->query($sql1)->result_array();
        $sqluser = "SELECT nama FROM db_sso.user_ho";
        $data['user_nama'] = $this->db->query($sqluser)->result_array();
        // echo "<pre>";
        // var_dump($data['stok_atk']);
        // echo "</pre>";
        $this->template->load('template', 'v_ambilatk', $data);
    }
}
