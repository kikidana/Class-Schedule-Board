<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = "jadwal";

    protected $fillable = ['id_matkul', 'id_ruang', 'hari', 'jenis_kelas', 'waktu_mulai', 'waktu_selesai', 'tanggal_mulai'];

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class);
    }

    public function ruangan(){
        return $this->belongsTo(Ruangan::class);
    }

    public function sesiKelas(){
        return $this->hasMany(SesiKelas::class);
    }
}
