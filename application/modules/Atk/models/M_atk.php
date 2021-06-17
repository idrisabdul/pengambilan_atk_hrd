<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_atk extends CI_Model
{
    public function inputAtk($atk)
    {
        return $this->db->insert('tb_barang', $atk);
    }

    public function updateAtk($atk, $id)
    {
        return $this->db->update('tb_barang', $atk, ['id_barang' => $id]);
    }

    public function deleteAtk($id)
    {
        return $this->db->delete('tb_barang', ['id_barang' => $id]);
    }

    public function joinatk_kodeatk()
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->join('kode_atk', 'kode_atk.id_kodeatk = tb_barang.kode_atk');
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

    public function filterAtknm($nm_barang)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('nm_barang', $nm_barang);
        return $this->db->get()->result_array();
    }
    public function filterAtkkat($kat_barang)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('kat_barang', $kat_barang);
        return $this->db->get()->result_array();
    }
    public function filterAtksat($satuan)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('satuan', $satuan);
        return $this->db->get()->result_array();
    }
    public function filterAtk($nm_barang, $kat_barang, $satuan)
    {
        $this->db->select('tb_barang.id_barang, tb_barang.nama_pt, tb_barang.nm_barang, tb_barang.kd_inputatk, tb_barang.kat_barang, tb_barang.merek, tb_barang.harga, tb_barang.kode_barang, tb_barang.qty, tb_barang.keterangan, tb_barang.satuan, tb_barang.kode_atk, tb_barang.satuan, tb_barang.tgl_masuk_barang, kategori.nm_kategori, kode_atk.kode_atk as kodeatk_set, satuan.satuan as satuan_set');
        $this->db->from('tb_barang');
        $this->db->join('kode_atk', 'kode_atk.id_kodeatk = tb_barang.kode_atk');
        $this->db->join('kategori', 'kategori.id_kat = tb_barang.kat_barang');
        $this->db->join('satuan', 'satuan.id_sat = tb_barang.satuan');
        $this->db->where('tb_barang.nm_barang', $nm_barang);
        $this->db->where('tb_barang.kat_barang', $kat_barang);
        $this->db->where('tb_barang.satuan', $satuan);
        return $this->db->get()->result_array();
    }
}
