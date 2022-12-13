<?=
   $this->session->flashdata('pesan');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
             <div class="box-header">
                <a href="<?= base_url() ?>Admin/Fasilitashotel/" class="btn btn-warning btn-sm pull-right">Kembali</a>
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>Admin/FasilitasHotel/Ubah/ <?= $id ?>." method="POST" enctype="multipart/form-data">
                <?php foreach($dataubahfasilitas as $tampilkan) : ?> 
                <div class="form-group">
                    <label> Nama Fasilitas</label>
                    <input type="text"  class="form form-control" name="namafasilitas" value="<?=$tampilkan->namafasilitas?>">
                    <div class="text-danger"><?= form_error('namafasilitas') ?></div>
                </div>
                <div class="form-group"></div>
                <label>Gambar</label> <BR></BR>
                <img src="<?=base_url('upload/') ?><?= $tampilkan->picture ?>" alt="" width="100" class="img img-thumbnail">
                </div>
                <div class="form-group">
                    <label>ubah Gambar</label>
                    <input type="file"  class="form form-control" name="galery">
                    <div class="text-danger"><?= form_error('galery') ?></div>
                </div class="text-danger">Jika Akan dirubah silahkan pilih gambarnya.!</div>
                <div class="form-group">
                    <button class="btn btn-primary btn-md" type="submit">PERBAHARUI</button>
                </div>
                <?php endforeach; ?>
             </form>
         </div>
     </div>
  </div>
</div>