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
}
