<?=
   $this->session->flashdata('pesan');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
             <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/Kamar/" class="btn btn-warning btn-sm pull-right">Kembali</a>
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>Admin/Kamar/Ubah/<?= $id ?>" method="POST" enctype="multipart/form.data">
                <div class="form-group">
                    <label>Nama Kamar</label>
                    <input type="text" class="form form-control" name="namakamar">
                    <div class="text-danger"><?= form_error('namakamar') ?></div>
                </div>
                <div class="form-group">
                    <label>harga</label>
                    <input type="number" class="form form-control" name="hargakamar">
                    <div class="text-danger"><?= form_error('hargakamar') ?></div>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form form-control" name="jumlahkamar">
                    <div class="text-danger"><?= form_error('jumlahkamar') ?></div>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Tipe Kamar</label>
                    <select name="tipekamar" id="tipekamar" class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>fasilitas</label>
                        <div id="fasilitas">
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Gambar Kamar</label>
                            <img src="" alt="" class="img img-thumbnail">
                        </div>
                <div class="form-group">
                    <label>Ubah Gambar Kamar</label>
                    <input type="file" name="galery" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-md" type="submit">SIMPAN</button>
                </div>
             </form>
         </div>
     </div>
  </div>
</div>
