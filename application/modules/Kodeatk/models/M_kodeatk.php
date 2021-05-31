<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_kodeatk extends CI_Model
{
    public function inputKode($kode)
    {
        return $this->db->insert('kode_atk', $kode);
    }

    public function updateKode($kode, $id)
    {
        return $this->db->update('kode_atk', $kode, ['id_kodeatk' => $id]);
    }

    public function deleteKode($id)
    {
        return $this->db->delete('kode_atk', ['id_kodeatk' => $id]);
    }
}
