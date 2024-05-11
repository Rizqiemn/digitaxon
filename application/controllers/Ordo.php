<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ordo extends CI_Controller
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
        $data['title'] = "ordo";
        $data['ordo'] = $this->admin->getordo();
        $this->template->load('templates/dashboard', 'ordo/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_ordo', 'Nama ordo', 'required|trim');
        $this->form_validation->set_rules('ket_ordo', 'keterangan ordo', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "ordo";
            $data['kelas'] = $this->admin->getKelas();

            // Mengenerate ID Barang
            $kode_terakhir = $this->admin->getMax('ordo_bio', 'kode_ordo');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, STR_PAD_LEFT);
            $data['kode_ordo'] = $number;

            $this->template->load('templates/dashboard', 'ordo/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('ordo_bio', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('ordo');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('ordo/add');
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
            $data['title'] = "ordo";
            $data['kelas'] = $this->admin->getKelas();
            $data['ordo'] = $this->admin->get('ordo_bio', ['kode_ordo' => $id]);
            $this->template->load('templates/dashboard', 'ordo/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('ordo_bio', 'kode_ordo', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('ordo');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('ordo/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('ordo_bio', 'kode_ordo', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('ordo');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
