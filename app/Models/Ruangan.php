<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    public function sesikelas(){
        return $this->belongsTo(SesiKelas::class);
    }

    public function jadwals(){
        return $this->hasMany(Jadwal::class);
    }
}