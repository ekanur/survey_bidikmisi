<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function index($calon_peneriman_id){
        return view("foto");
    }

    public function simpan(Request $request){
        
    }
}
