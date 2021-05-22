<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = "ruangan";

    protected $fillable = ['no_ruangan'];

    public function sesikelas(){
        return $this->hasOne(SesiKelas::class);
    }

    public function jadwals(){
        return $this->hasMany(Jadwal::class);
    }
}
