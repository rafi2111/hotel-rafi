<?=
   $this->session->flashdata('pesan');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
             <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/FasilitasKamar/" class="btn btn-warning btn-sm pull-right">Kembali</a>
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>Admin/FasilitasKamar/Add" method="POST">
                <div class="form-gruop">
                    <label>Fasilitas Kamar</label>
                    <input type="text"  class="form form-control" name="fasilitaskamar">
                    <div class="text-danger"><?= form_error('fasilitaskamar') ?></div>
                </div>
                <div class="form-gruop">
                    <label>Icon</label>
                    <input type="text"  class="form form-control" name="icon">
                    <div class="text-danger"><?= form_error('icon') ?></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-md" type="submit">SIMPAN</button>
                </div>
             </form>
         </div>
     </div>
  </div>
</div>