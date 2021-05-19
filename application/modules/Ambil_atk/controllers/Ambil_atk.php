<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ambil_atk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_ambil_atk');

        if (!$this->session->userdata('userlogin')) {
            // redirect('https://192.168.1.231/msal-login/Login');
            redirect('localhost/Login');
        }
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        $sql = "SELECT * FROM tb_ambil_atk";
        $data['ambil_atk'] = $this->db->query($sql)->result_array();
        // echo "<pre>";
        // var_dump($data['stok_atk']);
        // echo "</pre>";
        $this->template->load('template', 'v_indexAmbil', $data);
    }



    public function getAtk($nm_barang)
    {
        $sql1 = "SELECT SUM(qty) as qtyatk,nm_barang,kat_barang,kd_barang,satuan,qty,nama_pt FROM tb_barang WHERE nm_barang = '$nm_barang' GROUP BY nm_barang";
        $data['stok_atk'] = $this->db->query($sql1)->result_array();
        $sqluser = "SELECT nama FROM db_sso.user_ho";
        $data['user_nama'] = $this->db->query($sqluser)->result_array();
        // echo "<pre>";
        // var_dump($data['stok_atk']);
        // echo "</pre>";
        $this->template->load('template', 'v_ambilatk', $data);
    }

    public function addAmbilAtk()
    {
        $ambil_atk = [
            'no_ambilatk' => 1,
            'user_nama' => $this->input->post('user_nama'),
            'nm_barang' => $this->input->post('nm_barang'),
            'kat_barang' => $this->input->post('kat_barang'),
            'nama_pt' => $this->input->post('nama_pt'),
            'qty' => $this->input->post('qty'),
            'sat' => $this->input->post('satuan'),
            'keperluan' => $this->input->post('keperluan'),
            'tgl_permintaan' => date('Y-m-d H:i:s')
        ];

        $this->M_ambil_atk->inputAmbilAtk($ambil_atk);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Anda Berhasil Mengambil ATK</div>');
        redirect('Ambil_atk');
    }
}
