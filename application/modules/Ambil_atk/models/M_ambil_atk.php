<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_ambil_atk extends CI_Model
{
    public function inputAmbilAtk($atk)
    {
        return $this->db->insert('tb_ambil_atk', $atk);
    }

    public function multiInsert($multipleatk)
    {
        for ($x = 0; $x < count($multipleatk); $x++) {

            $data[] = array(
                'no_ambilatk' => $multipleatk[$x]['no_ambilatk'],
                'nm_barang' => $multipleatk[$x]['nm_barang'],
                'user_nama' => $multipleatk[$x]['user_nama'],
                'kd_inputatk' => $multipleatk[$x]['kd_inputatk'],
                'kat_barang' => $multipleatk[$x]['kat_barang'],
                'nama_pt' => $multipleatk[$x]['nama_pt'],
                'sat' => $multipleatk[$x]['sat'],
                'keperluan' => $multipleatk[$x]['keperluan'],
                'qty' => $multipleatk[$x]['qty'],
            );
        }

        try {
            for ($x = 0; $x < count($multipleatk); $x++) {
                $this->db->insert('tb_ambil_atk', $data[$x]);
            }
            return 'success';
        } catch (Exception $e) {
            return 'failed';
        }
    }
}
