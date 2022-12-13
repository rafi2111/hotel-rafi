<?=
    $this->session->flashdata('pesan');
?>

    <div class="row">
        <div class= "col-md-12">
            <div class="box">
            <div class="box-header">
                <a href="<?= base_url() ?>index.php/Admin/fasilitashotel/Add" class="btn btn-primary btn-sm">Tambah Fasilitas Hotel</a>
            </div>
            <div class="box-body">
             <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Fasilitas</th>
                        <th>Picture</th>
                        <th>Option</th>
                    <tr>
                </thead>
                <?php
                    $no = 1;
                    foreach($datafasilitashotel as $tampilkan){
                        echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>$tampilkan->namafasilitas</td>";
                            echo "<td><img class='w-25' src=" . base_url('upload/') . $tampilkan->picture."></td>";
                            echo "<td><a href=".base_url("Admin/fasilitashotel/Ubah/") . $tampilkan->idfasilitas . " class='btn btn-primary btn-xs'><li class='fa fa-list'></li></a></td>";
                        echo "</tr>";
                        $no++;
                    }
                ?>
                </tbody>
            </table>
             </div>
        </div>
    </div>
</div>
