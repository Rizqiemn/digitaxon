<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
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
        $data['title'] = "kelas";
        $data['kelas'] = $this->admin->getKelas();
        $this->template->load('templates/dashboard', 'kelas/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_kelas', 'Nama kelas', 'required|trim');
        $this->form_validation->set_rules('ket_kelas', 'keterangan kelas', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "kelas";
            $data['filum'] = $this->admin->getFilum();

            // Mengenerate ID Barang
            $kode_terakhir = $this->admin->getMax('kelas_bio', 'kode_kelas');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, STR_PAD_LEFT);
            $data['kode_kelas'] = $number;

            $this->template->load('templates/dashboard', 'kelas/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('kelas_bio', $input);

            if ($insert) {
                set_pesan('data berhasil disimpan');
                redirect('kelas');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('kelas/add');
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
            $data['title'] = "kelas";
            $data['filum'] = $this->admin->getFilum();
            $data['kelas'] = $this->admin->get('kelas_bio', ['kode_kelas' => $id]);
            $this->template->load('templates/dashboard', 'kelas/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('kelas_bio', 'kode_kelas', $id, $input);

            if ($update) {
                set_pesan('data berhasil disimpan');
                redirect('kelas');
            } else {
                set_pesan('gagal menyimpan data');
                redirect('kelas/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('kelas_bio', 'kode_kelas', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('kelas');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
