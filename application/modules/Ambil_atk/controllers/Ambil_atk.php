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
        $sqlambil = "SELECT * FROM tb_ambil_atk ORDER BY id DESC";
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
        $this->template->load('template', 'v_indexAmbil', $data);
    }

    public function ambilatk()
    {
        $multipleatk = $this->input->post('data_table');

        $status = $this->M_ambil_atk->multiInsert($multipleatk);

        $this->output->set_content_type('application/json');
        echo json_encode(array('status' => $status));
    }

    public function editAmbilAtk()
    {
        $id = $this->input->post('id');
        $ubahambil_atk = [
            'user_nama' => $this->input->post('user_nama'),
            'qty' => $this->input->post('jml_stok'),
            'keperluan' => $this->input->post('keperluan'),
        ];

        $this->M_ambil_atk->updateAmbilAtk($ubahambil_atk, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Anda Berhasil Mengubah Pengambilan ATK</div>');
        redirect('Ambil_atk');
    }

    public function delete($id)
    {
        $this->M_ambil_atk->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pengambilan ATK Berhasil Dihapus</div>');
        redirect('Ambil_atk');
    }

    public function pilihAtk()
    {
        // $sql1 = "SELECT SUM(qty) as qtyatk,nm_barang,kat_barang,kd_barang,satuan,id_barang  FROM tb_barang GROUP BY nm_barang";
        $sql1 = "SELECT * FROM tb_barang ORDER BY id_barang DESC";
        $data['stok_atk'] = $this->db->query($sql1)->result_array();

        $sqluser = "SELECT nama FROM db_sso.user_ho";
        $data['user_nama'] = $this->db->query($sqluser)->result_array();

        $sql = "SELECT * FROM db_sso.tb_pt";
        $data['pt'] = $this->db->query($sql)->result_array();
        $sqluser = "SELECT nama FROM db_sso.user_ho";
        $data['user_nama'] = $this->db->query($sqluser)->result_array();
        // echo "<pre>";
        // var_dump($data['stok_atk']);
        // echo "</pre>";
        $this->template->load('template', 'v_pilihAtk', $data);
    }

    // public function getAtk($nm_barang)
    // {
    //     $sql1 = "SELECT SUM(qty) as qtyatk,nm_barang,kat_barang,kd_barang,satuan,qty,nama_pt FROM tb_barang WHERE nm_barang = '$nm_barang' GROUP BY nm_barang";
    //     $data['stok_atk'] = $this->db->query($sql1)->result_array();
    //     $sqluser = "SELECT nama FROM db_sso.user_ho";
    //     $data['user_nama'] = $this->db->query($sqluser)->result_array();
    //     // echo "<pre>";
    //     // var_dump($data['stok_atk']);
    //     // echo "</pre>";
    //     $this->template->load('template', 'v_ambilatk', $data);
    // }
    public function getAtk($id)
    {
        $sql1 = "SELECT * FROM tb_barang WHERE id_barang = '$id'";
        $data['stok_atk'] = $this->db->query($sql1)->result_array();

        foreach ($data['stok_atk'] as $sa) {
            $nm_atk = $sa['kd_inputatk'];
            $qryambil = "SELECT SUM(qty) as qtyambil  FROM tb_ambil_atk where kd_inputatk='$nm_atk'";

            $result2 = $this->db->query($qryambil)->result_array();
            foreach ($result2 as $row2) {
                $data['qtyambilatk'] = $row2['qtyambil'];
            }
        }

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
            'kd_inputatk' => $this->input->post('kd_inputatk'),
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
