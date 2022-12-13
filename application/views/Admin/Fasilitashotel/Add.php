<?=
   $this->session->flashdata('pesan');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
             <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/FasilitasHotel/" class="btn btn-warning btn-sm pull-right">Kembali</a>
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>Admin/FasilitasHotel/Add" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label> Nama Fasilitas</label>
                    <input type="text"  class="form form-control" name="namafasilitas">
                    <div class="text-danger"><?= form_error('namafasilitas') ?></div>
                </div>
                <div class="form-group">
                    <label>picture/gambar</label>
                    <input type="file"  class="form form-control" name="galery">
                    <div class="text-danger"><?= form_error('galery') ?></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-md" type="submit">SIMPAN</button>
                </div>
             </form>
         </div>
     </div>
  </div>
</div>