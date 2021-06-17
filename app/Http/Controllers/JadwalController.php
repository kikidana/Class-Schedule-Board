<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\Jadwal;
use App\Models\Ruangan;
use App\Models\Dosen;
use App\Models\SesiKelas;
use Carbon\Carbon;
use DB;

class JadwalController extends Controller
{
    public function tableJadwal(){
        $jadwal = $this->groupConcatTableJadwal();
        return view('insertTable', ['jadwal' => $jadwal]);
    }

    public function tambahJadwal(){
        $matkul = Matakuliah::all();
        $ruang = Ruangan::all();

        return view('formInsertKelas', ['matkul' => $matkul, 'ruang' => $ruang]);
    }

    public function storeJadwal(Request $request){

        Jadwal::create([
            'id_matkul' => $request->kodeNamaMatkul,
            'id_ruang' => $request->ruangan,
            'hari' => $request->hari,
            'jenis_kelas' => $request->jenis_kelas,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'tanggal_mulai' => $request->tanggal
        ]);
        
        $defaultStatus = 1;
        $defaultRemark = '';
        $tanggalCarbon = Carbon::createFromFormat('Y-m-d', $request->tanggal);
        $tanggalCarbon->format('Y-m-d');

        $idJadwalLastest = Jadwal::latest()->first();

        for ($i=1; $i <= 16; $i++) {
            if($i == 1){
                SesiKelas::create([
                    'id_status' => $defaultStatus,
                    'id_jadwal' => $idJadwalLastest->id,
                    'id_matkul' => $idJadwalLastest->id_matkul,
                    'id_ruang' => $idJadwalLastest->id_ruang,
                    'jenis_kelas' => $idJadwalLastest->jenis_kelas,
                    'sesi' => $i,
                    'waktu_mulai' => $idJadwalLastest->waktu_mulai,
                    'waktu_selesai' => $idJadwalLastest->waktu_selesai,
                    'tanggal' => $tanggalCarbon->addDays(0),
                    'remarks' => $defaultRemark
                ]);
            }else{
                SesiKelas::create([
                    'id_status' => $defaultStatus,
                    'id_jadwal' => $idJadwalLastest->id,
                    'id_matkul' => $idJadwalLastest->id_matkul,
                    'id_ruang' => $idJadwalLastest->id_ruang,
                    'jenis_kelas' => $idJadwalLastest->jenis_kelas,
                    'sesi' => $i,
                    'waktu_mulai' => $idJadwalLastest->waktu_mulai,
                    'waktu_selesai' => $idJadwalLastest->waktu_selesai,
                    'tanggal' => $tanggalCarbon->addDays(7),
                    'remarks' => $defaultRemark
                ]);
            }
            
        }

        //return $idJadwalLastest->id;
        return redirect('jadwal');
    }

    // get json Data
    public function getMatakuliah($id){
        $matkul = $this->groupConcatMatakuliahDosen($id);

        return response()->json($matkul);
    }

    public function groupConcatTableJadwal(){
        $jadwal = DB::table('jadwal')
                  ->join('matakuliah', 'jadwal.id_matkul', '=', 'matakuliah.id')
                  ->join('dosen_matkul', 'matakuliah.id', '=', 'dosen_matkul.id_matkul')
                  ->join('dosen', 'dosen_matkul.id_dosen', '=', 'dosen.id')
                  ->join('ruangan', 'jadwal.id_ruang','=', 'ruangan.id')
                  ->select('jadwal.id', 'jadwal.hari', 'jadwal.tanggal_mulai', 'matakuliah.kode_matakuliah', 'jadwal.jenis_kelas',
                           'matakuliah.nama_matakuliah', 'matakuliah.semester', 'ruangan.no_ruangan',
                           DB::raw('CONCAT(jadwal.waktu_mulai, " - ", jadwal.waktu_selesai) as waktu_jadwal'),
                           DB::raw("(GROUP_CONCAT(dosen.nama_dosen SEPARATOR '/')) as dosen_table_jadwal"))
                  ->groupBy('jadwal.id',
                            'jadwal.hari',
                            'jadwal.waktu_mulai',
                            'jadwal.waktu_selesai',
                            'jadwal.tanggal_mulai',
                            'jadwal.jenis_kelas',
                            'matakuliah.kode_matakuliah',
                            'matakuliah.nama_matakuliah',
                            'matakuliah.semester',
                            'ruangan.no_ruangan')
                  ->orderBy('jadwal.id')
                  ->get(); 
        
        return $jadwal;
    }

    public function groupConcatMatakuliahDosen($id){
        $matkul = DB::table('matakuliah')
                  ->join('dosen_matkul', 'matakuliah.id', '=', 'dosen_matkul.id_matkul')
                  ->join('dosen', 'dosen_matkul.id_dosen', '=', 'dosen.id')
                  ->select('matakuliah.id', 'matakuliah.kode_matakuliah', 'matakuliah.nama_matakuliah',
                           'matakuliah.sks', 'matakuliah.semester', 'dosen.id',
                           DB::raw("(GROUP_CONCAT(dosen.nama_dosen SEPARATOR '/')) as dosen"))
                  ->where('matakuliah.id', $id)
                  ->groupBy('matakuliah.id', 'matakuliah.kode_matakuliah', 'matakuliah.nama_matakuliah',
                            'matakuliah.sks', 'matakuliah.semester', 'dosen.id')
                  ->orderBy('matakuliah.id')
                  ->first();

        return $matkul;
    }
}
