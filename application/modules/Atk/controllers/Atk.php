<?php defined('BASEPATH') or exit('No direct script access allowed');

class Atk extends CI_Controller
{
    function index()
    {
        $sql = "SELECT * FROM tb_barang";
        $data['atk'] = $this->db->query($sql)->result_array();
        // echo "<pre>";
        // var_dump($data['pt']);
        // echo "</pre>";
        $this->template->load('template', 'v_atk', $data);
    }
}
