<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Tabel Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1>Data Pelanggan</h1>
    <div class="col-6">
    <!-- Bagian menampilkan error dari validasi -->
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissable fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4>Periksa antrian form</h4>
            <hr>
            <?php echo session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>
    <!-- Akhir bagian menampilkan error dari validasi -->

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">
                Tambah Pelanggan
            </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="card-body">
                <div class="form-group row">
                    <label for="NamaPelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_pelanggan" name="NamaPelanggan" placeholder="Masukkan Nama Pelanggan">
                        <input type="hidden" id="status">
                        <input type="hidden" id="id_pelanggan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Alamat" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="alamat" name="Alamat" placeholder="Masukkan Alamat"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tlp" class="col-sm-4 col-form-label">Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nomor_telepon" name="Telp" placeholder="Masukkan Telepon">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="text-right">
                    <button type="submit" id="simpan" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
</div>

<div class="col-sm-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
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
                    url: 'pelanggan/tampil',
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
                                            '<td>'+data[i].nama_pelanggan+'</td>'+
                                            '<td>'+data[i].alamat+'</td>'+
                                            '<td>'+data[i].nomor_telepon+'</td>'+
                                            '<td>'+
                                                '<button id="edit" data-id="'+data[i].id_pelanggan+'" class="btn btn-warning">Edit</button>'+' '+
                                                '<button id="hapus" data-id="'+data[i].id_pelanggan+'" class="btn btn-danger">Hapus</button>'+
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
          var namaPelanggan = $('#nama_pelanggan').val();
          var alamat = $('#alamat').val();
          var telp = $('#nomor_telepon').val();
          var status = $('#status').val();
          var id = $('#id_pelanggan').val();

            if(status == ''){
              $.ajax({
                url: 'pelanggan/simpan',
                type: 'post', 
                data: {namaPelanggan: namaPelanggan, alamat: alamat, telp: telp},
                success: function(data){
                   $('#nama_pelanggan').val('');
                   $('#alamat').val('');
                   $('#nomor_telepon').val('');

                   tampil_data();
                }
              })
            } else if(status == 'update'){
              $.ajax({
                url: 'pelanggan/update',
                type: 'post',
                data: {
                  id: id,
                  namaPelanggan: namaPelanggan,
                  alamat: alamat,
                  telp: telp
                },
                success: function(data) {
                  $('#nama_pelanggan').val('');
                  $('#alamat').val('');
                  $('#nomor_telepon').val('');
                  $('#status').val('');

                  tampil_data();
                }
              })
            }
        }); //end simpan

        //edit
        $('#showData').on('click', '#edit', function(e){
            e.preventDefault();
            var id = $(this).data('id')
            
            $.ajax({
                url : 'pelanggan/edit',
                type : 'get',
                dataType : 'json',
                data: {id: id}, //sebelah kanan dari controller, sebelah kiri dari var

                success: function(data){
                    console.log(data);
                    $('#id_pelanggan').val(data.id_pelanggan);
                    $('#nama_pelanggan').val(data.nama_pelanggan);
                    $('#alamat').val(data.alamat);
                    $('#nomor_telepon').val(data.nomor_telepon);
                    $('#status').val('update');
                }
              })
            });
            //update
                        $('#update').on('click',function(e) {
                            e.preventDefault();

                            var namaPelanggan = $(this).data('namaPelanggan');
                            var alamat = $(this).data('namaPelanggan');
                            var telp = $(this).data('namaPelanggan');

                            $.ajax({
                                url: 'pelanggan/update',
                                type: 'post',
                                data: {namaPelanggan: namaPelanggan, alamat: alamat, telp:telp},
                                success:function(data) {
                                    $('#nama_pelanggan').val('');
                                    $('#alamat').val('');
                                    $('#nomor_telepon').val('');

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
          url : 'pelanggan/delete',
          data : {id: id},
          success : function(data){

            tampil_data();
            $('id_pelanggan').focus();
          }
          
        })

      });
      //end delete

    });
    </script>
  </body>
</html>

<?= $this->endSection(); ?>