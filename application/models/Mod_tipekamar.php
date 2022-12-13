<?php

class Mod_tipekamar extends CI_Model
{
    var $tabel = 'tipekamar';
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
}