<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calon_penerima extends Model
{
    //
    protected $table = "calon_penerima";

    function angket(){
    	return $this->hasMany("App\Angket");
    }
}
