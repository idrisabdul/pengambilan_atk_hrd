<?php defined('BASEPATH') or exit('No direct script access allowed');

class Retur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_retur');
        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
        if (!$this->session->userdata('userlogin')) {
            // redirect('https://192.168.1.231/msal-login/Login');
            redirect('localhost/Login');
        }
    }
    public function index()
    {
        $user = $this->session->userdata('userlogin');
        // $data['ambilatk_user'] = $this->M_retur->joinTable($user);
        $data['ambilatk_user'] = $this->M_retur->showAll();
        // echo "<pre>";
        // echo var_dump($data['ambilatk_user']);
        // echo "</pre>";
        $this->template->load('template', 'v_indexRetur', $data);
    }

    public function addRetur()
    {
        //UPDATE STATUS ATK
        $id = $this->input->post('id');
        $qty_inp = $this->input->post('qty_inp');
        $row = $this->db->query("SELECT qty FROM tb_detail_ambilatk WHERE id_detail_ambilatk = '$id'")->row_array();
        $qty_now = $row['qty'] - $qty_inp;
        $this->db->update('tb_detail_ambilatk', ['status' => 2, 'qty' => $qty_now], ['id_detail_ambilatk' => $id]);

        $retur = [
            'nm_barang' => $this->input->post('nm_barang'),
            'user_nama' => $this->input->post('user_nama'),
            'qty_rusak' => $qty_inp,
            'kd_inputatk' => $this->input->post('kd_inputatk'),
            'alasan' => $this->input->post('alasan'),
            'harga' => $this->input->post('harga'),
            'kat_barang' => $this->input->post('kat_barang'),
            'tgl_retur' => date('Y-m-d H:i:s'),
        ];
        $this->M_retur->insertRetur($retur);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Permintaan Retur Berhasil</div>');
        redirect('Retur');
    }

    public function atkRusak()
    {
        $data['atk_rusak'] = $this->db->query("SELECT * FROM tb_atk_rusak ORDER BY id_atk DESC")->result_array();
        // echo "<pre>";
        // echo var_dump($data['atk_rusak']);
        // echo "</pre>";
        $this->template->load('template', 'v_atkRusak', $data);
    }

    public function gantiAtk($id)
    {
        //getAtk

        $data['detail_upd'] = $this->M_retur->gantiAtk($id);

        foreach ($data['detail_upd'] as $du) {
            $nm_barang = $du['nm_barang'];
            $kd_inputatk = $du['kd_inputatk'];
            $data['nm_barang'] = $du['nm_barang'];
            $data['no_urut'] = $du['no_urut'];
            $data['id'] = $du['id_detail_ambilatk'];
            $data['no_ambilatk'] = $du['no_ambilatk'];
            $data['user_nama'] = $du['user_nama'];
            $data['qty'] = $du['qty'];
            $nm_barang = $du['nm_barang'];
        }
        $sql1 = "SELECT *  FROM tb_barang WHERE nm_barang = '$nm_barang' && kd_inputatk = '$kd_inputatk' ORDER BY id_barang DESC";
        $data['stok_atk'] = $this->db->query($sql1)->result_array();

        // echo "<pre>";
        // echo var_dump($data['detail_upd']);
        // echo "</pre>";

        $this->template->load('template', 'v_mintalagi', $data);
    }

    public function itemAtkGanti()
    {
        $no_ambilatk = $this->input->get('no_ambilatk');

        $sql = "SELECT * FROM tb_detail_ambilatk WHERE status = 2 && no_ambilatk = '$no_ambilatk'";
        $data = $this->db->query($sql)->result_array();

        echo json_encode($data);
    }

    public function atkGantiTerpilih()
    {
        // MENCARI DATA INPUT YANG SAMA
        $kd_inputatk = $this->input->post('kd_inputatk');
        $qty_inp = $this->input->post('qty');
        $check = "SELECT kd_inputatk, qty FROM tb_detail_ambilatk WHERE kd_inputatk = '$kd_inputatk' AND status = 2";
        $hasil = $this->db->query($check)->result_array();
        foreach ($hasil as $kd_inputatkcek) {
            $row = $kd_inputatkcek['kd_inputatk'];
            $qty_sebelumnya = $kd_inputatkcek['qty'];
        }

        //CHECK NM ATK JIKA YANG DIMASUKKAN SAMA
        //MAKA FIELD YG KD_INPUTATK-NYA SAMA. UPDATE QTYNYA SAJA SESUAI YG DIINPUTAN.
        if ($row == $kd_inputatk) {
            $data = $this->db->update('tb_detail_ambilatk', ['qty' => $qty_inp], ['kd_inputatk' => $kd_inputatk, 'status' => 2]);
            echo json_encode($data);
        } else {
            $gantiatk = [
                'no_urut' => $this->input->post('no_urut'),
                'no_ambilatk' => $this->input->post('no_ambilatk'),
                'kd_inputatk' => $kd_inputatk,
                'nm_barang' => $this->input->post('nm_barang'),
                'kat_barang' => $this->input->post('kat_barang'),
                'qty' => $this->input->post('qty_new'),
                'sat' => $this->input->post('sat'),
                'harga' => $this->input->post('harga'),
                'keperluan' => $this->input->post('keperluan'),
                'status' => 2,
            ];
            $this->M_retur->inputRetur($gantiatk);
            echo json_encode($gantiatk);
        }
    }

    public function returFinish()
    {
        //UPDATE STATUS 2 MENJADI 1, atau proses retur berhasil
        // $no_ambilatk = $this->input->post('no_ambilatk');
        $id = $this->input->post('id');
        $data = $this->M_retur->returFinish($id);
        echo json_encode($data);
    }
}
