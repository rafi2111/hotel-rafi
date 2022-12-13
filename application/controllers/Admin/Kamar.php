<?php

class Kamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_Kamar','MK');
    }

    public function index()
    {
        $data=[
            'title' =>'Hotel-Ku | Master Data',
            'judul' =>'Master Data',
            'subjudul' =>'Kamar Hotel ',
            'breadcrumb1' =>'Master Data',
            'datakamar'     =>$this->MK->AmbilDataKamar()->result()
        ];
        $this->template->load('Admin/Template','Admin/Kamar/index', $data);
    }

    public function Add()
    {
        $this->form_validation->set_rules('namakamar','Nama kamar','required');
        $this->form_validation->set_rules('hargakamar','Harga kamar','required|numeric');
        $this->form_validation->set_rules('jumlahkamar','Jumlah kamar','required|numeric');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        $this->form_validation->set_rules('tipekamar','Tipe Kamar','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        $this->form_validation->set_message('numeric','{field} tidak boleh kosong');
        
        if($this->form_validation->run() == false) {
            $data=[
                'title' =>'Hotel-Ku | Master Kamar',
                'judul' =>'Master Kamar',
                'subjudul' =>'Tambah Tipe Kamar',
                'breadcrumb1' =>'Tambah Tipe Kamar',
                'datatipekamar' => $this->MK->AmbilTipeKamar()->result()
            ];
            $this->template->load('Admin/Template','Admin/Kamar/Add', $data);
        }else{
            $p = $this->input->post();
            $detailfasilitas = [];
            //proses penyimpanan kamar
            $datakamar=[
                'namakamar'         => $this->input->post('namakamar'),
                'harga'         => $this->input->post('hargakamar'),
                'jumlahqty'         => $this->input->post('jumlahkamar'),
                'description'         => $this->input->post('deskripsi'),
                'tipekamarid'         => $this->input->post('tipekamar')

            ];
            $this->MK->Simpan($datakamar);
            //proses penyimpanan detail fasilitas
            $idkamar = $this->db->insert_id();
            if (@$p['fasilitas']) {
                foreach ($p['fasilitas'] as $i => $x) {
                    $detailfasilitas[] = [
                        'kamarid'       => $idkamar,
                        'fasilitasid'   => $x
                    ];
                }
            }
            if (count($detailfasilitas) > 0) {
                $this->db->insert_batch('detailfasilitaskamar', $detailfasilitas);
            }
            //proses penyimpanan kamar galery
            $acak=rand(1000,999);
            $foto=$acak . '-IMG-kamar.jpg';
            $config['upload_path']          ='./upload';
            $config['allowed_types']         ='jpg';
            $config['max_size']             =1024;
            $config['file_name']            =$foto;
            $this->load->library('upload',$config);
            if($this->upload->do_upload('galery')) {
                $datagalerykamar = [
                    'url'           =>$foto,
                    'kamarid'       =>$idkamar
                ];
                $this->MK->Simpangalerykamar('kamargalery',$datagalerykamar);
            }
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Data Kamar Berhasil Di Simpan</div>');
            redirect('Admin/kamar','refresh');
        }
    }

    public function getfasilitas()
    {
        $json = $this->MK->ambilJsonFasilitas();
        echo json_endcode($json);
    }
    public function Ubah($id=null)
    {
        $this->form_validation->set_rules('namakamar','Nama kamar','required');
        $this->form_validation->set_rules('hargakamar','Harga kamar','required|numeric');
        $this->form_validation->set_rules('jumlahkamar','Jumlah kamar','required|numeric');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        $this->form_validation->set_rules('tipekamar','Tipe Kamar','required');
        $this->form_validation->set_message('required','{field} tidak boleh kosong');
        $this->form_validation->set_message('numeric','{field} tidak boleh kosong');
        
        if($this->form_validation->run() == false) {
            $data=[
                'title' =>'Hotel-Ku | Master Kamar',
                'judul' =>'Master Kamar',
                'subjudul' =>'Ubah Tipe Kamar',
                'breadcrumb1' =>'ubah Tipe Kamar',
                'datatipekamar' => $this->MK->AmbilTipeKamar()->result(),
                'id'        => $id,
                'datafasilitas' => $this->MK->ambilDataFasilitas()->result(),

            ];
            $this->template->load('Admin/Template','Admin/Kamar/ubah', $data);
        }else{
            //proses ubah data kamar
            $datakamar=[
                'namakamar'         => $this->input->post('namakamar'),
                'harga'         => $this->input->post('hargakamar'),
                'jumlahqty'         => $this->input->post('jumlahkamar'),
                'description'         => $this->input->post('deskripsi'),
                'tipekamarid'         => $this->input->post('tipekamar')
            ];
            $this->db->set($datakamar);
            $this->db->where('idkamar',$id);
            $this->db->update('kamar');
            //proses ubah data galery
            if(!empty($_FILES['galery']['name'])){
                $acak=rand(1000,999);
                $foto=$acak . '-IMG-kamar.jpg';
                $config['upload_path']          ='./upload';
                $config['allowed_types']         ='jpg';
                $config['max_size']             =1024;
                $config['file_name']            =$foto;
                $this->load->library('upload',$config);
                $this->upload->do_upload('galery');
                $datagalery=[
                    'url'       => $foto,
                    'kamarid'   => $id
                ];
                $this->db->set($datagalery);
                $this->db->where('idkamargalery',$this->inputy->post('idgalery'));
                $this->db->update('kamargalery');

            }
            $this->session->set_flashdata('pesan','<div class="alert alert-success">Data kamar berhasil diperbaharui</div>');
            redirect('Admin/kamar','refresh');

        }

    }
    public function JsonUbahkamar($id)
    {
        $json = $this->MK->getJsonUbahkamar($id);
        echo Json_encode($json);
    }
    public function CheckFasilitas()
    {
        $this->db->where('kamarid', $this->input->post('kamarid'));
        $this->db->where('fasilitasid', $this->input->post('fasilitasid'));
        $cari = $this->db->get('detailfasilitaskamar');
        if ($cari->num_rows()> 0) { 
            $this->db->where('kamarid', $this->input->post('kamarid'));
            $this->db->where('fasilitasid', $this->input->post('fasilitasid'));
            $this->db->delete('detailfasilitaskamar');
        } else {
            $data=[
                'kamarid'   => $this->input->post('kamarid'),
                'fasilitasid'   =>$this->input->post('fasilitasid'),
            ];
            $this->db->insert('detailfasilitaskamar', $data);
        }
    }
    public function Detail($id=null)
    {
        $data=[
            'title' =>'Hotel-Ku | Master Kamar',
            'judul' =>'Master Kamar',
            'subjudul' =>'Detail Kamar',
            'breadcrumb1' =>'Detail Tipe Kamar',
            'id'        => $id,
        ];
        $this->template->load('Admin/Template','Admin/Kamar/Detail', $data);
    }
    public function getJsonDetail($id=null)
    {
        $jsonnya = $this->MK->AmbilDetailKamar($id);
        echo json_encode($jsonnya);
    }

}