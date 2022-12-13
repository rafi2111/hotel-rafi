<?=
    $this->session->flashdata('pesan');
    ?>

    <div class="row">
        <div class= "col-md-12">
            <div class="box">
            <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/FasilitasKamar/Add" class="btn btn-primary btn-sm">Tambah Fasilitas Kamar</a>
            </div>
            <div class="box-body">
             <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Fasilitas</th>
                        <th>ICON</th>
                        <th>Option</th>
                    <tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($datafasilitaskamar as $tampilkan){
                        echo "<tr>";
                        echo "<td>$no</td>";
                        echo "<td>$tampilkan->namafasilitas</td>";
                        echo "<td>$tampilkan->icon</td>";
                        echo "<td><a href=".base_url().'index.php/Admin/FasilitasKamar/Ubah/'.$tampilkan->idfasilitas."><button class='btn btn-primary btn-xs'>Ubah</button></a></td>";
                        echo "<tr>";
                        $no++;
                    }
                        ?>
                </tbody>
            </table>
             </div>
        </div>
    </div>
</div>
