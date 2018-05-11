<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angket extends Model
{
    protected $table = "angket";
    protected $fillable = ['item_kuesioner', "calon_penerima_id", "keterangan", "nim_surveyor"];
}
