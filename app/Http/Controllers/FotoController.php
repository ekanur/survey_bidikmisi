<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Angket;

class FotoController extends Controller
{
    public function index($calon_penerima_id){
        $angket = Angket::where([["calon_penerima_id", "=", $calon_penerima_id], ["keterangan", '=', "is_photo"]])->first();
        // dd(sizeof($angket));
        
        $path_foto = array(
            "bersama" => ($angket == null)? "" : json_decode($angket->isi_item_kuesioner)->foto->bersama,
            "dapur" => ($angket == null)? "" : json_decode($angket->isi_item_kuesioner)->foto->dapur,
            "kamar_mandi" => ($angket == null)? "" : json_decode($angket->isi_item_kuesioner)->foto->kamar_mandi,
        );

        

        // dd(strlen($path_foto['bersama']));
        return view("foto", compact("path_foto", "calon_penerima_id"));
    }

    public function simpan(Request $request){
        $this->validate($request, [
            'foto_bersama'=> 'image|max:2000',
            'foto_dapur'=>'image|max:2000',
            "foto_kamar_mandi"=>"image|max:2000"
        ]);

        $foto_bersama = $request->file("foto_bersama");
        $foto_dapur = $request->file("foto_dapur");
        $foto_kamar_mandi = $request->file("foto_kamar_mandi");

        $foto = array("foto"=>array(
            "bersama" => (is_null($foto_bersama)) ? $request->foto_bersama_lama : $foto_bersama->store("public/foto_bersama"),
            "dapur" => (is_null($foto_dapur)) ? $request->foto_dapur_lama : $foto_dapur->store("public/foto_dapur"),
            "kamar_mandi" => (is_null($foto_kamar_mandi)) ? $request->foto_kamar_mandi_lama : $foto_kamar_mandi->store("public/foto_kamar_mandi")
        ));

        $nim_surveyor = 1533430596;

        $angket = Angket::updateOrCreate(["calon_penerima_id" => $request->calon_penerima_id, "keterangan"=> "is_photo", "nim_surveyor"=>$nim_surveyor], ["isi_item_kuesioner"=>json_encode($foto),"nama_item_kuesioner"=>"photo", "calon_penerima_id"=>$request->calon_penerima_id, "keterangan"=>'is_photo', 'nim_surveyor' => $nim_surveyor]);

        return redirect()->back();
    }
}
