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
}