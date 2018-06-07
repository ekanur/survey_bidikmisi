<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function nilaiAlatKomunikasi($array_komunikasi){
    	$nilai = 6;

    	foreach ($array_komunikasi as $alat_komunikasi) {
    		if($alat_komunikasi == 'telepon_rumah'){
    			$nilai = $nilai-1;
    		}elseif($alat_komunikasi == 'hp'){
    			$nilai = $nilai-2;
    		}elseif($alat_komunikasi == 'internet'){
    			$nilai = $nilai-3;
    		}
    	}

    	return $nilai;
    }
}
