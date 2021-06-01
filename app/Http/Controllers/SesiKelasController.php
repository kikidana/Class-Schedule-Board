<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SesiKelas;
use App\Models\Jadwal;
use App\Models\Ruangan;
use App\Models\Status;
use Carbon\Carbon;
use DB;

class SesiKelasController extends Controller
{
    public function index(){
        //$sesi = SesiKelas::with(['matakuliah', '_status', 'ruangan', 'jadwal'])->get();
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = $this->getTanggal();
        $sesi = $this->groupConcatSesi();
        $waktu = date('H:i:s');
        //return $sesi;
        return view('classSchedule', ['sesi' => $sesi, 'tanggal' => $tanggal, 'waktu' => $waktu]);
    }

    public function tableSesi(){
        $sesi = $this->groupConcatTableSesi();
        return view('sesiTable', ['sesi' => $sesi]);
    }

    public function edit($id){
        $formSesi = $this->findTableSesi($id);
        $ruangan = Ruangan::all();
        $status = Status::all();
        //return $formSesi;
        return view('formSesiKelas', ['formSesi' => $formSesi, 'ruangan' => $ruangan, 'status' => $status]);
    }

    public function update($id, Request $request){
        $formSesi = SesiKelas::find($id);
        
        $formSesi->waktu_mulai = $request->waktu_mulai;
        $formSesi->waktu_selesai = $request->waktu_selesai;
        $formSesi->id_status = $request->status;
        $formSesi->id_ruang = $request->ruangan;
        $formSesi->remarks = $request->remark;
        $formSesi->save();

        //return $request;
        return redirect('sesi_kelas');
    }

    public function test(){
        //$sesi = SesiKelas::with(['matakuliah', '_status', 'ruangan', 'jadwal'])->get();
        $tanggal = $this->getTanggal();
        $sesi = $this->groupConcatSesi();
        //return $sesi;
        return view('testing', ['sesi' => $sesi, 'tanggal' => $tanggal]);
    }

    public function getTanggal(){
        $waktu = date('Y-m-d');
        $sesi = DB::table('sesi_kelas')
                ->join('matakuliah', 'sesi_kelas.id_matkul', '=', 'matakuliah.id')
                ->join('dosen_matkul', 'matakuliah.id', '=', 'dosen_matkul.id_matkul')
                ->join('dosen', 'dosen_matkul.id_dosen', '=', 'dosen.id')
                ->join('status', 'sesi_kelas.id_status', '=', 'status.id')
                ->join('ruangan', 'sesi_kelas.id_ruang', '=', 'ruangan.id')
                ->join('jadwal', 'sesi_kelas.id_jadwal', '=', 'jadwal.id')
                ->select('sesi_kelas.tanggal', 'jadwal.hari')
                ->where('sesi_kelas.tanggal', $waktu)
                ->first();
                
        return $sesi;
    }

    public function groupConcatSesi(){
        $waktu = date('Y-m-d');
        $sesi = DB::table('sesi_kelas')
                ->join('matakuliah', 'sesi_kelas.id_matkul', '=', 'matakuliah.id')
                ->join('dosen_matkul', 'matakuliah.id', '=', 'dosen_matkul.id_matkul')
                ->join('dosen', 'dosen_matkul.id_dosen', '=', 'dosen.id')
                ->join('status', 'sesi_kelas.id_status', '=', 'status.id')
                ->join('ruangan', 'sesi_kelas.id_ruang', '=', 'ruangan.id')
                ->join('jadwal', 'sesi_kelas.id_jadwal', '=', 'jadwal.id')
                ->select('sesi_kelas.sesi','matakuliah.kode_matakuliah','matakuliah.nama_matakuliah',
                        'status.status', 'ruangan.no_ruangan', 'matakuliah.semester','jadwal.hari','jadwal.jenis_kelas','sesi_kelas.tanggal',
                        DB::raw('CONCAT(jadwal.waktu_mulai, " - ", jadwal.waktu_selesai) as waktu_belajar'), 
                        DB::raw("(GROUP_CONCAT(dosen.nama_dosen SEPARATOR '/')) as dosen_sesi"),
                        )
                ->where('sesi_kelas.tanggal', $waktu)
                ->groupBy('sesi_kelas.sesi',
                          'matakuliah.kode_matakuliah',
                          'matakuliah.nama_matakuliah',
                          'jadwal.waktu_mulai',
                          'jadwal.waktu_selesai',
                          'status.status',
                          'ruangan.no_ruangan',
                          'jadwal.hari',
                          'sesi_kelas.tanggal',
                          'jadwal.jenis_kelas',
                          'matakuliah.semester')
                ->orderBy('sesi_kelas.id_jadwal')
                ->get();

        return $sesi; 
    }

    public function groupConcatTableSesi(){
        $waktu = date('Y-m-d');
        $sesi = DB::table('sesi_kelas')
                ->join('matakuliah', 'sesi_kelas.id_matkul', '=', 'matakuliah.id')
                ->join('dosen_matkul', 'matakuliah.id', '=', 'dosen_matkul.id_matkul')
                ->join('dosen', 'dosen_matkul.id_dosen', '=', 'dosen.id')
                ->join('status', 'sesi_kelas.id_status', '=', 'status.id')
                ->join('ruangan', 'sesi_kelas.id_ruang', '=', 'ruangan.id')
                ->join('jadwal', 'sesi_kelas.id_jadwal', '=', 'jadwal.id')
                ->select('sesi_kelas.id','sesi_kelas.tanggal','matakuliah.kode_matakuliah','matakuliah.nama_matakuliah',
                          'matakuliah.semester','jadwal.jenis_kelas','sesi_kelas.sesi',
                          'ruangan.no_ruangan','status.status','sesi_kelas.remarks',
                          DB::raw('CONCAT(sesi_kelas.waktu_mulai, " - ", sesi_kelas.waktu_selesai) as waktu'),
                          DB::raw("(GROUP_CONCAT(dosen.nama_dosen SEPARATOR '/')) as dosen_table_sesi"),
                        )
                ->groupBy('sesi_kelas.id',
                          'sesi_kelas.remarks',
                          'sesi_kelas.tanggal',
                          'matakuliah.kode_matakuliah',
                          'matakuliah.nama_matakuliah',
                          'matakuliah.semester',
                          'jadwal.jenis_kelas',
                          'sesi_kelas.waktu_mulai',
                          'sesi_kelas.waktu_selesai',
                          'sesi_kelas.sesi',
                          'ruangan.no_ruangan',
                          'status.status')
                ->orderBy('sesi_kelas.id_jadwal')
                ->get();

        return $sesi;
    }

    public function findTableSesi($id){
        $sesi = DB::table('sesi_kelas')
                ->join('matakuliah', 'sesi_kelas.id_matkul', '=', 'matakuliah.id')
                ->join('dosen_matkul', 'matakuliah.id', '=', 'dosen_matkul.id_matkul')
                ->join('dosen', 'dosen_matkul.id_dosen', '=', 'dosen.id')
                ->join('status', 'sesi_kelas.id_status', '=', 'status.id')
                ->join('ruangan', 'sesi_kelas.id_ruang', '=', 'ruangan.id')
                ->join('jadwal', 'sesi_kelas.id_jadwal', '=', 'jadwal.id')
                ->select('sesi_kelas.id','sesi_kelas.tanggal','matakuliah.kode_matakuliah','matakuliah.nama_matakuliah',
                          'matakuliah.semester','jadwal.jenis_kelas','sesi_kelas.sesi',
                          'ruangan.no_ruangan','status.status','sesi_kelas.waktu_mulai',
                          'sesi_kelas.waktu_selesai','sesi_kelas.remarks',
                          DB::raw('CONCAT(sesi_kelas.waktu_mulai, " - ", sesi_kelas.waktu_selesai) as waktu'),
                          DB::raw("(GROUP_CONCAT(dosen.nama_dosen SEPARATOR '/')) as dosen_table_sesi"),
                        )
                ->groupBy('sesi_kelas.id',
                          'sesi_kelas.remarks',
                          'sesi_kelas.tanggal',
                          'matakuliah.kode_matakuliah',
                          'matakuliah.nama_matakuliah',
                          'matakuliah.semester',
                          'jadwal.jenis_kelas',
                          'sesi_kelas.waktu_mulai',
                          'sesi_kelas.waktu_selesai',
                          'sesi_kelas.sesi',
                          'ruangan.no_ruangan',
                          'status.status')
                ->orderBy('sesi_kelas.id_jadwal')
                ->where('sesi_kelas.id', $id)
                ->get();

        return $sesi[0];
    }
}
