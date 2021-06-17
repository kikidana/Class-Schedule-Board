<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Class Schedule Board</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <br><br><br>
    <div class="container">
        <div class="row">
          <div class="col-1">
            
          </div>
          <div class="col-10">
            <div class="card">
                <div class="card-header">
                  Class Schedule Board
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 text-center">
                            <img src="http://esqbs.ac.id/wp-content/uploads/2020/09/ESQ-Business-School-logo.png" style="width: 130px;">
                        </div>
                        <div class="col-6 text-center">
                            <h1>Ubah Sesi Kelas</h1>
                        </div>
                        <div class="col-3">

                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-10 text-center">
                            <br><br>
                            <form method="post" action="{{ route('sesiKelas.update', $formSesi->id) }}">
                              {{ csrf_field() }}
                              {{ method_field('PUT') }}

                                <div class="form-group row">
                                  <label for="kodeMatkul_namaMatkul" class="col-sm-2 col-form-label">Kode - Nama Mata Kuliah</label>
                                  <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" name="kode_namaMatkul" value="{{ $formSesi->kode_matakuliah }} - {{ $formSesi->nama_matakuliah }}">
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                                    <div class="col-sm-10">
                                      <input type="text" readonly class="form-control-plaintext" name="semester" value="{{ $formSesi->semester }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenisKelas" class="col-sm-2 col-form-label">Jenis Kelas</label>
                                    <div class="col-sm-10">
                                      <input type="text" readonly class="form-control-plaintext" name="jenis_kelas" value="{{ $formSesi->jenis_kelas }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dosen" class="col-sm-2 col-form-label">Dosen</label>
                                    <div class="col-sm-10">
                                      <input type="text" readonly class="form-control-plaintext" name="nama_dosen" value="{{ $formSesi->dosen_table_sesi }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                      <input type="text" readonly class="form-control-plaintext" name="tanggal" value="{{ $formSesi->tanggal }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sesi" class="col-sm-2 col-form-label">Sesi</label>
                                    <div class="col-sm-10">
                                      <input type="text" readonly class="form-control-plaintext" name="sesi" value="Ke - {{ $formSesi->sesi }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="semester" class="col-sm-2 col-form-label">Waktu</label>
                                    <div class="col-sm-4">
                                        <input required id="waktu_awal" name="waktu_mulai" width="276" value="{{ $formSesi->waktu_mulai }}"/>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        s/d
                                    </div>
                                    <div class="col-sm-4">
                                        <input required id="waktu_akhir" name="waktu_selesai" width="276" value="{{ $formSesi->waktu_selesai }}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ruangan" class="col-sm-2 col-form-label">Ruang</label>
                                    <div class="col-sm-10">
                                        <select name="ruangan" class="form-control">
                                            @foreach($ruangan as $r)
                                            <option value="{{ $r->id }}" {{ ($r->no_ruangan == $formSesi->no_ruangan)?"selected":"" }}>{{ $r->no_ruangan }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-control">
                                            @foreach($status as $s)
                                              <option value="{{ $s->id}}" {{ ($s->status == $formSesi->status)?"selected":"" }} >{{ $s->status }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label for="inputKeterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                  <div class="col-sm-10">
                                    <textarea required class="form-control" name="remark" rows="3">{{ $formSesi->remarks }}</textarea>
                                  </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form><br>
                        </div>
                        <div class="col-1">

                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-1">
            
          </div>
        </div>
      </div><br><br><br>
    
    <script>
        $('#waktu_awal').timepicker({
            uiLibrary: 'bootstrap4'
        });
        $('#waktu_akhir').timepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>