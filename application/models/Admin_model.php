<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $this->db->where('id_user !=', $id);
        return $this->db->get('user')->result_array();
    }

    public function getFilum()
    {
        $this->db->join('kingdom_bio j', 'f.kode_kingdom = j.kode_kingdom');
        return $this->db->get('filum_bio f')->result_array();
    }
    public function getKelas()
    {
        $this->db->join('filum_bio f', 'f.kode_filum = k.kode_filum');
        $this->db->join('kingdom_bio j', 'f.kode_kingdom = j.kode_kingdom');
        return $this->db->get('kelas_bio k')->result_array();
    }
    public function getOrdo()
    {
        $this->db->join('kelas_bio k', 'k.kode_kelas = o.kode_kelas');
        $this->db->join('filum_bio f', 'f.kode_filum = k.kode_filum');
        $this->db->join('kingdom_bio j', 'f.kode_kingdom = j.kode_kingdom');
        return $this->db->get('ordo_bio o')->result_array();
    }
    public function getFamili()
    {
        $this->db->join('ordo_bio o', 'o.kode_ordo = fa.kode_ordo');
        $this->db->join('kelas_bio k', 'k.kode_kelas = o.kode_kelas');
        $this->db->join('filum_bio f', 'f.kode_filum = k.kode_filum');
        $this->db->join('kingdom_bio j', 'f.kode_kingdom = j.kode_kingdom');
        return $this->db->get('famili_bio fa')->result_array();
    }
    public function search($keyword)
    {
        if (!$keyword) {
            return null;
        }
        $this->db->like('title', $keyword);
        $this->db->or_like('content', $keyword);
        $query = $this->db->get($this->_table);
        return $query->result();
    }
    public function ambil_data($tabel, $keyword = null)
    {
        if (!$tabel) {
            return null;
        } elseif ($tabel == 'kingdom_bio') {
            if (!empty($keyword)) {
                $this->db->select('*');
                $this->db->from($tabel);
                $this->db->or_like('nama_kingdom', $keyword);
                $this->db->or_like('ket_kingdom', $keyword);
            } else {
                $this->db->select('*');
                $this->db->from($tabel);
            }
            return $this->db->get()->result_array();
        } elseif ($tabel == 'filum_bio') {
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->join('kingdom_bio', 'kingdom_bio.kode_kingdom = filum_bio.kode_kingdom');
            if (!empty($keyword)) {
                $this->db->or_like('nama_filum', $keyword);
                $this->db->or_like('ket_filum', $keyword);
            }
            return $this->db->get()->result_array();
        } elseif ($tabel == 'kelas_bio') {
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->join('filum_bio', 'filum_bio.kode_filum = kelas_bio.kode_filum');
            $this->db->join('kingdom_bio', 'kingdom_bio.kode_kingdom = filum_bio.kode_kingdom');
            if (!empty($keyword)) {
                $this->db->or_like('nama_kelas', $keyword);
                $this->db->or_like('ket_kelas', $keyword);
            }
            return $this->db->get()->result_array();
        } elseif ($tabel == 'ordo_bio') {
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->join('kelas_bio', 'kelas_bio.kode_kelas = ordo_bio.kode_kelas');
            $this->db->join('filum_bio', 'filum_bio.kode_filum = kelas_bio.kode_filum');
            $this->db->join('kingdom_bio', 'kingdom_bio.kode_kingdom = filum_bio.kode_kingdom');
            if (!empty($keyword)) {
                $this->db->or_like('nama_ordo', $keyword);
                $this->db->or_like('ket_ordo', $keyword);
            }
            return $this->db->get()->result_array();
        } elseif ($tabel == 'famili_bio') {
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->join('ordo_bio', 'ordo_bio.kode_ordo = famili_bio.kode_ordo');
            $this->db->join('kelas_bio', 'kelas_bio.kode_kelas = ordo_bio.kode_kelas');
            $this->db->join('filum_bio', 'filum_bio.kode_filum = kelas_bio.kode_filum');
            $this->db->join('kingdom_bio', 'kingdom_bio.kode_kingdom = filum_bio.kode_kingdom');
            if (!empty($keyword)) {
                $this->db->like('nama_famili', $keyword);
                $this->db->or_like('ket_famili', $keyword);
            }
            return $this->db->get()->result_array();
        }
    }
    // public function getBarangMasuk($limit = null, $id_barang = null, $range = null)
    // {
    //     $this->db->select('*,bm.harga_beli as bm_hargabeli');
    //     $this->db->join('user u', 'bm.user_id = u.id_user');
    //     $this->db->join('supplier sp', 'bm.supplier_id = sp.id_supplier');
    //     $this->db->join('barang b', 'bm.barang_id = b.id_barang');
    //     $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
    //     if ($limit != null) {
    //         $this->db->limit($limit);
    //     }

    //     if ($id_barang != null) {
    //         $this->db->where('id_barang', $id_barang);
    //     }

    //     if ($range != null) {
    //         $this->db->where('tanggal_masuk' . ' >=', $range['mulai']);
    //         $this->db->where('tanggal_masuk' . ' <=', $range['akhir']);
    //     }

    //     $this->db->order_by('id_barang_masuk', 'DESC');
    //     return $this->db->get('barang_masuk bm')->result_array();
    // }

    // public function getBarangKeluar($limit = null, $id_barang = null, $range = null)
    // {
    //     $this->db->select('*, bk.harga_jual as bk_hargajual');
    //     $this->db->join('user u', 'bk.user_id = u.id_user');
    //     $this->db->join('barang b', 'bk.barang_id = b.id_barang');
    //     $this->db->join('satuan s', 'b.satuan_id = s.id_satuan');
    //     if ($limit != null) {
    //         $this->db->limit($limit);
    //     }
    //     if ($id_barang != null) {
    //         $this->db->where('id_barang', $id_barang);
    //     }
    //     if ($range != null) {
    //         $this->db->where('tanggal_keluar' . ' >=', $range['mulai']);
    //         $this->db->where('tanggal_keluar' . ' <=', $range['akhir']);
    //     }
    //     $this->db->order_by('id_barang_keluar', 'DESC');
    //     return $this->db->get('barang_keluar bk')->result_array();
    // }

    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }

    public function min($table, $field, $min)
    {
        $field = $field . ' <=';
        $this->db->where($field, $min);
        return $this->db->get($table)->result_array();
    }

    // // public function chartBarangMasuk($bulan)
    // // {
    // //     $like = 'T-BM-' . date('y') . $bulan;
    // //     $this->db->like('id_barang_masuk', $like, 'after');
    // //     return count($this->db->get('barang_masuk')->result_array());
    // // }

    // public function chartBarangKeluar($bulan)
    // {
    //     $like = 'T-BK-' . date('y') . $bulan;
    //     $this->db->like('id_barang_keluar', $like, 'after');
    //     return count($this->db->get('barang_keluar')->result_array());
    // }

    // public function laporan($table, $mulai, $akhir)
    // {
    //     $tgl = $table == 'barang_masuk' ? 'tanggal_masuk' : 'tanggal_keluar';
    //     $this->db->where($tgl . ' >=', $mulai);
    //     $this->db->where($tgl . ' <=', $akhir);
    //     return $this->db->get($table)->result_array();
    // }

    // public function cekStok($id)
    // {
    //     $this->db->join('satuan s', 'b.satuan_id=s.id_satuan');
    //     return $this->db->get_where('barang b', ['id_barang' => $id])->row_array();
    // }
}
