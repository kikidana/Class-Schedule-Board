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
            <h2 class="text-center">Jadwal Kuliah</h2>
        </div>
        <div class="col">
        </div>
    </div><br>
    <div class="row">
        <div class="col">
            <a href="{{ route('jadwal.add') }}" class="btn btn-primary" type="button">Tambah Jadwal</a><br><br>
        </div>
    </div>
    <div class="table-bordered">
        <div class="table-responsive">
            <table id="tabeljadwal" class="table">
                <thead>
                    <tr>
                        <th scope="col">Hari</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Mata Kuliah</th>
                        <th scope="col">Dosen</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Jenis Kelas</th>
                        <th scope="col">Ruang</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($jadwal as $j)
                    <tr>
                        <td>{{ $j->hari }}</td>
                        <td>{{ $j->waktu_jadwal }}</td>
                        <td>{{ $j->kode_matakuliah }}</td>
                        <td>{{ $j->nama_matakuliah }}</td>
                        <td>{{ $j->dosen_table_jadwal }}</td>
                        <td>{{ $j->semester }}</td>
                        <td>{{ $j->jenis_kelas }}</td>
                        <td>{{ $j->no_ruangan }}</td>
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
        $('#tabeljadwal').DataTable({
            "order" : []
        });
    } );
    </script>
</body>

</html>


