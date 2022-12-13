<?=
    $this->session->flashdata('pesan');
    ?>

    <div class="row">
        <div class= "col-md-12">
            <div class="box">
            <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/reservasi/Add" class="btn btn-primary btn-sm">Tambah Reservasi</a>
            </div>
            <div class="box-body">
             <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama tamu</th>
                        <th>Nama kamar</th>
                        <th>Tanggal checkin</th>
                        <th>Jumlah kamar</th>
                        <th>Status</th>
                        <th>Option</th>
                    <tr>
                </thead>
                <?php
                     $no = 1;
                     foreach($datareservasi as $tampilkan){
                        echo "<tr>";
                           echo "<td>$no</td>";
                           echo "<td>$tampilkan->nama</td>";
                           echo "<td>$tampilkan->namakamar</td>";
                           echo "<td>$tampilkan->startdate</td>";
                           echo "<td>$tampilkan->qtykamar</td>";
                           echo "<td>$tampilkan->status</td>";
                           echo "<td><a href=" . base_url('index.php/Admin/reservasi/Detail/') . $tampilkan->idreservasi . ">
                           <button class='btn btn-primary btn-xs'><li class='fa fa-eye'></li></button></a></td>";
                        echo "</tr>";

                     }
                ?>
            </table>
             </div>
        </div>
    </div>
</div>
