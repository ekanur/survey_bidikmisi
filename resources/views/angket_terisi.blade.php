@extends("layout")
@push('style')
    <link href="{{ asset("css/style.css") }}" rel="stylesheet"/>
@endpush
@section("content")
    <div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Angket Survey Lapangan</h2>
            <p class="category">Masukan data sesuai kondisi di lapangan. Baca
                <a target="_blank" href="https://github.com/mouse0270">buku manual</a>.
                <!-- <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a> -->
            </p>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-primary nav-pills-icons justify-content-center"
                            role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url("/angket/".$calon_penerima_id) }}"
                                   role="tablist">
                                    <i class="now-ui-icons files_single-copy-04"></i>
                                    Angket
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url("/foto/".$calon_penerima_id) }}" role="tablist">
                                    <i class="now-ui-icons design_image"></i>
                                    Foto
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Profil</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No. Peserta/NIM</label>
                            <div class="col-sm-10">
                                <span>{{$detail_calon_penerima[0]->cmhs_nodft}}/{{$detail_calon_penerima[0]->cmhs_nim}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <span>{{$detail_calon_penerima[0]->cmhs_nm}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Program Studi</label>
                            <div class="col-sm-10">
                                <span>{{$detail_calon_penerima[0]->jjg_kd}} {{strtoupper($detail_calon_penerima[0]->pro_nm)}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Alamat Rumah</label>
                            <div class="col-sm-10">
                                <!-- <input type="text" disabled class="form-control" id="" value="S1 BIMBINGAN DAN KONSELING"> -->
                                <span>{{strtoupper($detail_calon_penerima[0]->cmhs_alamat." RT ".$detail_calon_penerima[0]->cmhs_rt." RW ".$detail_calon_penerima[0]->cmhs_rw." ".$detail_calon_penerima[0]->cmhs_kelurahan." ".$detail_calon_penerima[0]->cmhs_kecamatan." ".$detail_calon_penerima[0]->k2)}}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Sekolah</label>
                            <div class="col-sm-10">
                                <span>{{strtoupper($detail_calon_penerima[0]->slta)}}</span>
                                <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Alamat Sekolah</label>
                            <div class="col-sm-10">
                                <span>{{strtoupper($detail_calon_penerima[0]->ks)}} {{strtoupper($detail_calon_penerima[0]->prop_nm)}}</span>
                                <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Telp</label>
                            <div class="col-sm-10">
                                <span>{{strtoupper($detail_calon_penerima[0]->cmhs_hp)}}</span>
                                <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{ url('/angket/update') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="calon_penerima_id" value="{{ $calon_penerima_id }}">
                        <div class="card-header">
                            <h5 class="title">Orang Tua & Kondisi Rumah</h5>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Ayah/Wali</label>
                                <div class="col-sm-5">
                                    <span>{{strtoupper($detail_calon_penerima[0]->cmhs_nm_ayah)}}</span>
                                </div>
                                <div class="col-sm-2">
                                    <select name="ayah" id="" class="form-control" onchange="changed(this)">
                                        <option value="1" @if($data_angket['ayah']->value == 1) selected @endif>Ya
                                        </option>
                                        <option value="0" @if($data_angket['ayah']->value == 0) selected @endif>Tidak
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="keterangan_ayah"
                                           placeholder="Keterangan" value="{{ $data_angket["ayah"]->keterangan }}" onchange="changed(this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Ibu</label>
                                <div class="col-sm-5">
                                    <span>{{strtoupper($detail_calon_penerima[0]->cmhs_nm_ibu)}}</span>
                                </div>
                                <div class="col-sm-2">
                                    <select name="ibu" id="" class="form-control" onchange="changed(this)">
                                        <option value="1" @if($data_angket['ibu']->value == 1) selected @endif>Ya
                                        </option>
                                        <option value="0" @if($data_angket['ibu']->value == 0) selected @endif>Tidak
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="keterangan_ibu"
                                           placeholder="Keterangan" value="{{ $data_angket["ibu"]->keterangan }}" onchange="changed(this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                                <div class="col-sm-5">
                                    <span>{{strtoupper($detail_calon_penerima[0]->pka)}}</span>
                                </div>
                                <div class="col-sm-2">
                                    <select name="kerja_ayah" id="" class="form-control" onchange="changed(this)">
                                        <option value="1" @if($data_angket['kerja_ayah']->value == 1) selected @endif>
                                            Ya
                                        </option>
                                        <option value="0" @if($data_angket['kerja_ayah']->value == 0) selected @endif>
                                            Tidak
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="keterangan_kerja_ayah"
                                           placeholder="Keterangan"
                                           value="{{ $data_angket["kerja_ayah"]->keterangan }}" onchange="changed(this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                                <div class="col-sm-5">
                                    <span>{{strtoupper($detail_calon_penerima[0]->pki)}}</span>
                                </div>
                                <div class="col-sm-2">
                                    <select name="kerja_ibu" id="" class="form-control" onchange="changed(this)">
                                        <option value="1" @if($data_angket['kerja_ibu']->value == 1) selected @endif>
                                            Ya
                                        </option>
                                        <option value="0" @if($data_angket['kerja_ibu']->value == 0) selected @endif>
                                            Tidak
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="keterangan_kerja_ibu"
                                           placeholder="Keterangan" value="{{ $data_angket["kerja_ibu"]->keterangan }}"
                                           onchange="changed(this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Pendidikan Ayah/Ibu</label>
                                <div class="col-sm-5">
                                    <span>{{strtoupper($detail_calon_penerima[0]->pa)}}/{{strtoupper($detail_calon_penerima[0]->pi)}}</span>
                                </div>
                                <div class="col-sm-2">
                                    <select name="pendidikan_ayah_ibu" id="" class="form-control" onchange="changed(this)">
                                        <option value="1"
                                                @if($data_angket['pendidikan_ayah_ibu']->value == 1) selected @endif>Ya
                                        </option>
                                        <option value="0"
                                                @if($data_angket['pendidikan_ayah_ibu']->value == 0) selected @endif>
                                            Tidak
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="keterangan_pendidikan_ayah_ibu"
                                           placeholder="Keterangan"
                                           value="{{ $data_angket["pendidikan_ayah_ibu"]->keterangan }}"
                                           onchange="changed(this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Penghasilan Ayah</label>
                                <div class="col-sm-2">
                                    <span>Rp. {{number_format(intval($detail_calon_penerima[0]->hasil_ayah))}}</span>
                                </div>
                                <div class="col-sm-3">
                                    <select name="jenis_penghasilan_ayah" id="" class="form-control" onchange="changed(this)">
                                        <option value="1"
                                                @if($data_angket['penghasilan_ayah']->jenis == 1) selected @endif>
                                            Penghasilan Tetap
                                        </option>
                                        <option value="0"
                                                @if($data_angket['penghasilan_ayah']->jenis == 0) selected @endif>
                                            Penghasilan Tidak Tetap
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="penghasilan_ayah" id="" class="form-control" onchange="changed(this)">
                                        <option value="1"
                                                @if($data_angket['penghasilan_ayah']->value == 1) selected @endif>Ya
                                        </option>
                                        <option value="0"
                                                @if($data_angket['penghasilan_ayah']->value == 0) selected @endif>Tidak
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="keterangan_penghasilan_ayah"
                                           placeholder="Keterangan"
                                           value="{{ $data_angket["penghasilan_ayah"]->keterangan }}"
                                           onchange="changed(this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Penghasilan Ibu</label>
                                <div class="col-sm-2">
                                    <span>Rp. {{number_format(intval($detail_calon_penerima[0]->hasil_ibu))}}</span>
                                </div>
                                <div class="col-sm-3">
                                    <select name="jenis_penghasilan_ibu" id="" class="form-control" onchange="changed(this)">
                                        <option value="1"
                                                @if($data_angket['penghasilan_ibu']->jenis == 1) selected @endif>
                                            Penghasilan Tetap
                                        </option>
                                        <option value="0"
                                                @if($data_angket['penghasilan_ibu']->jenis == 0) selected @endif>
                                            Penghasilan Tidak Tetap
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="penghasilan_ibu" id="" class="form-control" onchange="changed(this)">
                                        <option value="1"
                                                @if($data_angket['penghasilan_ibu']->value == 1) selected @endif>Ya
                                        </option>
                                        <option value="0"
                                                @if($data_angket['penghasilan_ibu']->value == 0) selected @endif>Tidak
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="keterangan_penghasilan_ibu"
                                           placeholder="Keterangan"
                                           value="{{ $data_angket["penghasilan_ibu"]->keterangan }}"
                                           onchange="changed(this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Penghasilan Wali</label>
                                <div class="col-sm-2">
                                    <span>Rp. {{number_format(intval($detail_calon_penerima[0]->hasil_wali))}}</span>
                                </div>
                                <div class="col-sm-3">
                                    <select name="jenis_penghasilan_wali" id="" class="form-control" onchange="changed(this)">
                                        <option value="1"
                                                @if($data_angket['penghasilan_wali']->jenis == 1) selected @endif>
                                            Penghasilan Tetap
                                        </option>
                                        <option value="0"
                                                @if($data_angket['penghasilan_wali']->jenis == 0) selected @endif>
                                            Penghasilan Tidak Tetap
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="penghasilan_wali" id="" class="form-control" onchange="changed(this)">
                                        <option value="1"
                                                @if($data_angket['penghasilan_wali']->value == 1) selected @endif>Ya
                                        </option>
                                        <option value="0"
                                                @if($data_angket['penghasilan_wali']->value == 0) selected @endif>Tidak
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="keterangan_penghasilan_wali"
                                           placeholder="Keterangan"
                                           value="{{ $data_angket["penghasilan_wali"]->keterangan }}"
                                           onchange="changed(this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Alat Komunikasi</label>
                                <input type="hidden" name="jumlah_hp" onchange="changed(this)" @if($data_angket['alat_komunikasi']->jumlah_hp>0) value="{{$data_angket['alat_komunikasi']->jumlah_hp}}" @endif>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="komunikasi[]"
                                                   value="telepon_rumah"
                                                   @if($data_angket["alat_komunikasi"]->value>0) @if(in_array("telepon_rumah", $data_angket["alat_komunikasi"]->value)) checked @endif @endif
                                                   onchange="changed(this)">
                                            <span class="form-check-sign">Telepon Rumah</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="komunikasi[]"
                                                   value="hp"
                                                   @if($data_angket['alat_komunikasi']->jumlah_hp>0) checked @endif
                                                   onchange="changed(this)">
                                            <span class="form-check-sign">Handphone (<span
                                                        id="hp">@if($data_angket['alat_komunikasi']->jumlah_hp!=0) {{$data_angket['alat_komunikasi']->jumlah_hp}} @else
                                                        0 @endif</span> buah)</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="komunikasi[]"
                                                   value="internet"
                                                   @if($data_angket["alat_komunikasi"]->value>0) @if(in_array("internet", $data_angket["alat_komunikasi"]->value)) checked @endif @endif
                                                   onchange="changed(this)">
                                            <span class="form-check-sign">Internet rumah/TV Cable</span>
                                        </label>
                                    </div>

                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Jumlah penghuni rumah</label>
                                <div class="col-sm-7">
                                    <input name="jumlah_penghuni_rumah" type="number" min=0 class="form-control" id=""
                                           value="{{ $data_angket["jumlah_penghuni_rumah"] }}" onchange="changed(this)">
                                    <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Jumlah saudara</label>
                                <div class="col-sm-2">
                                    <input type="number" placeholder="Kakak" min=0 class="form-control" id=""
                                           name="jumlah_kakak" value="{{ $data_angket["jumlah_kakak"] }}" onchange="changed(this)">
                                    <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" placeholder="Adik" min=0 class="form-control" id=""
                                           name="jumlah_adek" value="{{ $data_angket["jumlah_adek"] }}" onchange="changed(this)">
                                    <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" placeholder="yang kuliah" min=0 class="form-control" id=""
                                           name="jumlah_kuliah" value="{{ $data_angket["jumlah_kuliah"] }}" onchange="changed(this)">
                                    <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Kepemilikan rumah</label>
                                <div class="col-sm-4">
                                    <select name="kepemilikan_rumah" class="form-control" id="" onchange="changed(this)">
                                        <option value="1" @if($data_angket["kepemilikan_rumah"] == 1) selected @endif>
                                            Milik sendiri
                                        </option>
                                        <option value="2" @if($data_angket["kepemilikan_rumah"] == 2) selected @endif>
                                            Sewa tahunan
                                        </option>
                                        <option value="3" @if($data_angket["kepemilikan_rumah"] == 3) selected @endif>
                                            Sewa bulanan
                                        </option>
                                        <option value="4" @if($data_angket["kepemilikan_rumah"] == 4) selected @endif>
                                            Menempati milik orang lain
                                        </option>
                                        <option value="5" @if($data_angket["kepemilikan_rumah"] == 5) selected @endif>
                                            Menempati milik keluarga
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <!-- <input type="number" placeholder="jumlah" class="form-control"> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Luas Tanah</label>
                                <div class="col-sm-4">
                                    <select name="luas_tanah" class="form-control" id="" onchange="changed(this)">
                                        <option value="1" @if($data_angket["luas_tanah"] == 1) selected @endif> > 200
                                            m2
                                        </option>
                                        <option value="2" @if($data_angket["luas_tanah"] == 2) selected @endif>100 - 200
                                            m2
                                        </option>
                                        <option value="3" @if($data_angket["luas_tanah"] == 3) selected @endif>50 - 99
                                            m2
                                        </option>
                                        <option value="4" @if($data_angket["luas_tanah"] == 4) selected @endif>< 25 m2
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Luas Bangunan</label>
                                <div class="col-sm-4">
                                    <select name="luas_bangunan" class="form-control" id="" onchange="changed(this)">
                                        <option value="1" @if($data_angket["luas_bangunan"] == 1) selected @endif> > 200
                                            m2
                                        </option>
                                        <option value="2" @if($data_angket["luas_bangunan"] == 2) selected @endif>100 -
                                            200 m2
                                        </option>
                                        <option value="3" @if($data_angket["luas_bangunan"] == 3) selected @endif>50 -
                                            99 m2
                                        </option>
                                        <option value="4" @if($data_angket["luas_bangunan"] == 4) selected @endif>< 50
                                            m2
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Daya Listrik</label>
                                <div class="col-sm-4">
                                    <select name="daya_listrik" class="form-control" id="" onchange="changed(this)">
                                        <option value="1" @if($data_angket["daya_listrik"] == 1) selected @endif> > 2200
                                            watt
                                        </option>
                                        <option value="2" @if($data_angket["daya_listrik"] == 2) selected @endif>1300
                                            watt
                                        </option>
                                        <option value="3" @if($data_angket["daya_listrik"] == 3) selected @endif>900
                                            watt
                                        </option>
                                        <option value="4" @if($data_angket["daya_listrik"] == 4) selected @endif>450
                                            watt
                                        </option>
                                        <option value="5" @if($data_angket["daya_listrik"] == 5) selected @endif>tidak
                                            ada
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Sumber air</label>
                                <div class="col-sm-4">
                                    <select name="sumber_air" class="form-control" id="" onchange="changed(this)">
                                        <option value="1" @if($data_angket["sumber_air"] == 1) selected @endif>Kemasan
                                        </option>
                                        <option value="2" @if($data_angket["sumber_air"] == 2) selected @endif>PDAM
                                        </option>
                                        <option value="3" @if($data_angket["sumber_air"] == 3) selected @endif>Sumur
                                        </option>
                                        <option value="4" @if($data_angket["sumber_air"] == 4) selected @endif>
                                            Sungai/mata air/gunung
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">MCK</label>
                                <div class="col-sm-4">
                                    <select name="mck" class="form-control" id="" onchange="changed(this)">
                                        <option value="1" @if($data_angket["mck"] == 1) selected @endif>Kepemilikan
                                            sendiri di dalam
                                        </option>
                                        <option value="2" @if($data_angket["mck"] == 2) selected @endif>Kepemilikan
                                            sendiri di luar
                                        </option>
                                        <option value="3" @if($data_angket["mck"] == 3) selected @endif>Berbagi pakai
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Barang/usaha yang dimiliki di rumah</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Mobil (Jenis/Tahun)</label>
                                    <input hidden name="mobil" value="" onchange="changed(this)">
                                    <div class="col-sm-10">
                                        <ul class="list-unstyled list-inline" id="list_mobil">
                                        </ul>
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambahMobil">Tambah</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Sepeda Motor (Jenis/Tahun)</label>
                                    <input hidden name="motor" value="" onchange="changed(this)">
                                    <div class="col-sm-10">
                                        <ul class="list-unstyled list-inline" id="list_motor">
                                        </ul>
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambahMotor">Tambah</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Sawah (Luas)</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="" name="luas_sawah"
                                               value="{{ $data_angket["luas_sawah"] }}" onchange="changed(this)">
                                    </div>
                                    <div class="col-sm-2">
                                        <strong>m <sup>2</sup></strong>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Ternak (Jenis/Jumlah)</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="" placeholder="jenis" name="ternak"
                                               value="{{ $data_angket["ternak"]->jenis }}" onchange="changed(this)">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="number" name="jumlah_ternak" class="form-control" id=""
                                               placeholder="jumlah" value="{{ $data_angket["ternak"]->jumlah_ternak }}" onchange="changed(this)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Catatan</label>
                                    <div class="col-sm-8">
                                        <textarea name="catatan" class="form-control" id="" cols="30"
                                                  rows="10" onchange="changed(this)">{{ $data_angket['catatan'] }}</textarea>
                                        <input hidden name="editedData" value="">
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Pekarangan (Luas)</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="" >
                                        <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                                    </div>
                                    <div class="col-sm-2">
                                            <strong>m <sup>2</sup></strong>
                                        </div>
                                </div> --}}
                                {{-- <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Usaha</label>
                                    <div class="col-sm-10">
                                        <input type="text"  class="form-control" id="">
                                        <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                                    </div>
                                </div> --}}
                                <strong class="now-ui-icons business_bulb-63"></strong> &nbsp;<small><em>Sebelum simpan,
                                        pastikan semua data telah terisi sesuai kondisi di lapangan.</em></small>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body text-center">
                                <button class="btn btn-success" id="btn_simpan" disabled>Simpan</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push("script")
    <script>
        var insertEdited;
        var editedInput = [];
        function changed(me) {
            var name = $(me).attr('name');
            switch (name) {
                case 'keterangan_ayah':
                    name = 'ayah';
                    break;
                case 'keterangan_ibu':
                    name = 'ibu';
                    break;
                case 'keterangan_kerja_ayah':
                    name = 'kerja_ayah';
                    break;
                case 'keterangan_kerja_ibu':
                    name = 'kerja_ibu';
                    break;
                case 'keterangan_pendidikan_ayah_ibu':
                    name = 'pendidikan_ayah_ibu';
                    break;
                case 'jenis_penghasilan_ayah':
                case 'keterangan_penghasilan_ayah':
                    name = 'penghasilan_ayah';
                    break;
                case 'jenis_penghasilan_ibu':
                case 'keterangan_penghasilan_ibu':
                    name = 'penghasilan_ibu';
                    break;
                case 'jenis_penghasilan_wali':
                case 'keterangan_penghasilan_wali':
                    name = 'penghasilan_wali';
                    break;
                case 'komunikasi':
                case 'jumlah_hp':
                case 'komunikasi[]':
                    name = 'alat_komunikasi';
                    break;
                case 'jumlah_ternak':
                    name = 'ternak';
                    break;
            }
            insertEdited(name);
        }
        $(document).ready(function () {
            insertEdited = function(name) {
                if(jQuery.inArray(name, editedInput) === -1) {
                    editedInput.push(name);
                }
                $("input[name='editedData']").val(JSON.stringify(editedInput));
                $("#btn_simpan").attr("disabled", false);
            };

            const listMotor = $('#list_motor');
            const listMobil = $('#list_mobil');

            const inputMotor = $("input[name='motor']");
            const inputMobil = $("input[name='mobil']");

            const dataMotor = JSON.parse('{!! json_encode($data_angket['motor']) !!}');
            const dataMobil = JSON.parse('{!! json_encode($data_angket['mobil']) !!}');

            function update() {
                listMotor.empty();
                inputMotor.val("");
                var i = 0;
                dataMotor.forEach(function (data) {
                    listMotor.append(
                        "<li class='list-inline-item'><a href='#' class='badge badge-warning' id='editMotor"+ i++ +"' data-toggle='modal' data-target='#editMotor' data-merk='"+data.merk+"' data-tahun='"+data.tahun+"'><h6>"+data.merk+" ("+data.tahun+")</h6></a></li>"
                    );
                    inputMotor.val(inputMotor.val()===''?JSON.stringify(data):inputMotor.val()+","+JSON.stringify(data));
                });
                listMobil.empty();
                inputMobil.val("");
                i = 0;
                dataMobil.forEach(function (data) {
                    listMobil.append(
                        "<li class='list-inline-item'><a href='#' class='badge badge-warning' id='editMobil"+ i++ +"' data-toggle='modal' data-target='#editMobil' data-merk='"+data.merk+"' data-tahun='"+data.tahun+"'><h6>"+data.merk+" ("+data.tahun+")</h6></a></li>"
                    );
                    inputMobil.val(inputMobil.val()===''?JSON.stringify(data):inputMobil.val()+","+JSON.stringify(data));
                });
            }
            update();

            var jumlah_kendaraan = 0;
            $("input[value='hp']").click(function () {
                if ($("input[value='hp']").prop("checked") == true) {
                    $('#totalHp').modal();
                } else {
                    $("input[name='jumlah_hp']").val("");
                    $("span#hp").html("0");
                }
                insertEdited('alat_komunikasi');
            });
            $("#total_hp").click(function () {
                var total_hp = $("input[name='total_hp']").val();
                $("input[name='jumlah_hp']").val(total_hp);
                $("input[name='total_hp']").val("");
                $("span#hp").html(total_hp);
                $("#totalHp").modal('toggle');
                insertEdited('alat_komunikasi');
            });

            const inputMerkMotor = $("input[name='merk_motor']");
            const inputTahunMotor = $("input[name='tahun_motor']");
            $("#tambah_motor").click(function () {
                jumlah_kendaraan++;
                const merk = inputMerkMotor.val();
                const tahun = inputTahunMotor.val();

                console.log(dataMotor);
                dataMotor.push({merk: merk,tahun: tahun});
                console.log(dataMotor);
                update();

                inputMerkMotor.val('');
                inputTahunMotor.val('');
                $("#tambahMotor").modal("toggle");

                insertEdited('motor');
            });
            $("#edit_motor").click(function () {
                const merk = $("input[name='edit_merk_motor']").val();
                const tahun = $("input[name='edit_tahun_motor']").val();
                const id = $("input[name='id_motor']").val().replace('editMotor', '');

                dataMotor[id] = {merk: merk,tahun: tahun};
                update();

                inputMerkMotor.val('');
                inputMerkMotor.val('');
                $("#editMotor").modal("toggle");

                insertEdited('motor');
            });
            $("#hapus_motor").click(function () {
                const merk = $("input[name='edit_merk_motor']").val();
                const tahun = $("input[name='edit_tahun_motor']").val();
                const id = $("input[name='id_motor']").val().replace('editMotor', '');

                dataMotor.splice(id, 1);
                update();

                inputMerkMotor.val('');
                inputMerkMotor.val('');
                $("#editMotor").modal("toggle");

                insertEdited('motor');
            });
            $("#editMotor").on("show.bs.modal", function (event) {
                const button = $(event.relatedTarget);

                var merk = button.data("merk");
                var tahun = button.data("tahun");
                var id = button.prop("id");

                $("input[name='edit_merk_motor']").val(merk);
                $("input[name='edit_tahun_motor']").val(tahun);
                $("input[name='id_motor']").val(id);
            });

            const inputMerkMobil = $("input[name='merk_mobil']");
            const inputTahunMobil = $("input[name='tahun_mobil']");
            $("#tambah_mobil").click(function () {
                jumlah_kendaraan++;
                const merk = inputMerkMobil.val();
                const tahun = inputTahunMobil.val();

                dataMobil.push({merk: merk,tahun: tahun});
                update();

                inputMerkMobil.val('');
                inputTahunMobil.val('');
                $("#tambahMobil").modal("toggle");

                insertEdited('mobil');
            });
            $("#edit_mobil").click(function () {
                const merk = $("input[name='edit_merk_mobil']").val();
                const tahun = $("input[name='edit_tahun_mobil']").val();

                const id = $("input[name='id_mobil']").val().replace('editMobil', '');

                dataMobil[id]  = {merk: merk,tahun: tahun};
                update();

                inputMerkMobil.val('');
                inputTahunMobil.val('');
                $("#editMobil").modal("toggle");

                insertEdited('mobil');
            });
            $("#hapus_mobil").click(function () {
                const merk = $("input[name='edit_merk_mobil']").val();
                const tahun = $("input[name='edit_tahun_mobil']").val();

                const id = $("input[name='id_mobil']").val().replace('editMobil', '');

                dataMobil.splice(id, 1);
                update();

                inputMerkMobil.val('');
                inputTahunMobil.val('');
                $("#editMobil").modal("toggle");

                insertEdited('mobil');
            });
            $("#editMobil").on("show.bs.modal", function (event) {
                const button = $(event.relatedTarget);

                var merk = button.data("merk");
                var tahun = button.data("tahun");
                var id = button.prop("id");

                $("input[name='edit_merk_mobil']").val(merk);
                $("input[name='edit_tahun_mobil']").val(tahun);
                $("input[name='id_mobil']").val(id);
            });
        });
    </script>

@endpush

@push("modal")
    <div class="modal fade" id="tambahMotor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Motor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="staticEmail2" class="sr-only">Merk</label>
                            <input type="text" class="form-control" id="" value="" placeholder="Merk" name="merk_motor">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="" class="sr-only">Tahun</label>
                            <input type="number" class="form-control" id="" placeholder="Tahun" name="tahun_motor">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="button" class="btn btn-success" id="tambah_motor">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editMotor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Motor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-inline">
                        <input type="hidden" name="id_motor">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="staticEmail2" class="sr-only">Merk</label>
                            <input type="text" class="form-control" id="" value="" placeholder="Merk"
                                   name="edit_merk_motor">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="" class="sr-only">Tahun</label>
                            <input type="number" class="form-control" id="" placeholder="Tahun" name="edit_tahun_motor">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" id="hapus_motor">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>

                    <button type="button" class="btn btn-success" id="edit_motor">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahMobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="staticEmail2" class="sr-only">Merk</label>
                            <input type="text" class="form-control" id="" value="" placeholder="Merk" name="merk_mobil">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="" class="sr-only">Tahun</label>
                            <input type="number" class="form-control" id="" placeholder="Tahun" name="tahun_mobil">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="button" class="btn btn-success" id="tambah_mobil">Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editMobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Mobil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-inline">
                        <input type="hidden" name="id_mobil">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="staticEmail2" class="sr-only">Merk</label>
                            <input type="text" class="form-control" id="" value="" placeholder="Merk"
                                   name="edit_merk_mobil">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="" class="sr-only">Tahun</label>
                            <input type="number" class="form-control" id="" placeholder="Tahun" name="edit_tahun_mobil">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" id="hapus_mobil">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>

                    <button type="button" class="btn btn-success" id="edit_mobil">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="totalHp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jumlah Handphone</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form">
                        <div class="form-group col-sm-12">
                            <label for="staticEmail2" class="sr-only">Jumlah</label>
                            <input type="number" class="form-control" id="" value="1" min=1 placeholder="Jumlah"
                                   name="total_hp">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="button" id="total_hp" class="btn btn-success">Tambah</button>
                </div>
            </div>
        </div>
    </div>
@endpush