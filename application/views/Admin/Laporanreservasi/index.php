<?=
    $this->session->flashdata('pesan');
    ?>

    <div class="row">
        <div class= "col-md-6">
            <div class="box">
            <div class="box-header">
                Laporan Data Reservasi Per Periode
            </div>
            <div class="box-body">
                <form action="<?= base_url() ?>index.php/Admin/Lapreservasi/Periode" method="POST">
                <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input type="date" class="form form-control" required name="tanggalawal">
                </div>
                <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input type="date" class="form form-control" required name="tanggalakhir">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-lg"><li class="fa fa-print"></li>LIHAT DATA
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
