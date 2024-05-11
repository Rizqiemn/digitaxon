<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kingdom extends CI_Controller
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
        $data['title'] = "Kingdom";
        $data['kingdom'] = $this->admin->get('kingdom_bio');
        $this->template->load('templates/dashboard', 'kingdom/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_kingdom', 'Nama kingdom', 'required|trim');
        $this->form_validation->set_rules('ket_kingdom', 'keterangan kingdom', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Kingdom";
            // $data['jenis'] = $this->admin->get('jenis');
            // $data['satuan'] = $this->admin->get('satuan');

            // Mengenerate ID Barang
            $kode_terakhir = $this->admin->getMax('kingdom_bio', 'kode_kingdom');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, STR_PAD_LEFT);
            $data['kode_kingdom'] = $number;

            $this->template->load('templates/dashboard', 'kingdom/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('kingdom_bio', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('kingdom');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('kingdom/add');
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
            $data['title'] = "Kingdom";
            // $data['jenis'] = $this->admin->get('jenis');
            // $data['satuan'] = $this->admin->get('satuan');
            $data['kingdom'] = $this->admin->get('kingdom_bio', ['kode_kingdom' => $id]);
            $this->template->load('templates/dashboard', 'kingdom/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('kingdom_bio', 'kode_kingdom', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('kingdom');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('kingdom/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('kingdom_bio', 'kode_kingdom', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('kingdom');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
