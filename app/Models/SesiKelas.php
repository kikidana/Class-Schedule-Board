<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah;
use App\Models\Status;

class SesiKelas extends Model
{
    use HasFactory;

    protected $table = "sesi_kelas";

    protected $fillable = ['id_status','id_jadwal', 'id_matkul', 'id_ruang', 'jenis_kelas', 'sesi', 'waktu_mulai', 'waktu_selesai', 'tanggal', 'remarks'];

    public function ruangan(){
        return $this->belongsTo(Ruangan::class, 'id_ruang');
    }

    public function jadwal(){
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function _status(){
        return $this->belongsTo(Status::class, 'status');
    }

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class, 'id_matkul');
    }
}
