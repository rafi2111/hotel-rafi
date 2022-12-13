<?php

class Fasilitashotel extends CI_Controller
{
public function __construct()
{
    parent::__construct();
    $this->load->model('Mod_fasilitashotel','MFH');
}
    public function index()
    {
        $data=[
            'title' =>'Hotel-Ku | Master Data',
            'judul' =>'Master Data',
            'subjudul' =>'Fasilitas Kamar',
            'breadcrumb1' =>'Master Data',
            'datafasilitashotel' => $this->MFH->AmbilHotel()->result()
        ];
        $this->template->load('Admin/Template','Admin/Fasilitashotel/index', $data);
    }

    public function Add()
    {
            $this->form_validation->set_rules('namafasilitas','Nama Fasilitas','required');
            $this->form_validation->set_message('required','(field) tidak boleh kosong.!');
        if ( $this->form_validation->run() == FALSE) {
            $data = [
                'title' =>'Hotel-Ku | Master Data',
                'judul' =>'Master Data',
                'subjudul' =>'TambahFasilitas Hotel',
                'breadcrumb1' =>'Master Data',
                'id' =>'$id'
      
            ];
            $this->template->load('Admin/Template', 'Admin/Fasilitashotel/Add',$data);
        }else{
            $acak=rand(1000,999);
            $foto=$acak . '-IMG-Picture.jpg';
            $config['upload_path']          ='./upload';
            $config['allowed_types']         ='jpg';
            $config['max_size']             =1024;
            $config['file_name']            =$foto;
            $this->load->library('upload',$config);

        if(!$this->upload->do_upload('galery')){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal diupload.!</div>');
            redirect('Admin/Fasilitashotel','refresh');
        }else{
            $data=[
                'namafasilitas'         =>$this->input->post('namafasilitas'),
                'picture'               =>$foto,
                'jenisfasilitas'        =>'Hotel'
            ];
            $this->MFH->simpan($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil disimpan.!</div>');
            redirect('Admin/Fasilitashotel','refresh');
        }
    }
}

    public function Ubah($id = null) 
    {
            $this->form_validation->set_rules('namafasilitas','Nama Fasilitas','required');
            $this->form_validation->set_message('required','(field) tidak boleh kosong.!');
            if ( $this->form_validation->run() == FALSE) {
                $data = [
                    'title' =>'Hotel-Ku | Master Data',
                    'judul' =>'Master Data',
                    'subjudul' =>'TambahFasilitas Hotel',
                    'breadcrumb1' =>'Master Data',
                    'id' =>$id,
                    'dataubahfasilitas' =>$this->MFH->Ambil(['idfasilitas'=>$id])->result()
                ];
                $this->template->load('Admin/Template', 'Admin/Fasilitashotel/ubah', $data);
            }else{
                $acak=rand(1000,999);
                $foto=$acak . '-IMG-Picture.jpg';
                $config['upload_path']          ='./upload';
                $config['allowed_types']         ='jpg';
                $config['max_size']             =1024;
                $config['file_name']            =$foto;
                $this->load->library('upload',$config);
    
            if(!$this->upload->do_upload('galery')){
                //jika di ubah tanpa gambar//
                $dataubahtanpagambar=[
                    'namafasilitas'
                ];
                $this->MFH->Ubah($dataubahtanpagambar,['idfasilitas'=> $id]);
                $this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diperbaharui.!</div>');
                redirect('Admin/Fasilitashotel','refresh');
            }else{
                //jika di ubah dengan gambar//
                $data=[
                    'namafasilitas'         =>$this->input->post('namafasilitas'),
                    'picture'               =>$foto,
                ];
                $this->MFH->ubah($data, ['idfasilitas' => $id]);
                $this->session->set_flashdata('pesan','<div class="alert alert-success">Data berhasil diperbaharui.!</div>');
                redirect('Admin/Fasilitashotel','refresh');
            }
        }
    }
}