<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data['title'] = "Search";
        $this->load->model('Admin_model');
        $keyword = $this->input->get('keyword');
        $tabel = $this->input->get('tabel');
        $data = $this->Admin_model->ambil_data($tabel, $keyword);
        $data = array(
            'tabel'    => $tabel,
            'keyword'    => $keyword,
            'data'        => $data
        );
        $this->template->load('templates/pengunjung', 'search', $data);
    }
    private function _validasi()
    {
        $this->form_validation->set_rules('nama_pengirim', 'Nama Pengirim', 'required|trim');
        $this->form_validation->set_rules('email_pengirim', 'Email Pengirim', 'required|trim');
        $this->form_validation->set_rules('judul_kritik', 'Judul Kritik', 'required|trim');
        $this->form_validation->set_rules('isi_kritik', 'Isi Kritik', 'required|trim');
    }

    public function kritik()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Kritik";

            // Mengenerate ID Barang
            $kode_terakhir = $this->admin->getMax('kritik', 'id');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, STR_PAD_LEFT);
            $data['id'] = $number;

            $this->template->load('templates/pengunjung', 'kritik', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('kritik', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('search');
            } else {
                set_pesan('gagal mengirim kritik dan saran');
                redirect('search/kritik');
            }
        }
    }
}
