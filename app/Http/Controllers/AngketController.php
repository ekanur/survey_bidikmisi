<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Angket;

class AngketController extends Controller
{
    public function index($calon_penerima_id)
    {
        $nim_surveyor = 1533430596;
        $angket = Angket::select('id', 'nama_item_kuesioner', 'isi_item_kuesioner')->where([['calon_penerima_id', "=", $calon_penerima_id], ["nim_surveyor", "=", $nim_surveyor], ['keterangan', '=', null]])->get();

        if (sizeof($angket) == 0) {
            return view("angket", compact("calon_penerima_id"));
        }

        foreach ($angket as $angket_data) {
            // var_dump($angket['item_kuesioner']);
            $angket_data["isi_item_kuesioner"] = json_decode($angket_data["isi_item_kuesioner"]);
        }

        //dd(sizeof($angket));

        for ($i = 0; $i < sizeof($angket); $i++) {
            $key = $angket[$i]['nama_item_kuesioner'];
            $data_angket[$key] = $angket[$i]['isi_item_kuesioner']->$key;

            // echo "<pre>";var_dump($angket[key($angket[$i]['item_kuesioner'])]); echo $i;
            // $angket[key($angket[$i]['item_kuesioner'])] = "hello";
        }
        // exit();
        //dd($data_angket);

        return view("angket_terisi", compact('data_angket', 'calon_penerima_id'));
    }

    public function simpan(Request $request)
    {
        $data = $this->prepareData($request);

        $calon_penerima_id = $request->calon_penerima_id;
        $nim_surveyor = 1533430596;
        $timestamp = date("Y-m-d H:i:s");

        $new_angket = array();
        foreach ($data as $key => $value) {

            $insert = array(
                "nama_item_kuesioner" => $key,
                "isi_item_kuesioner" => json_encode($value),
                "calon_penerima_id" => $calon_penerima_id,
                "nim_surveyor" => $nim_surveyor,
                "created_at" => $timestamp
            );

            array_push($new_angket, $insert);
        }

        //dd($new_angket);
        $angket = Angket::insert($new_angket);

        return redirect()->back();
        // dd($new_angket);
        // dd(json_decode("[".$request->motor."]"));
    }

    public function update(Request $request)
    {
        $calon_penerima_id = $request->calon_penerima_id;
        $nim_surveyor = 1533430596;
        $timestamp = date("Y-m-d H:i:s");

        $data = $this->prepareData($request);
        $edited = json_decode($request->editedData);
        foreach ($edited as $value) {
            $angket = Angket::where('calon_penerima_id', $calon_penerima_id)->where('nama_item_kuesioner', $value)->first();
            $angket->isi_item_kuesioner = json_encode($data[$value]);
            $angket->updated_at = $timestamp;
            $angket->save();
        }

        return redirect()->to('/angket/'.$calon_penerima_id);
    }

    function prepareData($request) {
        $data['ayah'] = array("ayah" => array("value" => $request->ayah, "keterangan" => $request->keterangan_ayah));
        $data['ibu'] = array("ibu" => array("value" => $request->ibu, "keterangan" => $request->keterangan_ibu));
        $data['kerja_ayah'] = array("kerja_ayah" => array("value" => $request->kerja_ayah, "keterangan" => $request->keterangan_kerja_ayah));
        $data['kerja_ibu'] = array("kerja_ibu" => array("value" => $request->kerja_ibu, "keterangan" => $request->keterangan_kerja_ibu));
        $data['pendidikan_ayah_ibu'] = array("pendidikan_ayah_ibu" => array("value" => $request->pendidikan_ayah_ibu, "keterangan" => $request->keterangan_pendidikan_ayah_ibu));
        $data['penghasilan_ayah'] = array("penghasilan_ayah" => array("value" => $request->penghasilan_ayah, "jenis" => $request->jenis_penghasilan_ayah, "keterangan" => $request->keterangan_penghasilan_ayah));
        $data['penghasilan_ibu'] = array("penghasilan_ibu" => array("value" => $request->penghasilan_ibu, "jenis" => $request->jenis_penghasilan_ibu, "keterangan" => $request->keterangan_penghasilan_ibu));
        $data['penghasilan_wali'] = array("penghasilan_wali" => array("value" => $request->penghasilan_wali, "jenis" => $request->jenis_penghasilan_wali, "keterangan" => $request->keterangan_penghasilan_wali));

        $data['alat_komunikasi'] = array("alat_komunikasi" => array("value" => $request->komunikasi, "jumlah_hp" => $request->jumlah_hp));
        $data['jumlah_penghuni_rumah'] = array("jumlah_penghuni_rumah" => $request->jumlah_penghuni_rumah);
        $data['jumlah_kakak'] = array("jumlah_kakak" => $request->jumlah_kakak);
        $data['jumlah_adek'] = array("jumlah_adek" => $request->jumlah_adek);
        $data['jumlah_kuliah'] = array("jumlah_kuliah" => $request->jumlah_kuliah);
        $data['kepemilikan_rumah'] = array("kepemilikan_rumah" => $request->kepemilikan_rumah);
        $data['luas_tanah'] = array("luas_tanah" => $request->luas_tanah);
        $data['luas_bangunan'] = array("luas_bangunan" => $request->luas_bangunan);
        $data['daya_listrik'] = array("daya_listrik" => $request->daya_listrik);
        $data['sumber_air'] = array("sumber_air" => $request->sumber_air);
        $data['mck'] = array("mck" => $request->mck);
        $data['motor'] = array("motor" => json_decode("[" . $request->motor . "]"));
        $data['mobil'] = array("mobil" => json_decode("[" . $request->mobil . "]"));

        $data['luas_sawah'] = array("luas_sawah" => $request->luas_sawah);
        $data['ternak'] = array("ternak" => array("jenis" => $request->ternak, "jumlah_ternak" => $request->jumlah_ternak));
        $data['catatan'] = array("catatan" => $request->catatan);

        return $data;
    }
}
