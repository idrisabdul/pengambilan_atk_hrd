<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kodeatk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kodeatk');
    }

    public function index()
    {
        $sql = 'SELECT * FROM kode_atk';
        $data['k_atk'] = $this->db->query($sql)->result_array();

        $this->template->load('template', 'v_kodeatk.php', $data);
    }

    public function addKode()
    {
        $kode = [
            'kode_atk' => $this->input->post('kode_atk'),
            'nm_barang' => $this->input->post('nm_barang'),
        ];

        $this->M_kodeatk->inputKode($kode);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kode ATK Berhasil Ditambahkan</div>');
        redirect('Kodeatk');
    }

    public function editKode()
    {
        $id = $this->input->post('id');
        $kode = [
            'nm_barang' => $this->input->post('nm_barang'),
            'kode_atk' => $this->input->post('kode_atk')
        ];

        $this->M_kodeatk->updateKode($kode, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Kode ATK Berhasil Diedit</div>');
        redirect('Kodeatk');
    }

    public function delete($id)
    {
        $this->M_kodeatk->deleteKode($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kode ATK Berhasil Dihapus</div>');
        redirect('Kodeatk');
    }
}
