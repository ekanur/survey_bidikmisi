<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon_penerima;
use App\Angket;

class IndexController extends Controller
{
    public function index(){
        // $nim_surveyor = 1533430596;
        $calon_penerima = Calon_penerima::with('angket')->get();
        $nilai =0;
        foreach ($calon_penerima as $penerima) {
        	if(sizeof($penerima->angket)>0){
        		foreach($penerima->angket as $angket){
	        		$nilai = $nilai+$angket->nilai;
        		}

        		$penerima->nilai = $nilai;
        	}else{
        		$penerima->nilai =0;
        	}
        	

        }
        $calon_penerima = $calon_penerima->sortByDesc('nilai');
        // dd($calon_penerima);
        return view("dashboard", compact('calon_penerima'));
    }
}
