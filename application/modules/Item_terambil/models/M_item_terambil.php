<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_item_terambil extends CI_Model
{
    public function joinTable()
    {
        $this->db->select('*');
        $this->db->from('tb_ambil_atk');
        $this->db->order_by('id_detail_ambilatk', 'DESC');
        $this->db->join('tb_detail_ambilatk', 'tb_detail_ambilatk.no_ambilatk = tb_ambil_atk.no_ambilatk');
        $this->db->join('kode_atk', 'kode_atk.id_kodeatk = tb_detail_ambilatk.kode_atk');
        $this->db->join('kategori', 'kategori.id_kat = tb_detail_ambilatk.kat_barang');
        $this->db->join('satuan', 'satuan.id_sat = tb_detail_ambilatk.sat');
        $this->db->where('tb_detail_ambilatk.status !=', '2');
        $this->db->where('tb_detail_ambilatk.status !=', '4');
        return $this->db->get()->result_array();
    }
}
