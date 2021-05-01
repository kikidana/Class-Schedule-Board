<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesiKelas extends Model
{
    use HasFactory;

    public function ruangan(){
        return $this->hasOne(Ruangan::class);
    }

    public function jadwal(){
        return $this->belongsTo(Jadwal::class);
    }

    public function status(){
        return $this->hasMany(Status::class);
    }

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class);
    }
}
