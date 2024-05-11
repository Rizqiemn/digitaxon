<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Filum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "filum";
        $data['filum'] = $this->admin->getFilum();
        $this->template->load('templates/dashboard', 'filum/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_filum', 'Nama filum', 'required|trim');
        $this->form_validation->set_rules('ket_filum', 'keterangan filum', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "filum";
            $data['kingdom'] = $this->admin->get('kingdom_bio');

            // Mengenerate ID Barang
            $kode_terakhir = $this->admin->getMax('filum_bio', 'kode_filum');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, STR_PAD_LEFT);
            $data['kode_filum'] = $number;

            $this->template->load('templates/dashboard', 'filum/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('filum_bio', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('filum');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('filum/add');
            }
        }
    }

    public function show($getId)
    {
        $id = encode_php_tags($getId);
        $data['title'] = "Lihat Barang";
        $data['jenis'] = $this->admin->get('jenis');
        $data['satuan'] = $this->admin->get('satuan');
        $data['barang'] = $this->admin->get('barang', ['id_barang' => $id]);
        $this->template->load('templates/dashboard', 'barang/edit1', $data);
    }
    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "filum";
            $data['kingdom'] = $this->admin->get('kingdom_bio');
            $data['filum'] = $this->admin->get('filum_bio', ['kode_filum' => $id]);
            $this->template->load('templates/dashboard', 'filum/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('filum_bio', 'kode_filum', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('filum');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('filum/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('filum_bio', 'kode_filum', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('filum');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
