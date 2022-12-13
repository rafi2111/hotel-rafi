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
                    <?php
                        foreach($datafasilitas as $tampilkanfasilitas){?>
                        <input type="checkbox" name="checkboxfasilitas[]" <?= check_akses($id, $tampilkanfasilitas->idfasilitas) ?> data-kamar=" <?= $id ?>" 
                        data-fasilitas="<?= $tampilkanfasilitas->idfasilitas ?>" id="checkfasilitas" class="form-check-input" 
                        value="<?= $tampilkanfasilitas->idfasilitas ?>"><?= $tampilkanfasilitas->namafasilitas?> 
                    <?php } 
                    ?>
                    <hr>
                    </div>
                </div>
                <div class="from-group">
                    <label for=>Gambar kamar</label>
                    <img src="" alt="" class="img img-thumbnail" id="gambarkamar">
                    <input type="hidden" name="idgalery">
                </div>
                <div class="form-group">
                    <label> Ubah Gambar Kamar</label>
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

<script type="text/javascript">
    var url = '<?= base_url() ?>'
    var arrFasilitas=[]
    var Tipekamar = []
    $.getJSON(url + 'index.php/Admin/kamar/' + <?= $id ?>, function(res) {
        console.log(res)
       
        res.datatipekamar.map((x) =>{
            let datatipe = {
                idtipe: x.idtipekamar,
                namatipe: x.tipekamar
            }
            TipeKamar.push(datatipe)
        })
        getTipeKamar()
        res.datakamar.map((x) => {
            $('input[name="namakamar"]').val(x.namakamar)
            $('input[name="hargakamar"]').val(x.hargakamar)
            $('input[name="jumlahkamar"]').val(x.jumlahqty)
            $('#deskripsi').html(x.deskription)
            $('input[name="namakamar"]').val(x.namakamar)
            $('input[name="namakamar"]').val(x.namakamar)
            $('#tipekamar').val(x.tipekamarid)
        })
        res.datagalerykamar.map((x)=>{
            $('#gambarkamar').prop('src', "<?= base_url() ?>/upload/"+ x.url )
            $('input[name="idgalery"]').val(x.idkamargalery)

        })
    })
    const getTipeKamar = () => {
        $('#tipekamar').html('')
        TipeKamar.map((x,i)=> {
            $('#tipekamar').append(
                `

                <option value="${x.idtipe}">${x.namatipe}</option>
                `
            )
        })
    }
    $('.from-check-input').on('click',function() {
        const kamar = $(this).data('kamar')
        const fasilitas = $(this).data('fasilitas')
        $.ajax({
            url: '<?= base_url('index.php/Admin/kamar/CheckFasilitas') ?>',
            type: 'POST',
            data: {
                kamarid: kamar,
                fasilitasid: fasilitas
            },
            success: function(res) {
                location.reload()
            }
        })
    })

</script>