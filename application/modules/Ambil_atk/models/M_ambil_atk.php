<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_ambil_atk extends CI_Model
{
    public function inputAmbilAtk($atk)
    {
        return $this->db->insert('tb_ambil_atk', $atk);
    }
}
