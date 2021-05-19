<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori extends CI_Model
{
    public function inputKat($kategori)
    {
        return $this->db->insert('kategori', $kategori);
    }

    public function updateKat($kategori, $id)
    {
        return $this->db->update('kategori', $kategori, ['id_kat' => $id]);
    }

    public function deleteKat($id)
    {
        return $this->db->delete('kategori', ['id_kat' => $id]);
    }
}
