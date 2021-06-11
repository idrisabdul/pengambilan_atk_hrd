<?php defined('BASEPATH') or exit('No direct script access allowed');

class Atk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_atk');
        $this->load->library('Zend');

        // require 'vendor/autoload.php';

        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';

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
        $data['atk_filt'] = $this->db->query($sql_atk)->result_array();
        $sql_kat = "SELECT * FROM tb_barang GROUP BY kat_barang ORDER BY id_barang DESC";
        $data['kategori'] = $this->db->query($sql_kat)->result_array();
        $sql_sat = "SELECT * FROM satuan";
        $data['sat'] = $this->db->query($sql_sat)->result_array();
        $sql_kode = "SELECT * FROM kode_atk";
        $data['kodeatk'] = $this->db->query($sql_kode)->result_array();

        //filter
        $sql_atkf = "SELECT * FROM tb_barang GROUP BY nm_barang ORDER BY id_barang DESC ";
        $data['atkf'] = $this->db->query($sql_atkf)->result_array();

        // $data['atk-filt'] = $this->M_atk->filterAtk('')
        // echo "<pre>";
        // var_dump($data['user_nama']);
        // echo "</pre>";
        $this->template->load('template', 'v_atk', $data);
    }
    function filterAtk()
    {
        $sql = "SELECT * FROM db_sso.tb_pt";
        $data['pt'] = $this->db->query($sql)->result_array();
        $sql_atk = "SELECT * FROM tb_barang ORDER BY id_barang DESC";
        $data['atk'] = $this->db->query($sql_atk)->result_array();
        $sql_kat = "SELECT * FROM kategori";
        $data['kategori'] = $this->db->query($sql_kat)->result_array();
        $sql_sat = "SELECT * FROM satuan";
        $data['sat'] = $this->db->query($sql_sat)->result_array();
        $sql_kode = "SELECT * FROM kode_atk";
        $data['kodeatk'] = $this->db->query($sql_kode)->result_array();

        //filter
        $sql_atkf = "SELECT * FROM tb_barang GROUP BY nm_barang ORDER BY id_barang DESC ";
        $data['atkf'] = $this->db->query($sql_atkf)->result_array();


        $nm_atk = $this->input->post('nm_barang');
        $kat = $this->input->post('kat_barang');
        $satuan = $this->input->post('satuan');



        $data['atk_filt'] = $this->M_atk->filterAtk($nm_atk, $kat, $satuan);
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
            'kode_atk' => $this->input->post('kd_atk'),
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_pt' => $this->input->post('nama_pt'),
            'kat_barang' => $this->input->post('kat_bar'),
            'merek' => $this->input->post('merek'),
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
            'kode_atk' => $this->input->post('kd_atk'),
            'kode_barang' => $this->input->post('kode_barang'),
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

    public function pdf()
    {
        $dompdf = new Dompdf();
        $data['atk'] = $this->db->query('SELECT * FROM tb_barang ORDER BY id_barang DESC')->result_array();
        $html = $this->load->view('v_cetak_atk', $data, true);

        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'potrait');
        $dompdf->render();
        // $dompdf->set_option('enable_html5_parser', TRUE);
        $pdf = $dompdf->output();
        $dompdf->stream('atk.pdf', array('Attachment' => false));
    }

    // public function barcode_barang()
    // {
    //     $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    //     echo $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);
    // }
    public function Barcode($kodenya)
    {
        $this->zend->load('Zend/Barcode');
        Zend_Barcode::render('code128', 'image', array('text' => $kodenya));
    }
}
