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
        <div class="row">
          <div class="col-1">
          </div>
          <div class="col-10">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Waktu</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama Matakuliah</th>
                    <th scope="col">Dosen</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Ruang</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($sesi as $s)  
                  <tr>
                    <td>{{ $s->waktu_belajar }}</td>
                    <td>{{ $s->kode_matakuliah }}</td>
                    <td>{{ $s->nama_matakuliah }}</td>
                    <td>{{ $s->dosen_sesi }}</td>
                    <td>{{ $s->semester }}</td>
                    <td>{{ $s->no_ruangan }}</td>
                    <td>{{ $s->status }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
          <div class="col-1">
          </div>
        </div>
      </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>