<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Angket;
use App\Calon_penerima;
use Illuminate\Support\Facades\DB;
use HitungAngketController;

class AngketController extends Controller
{
    public function index($calon_penerima_id)
    {
        // $nim_surveyor = session('userID');
        $angket = Angket::select('id', 'nama_item_kuesioner', 'isi_item_kuesioner')->where([['calon_penerima_id', "=", $calon_penerima_id], ['keterangan', '=', null]])->get();

        $detail_calon_penerima = $this->getDetailCalonPenerima($calon_penerima_id);
       
        if (sizeof($angket) == 0) {
            return view("angket", compact("calon_penerima_id", 'detail_calon_penerima'));
        }

        foreach ($angket as $angket_data) {
            // var_dump($angket['item_kuesioner']);
            $angket_data["isi_item_kuesioner"] = json_decode($angket_data["isi_item_kuesioner"]);
        }

        //dd(sizeof($angket));
        // $nilai = array();
        for ($i = 0; $i < sizeof($angket); $i++) {
            $key = $angket[$i]['nama_item_kuesioner'];
            $data_angket[$key] = $angket[$i]['isi_item_kuesioner']->$key;
            // $nilai[$i] = $this->nilaiPenghasilanAyah($data_angket[$key]);

            // echo "<pre>";var_dump($angket[key($angket[$i]['item_kuesioner'])]); echo $i;
            // $angket[key($angket[$i]['item_kuesioner'])] = "hello";
        }
        
        // $key_not_counted = ['jumlah_kakak','jumlah_adek','jumlah_kuliah','jumlah_penghuni_rumah', 'catatatan'];

        return view("angket_terisi", compact('data_angket', 'calon_penerima_id', 'detail_calon_penerima'));
    }

    public function simpan(Request $request)
    {
        $data = $this->prepareData($request);

        $calon_penerima_id = $request->calon_penerima_id;
        $nim_surveyor = session('userID');
        $timestamp = date("Y-m-d H:i:s");

        $new_angket = array();
        foreach ($data as $key => $value) {
            $nilai = $value['nilai'];
            unset($value['nilai']);
            $insert = array(
                "nama_item_kuesioner" => $key,
                "isi_item_kuesioner" => json_encode($value),
                "nilai" => $nilai,
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
        // $nim_surveyor = session('userID');
        $timestamp = date("Y-m-d H:i:s");

        $data = $this->prepareData($request);
        $edited = json_decode($request->editedData);
        foreach ($edited as $value) {
            // $angket = Angket::where('calon_penerima_id', $calon_penerima_id)->where('nama_item_kuesioner', $value)->first();
            // $angket->isi_item_kuesioner = json_encode($data[$value]);
            // $angket->updated_at = $timestamp;
            // $angket->save();
            $angket = Angket::updateOrCreate(['calon_penerima_id' => $calon_penerima_id, 'nama_item_kuesioner' => $value], ['isi_item_kuesioner' => json_encode($data[$value]), 'nilai'=>$data[$value]['nilai'], 'updated_at' => $timestamp]);
        }

        return redirect()->to('/angket/'.$calon_penerima_id);
    }

    function prepareData($request) {
        $penghasilan = ($request->hasil_ayah+$request->hasil_ibu+$request->hasil_wali)/$request->jumlah_penghuni_rumah;

        $data['ayah'] = array("ayah" => array("value" => $request->ayah, "keterangan" => $request->keterangan_ayah), "nilai"=>$request->ayah);
        $data['ibu'] = array("ibu" => array("value" => $request->ibu, "keterangan" => $request->keterangan_ibu), "nilai"=>$request->ibu);
        $data['kerja_ayah'] = array("kerja_ayah" => array("value" => $request->kerja_ayah, "keterangan" => $request->keterangan_kerja_ayah), "nilai"=>$request->kerja_ayah);
        $data['kerja_ibu'] = array("kerja_ibu" => array("value" => $request->kerja_ibu, "keterangan" => $request->keterangan_kerja_ibu), "nilai"=>$request->kerja_ibu);
        $data['pendidikan_ayah_ibu'] = array("pendidikan_ayah_ibu" => array("value" => $request->pendidikan_ayah_ibu, "keterangan" => $request->keterangan_pendidikan_ayah_ibu), "nilai"=>$request->pendidikan_ayah_ibu);
        $data['penghasilan_ayah'] = array("penghasilan_ayah" => array("value" => $request->penghasilan_ayah, "jenis" => $request->jenis_penghasilan_ayah, "keterangan" => $request->keterangan_penghasilan_ayah), "nilai"=>$penghasilan);
        $data['penghasilan_ibu'] = array("penghasilan_ibu" => array("value" => $request->penghasilan_ibu, "jenis" => $request->jenis_penghasilan_ibu, "keterangan" => $request->keterangan_penghasilan_ibu), "nilai"=>0);
        $data['penghasilan_wali'] = array("penghasilan_wali" => array("value" => $request->penghasilan_wali, "jenis" => $request->jenis_penghasilan_wali, "keterangan" => $request->keterangan_penghasilan_wali), "nilai"=>0);

        $data['alat_komunikasi'] = array("alat_komunikasi" => array("value" => $request->komunikasi, "jumlah_hp" => $request->jumlah_hp), "nilai"=>$this->nilaiAlatKomunikasi($request->komunikasi));
        $data['jumlah_penghuni_rumah'] = array("jumlah_penghuni_rumah" => $request->jumlah_penghuni_rumah, 'nilai'=>0);
        $data['jumlah_kakak'] = array("jumlah_kakak" => $request->jumlah_kakak, 'nilai'=>0);
        $data['jumlah_adek'] = array("jumlah_adek" => $request->jumlah_adek, 'nilai'=>0);
        $data['jumlah_kuliah'] = array("jumlah_kuliah" => $request->jumlah_kuliah, 'nilai'=>0);
        $data['kepemilikan_rumah'] = array("kepemilikan_rumah" => $request->kepemilikan_rumah, 'nilai'=>$request->kepemilikan_rumah);
        $data['luas_tanah'] = array("luas_tanah" => $request->luas_tanah, 'nilai'=>0);
        $data['luas_bangunan'] = array("luas_bangunan" => $request->luas_bangunan, 'nilai'=>0);
        $data['daya_listrik'] = array("daya_listrik" => $request->daya_listrik, 'nilai'=>$request->daya_listrik);
        $data['sumber_air'] = array("sumber_air" => $request->sumber_air, 'nilai'=>$request->sumber_air);
        $data['mck'] = array("mck" => $request->mck, 'nilai'=>$request->mck);
        $data['motor'] = array("motor" => json_decode("[" . $request->motor . "]"), 'nilai'=>0);
        $data['mobil'] = array("mobil" => json_decode("[" . $request->mobil . "]"), 'nilai'=>0);

        $data['luas_sawah'] = array("luas_sawah" => $request->luas_sawah, 'nilai'=>0);
        $data['ternak'] = array("ternak" => array("jenis" => $request->ternak, "jumlah_ternak" => $request->jumlah_ternak), 'nilai'=>0);
        $data['catatan'] = array("catatan" => $request->catatan, 'nilai'=>0);

        $data['kriteria'] = array("kriteria" => $request->kriteria, 'nilai'=>$request->kriteria);

        return $data;
    }

    function getDetailCalonPenerima($id){
        $calon_penerima = Calon_penerima::select("no_pendaftaran")->where("id", $id)->first();

        $query = 'SELECT b.id_peserta_didik,u.jjg_kd,b.cmhs_nm,"c".jalur_nm,
        b.cmhs_jenis_kelamin,
        d.kota_nm AS k1,
        b.cmhs_tgllhr,
        f.agm_nm,
        b.cmhs_alamat,
        b.cmhs_rt,
        b.cmhs_rw,
        b.cmhs_kelurahan,
        b.cmhs_kecamatan,
        "g".kota_nm AS k2,
        h.prop_nm AS prop_nm_asal,
        b.cmhs_kodepos,
        b.cmhs_hp,
        b.cmhs_tlp,
        b.cmhs_email,
        b.cmhs_nm_ayah,
        b.cmhs_nm_ibu,
        b.cmhs_jml_kakak,
        b.cmhs_jml_adik,
        "k".penddk_nm AS pa,
        l.penddk_nm AS pi,
        "m".pek_nm AS pka,
        n.pek_nm AS pki,
        o.hasil_nm AS ha,
        "p".hasil_nm AS hi,
        q.slta,
        r.kota_nm AS ks,
        s.prop_nm,
        "t".jur_smu_nm,
        "a".cmhs_nodft,
        u.pro_nm,
        b.hasil_ayah,
        b.hasil_ibu,
        b.hasil_wali,
        b.pek_kd_wali,
        b.pend_kd_wali,
        "a".cmhs_nim
        FROM
        dtum.m_cmhs AS "a"
        LEFT JOIN dtum.m_peserta_didik AS b ON "a".id_peserta_didik = b.id_peserta_didik
        LEFT JOIN dtum.m_jalur AS "c" ON "a".jalur_kd = "c".jalur_kd
        LEFT JOIN dtum.m_kab AS d ON d.kota_kd = b.cmhs_kotalhr
        LEFT JOIN dtum.m_kewarganegaraan AS e ON e.id_kewarganegaraan = b.cmhs_kewarganegaraan
        LEFT JOIN dtum.m_agm AS f ON f.agm_kd = b.cmhs_agama
        LEFT JOIN dtum.m_kab AS "g" ON "g".kota_kd = b.cmhs_kodekota
        LEFT JOIN dtum.m_prop AS h ON h.prop_kd = b.cmhs_prop_asal
        LEFT JOIN dtum.m_pendidikan AS "k" ON "k".penddk_kd = b.pend_kd_ayah
        LEFT JOIN dtum.m_pendidikan AS l ON l.penddk_kd = b.pend_kd_ibu
        LEFT JOIN dtum.m_pekerjaan AS "m" ON "m".pek_kd = b.pek_kd_ayah
        LEFT JOIN dtum.m_pekerjaan AS n ON n.pek_kd = b.pek_kd_ibu
        LEFT JOIN dtum.m_penghasilan AS o ON o.hasil_kd = b.hasil_kd
        LEFT JOIN dtum.m_penghasilan AS "p" ON "p".hasil_kd = b.hasil_kd_ibu
        LEFT JOIN dtum.m_slta_import AS q ON q.kode = b.cmhs_kodeslta
        LEFT JOIN dtum.m_kab AS r ON r.kota_kd = b.kota_sma
        LEFT JOIN dtum.m_propinsi AS s ON s.prop_kd = b.prop_sma
        LEFT JOIN dtum.m_jur_smu AS "t" ON "t".jur_smu_kd = b.cmhs_jurslta
        LEFT JOIN dtum.m_prodi AS u ON u.pro_kd = "a".pro_kd
        WHERE
        "a".cmhs_nodft = ?
        ';
        $detail_calon_penerima = DB::connection("pgsql2")->select($query, [$calon_penerima->no_pendaftaran]);

        return $detail_calon_penerima;
    }
}
