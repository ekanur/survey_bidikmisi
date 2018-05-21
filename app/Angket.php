<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angket extends Model
{
    protected $table = "angket";
    protected $fillable = ['nama_item_kuesioner', 'isi_item_kuesioner', "calon_penerima_id", "keterangan", "nim_surveyor"];
}
