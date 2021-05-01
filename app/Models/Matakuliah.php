<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    public function jadwals(){
        return $this->hasMany(Jadwal::class);
    }

    public function sesiKelas(){
        return $this->hasMany(SesiKelas::class);
    }

    public function dosens(){
        return $this->belongsToMany(Dosen::class);
    }
}
