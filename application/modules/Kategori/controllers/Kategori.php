<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori');
    }

    public function index()
    {
        $sql = 'SELECT * FROM kategori';
        $data['kategori'] = $this->db->query($sql)->result_array();
        $this->template->load('template', 'v_kategori', $data);
    }

    public function addKategori()
    {
        $kategori = [
            'nm_kategori' => $this->input->post('nm_kategori'),
        ];

        $this->M_kategori->inputKat($kategori);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Berhasil Ditambahkan</div>');
        redirect('Kategori');
    }

    public function editKategori()
    {
        $id_kat = $this->input->post('id_kat');
        $kategori = [
            'nm_kategori' => $this->input->post('nm_kategori'),
        ];

        $this->M_kategori->updateKat($kategori, $id_kat);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Kategori Berhasil Diedit</div>');
        redirect('Kategori');
    }

    public function delete($id_kat)
    {
        $this->M_kategori->deleteKat($id_kat);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kategori Berhasil Dihapus</div>');
        redirect('Kategori');
    }
}
