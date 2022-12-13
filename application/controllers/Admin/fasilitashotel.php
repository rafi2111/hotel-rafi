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
            'title' =>'Hotel Zafeer | Master Data',
            'judul' =>'Master Data',
            'subjudul' =>'Fasilitas hotel',
            'breadcrumb1' =>'Master Data',
            'datafasilitashotel' => $this->MFH->Ambil(['jenisfasilitas'=>'Hotel'])->result()
        ];
        $this->template->load('Admin/Template','Admin/Fasilitashotel/index', $data);
    }
    public function Add()
    {
        $this->form_validation->set_rules('namafasilitas', 'Nama Fasilitas', 'required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        if ($this->form_validation->run() == false) {
            $data=[
                'title' =>'Hotel Zafeer | Master Data',
                'judul' =>'Master Data',
                'subjudul' =>'Tambah Fasilitas hotel',
                'breadcrumb1' =>'Master Data',
                'datafasilitashotel'  => $this->MFH->AmbilAll()->result()
            ];
            $this->template->load('Admin/Template','Admin/Fasilitashotel/Add', $data);
        } else {
            $acak=rand(1000,9999);
            $foto=$acak.'IMG-Picture.jpg';
            $config['upload_path']      = './upload';
            $config['allowed_types']     = 'jpg';
            $config['max_size']         = 1024;
            $config['file_name']        = $foto;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('galery')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data gagal diupload!' . $this->upload->display_errors() . '</div>');
                redirect('Admin/Fasilitashotel', 'refresh');
            }else{
                $data=[
                    'namafasilitas'       => $this->input->post('namafasilitas'),
                    'picture'             => $foto,
                    'jenisfasilitas'      => 'Hotel'
                ];
                $this->MFH->Simpan($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil di simpan.!</div>');
                redirect('Admin/Fasilitashotel', 'refresh');
            }
        }
    }
}


    