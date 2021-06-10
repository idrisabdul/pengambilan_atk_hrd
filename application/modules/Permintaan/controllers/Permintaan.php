<?php defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Permintaan');
        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
        if (!$this->session->userdata('userlogin')) {
            // redirect('https://192.168.1.231/msal-login/Login');
            redirect('localhost/Login');
        }
        date_default_timezone_set("Asia/Bangkok");
    }

    public function index()
    {
        $sqlambil = "SELECT * FROM tb_ambil_atk WHERE status != 0 ORDER BY id DESC";
        $data['ambil_atk'] = $this->db->query($sqlambil)->result_array();

        $sqluser = "SELECT nama FROM db_sso.user_ho";
        $data['user_nama'] = $this->db->query($sqluser)->result_array();

        $sql1 = "SELECT *  FROM tb_barang ORDER BY id_barang DESC";
        $data['stok_atk'] = $this->db->query($sql1)->result_array();

        $sql = "SELECT * FROM db_sso.tb_pt";
        $data['pt'] = $this->db->query($sql)->result_array();
        // echo "<pre>";
        // var_dump($data['ambil_atk']);
        // echo "</pre>";
        $this->template->load('template', 'v_indexPermintaan', $data);
    }

    public function permintaanAtk()
    {
        $last_numberatk = 'SELECT no_urut FROM `tb_detail_ambilatk` WHERE status != 0 ORDER BY no_urut DESC LIMIT 1';
        $row = $this->db->query($last_numberatk)->row_array();
        $last_no = $row['no_urut'];

        $memberi_no = $last_no + 1;

        $no_ambilatk =  'ATK-' . date('Ymd') . '-00' . $memberi_no;
        $data['no_ambilatk'] = $no_ambilatk;
        $data['memberi_no'] = $memberi_no;

        $sql1 = "SELECT * FROM tb_barang ORDER BY id_barang DESC";
        $data['stok_atk'] = $this->db->query($sql1)->result_array();

        $sqluser = "SELECT nama FROM db_sso.user_ho";
        $data['user_nama'] = $this->db->query($sqluser)->result_array();

        $sql = "SELECT * FROM db_sso.tb_pt";
        $data['pt'] = $this->db->query($sql)->result_array();
        $sqluser = "SELECT nama FROM db_sso.user_ho";
        $data['user_nama'] = $this->db->query($sqluser)->result_array();

        //SHOW
        $sqlambil = "SELECT * FROM tb_ambil_atk WHERE status != 0 ORDER BY id DESC";
        $data['ambil_atk'] = $this->db->query($sqlambil)->result_array();

        $sqluser = "SELECT nama FROM db_sso.user_ho";
        $data['user_nama'] = $this->db->query($sqluser)->result_array();

        $sql1 = "SELECT *  FROM tb_barang ORDER BY id_barang DESC";
        $data['stok_atk'] = $this->db->query($sql1)->result_array();

        $sql = "SELECT * FROM db_sso.tb_pt";
        $data['pt'] = $this->db->query($sql)->result_array();

        // echo "<pre>";
        // var_dump($data['stok_atk']);
        // echo "</pre>";
        // $this->template->load('template', 'v_pilihAtkUser', $data);
        $this->load->view('v_pilihAtkUser_', $data);
    }

    public function lebihLanjut($no_ambilatk)
    {
        $data['detail_ambilatk'] = $this->M_Permintaan->lebihLanjut($no_ambilatk);

        foreach ($data['detail_ambilatk'] as $header) {
            $data['no_ambilatk'] = $header['no_ambilatk'];
            $data['user_nama'] = $header['user_nama'];
            $data['nama_pt'] = $header['nama_pt'];
            $data['tgl_permintaan'] = $header['tgl_permintaan'];
            $data['status'] = $header['status'];
        }
        // echo "<pre>";
        // echo var_dump($data);
        // echo "</pre>";
        $this->load->view('v_detailPermintaan', $data);
    }

    //ambil ATK from USER
    public function atkTerpilih()
    {
        $no_ambilatk = $this->input->get('no_ambilatk');

        $sql = "SELECT * FROM tb_detail_ambilatk WHERE status = 0 && no_ambilatk = '$no_ambilatk'";
        $data = $this->db->query($sql)->result_array();

        echo json_encode($data);
    }

    public function insertAmbilAtk_sem()
    {
        // MENCARI DATA INPUT YANG SAMA
        $kd_inputatk = $this->input->post('kd_inputatk');
        $qty = $this->input->post('qty');
        $check = "SELECT kd_inputatk FROM tb_detail_ambilatk WHERE kd_inputatk = '$kd_inputatk' AND status = 0";
        $hasil = $this->db->query($check)->result_array();
        foreach ($hasil as $kd_inputatkcek) {
            $row = $kd_inputatkcek['kd_inputatk'];
        }

        //CHECK NM ATK JIKA YANG DIMASUKKAN SAMA
        //MAKA FIELD YG KD_INPUTATK-NYA SAMA. UPDATE QTYNYA SAJA SESUAI YG DIINPUTAN.
        if ($row == $kd_inputatk) {
            $qtyinp = $qty;
            $data = $this->db->update('tb_detail_ambilatk', ['qty' => $qtyinp], ['kd_inputatk' => $kd_inputatk]);
            echo json_encode($data);
        } else {
            $ambil_atk = [
                'no_urut' => $this->input->post('no_urut'),
                'no_ambilatk' => $this->input->post('no_ambilatk'),
                'kd_inputatk' => $kd_inputatk,
                'nm_barang' => $this->input->post('nm_barang'),
                'kode_atk' => $this->input->post('kode_atk'),
                'kat_barang' => $this->input->post('kat_barang'),
                'qty' => $qty,
                'sat' => $this->input->post('sat'),
                'harga' => $this->input->post('harga'),
                'keperluan' => $this->input->post('keperluan'),
                'status' => 0,
            ];
            $this->M_Permintaan->input_sem($ambil_atk);
            echo json_encode($ambil_atk);
        }
    }

    public function updateStatus()
    {
        $no_ambilatk = $this->input->post('no_ambilatk');
        $status = [
            'status' => 2
        ];
        $data = $this->M_Permintaan->updateStatus($status, $no_ambilatk);
        echo json_encode($data);
    }

    public function updateStatusUserDiambil()
    {
        $no_ambilatk = $this->input->post('no_ambilatk');
        // $this->db->update('tb_detail_ambilatk', ['status' => 1], ['no_ambilatk' => $no_ambilatk]);
        $this->db->update('tb_ambil_atk', ['status' => 0], ['no_ambilatk' => $no_ambilatk]);
        $this->db->update('tb_detail_ambilatk', ['status' => 1], ['no_ambilatk' => $no_ambilatk]);
        echo json_encode($no_ambilatk);
    }

    public function insertHeader()
    {
        $header = [
            'no_ambilatk' => $this->input->post('no_ambilatk'),
            'user_nama' => $this->input->post('user_nama'),
            'nama_pt' => $this->input->post('nama_pt'),
            'tgl_permintaan' => date('Y-m-d H:i:s'),
            'status' => 1
        ];
        $data = $this->db->insert('tb_ambil_atk', $header);
        echo json_encode($data);
    }
}
