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
        $this->db->join('kode_atk', 'kode_atk.id_kodeatk = tb_detail_ambilatk.kode_atk');
        $this->db->join('kategori', 'kategori.id_kat = tb_detail_ambilatk.kat_barang');
        $this->db->join('satuan', 'satuan.id_sat = tb_detail_ambilatk.sat');
        $this->db->where('tb_ambil_atk.no_ambilatk', $no_ambilatk);
        return $this->db->get()->result_array();
    }

    public function tb_atk()
    {
        $this->db->select('tb_barang.id_barang, tb_barang.nama_pt, tb_barang.nm_barang, tb_barang.kd_inputatk, tb_barang.kat_barang, tb_barang.merek, tb_barang.harga, tb_barang.kode_barang, tb_barang.qty, tb_barang.keterangan, tb_barang.satuan, tb_barang.kode_atk, tb_barang.satuan, tb_barang.tgl_masuk_barang, kategori.nm_kategori, kode_atk.kode_atk as kodeatk_set, satuan.satuan as satuan_set');
        // $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('kode_atk', 'kode_atk.id_kodeatk = tb_barang.kode_atk');
        $this->db->join('kategori', 'kategori.id_kat = tb_barang.kat_barang');
        $this->db->join('satuan', 'satuan.id_sat = tb_barang.satuan');
        return $this->db->get()->result_array();
    }

    public function join_ambilatk($no_ambil)
    {
        $this->db->select('*');
        $this->db->from('tb_detail_ambilatk');
        $this->db->join('kode_atk', 'kode_atk.id_kodeatk = tb_detail_ambilatk.kode_atk');
        $this->db->join('kategori', 'kategori.id_kat = tb_detail_ambilatk.kat_barang');
        $this->db->join('satuan', 'satuan.id_sat = tb_detail_ambilatk.sat');
        $this->db->where('tb_detail_ambilatk.no_ambilatk', $no_ambil);
        $this->db->where('tb_detail_ambilatk.status', 0);
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
