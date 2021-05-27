<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_item_terambil extends CI_Model
{
    public function joinTable()
    {
        $this->db->select('*');
        $this->db->from('tb_ambil_atk');
        $this->db->order_by('id_detail_ambilatk', 'DESC');
        $this->db->join('tb_detail_ambilatk', 'tb_detail_ambilatk.no_ambilatk = tb_ambil_atk.no_ambilatk');
        return $this->db->get()->result_array();
    }
}
