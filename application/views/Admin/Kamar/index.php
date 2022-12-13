<?=
    $this->session->flashdata('pesan');
    ?>

    <div class="row">
        <div class= "col-md-12">
            <div class="box">
            <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/Kamar/Add" class="btn btn-primary btn-sm">Tambah Kamar</a>
            </div>
            <div class="box-body">
             <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama kamar</th>
                        <th>Harga Kamar</th>
                        <th>Jumlah Kamar</th>
                        <th>Type Kamar</th>
                        <th>Option</th>

                    <tr>
                </thead>
                <?php
                $no=1;
                foreach ($datakamar as $tampilkan) :
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?=$tampilkan->namakamar ?></td>
                        <td><?=$tampilkan->harga ?></td>
                        <td><?=$tampilkan->jumlahqty ?></td>
                        <td><?=$tampilkan->tipekamar ?></td>
                        <td> <a href="<?= base_url() ?>index.php/Admin/kamar/Ubah/<?= $tampilkan->idkamar ?>"><button class="btn btn-primary btn-xs">
                            <li class="fa fa-edit"></li>
                        </button></a>
                        <a href="<?= base_url() ?>index.php/Admin/Kamar/Detail/<?= $tampilkan->idkamar ?>">
                        <button class="btn btn-warning btn-xs">
                            <li class="fa fa-list"></li>
                </button>  
            </a>
         </td>
     </tr>

                <?php 
                endforeach; 
                ?>
                </table>
             </div>
        </div>
    </div>
</div>
