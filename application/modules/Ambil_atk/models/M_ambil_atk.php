<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_ambil_atk extends CI_Model
{
    public function inputAmbilAtk($atk)
    {
        return $this->db->insert('tb_ambil_atk', $atk);
    }

    public function updateAmbilAtk($ubahambil_atk, $id)
    {
        $this->db->update('tb_detail_ambilatk', $ubahambil_atk, ['id_detail_ambilatk' => $id]);
    }

    public function delete($no_ambilatk)
    {
        $this->db->delete('tb_ambil_atk', ['no_ambilatk' => $no_ambilatk]);
    }

    public function multiInsert($multipleatk)
    {
        $last_numberatk = 'SELECT no_urut FROM `tb_detail_ambilatk` ORDER BY id_detail_ambilatk DESC LIMIT 1';
        $row = $this->db->query($last_numberatk)->row_array();
        $last_no = $row['no_urut'];

        $memberi_no = $last_no + 1;

        for ($x = 0; $x < count($multipleatk); $x++) {

            $user = $multipleatk[$x]['user_nama'];
            $kd_input = $multipleatk[$x]['kd_inputatk'];
            $nama_pt = $multipleatk[$x]['nama_pt'];
            $data[] = array(
                'no_ambilatk' => 'AMBIL-ATK-' . date('Ymd') . '-00' . $memberi_no,
                'no_urut' => $memberi_no,
                'nm_barang' => $multipleatk[$x]['nm_barang'],
                // 'user_nama' => $multipleatk[$x]['user_nama'],
                'kd_inputatk' => $multipleatk[$x]['kd_inputatk'],
                'kat_barang' => $multipleatk[$x]['kat_barang'],
                // 'nama_pt' => $multipleatk[$x]['nama_pt'],
                'sat' => $multipleatk[$x]['sat'],
                'harga' => $multipleatk[$x]['harga'],
                'keperluan' => $multipleatk[$x]['keperluan'],
                'qty' => $multipleatk[$x]['qty'],
                // 'tgl_permintaan' => date('Y-m-d H:i:s'),
            );
        }

        try {
            for ($x = 0; $x < count($multipleatk); $x++) {
                $this->db->insert('tb_detail_ambilatk', $data[$x]);
            }
            $ambilatk = [
                'no_ambilatk' => 'AMBIL-ATK-' . date('Ymd') . '-00' . $memberi_no,
                'user_nama' => $user,
                'nama_pt' => $nama_pt,
                'jml_item_atk' => count($multipleatk),
                'tgl_permintaan' => date('Y-m-d H:i:s'),
            ];
            $this->db->insert('tb_ambil_atk', $ambilatk);
            return 'success';
        } catch (Exception $e) {
            return 'failed';
        }
    }

    public function lebihLanjut($no_ambilatk)
    {
        $this->db->select('*');
        $this->db->from('tb_ambil_atk');
        $this->db->join('tb_detail_ambilatk', 'tb_detail_ambilatk.no_ambilatk = tb_ambil_atk.no_ambilatk');
        $this->db->where('tb_ambil_atk.no_ambilatk', $no_ambilatk);
        return $this->db->get()->result_array();
    }

    public function deleteDetail($no_ambilatk)
    {
        $this->db->delete('tb_detail_ambilatk', ['no_ambilatk' => $no_ambilatk]);
    }
    // public function multiInsert($multipleatk)
    // {
    //     $last_numberatk = 'SELECT no_urut FROM `tb_ambil_atk` ORDER BY id DESC LIMIT 1';
    //     $row = $this->db->query($last_numberatk)->row_array();
    //     $last_no = $row['no_urut'];

    //     $memberi_no = $last_no + 1;

    //     for ($x = 0; $x < count($multipleatk); $x++) {

    //         $data[] = array(
    //             'no_ambilatk' => 'AMBIL-ATK-' . date('Ymd') . '-00' . $memberi_no,
    //             'no_urut' => $memberi_no,
    //             'nm_barang' => $multipleatk[$x]['nm_barang'],
    //             'user_nama' => $multipleatk[$x]['user_nama'],
    //             'kd_inputatk' => $multipleatk[$x]['kd_inputatk'],
    //             'kat_barang' => $multipleatk[$x]['kat_barang'],
    //             'nama_pt' => $multipleatk[$x]['nama_pt'],
    //             'sat' => $multipleatk[$x]['sat'],
    //             'keperluan' => $multipleatk[$x]['keperluan'],
    //             'qty' => $multipleatk[$x]['qty'],
    //             'tgl_permintaan' => date('Y-m-d H:i:s'),
    //         );
    //     }

    //     try {
    //         for ($x = 0; $x < count($multipleatk); $x++) {
    //             $this->db->insert('tb_ambil_atk', $data[$x]);
    //         }
    //         return 'success';
    //     } catch (Exception $e) {
    //         return 'failed';
    //     }
    // }

    // NEW METHOD 
    public function input_sem($ambilatk)
    {
        $this->db->insert('tb_detail_ambilatk', $ambilatk);
    }

    public function updateStatus($status, $no)
    {
        $this->db->update('tb_detail_ambilatk', $status, ['no_ambilatk' => $no]);
    }

    public function deleteItemAmbil($id)
    {
        return $this->db->delete('tb_detail_ambilatk', ['id_detail_ambilatk' => $id]);
    }
}
