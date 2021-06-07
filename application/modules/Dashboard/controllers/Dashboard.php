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
        // $sql1 = "SELECT SUM(qty) as qtyatk,nm_barang,kat_barang,kd_barang,satuan  FROM tb_barang GROUP BY nm_barang";
        $sql1 = "SELECT *  FROM tb_barang ORDER BY id_barang DESC";
        $data['stok_atk'] = $this->db->query($sql1)->result_array();
        $data['stok_atk_'] = $this->db->query($sql1)->result_array();


        //TB BARANG
        $sql_atk = "SELECT * FROM tb_barang ORDER BY id_barang DESC";
        $data['atk'] = $this->db->query($sql_atk)->result_array();

        //TB KATEGORI
        $sql_kat = "SELECT * FROM kategori";
        $data['kategori'] = $this->db->query($sql_kat)->result_array();

        //TB SATUAN
        $sql_sat = "SELECT * FROM satuan";
        $data['sat'] = $this->db->query($sql_sat)->result_array();

        //TB JUML USER YANG AMBIL ATK
        // $sql_user = "SELECT * FROM tb_ambil_atk GROUP BY user_nama";
        $sql_user = "SELECT * FROM db_sso.user_ho";
        $data['jml_user'] = $this->db->query($sql_user)->num_rows();

        //TOTAL ROWS TB AMBIL ATK
        $sql_ambil = "SELECT * FROM tb_ambil_atk";
        $data['ambil_atk'] = $this->db->query($sql_ambil)->num_rows();

        //TB KODEATK        
        $sql_kode = "SELECT * FROM kode_atk";
        $data['kodeatk'] = $this->db->query($sql_kode)->result_array();

        //total ROWS ATK RUSAK
        $data['total_retur'] = $this->db->query('SELECT * FROM tb_atk_rusak')->num_rows();

        // foreach ($data['stok_atk_'] as $sa) {
        //     $nm_atk = $sa['kd_inputatk'];
        //     $query = "SELECT SUM(qty) as qtyatk from tb_barang where kd_inputatk='$nm_atk'";
        //     $qry = $this->db->query($query)->result_array();

        //     foreach ($qry as $data) {
        //         $qtyatk = $data['qtyatk'];
        //     }

        //     $qryambil = "SELECT SUM(qty) as qtyambil  FROM tb_detail_ambilatk where kd_inputatk='$nm_atk'";

        //     $result2 = $this->db->query($qryambil)->result_array();
        //     foreach ($result2 as $row2) {
        //         $qtyambil = $row2['qtyambil'];
        //     }
        //     $saldo = $qtyatk - $qtyambil;

        //     if ($saldo > 0) :
        //         $c[] = $sa;
        //     endif;
        // }


        // echo "<pre>";
        // var_dump($c);
        // echo "</pre>";
        $this->template->load('template', 'v_dashboard', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('http://localhost/Login/');
        // redirect('https://192.168.1.231/msal-login/Login');
    }
}
