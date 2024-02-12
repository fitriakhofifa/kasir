<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Tabel Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1>Data Penjualan</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
            <div class="card">  
            <div class="card-header">
                Tambah Data
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Tanggal Penjualan</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="tanggal_penjualan">
                        <input type="hidden" id="status">
                        <input type="hidden" id="tanggal_penjualan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="text" class="col-sm-4 col-form-label">Total Harga</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="total_harga">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="text" class="col-sm-4 col-form-label">ID Pelanggan</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="id_pelanggan">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                </form>
            </div>
            </div>
            </div>
            <div class="col-sm-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Penjualan</th>
                            <th>Total Harga</th>
                            <th>ID Pelanggan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="showData">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="<?= base_url()?>AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            tampil_data();

            function tampil_data()
            {
                $.ajax({
                    url: 'penjualan/tampil',
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        var HTML = '';  //kode dalam bentuk javascript
                        var i;          //
                        var no = 0;     //
                        if(data.length == 0){   //panjang data
                            HTML += '<tr>' +
                                    '<td colspan = "5" class="text-center"> Data pada tabel masih kosong </td> +'
                                    '</tr>'
                            $('#showData').html(HTML);
                        }else{
                            for(i=0; i<data.length; i++){
                                no++;
                                HTML += '<tr>'+
                                            '<td>'+no+'</td>'+
                                            '<td>'+data[i].tanggal_penjualan+'</td>'+
                                            '<td>'+data[i].total_harga+'</td>'+
                                            '<td>'+data[i].id_pelanggan+'</td>'+
                                            '<td>'+
                                                '<button id="edit" data-id="'+data[i].id_penjualan+'" class="btn btn-warning">Edit</button>'+' '+
                                                '<button id="hapus" data-id="'+data[i].id_penjualan+'" class="btn btn-danger">Hapus</button>'+
                                            '</td>'+
                                        '</tr>'
                            }
                            $('#showData').html(HTML);
                         }
            }
          });
        }

        $('#simpan').on('click', function(e) {
          e.preventDefault();
          var tanggalPenjualan = $('#tanggal_penjualan').val();
          var total_harga = $('#total_harga').val();
          var id_pelanggan = $('#id_pelanggan').val();
          var status = $('#status').val();
          var id = $('#id_penjualan').val();

            if(status == ''){
              $.ajax({
                url: 'produk/simpan',
                type: 'post', 
                data: {tanggalPenjualan: tanggalPenjualan, total_harga: total_harga, id_pelanggan: id_pelanggan},
                success: function(data){
                   $('#nama_produk').val('');
                   $('#harga').val('');
                   $('#stok').val('');

                   tampil_data();
                }
              })
            } else if(status == 'update'){
              $.ajax({
                url: 'produk/update',
                type: 'post',
                data: {
                  id: id,
                  namaProduk: namaProduk,
                  harga: harga,
                  stok: stok
                },
                success: function(data) {
                  $('#nama_produk').val('');
                  $('#harga').val('');
                  $('#stok').val('');
                  $('#status').val('');

                  tampil_data();
                }
              });
            }
        }); //end simpan

        //edit
        $('#showData').on('click', '#edit', function(e){
            e.preventDefault();
            var id = $(this).data('id')
            
            $.ajax({
                url : 'produk/edit',
                type : 'get',
                dataType : 'json',
                data: {id: id}, //sebelah kanan dari controller, sebelah kiri dari var

                success: function(data){
                    console.log(data);
                    $('#id_produk').val(data.id_produk);
                    $('#nama_produk').val(data.nama_produk);
                    $('#harga').val(data.harga);
                    $('#stok').val(data.stok);
                    $('#status').val('update');
                }
              })
            });
            //update
                        $('#update').on('click',function(e) {
                            e.preventDefault();

                            var namaProduk = $(this).data('namaProduk');
                            var harga = $(this).data('namaProduk');
                            var stok = $(this).data('namaProduk');

                            $.ajax({
                                url: 'produk/update',
                                type: 'post',
                                data: {namaProduk: namaProduk, harga: harga, stok:stok},
                                success:function(data) {
                                    $('#nama_produk').val('');
                                    $('#harga').val('');
                                    $('#stok').val('');

                                    tampil_data();
                                }
                            })
                        }) //end update

       //delete
       $('#showData').on('click','#hapus', function(e){
        e.preventDefault();

        var id = $(this).data('id');
        console.log('Berhasil Dihapus');
       

        $.ajax({
          method : 'post',
          url : 'produk/delete',
          data : {id: id},
          success : function(data){

            tampil_data();
            $('id_produk').focus();
          }
          
        })

      });
      //end delete

    });
    </script>
  </body>
</html>

<?= $this->endSection();?>