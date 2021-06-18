<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Class schedule</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('waktu').innerHTML =
            h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 1000);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>
</head>

<body onload="startTime()">
    <div class="row" style="margin-top: 19px;">
        <div class="col offset-xl-0 text-center"><img src="http://esqbs.ac.id/wp-content/uploads/2020/09/ESQ-Business-School-logo.png" style="width: 130px;"></div>
        <div class="col">
            <h2 class="text-center">SELAMAT DATANG DI ESQ BUSINESS SCHOOL</h2>
        </div>
        <div class="col">
            <div class="card text-center" style="width: 26rem;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 text-center"><h2>{{ $tanggal->hari }}</h2></div>
                                <div class="col-md-12 text-center"><h2>{{ $tanggal->tanggal }}</h2></div>
                            </div>
                        </div>
                        <div class="col-md-6 tex-center">
                            <div class="card text-center" style="width: 11rem;">
                                <div class="card-body">
                                    <h2 id="waktu"></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                <tbody id="sesi">
                   
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
        $('#tabelsesi').DataTable({
            "order" : []
        });

        mulai();

        //$('#sesi').change(ubahStatus);
    });

    function mulai(){
        $('#sesi').empty();
        $.ajax({
            url: "{{ route('schedule.sesi') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                data.sesi.forEach(element => {
                    var sesi_bodi = '<tr>'+
                                        '<td>'+ element.waktu_belajar +'</td>'+
                                        '<td>'+ element.kode_matakuliah +'</td>'+
                                        '<td>'+ element.nama_matakuliah +'</td>'+
                                        '<td>'+ element.dosen_sesi +'</td>'+
                                        '<td>'+ element.semester +'</td>'+
                                        '<td>'+ element.jenis_kelas +'</td>'+
                                        '<td>'+ element.no_ruangan +'</td>'+
                                        '<td>'+ element.status +'</td>'+
                                    '</tr>';
                    $('#sesi').append(sesi_bodi);  
                });          
            }
        })
    }

    /*function ubahStatus(){
        var today = new Date();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

        $.ajax({
            url: "{{ route('schedule.sesi') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if(data.sesi){

                }
            }
        });
    }*/
    </script>
</body>

</html>