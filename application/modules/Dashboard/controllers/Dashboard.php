<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_dashboard');

        if (!$this->session->userdata('userlogin')) {
            // redirect('https://192.168.1.231/msal-login/Login');
            redirect('https://localhost/Login');
        }
        date_default_timezone_set("Asia/Bangkok");
    }

    function index()
    {
        $sql = "SELECT * FROM db_sso.tb_pt";
        $data['pt'] = $this->db->query($sql)->result_array();
        $sql1 = "SELECT SUM(qty) as qtyatk,nm_barang,kat_barang,kd_barang,satuan  FROM tb_barang GROUP BY nm_barang";
        $data['stok_atk'] = $this->db->query($sql1)->result_array();
        // echo "<pre>";
        // var_dump($data['pt']);
        // echo "</pre>";
        $this->template->load('template', 'v_dashboard', $data);
    }

    public function addBarang()
    {
        $atk = [
            'nm_barang' => $this->input->post('nama_bar'),
            'nama_pt' => $this->input->post('nama_pt'),
            'kat_barang' => $this->input->post('kat_bar'),
            'kd_barang' => $this->input->post('kodebar'),
            'qty' => $this->input->post('jml_stok'),
            'satuan' => $this->input->post('sat'),
            'tgl_masuk_barang' => date('Y-m-d H:i:s')
        ];

        $this->M_dashboard->inputAtk($atk);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">ATK Berhasil Ditambahkan</div>');
        redirect('Dashboard');
    }
}
