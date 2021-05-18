<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    public function inputAtk($atk)
    {
        return $this->db->insert('tb_barang', $atk);
    }
}
