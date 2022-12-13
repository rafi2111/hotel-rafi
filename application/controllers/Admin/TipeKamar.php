<?php

class TipeKamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_tipekamar', 'MTK');
    }

    public function index()
    {
        $data=[
            'title' =>'Hotel-Ku | Master Kamar',
            'judul' =>'Master Kamar',
            'subjudul' =>'Tipe Kamar',
            'breadcrumb1' =>'Master Kamar',
            'datatipekamar'  => $this->MTK->AmbilAll()->result()
        ];
        $this->template->load('Admin/Template','Admin/Tipekamar/index', $data);
    }
    public function Add()
    {
        $this->form_validation->set_rules('tipekamar','Tipe kamar','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        
        if($this->form_validation->run() == false) {
            $data=[
                'title' =>'Hotel-Ku | Master Kamar',
                'judul' =>'Master Kamar',
                'subjudul' =>'Tambah Tipe Kamar',
                'breadcrumb1' =>'Tambah Tipe Kamar',
            ];
            $this->template->load('Admin/Template','Admin/Tipekamar/Add', $data);
        }else{
            $data=[
                'tipekamar' => $this->input->post('tipekamar'),
            ];
            $this->MTK->Simpan($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Data berhasil di simpan.! </div>');
            redirect('Admin/Tipekamar','refresh');
        }
    }
    public function Ubah($id=null)
    {
        $this->form_validation->set_rules('tipekamar','Tipe Kamar','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        if($this->form_validation->run() == FALSE)
        {
            $data=[
                'title' =>'Hotel-Ku | Master Kamar',
                'judul' =>'Master Kamar',
                'subjudul' =>'Tambah Tipe Kamar',
                'breadcrumb1' =>'Ubah Tipe Kamar',
                'datatipekamar' =>$this->MTK->Ambil(['idtipekamar'=> $id])->result(),
                'id'            => $id
            ];
            $this->template->load('Admin/Template','Admin/Tipekamar/Ubah', $data);
        }else{
            $data=[
                'tipekamar' => $this->input->post('tipekamar', TRUE)
            ];
            $this->MTK->Ubah($data,['idtipekamar' => $id]);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Data Tipe Kamar berhasil di perbarui</div>');
            redirect('Admin/Tipekamar', 'refresh');
        }
       
    }
}
