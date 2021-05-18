<?php defined('BASEPATH') or exit('No direct script access allowed');

class Atk extends CI_Controller
{
    function index()
    {
        $sql = "SELECT * FROM db_sso.tb_pt";
        $data['pt'] = $this->db->query($sql)->result_array();
        $sql_atk = "SELECT * FROM tb_barang ORDER BY id_barang DESC";
        $data['atk'] = $this->db->query($sql_atk)->result_array();
        $sql_kat = "SELECT * FROM kategori";
        $data['kategori'] = $this->db->query($sql_kat)->result_array();
        $sql_sat = "SELECT * FROM satuan";
        $data['sat'] = $this->db->query($sql_sat)->result_array();
        // echo "<pre>";
        // var_dump($data['user_nama']);
        // echo "</pre>";
        $this->template->load('template', 'v_atk', $data);
    }
}
