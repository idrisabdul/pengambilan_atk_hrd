<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    public function inputAtk($atk)
    {
        return $this->db->insert('tb_barang', $atk);
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
}
