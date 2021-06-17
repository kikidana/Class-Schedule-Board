<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class TestController extends Controller
{
    public function testAjax(){
        $jadwal = Jadwal::all();

        return response()->json(['success' => 'Data is succesfully added', 'jadwal' => $jadwal]);
    }
}
