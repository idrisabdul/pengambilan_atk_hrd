<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_satuan extends CI_Model
{
    public function inputSat($satuan)
    {
        return $this->db->insert('satuan', $satuan);
    }

    public function updateSat($satuan, $id)
    {
        return $this->db->update('satuan', $satuan, ['id_sat' => $id]);
    }

    public function deleteSat($id)
    {
        return $this->db->delete('satuan', ['id_sat' => $id]);
    }
}
