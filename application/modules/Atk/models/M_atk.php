<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_atk extends CI_Model
{
    public function inputAtk($atk)
    {
        return $this->db->insert('tb_barang', $atk);
    }

    public function updateAtk($atk, $id)
    {
        return $this->db->update('tb_barang', $atk, ['id_barang' => $id]);
    }

    public function deleteAtk($id)
    {
        return $this->db->delete('tb_barang', ['id_barang' => $id]);
    }

    public function filterAtknm($nm_barang)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('nm_barang', $nm_barang);
        return $this->db->get()->result_array();
    }
    public function filterAtkkat($kat_barang)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('kat_barang', $kat_barang);
        return $this->db->get()->result_array();
    }
    public function filterAtksat($satuan)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('satuan', $satuan);
        return $this->db->get()->result_array();
    }
    public function filterAtk($nm_barang, $kat_barang, $satuan)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('nm_barang', $nm_barang);
        $this->db->where('kat_barang', $kat_barang);
        $this->db->where('satuan', $satuan);
        return $this->db->get()->result_array();
    }
}
