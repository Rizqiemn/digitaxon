<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['kingdom'] = $this->admin->count('kingdom_bio');
        $data['filum'] = $this->admin->count('filum_bio');
        $data['kelas'] = $this->admin->count('kelas_bio');
        $data['ordo'] = $this->admin->count('ordo_bio');
        $data['famili'] = $this->admin->count('famili_bio');

        // // Line Chart
        // $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        // $data['cbm'] = [];
        // $data['cbk'] = [];

        // foreach ($bln as $b) {
        //     $data['cbm'][] = $this->admin->chartBarangMasuk($b);
        //     $data['cbk'][] = $this->admin->chartBarangKeluar($b);
        // }

        $this->template->load('templates/dashboard', 'dashboard', $data);
    }
}
