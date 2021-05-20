<?php defined('BASEPATH') or exit('No direct script access allowed');

class Atk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_atk');

        if (!$this->session->userdata('userlogin')) {
            // redirect('https://192.168.1.231/msal-login/Login');
            redirect('localhost/Login');
        }
        date_default_timezone_set("Asia/Bangkok");
    }

    function index()
    {
        $sql = "SELECT * FROM db_sso.tb_pt";
        $data['pt'] = $this->db->query($sql)->result_array();
        $sql_atk = "SELECT * FROM tb_barang ORDER BY id_barang DESC";
        $data['atk'] = $this->db->query($sql_atk)->result_array();
        $sql_kat = "SELECT * FROM kategori";
        $data['kategori'] = $this->db->query($sql_kat)->result_array();
        $sql_sat = "SELECT * FROM satuan";
        $data['sat'] = $this->db->query($sql_sat)->result_array();
        // echo "<pre>";
        // var_dump($data['user_nama']);
        // echo "</pre>";
        $this->template->load('template', 'v_atk', $data);
    }

    public function addAtk()
    {
        $kd_atk = $this->input->post('nama_bar');
        if ($kd_atk == 'HVS') {
            $kd = 'KERT-001';
        } else if ($kd_atk == 'Pulpen') {
            $kd = 'AM-001';
        }

        $kd = '1234567890';
        $string = 'ATK-' . date("Ymd");
        for ($i = 0; $i < 3; $i++) {
            $pos = rand(0, strlen($kd) - 1);
            $string .= $pos;
        }
        $atk = [
            'kd_inputatk' => $string,
            'nm_barang' => $this->input->post('nama_bar'),
            'nama_pt' => $this->input->post('nama_pt'),
            'kat_barang' => $this->input->post('kat_bar'),
            'merek' => $this->input->post('merek'),
            'kd_barang' => 'kd',
            'harga' => $this->input->post('harga'),
            'qty' => $this->input->post('jml_stok'),
            'satuan' => $this->input->post('sat'),
            'keterangan' => $this->input->post('keperluan'),
            'tgl_masuk_barang' => date('Y-m-d H:i:s')
        ];

        $this->M_atk->inputAtk($atk);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">ATK Berhasil Ditambahkan</div>');
        redirect('Atk');
    }

    public function editAtk()
    {
        $id_barang = $this->input->post('id_barang');
        $atk = [
            'nm_barang' => $this->input->post('nm_barang'),
            'nama_pt' => $this->input->post('nama_pt'),
            'kat_barang' => $this->input->post('kat_barang'),
            'kd_barang' => $this->input->post('kd_barang'),
            'qty' => $this->input->post('qty'),
            'satuan' => $this->input->post('satuan'),
        ];

        $this->M_atk->updateAtk($atk, $id_barang);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">ATK Berhasil Diedit</div>');
        redirect('Atk');
    }

    public function delete($id_bar)
    {
        $this->M_atk->deleteAtk($id_bar);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ATK Berhasil Dihapus</div>');
        redirect('Atk');
    }
}
