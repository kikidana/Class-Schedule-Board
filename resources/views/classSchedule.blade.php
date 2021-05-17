<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Class schedule</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body>
    <div class="row" style="margin-top: 19px;">
        <div class="col offset-xl-0 text-center"><img src="http://esqbs.ac.id/wp-content/uploads/2020/09/ESQ-Business-School-logo.png" style="width: 130px;"></div>
        <div class="col">
            <h2 class="text-center">SELAMAT DATANG DI ESQ BUSINESS SCHOOL</h2>
        </div>
        <div class="col">
            <h2>{{ $tanggal->hari }}, {{ $tanggal->tanggal }}</h2>
        </div>
    </div><br>
    <div class="table-bordered">
        <div class="table-responsive">
            <table id="tabelsesi" class="table">
                <thead>
                    <tr>
                        <th scope="col">Waktu</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Matakuliah</th>
                        <th scope="col">Dosen</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Jenis Kelas</th>
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
                        <td>{{ $s->jenis_kelas }}</td>
                        <td>{{ $s->no_ruangan }}</td>
                        <td>{{ $s->status }}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>src="https://code.jquery.com/jquery-3.5.1.js"</script>
    <script>
    $(document).ready(function() {
        $('#tabelsesi').DataTable();
    } );
    </script>
</body>

</html>