<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_retur extends CI_Model
{
    public function insertRetur($retur)
    {
        $this->db->insert('tb_atk_rusak', $retur);
    }

    public function inputRetur($gantiatk)
    {
        $this->db->insert('tb_detail_ambilatk', $gantiatk);
    }

    public function showAll()
    {
        $this->db->select('*');
        $this->db->from('tb_ambil_atk');
        $this->db->order_by('id_detail_ambilatk', 'DESC');
        $this->db->join('tb_detail_ambilatk', 'tb_detail_ambilatk.no_ambilatk = tb_ambil_atk.no_ambilatk');
        return $this->db->get()->result_array();
    }
    public function joinTable($user)
    {
        $this->db->select('*');
        $this->db->from('tb_ambil_atk');
        $this->db->order_by('id_detail_ambilatk', 'DESC');
        $this->db->join('tb_detail_ambilatk', 'tb_detail_ambilatk.no_ambilatk = tb_ambil_atk.no_ambilatk');
        $this->db->where('user_nama', $user);
        return $this->db->get()->result_array();
    }

    public function gantiAtk($id)
    {
        $this->db->select('*');
        $this->db->from('tb_ambil_atk');
        $this->db->order_by('id_detail_ambilatk', 'DESC');
        $this->db->join('tb_detail_ambilatk', 'tb_detail_ambilatk.no_ambilatk = tb_ambil_atk.no_ambilatk');
        $this->db->where('id_detail_ambilatk', $id);
        return $this->db->get()->result_array();
    }

    public function returFinish($id)
    {
        return $this->db->update('tb_detail_ambilatk', ['status' => 1], ['id_detail_ambilatk' => $id]);
    }
}
