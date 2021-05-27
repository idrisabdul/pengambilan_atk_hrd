<?php defined('BASEPATH') or exit('No direct script access allowed');

class Item_terambil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_item_terambil');
        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
        if (!$this->session->userdata('userlogin')) {
            // redirect('https://192.168.1.231/msal-login/Login');
            redirect('localhost/Login');
        }
    }
    public function index()
    {
        $data['detail'] = $this->M_item_terambil->joinTable();
        $this->template->load('template', 'v_indexterambil', $data);
    }

    public function pdf()
    {
        $dompdf = new Dompdf();
        $data['detail'] = $this->M_item_terambil->joinTable();
        $html = $this->load->view('v_cetak_atkterambil', $data, true);

        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'potrait');
        $dompdf->render();
        // $dompdf->set_option('enable_html5_parser', TRUE);
        $pdf = $dompdf->output();
        $dompdf->stream('atk_terambil.pdf', array('Attachment' => false));
    }
}
