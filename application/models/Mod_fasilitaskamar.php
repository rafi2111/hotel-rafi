<?php

class Mod_fasilitaskamar extends CI_Model
{
    var $tabel = 'fasilitas';
    public function Simpan($data)
    {
        $this->db->insert($this->tabel, $data);
    }
    public function Ubah($data,$id)
    {
        $this->db->set($data);
        $this->db->where($id);
        $this->db->update($this->tabel);
    }
    public function Ambil($data)
    {
       $this->db->where($data);
       return $this->db->get($this->tabel);
    }  
    public function AmbilAll()
    {
        return $this->db->get($this->tabel);
    }
    public function AmbilKamar()
    {
        $this->db->where('jenisfasilitas', 'Kamar');
       return $this->db->get($this->tabel);
    }
}