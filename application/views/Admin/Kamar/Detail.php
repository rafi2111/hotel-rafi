<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <div>
                    <a href="<?= base_url() ?>index.php/Admin/Kamar/" class="btn btn-warning btn-xl">kembali</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md 12">
            <div class="box">
                <div class="box-header">

                    </div>
                    <div class="box-body">
                        <label>Gambar kamar</label>
                    <div id="gambarkamar">

                    </div>
                    <label>nama kamar</label>
                    <div id="namakamar">

                    </div>
                    <label>Tipe kamar</label>
                    <div id="tipekamar">

                    </div>
                    <label>Harga Kamar</label>
                    <div id="hargakamar">

                    </div>
                    <label>Jumlah kamar</label>
                    <div id="jumlahkamar">

                    </div>
                    <label>Fasilitas kamar</label>
                    <div id="fasilitas">

                    </div>
                    <label>Rating</label>
                    <div id="rating">

                    </div>
                    <label>Deskripsi</label>
                    <div id="deskripsi">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box direct-chat direct-chat-warning">
                <div class="box-header with border">

                </div>
                <div class="box-body">
                    <div class="direct-chat-messages" id="form-pesan">
                        <div id="ruangkomentar">

                        </div>
                </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        var url ='<?base_url() ?>'
        var arrDataRating=[]
        var arrDetailKomentar=[]
        $.getJson(url + 'index.php/Admin/Kamar/getJsonDetail/' +'<? $id ?>',function(res)) {
            console.log(res)
            res.datakamar.map((x) => {
                $('#gambarkamar').append(
                    '<img rsc=>"<? base_url() ?>upload/' + x.url+'" class="img img-thumbnail">'
                )
                $('#namakamar').html(x.namakamar)
                $('#tipekamar').html(x.tipekamar)
                $('#hargakamar').html(x.harga)
                $('#jumlahkamar').html(x.jumlahqtyt)
                $('#deskripsi').html(x.description)
            
            })
            res.datafasilitas.map((x)=>{
                $('$fasilistas').append(
                    '<li class="'+ x.icon+' fa-5x" style="color:green;></li>'
                )
        })
        res.datarating.map((x)=>{
            $('$fasilistas').append('<li class="fa fa-star" id="ratingno1"></li>')
            $('$fasilistas').append('<li class="fa fa-star" id="ratingno2"></li>')
            $('$fasilistas').append('<li class="fa fa-star" id="ratingno3"></li>')
            $('$fasilistas').append('<li class="fa fa-star" id="ratingno4"></li>')
            $('$fasilistas').append('<li class="fa fa-star" id="ratingno5"></li>')
            let nilairating={
                jumlahrating: parseint(x.rata2)
            }
            arrDataRating.push(nilairating) 
    })
    tampilkanRating()
    res.datakomentar.map((x)=>{
        let datakomentarnya={
            idkamar:x.idkamar,
            idreview:x.idreview,
            nama:x.nama,
            komentar:x.review,
            waktu:x.created_at
        }
        arrDetailKomentar push(datakomentarnya)
    })
    tampilkankomentar()
}
const tampilkankomentar=()=>{
  $('#ruangkomentar').html('')
  arrDetailKomentar.map((x,i)=>{
  $('#ruangkomentar'). append(
    `
    <div class="direct-chat-msg">
      <div class="direct-chat-info clearfix">
       <span class="direct-chat-name pull-left>$(x.nama)</span>
        <span class="direct-chat-timestamp pull-right>$(x.waktu)</span>

     </div>
       <div class="direct-chat-text> 
        ${x.komentar}
       </div>
    </div>
    `
  )
  })
}
 const tampilkanRating=()=>{
    arrDataRating.map((x,i))=>{
        nilainnya = x,jumlahRating +1
        for (let indexrating = 0;  <nilainnya; indexrating++){
            $(#'ratingno'+indexrating).prop('style', 'color:orange')
        }
    }
 }

    </script>