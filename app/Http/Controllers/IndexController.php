<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon_penerima;

class IndexController extends Controller
{
    public function index(){
        $nim_surveyor = 1533430596;
        $calon_penerima = Calon_penerima::all();
        // dd($calon_penerima);
        return view("dashboard", compact('calon_penerima'));
    }
}
