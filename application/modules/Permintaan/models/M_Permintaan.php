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
}
