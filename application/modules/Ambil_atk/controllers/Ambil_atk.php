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

    public function lebihLanjut($no_ambilatk)
    {
        $data['detail_ambilatk'] = $this->M_ambil_atk->lebihLanjut($no_ambilatk);

        foreach ($data['detail_ambilatk'] as $header) {
            $data['no_ambilatk'] = $header['no_ambilatk'];
            $data['user_nama'] = $header['user_nama'];
            $data['nama_pt'] = $header['nama_pt'];
            $data['tgl_permintaan'] = $header['tgl_permintaan'];
            $data['jml_item_atk'] = $header['jml_item_atk'];
        }
        // echo "<pre>";
        // echo var_dump($data);
        // echo "</pre>";
        $this->template->load('template', 'v_detail_ambilatk', $data);
    }

    public function editAmbilAtk()
    {
        $id = $this->input->post('id_detail');
        $no_ambilatk = $this->input->post('no_ambilatk');
        $ubahambil_atk = [
            'qty' => $this->input->post('qty'),
            'keperluan' => $this->input->post('keperluan'),
        ];

        $this->M_ambil_atk->updateAmbilAtk($ubahambil_atk, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Anda Berhasil Mengubah Pengambilan ATK</div>');
        redirect('Ambil_atk/lebihLanjut/' . $no_ambilatk);
    }

    public function delete($id)
    {
        $this->M_ambil_atk->delete($id);
        $this->M_ambil_atk->deleteDetail($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pengambilan ATK Berhasil Dihapus</div>');
        redirect('Ambil_atk');
    }

    public function deleteItem()
    {
        $no_ambil = $this->input->post('no_ambilatk_del');
        $id = $this->input->post('id');
        $this->M_ambil_atk->deleteItemAmbil($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Item ATK Yang sudah anda ambil berhasil dihapus</div>');
        redirect('Ambil_atk/lebihLanjut/' . $no_ambil);
    }

    public function pilihAtk()
    {
        // $sql1 = "SELECT SUM(qty) as qtyatk,nm_barang,kat_barang,kd_barang,satuan,id_barang  FROM tb_barang GROUP BY nm_barang";
        $last_numberatk = 'SELECT no_urut FROM `tb_detail_ambilatk` WHERE status = 1 ORDER BY no_urut DESC LIMIT 1';
        $row = $this->db->query($last_numberatk)->row_array();
        $last_no = $row['no_urut'];

        $memberi_no = $last_no + 1;

        $no_ambilatk =  'AMBIL-ATK-' . date('Ymd') . '-00' . $memberi_no;
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


    // NEW METODE 2

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
            $qtyinp = $this->input->post('qty');
            $data = $this->db->update('tb_detail_ambilatk', ['qty' => $qtyinp], ['kd_inputatk' => $kd_inputatk]);
            echo json_encode($data);
        } else {
            $ambil_atk = [
                'no_urut' => $this->input->post('no_urut'),
                'no_ambilatk' => $this->input->post('no_ambilatk'),
                'kd_inputatk' => $kd_inputatk,
                'nm_barang' => $this->input->post('nm_barang'),
                'kat_barang' => $this->input->post('kat_barang'),
                'qty' => $qty,
                'sat' => $this->input->post('sat'),
                'harga' => $this->input->post('harga'),
                'keperluan' => $this->input->post('keperluan'),
                'status' => 0,
            ];
            $this->M_ambil_atk->input_sem($ambil_atk);
            echo json_encode($ambil_atk);
        }
    }

    public function atkTerpilih()
    {
        $no_ambilatk = $this->input->get('no_ambilatk');

        $sql = "SELECT * FROM tb_detail_ambilatk WHERE status = 0 && no_ambilatk = '$no_ambilatk'";
        $data = $this->db->query($sql)->result_array();

        echo json_encode($data);
    }

    public function hapus_ambilatk_sem()
    {
        $id = $this->input->post('id');
        $data = $this->db->delete('tb_detail_ambilatk', ['id_detail_ambilatk' => $id]);
        echo json_encode($data);
    }

    public function updateStatus()
    {
        $no_ambilatk = $this->input->post('no_ambilatk');
        $status = [
            'status' => 1
        ];
        $data = $this->M_ambil_atk->updateStatus($status, $no_ambilatk);
        echo json_encode($data);
    }

    public function insertHeader()
    {
        $header = [
            'no_ambilatk' => $this->input->post('no_ambilatk'),
            'user_nama' => $this->input->post('user_nama'),
            'nama_pt' => $this->input->post('nama_pt'),
            'tgl_permintaan' => date('Y-m-d H:i:s')
        ];
        $data = $this->db->insert('tb_ambil_atk', $header);
        echo json_encode($data);
    }
}
