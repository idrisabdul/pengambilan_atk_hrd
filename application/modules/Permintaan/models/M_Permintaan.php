<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Permintaan extends CI_Model
{
    public function input_sem($ambilatk)
    {
        $this->db->insert('tb_detail_ambilatk', $ambilatk);
    }

    public function updateStatus($status, $no)
    {
        $this->db->update('tb_detail_ambilatk', $status, ['no_ambilatk' => $no]);
    }

    public function lebihLanjut($no_ambilatk)
    {
        $this->db->select('*');
        $this->db->from('tb_ambil_atk');
        $this->db->join('tb_detail_ambilatk', 'tb_detail_ambilatk.no_ambilatk = tb_ambil_atk.no_ambilatk');
        $this->db->where('tb_ambil_atk.no_ambilatk', $no_ambilatk);
        return $this->db->get()->result_array();
    }
}
