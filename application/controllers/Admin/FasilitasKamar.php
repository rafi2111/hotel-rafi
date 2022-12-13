<?php

class FasilitasKamar extends CI_Controller
{
public function __construct()
{
    parent::__construct();
    $this->load->model('Mod_fasilitaskamar','MFK');
}
    public function index()
    {
        $data=[
            'title' =>'Hotel-Ku | Master Data',
            'judul' =>'Master Data',
            'subjudul' =>'Fasilitas Kamar',
            'breadcrumb1' =>'Master Data',
            'datafasilitaskamar'  => $this->MFK->AmbilKamar()->result()
        ];
        $this->template->load('Admin/Template','Admin/Fasilitaskamar/index', $data);
    }
    public function Add()
    {
        $this->form_validation->set_rules('fasilitaskamar','Fasilitas kamar','required');
        $this->form_validation->set_rules('icon','icon','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        
        if($this->form_validation->run() == false) {
            $data=[
                'title' =>'Hotel-Ku | Master Data',
                'judul' =>'Master Data',
                'subjudul' =>'Tambah Fasilitas Kamar',
                'breadcrumb1' =>'Tambah Fasilitas Kamar',
            ];
            $this->template->load('Admin/Template','Admin/Fasilitaskamar/Add', $data);
        }else{
            $data=[
                'namafasilitas' => $this->input->post('fasilitaskamar', TRUE),
                'icon'          =>$this->input->post('icon',true),
                'jenisfasilitas'=>'kamar'
            ];
            $this->MFK->Simpan($data);
            $this->session->set_flashdata('pesan', 'Data berhasil di simpan.!');
            redirect('Admin/Fasilitaskamar','refresh');
        }
    }

    public function Ubah($id=null)
    {
        $this->form_validation->set_rules('namafasilitas','Nama Fasilitas','required');
        $this->form_validation->set_rules('icon','Icon','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');

        if($this->form_validation->run() == FALSE)
        {
            $data=[
                'title' =>'Hotel-Ku | Master Data',
                'judul' =>'Master Data',
                'subjudul' =>'Tambah Fasilitas Kamar',
                'breadcrumb1' =>'Tambah Fasilitas Kamar',
                'datafasilitaskamar'    => $this->MFK->Ambil(['idfasilitas'=>$id])->result(),
                'id'          => $id
            ];
            $this->template->load('Admin/Template','Admin/Fasilitaskamar/Ubah', $data);
        }else{
            $data=[
                'namafasilitas' => $this->input->post('namafasilitas', TRUE),
                'icon'          =>$this->input->post('icon', TRUE),
                'jenisfasilitas' => 'kamar'
            ];
            $this->MFK->Ubah($data,['idfasilitas' => $id]);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Data Tipe Kamar berhasil di perbarui</div>');
            redirect('Admin/Fasilitaskamar', 'refresh');
        }
       
    }
}