<?php

class Reservasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_reservasi', 'MR');
    }

    public function index()
    {
        $data=[
            'title' => 'Hotel-Ku | Transaksi',
            'judul' => 'Transaksi',
            'subjudul' => 'reservasi',
            'breadcrumb1' => 'Transaksi',
            'datareservasi'  =>  $this->MR->AmbilDatareservasi()->result()
        ];
        $this->template->load('Admin/Template','Admin/reservasi/index', $data);
    }
    public function Detail($id=null)
    {
        $data=[
            'title' => 'Hotel-Ku | Transaksi',
            'judul' => 'Transaksi',
            'subjudul' => 'reservasi',
            'breadcrumb1' => 'Transaksi',
            'id'  =>  $id
        ];
        $this->template->load('Admin/Template','Admin/reservasi/Detail', $data);
    }
    public function getDetailreservasi($id=null)
    {
        $json = $this->MR->getDetailreservasi($id);
        echo json_encode($json);
    }
    public function Checkin()
    {
        $this->form_validation->set_rules('idnya','id','required');
        if ($this->form_validation->run() == TRUE) {
            $data=[
                'status'    => 'CHECKIN'
            ];
            $this->MR->Ubah($data,['idreservasi'=> $this->input->post('idnya')]);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diperbaharui</div>');
        }
    }
    public function Checkout()
    {
        $this->form_validation->set_rules('idnya','id','required');
        if ($this->form_validation->run() == TRUE) {
            $data=[
                'status'    => 'CHECKOUT'
            ];
            $this->MR->Ubah($data,['idreservasi'=> $this->input->post('idnya')]);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diperbaharui</div>');
        }
    }
    public function Cancel()
    {
        $this->form_validation->set_rules('idnya','id','required');
        if ($this->form_validation->run() == TRUE) {
            $data=[
                'status'    => 'CANCEL'
            ];
            $this->MR->Ubah($data,['idreservasi'=> $this->input->post('idnya')]);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diperbaharui</div>');
        }
    }
}
