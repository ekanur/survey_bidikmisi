<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Angket;

class AngketController extends Controller
{
    public function index($calond_penerima_id){
        return view("angket");
    }

    public function simpan(Request $request){
        $angket = new Angket;

        $nama_ayah = array("ayah"=>array("value"=>$request->ayah, "keterangan"=>$request->keterangan_ayah));
        $nama_ibu = array("ibu"=>array("value"=>$request->ibu, "keterangan"=>$request->keterangan_ibu));
        $kerja_ayah = array("kerja_ayah"=>array("value"=>$request->kerja_ayah, "keterangan"=>$request->keterangan_kerja_ayah));
        $kerja_ibu = array("kerja_ibu"=>array("value"=>$request->kerja_ibu, "keterangan"=>$request->keterangan_kerja_ibu));
        $pendidikan_ayah_ibu = array("pendidikan_ayah_ibu"=>array("value"=>$request->pendidikan_ayah_ibu, "keterangan"=>$request->keterangan_pendidikan_ayah_ibu));
        $penghasilan_ayah = array("penghasilan_ayah"=>array("value"=>$request->penghasilan_ayah, "jenis"=>$request->jenis_penghasilan_ayah, "keterangan"=>$request->keterangan_penghasilan_ayah));
        $penghasilan_ibu = array("penghasilan_ibu"=>array("value"=>$request->penghasilan_ibu, "jenis"=>$request->jenis_penghasilan_ibu, "keterangan"=>$request->keterangan_penghasilan_ibu));
        $penghasilan_wali = array("penghasilan_wali"=>array("value"=>$request->penghasilan_wali, "jenis"=>$request->jenis_penghasilan_wali, "keterangan"=>$request->keterangan_penghasilan_wali));
        
        $alat_komunikasi = array("alat_komunikasi"=>$request->komunikasi, "jumlah_hp"=>$request->jumlah_hp);
        $jumlah_penghuni_rumah = array("jumlah_penghuni_rumah"=>$request->jumlah_penghuni_rumah);
        $jumlah_kakak = array("jumlah_kakak"=>$request->jumlah_kakak);
        $jumlah_adek = array("jumlah_kakak"=>$request->jumlah_adek);
        $jumlah_kuliah = array("jumlah_kuliah"=>$request->jumlah_kuliah);
        $kepemilikan_rumah = array("kepemilikan_rumah"=>$request->kepemilikan_rumah);
        $luas_tanah = array("luas_tanah"=>$request->luas_tanah);
        $luas_bangunan = array("luas_bangunan"=>$request->luas_bangunan);
        $daya_listrik = array("daya_listrik"=>$request->daya_listrik);
        $sumber_air = array("sumber_air"=>$request->sumber_air);
        $mck = array("mck"=>$request->mck);
        $motor = array("motor"=>$request->motor);
        $mobil = array("motor"=>$request->mobil);
        
        $luas_sawah = array("luas_sawah"=>$request->luas_sawah);
        $ternak = array("ternak"=>array("jenis"=>$request->ternak, "jumlah_ternak"=>$request->jumlah_ternak));
        $catatan = array("catatan"=>$request->catatan);
        // dd(json_decode("[".$request->motor."]"));
    }
}
