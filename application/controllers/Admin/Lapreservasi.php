<?php

class Lapreservasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Mod_Laporan', 'ML');
    }

    public function index()
    {
        $data=[
            'title' =>'Hotel-Ku | Laporan',
            'judul' =>'Laporan',
            'subjudul' =>'Lap. Reservasi',
            'breadcrumb1' =>'Lap. Reservasi',
        ];
        $this->template->load('Admin/Template','Admin/Laporanreservasi/index', $data);
    }
    public function Periode()
    {
        $this->form_validation->set_rules('tanggalawal','Tanggal Awal','required');
        $this->form_validation->set_rules('tanggalakhir','Tanggal Akhir','required');
        $this->form_validation->set_message('required','{field} Tidak boleh kosong');
        if ($this->form_validation->run() == TRUE) {
            $data=[
                'title' =>'Hotel-Ku | Laporan',
                'judul' =>'Laporan',
                'subjudul' =>'Lap. Reservasi',
                'breadcrumb1' =>'Laporan',
                'tanggalawal'   =>$this->input->post('tanggalawal'),
                'tanggalakhir'   =>$this->input->post('tanggalakhir'),
                'datalaporan'       =>$this->ML->ambilLaporanPeriode($this->input->post('tanggalawal'), $this->input->post('tanggalakhir')),
            ];
            $this->template->load('Admin/Template','Admin/Laporanreservasi/Periode', $data);
        }
    }
    
}
