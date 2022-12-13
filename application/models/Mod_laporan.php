<?php

class Mod_laporan extends CI_Model
{
    var $tabel = 'reservasi';
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
    public function ambilLaporanPeriode($tanggalawal,$tanggalakhir)
    {
        $isiwhere="startdate BETWEEN '$tanggalawal' and '$tanggalakhir'";
        return $this->db->select('reservasi.idreservasi, reservasi.startdate, reservasi.qtykamar, reservasi.lama, reservasi.status, 
        tamu.nama,tamu.nik, tamu.nama,tamu.jeniskelamin, tamu.alamat, tamu.telepon, kamar.namakamar')
        ->from($this->tabel)
        ->join('tamu', 'reservasi.tamuid=tamu.idtamu', 'left')
        ->join('kamar', 'reservasi.kamarid=kamar.idkamar', 'left')
        ->where($isiwhere)
        ->get();
    }
}