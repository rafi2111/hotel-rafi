<?=
   $this->session->flashdata('pesan');
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
             <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/TipeKamar/" class="btn btn-warning btn-sm pull-right">Kembali</a>
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>Admin/TipeKamar/Ubah/<?= $id ?>" method="POST">
                <?php
                    foreach ($datatipekamar as $tampilkan) :
                ?>
                <div class="form-gruop">
                    <label>Tipe Kamar</label>
                    <input type="text"  class="form form-control" name="tipekamar" value="<?= $tampilkan->tipekamar ?>">
                    <div class="text-danger"><?= form_error('tipekamar') ?></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-md" type="submit">PERBARUI</button>
                </div>
                <?php
                    endforeach;
                ?>
             </form>
         </div>
     </div>
  </div>
</div>