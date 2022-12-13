<?php

class Mod_Kamar extends CI_Model
{
    var $tabel = 'kamar';
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
    public function AmbilDataKamar()
    {
        $this->db->select('kamar.*,tipekamar.tipekamar');
        $this->db->from($this->tabel);
        $this->db->join('tipekamar','kamar.tipekamarid=tipekamar.idtipekamar','left');
        return $this->db->get();
    }
    public function AmbilTipeKamar()
    {
        return $this->db->get('tipekamar');
    }
    public function ambiljsonFasilitas()
    {
        $query = $this->db->where('jenisfasilitas','Kamar')
        ->get('fasilitas')->result();
        return ['jsonfasilitas' => $query];
    }
    public function Simpangalerykamar($tabel,$data)
    {
        $this->db->insert('$tabel',$data);
    }
    public function getJsonUbahkamar($id)
    {
        $querykamar = $this->db->select('kamar.*')
        ->where('idkamar',$id)
        ->from('kamar')
        ->get()->result();

        $querytipekamar = $this->db->get('tipekamar')->result();
        $querygambarkamar = $this->db->select('kamargalery.url,kamargalery.idkamargalery')
                    ->where('kamarid',$id)
                    ->from('kamargalery')
                    ->get()->result();
        return [
            'datakamar'     => $querykamar,
            'datatipekamar' => $querytipekamar,
            'datagalerykamar' => $querygambarkamar
        ];

        return[
            'datakamar'     => $querykamar
        ];
    }
    public function ambilDataFasilitas()
    {
        return $this->db->get_where('fasilitas',['jenisfasilitas' => 'kamar']);
    }
    public function AmbilDetailKamar($id)
    {
         $datakamar = $this->db->select('kamar.*, kamargalery.url,tipekamar.tipekamar')
         ->from($this->table)
         ->join('kamargalery', 'kamar.idkamar=kamargalery.kamarid', 'left')
         ->join('tipekamar', 'kamar.idkamar=kamargalerry.kamarid', 'left')
         ->where('kamar.idkamar', $id)
         ->get()->result();

         $datafasilitaskamar = $this->db->select('fasilitas.namafasilitas,fasilitas.icon, detailfasilitaskamar.kamarid, kamar.namakamar')
         ->from('fasilitas')
         ->join('detailfasilitaskamar', 'fasilitas.idfasilitas=detailfasilitaskamar.fasilitasid','left')
         ->join('kamar','kamar.idkamar=detailfasilitaskamar.kamarid','left')
         ->where('detailfasilitaskamar.kamarid$id')
         ->get()->result();

         $datarating= $this->db->select('AVG(value) as rata2')
         ->from('tripadvisor')
         ->where('kamarid', $id)
         ->get()->result();

         $datadetailkomentar=$this->db->select('review.idreview,tamu.nama,review.review,review.created_at, kamar.idkamar,kamar.namakamar')
         ->from('review')
         ->join('tamu', 'review.tamuuid=tamu.idtamu', 'left')
         ->join('kamar', 'review.kamarid=kamar.idkamar', 'left')
         ->where('kamar.idkamar', $id)
         ->get()->result();
         return[
            'datakamar'  => $datakamar,
            'datafasilitas'   => $datafasilitaskamar,
            'datarating'   => $datarating,
            'datakomentar'   => $datadetailkomentar
         ];
    }
}
