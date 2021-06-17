<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;

class TestAjaxController extends Controller
{
    function getAllMatakuliah(){
        $matkul = Matakuliah::all();

        return response()->json(['status' => TRUE, 'matkul' => $matkul]);
    }

    function hapusMatakuliah($id){
        $matkul = Matakuliah::find($id);
        $matkul->delete();

        return response()->json(['status' => TRUE]);
    }

    function addMatkuliah(Request $request){
        return response()->json(['status' => TRUE, 'data' => $request]);
    }

}
