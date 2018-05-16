<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Angket;

class AngketController extends Controller
{
    public function index($calon_penerima_id){
        $nim_surveyor = 1533430596;
        $angket = Angket::select('id', 'item_kuesioner')->where([['calon_penerima_id', "=" ,$calon_penerima_id],["nim_surveyor", "=", $nim_surveyor],['keterangan', '=', null]])->get();

        if(sizeof($angket)==0){
            return view("angket", compact("calon_penerima_id"));
        }
        
        foreach($angket as $angket_data){
            // var_dump($angket['item_kuesioner']);
            $angket_data["item_kuesioner"] = json_decode($angket_data["item_kuesioner"]);
        }

        // dd(sizeof($angket));

        for($i=0 ; $i<sizeof($angket); $i++){
            $key = key($angket[$i]['item_kuesioner']);
            $data_angket[$key] =  $angket[$i]['item_kuesioner']->$key;
            
            // echo "<pre>";var_dump($angket[key($angket[$i]['item_kuesioner'])]); echo $i;
            // $angket[key($angket[$i]['item_kuesioner'])] = "hello";
        }
        // exit();
        // dd($data_angket);

        return view("angket_terisi", compact('data_angket', 'calon_penerima_id'));
    }

    public function simpan(Request $request){
        
        $nama_ayah = array("ayah"=>array("value"=>$request->ayah, "keterangan"=>$request->keterangan_ayah));
        $nama_ibu = array("ibu"=>array("value"=>$request->ibu, "keterangan"=>$request->keterangan_ibu));
        $kerja_ayah = array("kerja_ayah"=>array("value"=>$request->kerja_ayah, "keterangan"=>$request->keterangan_kerja_ayah));
        $kerja_ibu = array("kerja_ibu"=>array("value"=>$request->kerja_ibu, "keterangan"=>$request->keterangan_kerja_ibu));
        $pendidikan_ayah_ibu = array("pendidikan_ayah_ibu"=>array("value"=>$request->pendidikan_ayah_ibu, "keterangan"=>$request->keterangan_pendidikan_ayah_ibu));
        $penghasilan_ayah = array("penghasilan_ayah"=>array("value"=>$request->penghasilan_ayah, "jenis"=>$request->jenis_penghasilan_ayah, "keterangan"=>$request->keterangan_penghasilan_ayah));
        $penghasilan_ibu = array("penghasilan_ibu"=>array("value"=>$request->penghasilan_ibu, "jenis"=>$request->jenis_penghasilan_ibu, "keterangan"=>$request->keterangan_penghasilan_ibu));
        $penghasilan_wali = array("penghasilan_wali"=>array("value"=>$request->penghasilan_wali, "jenis"=>$request->jenis_penghasilan_wali, "keterangan"=>$request->keterangan_penghasilan_wali));
        
        $alat_komunikasi = array("alat_komunikasi"=>array("value"=>$request->komunikasi, "jumlah_hp"=>$request->jumlah_hp));
        $jumlah_penghuni_rumah = array("jumlah_penghuni_rumah"=>$request->jumlah_penghuni_rumah);
        $jumlah_kakak = array("jumlah_kakak"=>$request->jumlah_kakak);
        $jumlah_adek = array("jumlah_adek"=>$request->jumlah_adek);
        $jumlah_kuliah = array("jumlah_kuliah"=>$request->jumlah_kuliah);
        $kepemilikan_rumah = array("kepemilikan_rumah"=>$request->kepemilikan_rumah);
        $luas_tanah = array("luas_tanah"=>$request->luas_tanah);
        $luas_bangunan = array("luas_bangunan"=>$request->luas_bangunan);
        $daya_listrik = array("daya_listrik"=>$request->daya_listrik);
        $sumber_air = array("sumber_air"=>$request->sumber_air);
        $mck = array("mck"=>$request->mck);
        $motor = array("motor"=>json_decode("[".$request->motor."]"));
        $mobil = array("mobil"=>json_decode("[".$request->mobil."]"));
        
        $luas_sawah = array("luas_sawah"=>$request->luas_sawah);
        $ternak = array("ternak"=>array("jenis"=>$request->ternak, "jumlah_ternak"=>$request->jumlah_ternak));
        $catatan = array("catatan"=>$request->catatan);

        $calond_penerima_id = 1;
        $nim_surveyor = 1533430596;
        $timestamp = date("Y-m-d H:i:s");

        $new_angket = array(
            array('item_kuesioner'=>json_encode($nama_ayah), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($nama_ibu), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($kerja_ayah), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($kerja_ibu), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($pendidikan_ayah_ibu), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($penghasilan_ayah), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($penghasilan_ibu), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($penghasilan_wali), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($alat_komunikasi), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($jumlah_penghuni_rumah), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($jumlah_kakak), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($jumlah_adek), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($jumlah_kuliah), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($kepemilikan_rumah), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($luas_tanah), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($luas_bangunan), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($daya_listrik), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($sumber_air), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($mck), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($motor), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($mobil), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($luas_sawah), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($ternak), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
            array('item_kuesioner'=>json_encode($catatan), "calon_penerima_id"=>$calond_penerima_id, "nim_surveyor"=>$nim_surveyor, "created_at"=>$timestamp),
        );

        $angket = Angket::insert($new_angket);

        return redirect()->back();
        // dd($new_angket);
        // dd(json_decode("[".$request->motor."]"));
    }

    public function update(Request $request){
        return redirect()->back();
    }
}
