<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Test DataBase</title>
</head>
<body>
    <br><br><br>
    <div class="container">
        <button type="button" onclick="mulai()">Mulai</button>
        <button type="button" onclick="hapus()">Hapus</button>
        <button type="button" data-toggle="modal" data-target="#exampleModalLong">Tambah Matkul</button>
        <div class="row">
          <div class="col-1">
          </div>
          <div class="col-10">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Kode Matakuliah</th>
                    <th scope="col">Nama Matakuliah</th>
                    <th scope="col">Semester</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="bodi"> 
                  
                </tbody>
              </table>
          </div>
          <div class="col-1">
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="formTambah">
              <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="modal-body">
                <div class="form-group">
                  <label>Kode Matakuliah</label>
                  <input class="form-control" id="kodeMatakuliah" placeholder="Masukan Kode Matkul">
                </div>
                <div class="form-group">
                  <label>Nama Matakuliah</label>
                  <input class="form-control" id="namaMatakuliah" placeholder="Masukan Nama Matkul">
                </div>
                <div class="form-group">
                  <label>SKS</label>
                  <input class="form-control" id="sks" placeholder="masukan SKS">
                </div>
                <div class="form-group">
                  <label>Semester</label>
                  <input class="form-control" id="semester" placeholder="masukan Semester">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $("#formTambah").submit(function(e){
          e.preventDefault();
          var kode_matakuliah = $('#kodeMatakuliah').val();
          var nama_matakuliah = $('#namaMatakuliah').val();
          var sks = $('#sks').val();
          var semester = $('#semester').val();
          $.ajaxSetup({
            headers: { 'X-CSRF-Token': $('meta[name=csrf-token]').attr('content') }
          });
          $.ajax({
            url: "{{ route('testing.addMatakuliah') }}",
            type: 'post',
            contentType: false,
            cache: false,
            processData: false,
            data: $('form#formTambah').serialize(),
            success: function(data) {
                        alert(data);
                      }
          });
        });

        function hapus(){
          $('#bodi').empty();
        }

        function mulai(){
          $('#bodi').empty();
          $.ajax({
              url: "{{ route('testing.matakuliah') }}",
              type: 'GET',
              dataType: 'json',
              success: function(data) {
                  data.matkul.forEach(element => {
                    var bodi =  '<tr>'+
                                  '<td>'+ element.id +'</td>'+
                                  '<td>'+ element.kode_matakuliah +'</td>'+
                                  '<td>'+ element.nama_matakuliah +'</td>'+
                                  '<td>'+ element.semester +'</td>'+
                                  '<td>'+ element.sks +'</td>'+
                                  "<td><button type='button' onclick='edit("+ element.id +")'>Edit</button> <button type='button' onclick='apusData("+ element.id +")'>Hapus</button></td>"+
                                '</tr>';
                    $('#bodi').append(bodi);  
                  });        
                  
              }
          })
        }

        $(document).ready(function(){
          mulai();
        });

        function edit(id){
            $.ajax({
                url: "{{ route('testing.hapusMatakuliah', ':id') }}".replace(':id', id),
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    mulai();
                }
            });
        }

        function apusData(id){
          $.ajax({
                url: "{{ route('testing.hapusMatakuliah', ':id') }}".replace(':id', id),
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    mulai();
                }
            });
        }
    </script>
</body>
</html>