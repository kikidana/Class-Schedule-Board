<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SesiKelas;
use App\Models\Jadwal;
use DB;

class SesiKelasController extends Controller
{
    public function index(){
        //$sesi = SesiKelas::with(['matakuliah', '_status', 'ruangan', 'jadwal'])->get();
        $sesi = $this->groupConcatSesi();
        //return $sesi;
        return view('classSchedule', ['sesi' => $sesi]);
    }

    public function joinSesi(){
        $sesi = DB::table('sesi_kelas')
                ->join('matakuliah', 'sesi_kelas.id_matkul', '=', 'matakuliah.id')
                ->join('dosen_matkul', 'matakuliah.id', '=', 'dosen_matkul.id_matkul')
                ->join('dosen', 'dosen_matkul.id_dosen', '=', 'dosen.id')
                ->join('status', 'sesi_kelas.id_status', '=', 'status.id')
                ->join('ruangan', 'sesi_kelas.id_ruang', '=', 'ruangan.id')
                ->get();
                
        return $sesi;
    }

    public function groupConcatSesi(){
        $sesi = DB::table('sesi_kelas')
                ->join('matakuliah', 'sesi_kelas.id_matkul', '=', 'matakuliah.id')
                ->join('dosen_matkul', 'matakuliah.id', '=', 'dosen_matkul.id_matkul')
                ->join('dosen', 'dosen_matkul.id_dosen', '=', 'dosen.id')
                ->join('status', 'sesi_kelas.id_status', '=', 'status.id')
                ->join('ruangan', 'sesi_kelas.id_ruang', '=', 'ruangan.id')
                ->join('jadwal', 'sesi_kelas.id_jadwal', '=', 'jadwal.id')
                ->select('sesi_kelas.sesi','matakuliah.kode_matakuliah','matakuliah.nama_matakuliah',
                        'status.status', 'ruangan.no_ruangan', 'matakuliah.semester',
                        DB::raw('CONCAT(jadwal.waktu_mulai, " - ", jadwal.waktu_selesai) as waktu_belajar'), 
                        DB::raw('group_concat(dosen.nama_dosen) as dosen_sesi'),
                        )
                ->groupBy('sesi_kelas.sesi',
                          'matakuliah.kode_matakuliah',
                          'matakuliah.nama_matakuliah',
                          'jadwal.waktu_mulai',
                          'jadwal.waktu_selesai',
                          'status.status',
                          'ruangan.no_ruangan',
                          'matakuliah.semester')
                ->get();

        return $sesi; 
    }
}
