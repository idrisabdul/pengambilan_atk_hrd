<?php defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_satuan');
        if (!$this->session->userdata('userlogin')) {
            // redirect('https://192.168.1.231/msal-login/Login');
            redirect('localhost/Login');
        }
    }

    public function index()
    {
        $sql = 'SELECT * FROM satuan';
        $data['sat'] = $this->db->query($sql)->result_array();

        $this->template->load('template', 'v_satuan.php', $data);
    }

    public function addSatuan()
    {
        $satuan = [
            'satuan' => $this->input->post('satuan'),
        ];

        $this->M_satuan->inputSat($satuan);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Satuan Berhasil Ditambahkan</div>');
        redirect('Satuan');
    }

    public function editSatuan()
    {
        $id_sat = $this->input->post('id_sat');
        $satuan = [
            'satuan' => $this->input->post('satuan'),
        ];

        $this->M_satuan->updateSat($satuan, $id_sat);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Satuan Berhasil Diedit</div>');
        redirect('Satuan');
    }

    public function delete($id_sat)
    {
        $this->M_satuan->deleteSat($id_sat);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Satuan Berhasil Dihapus</div>');
        redirect('Satuan');
    }
}
