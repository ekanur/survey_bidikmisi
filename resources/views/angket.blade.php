@extends("layout")
@push('style')
<link href="{{ asset("css/style.css") }}" rel="stylesheet" />
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
                
                <div class="card-body"><ul class="nav nav-pills nav-pills-primary nav-pills-icons justify-content-center" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" href="{{ url("/angket/1") }}" role="tablist">
                                <i class="now-ui-icons files_single-copy-04"></i>
                                Angket
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url("/foto/1") }}" role="tablist">
                                <i class="now-ui-icons design_image"></i>
                                Foto
                            </a>
                        </li>
                    </ul></div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Profil</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No. Peserta/NIM</label>
                            <div class="col-sm-10">
                                <span>418053454/1803483949</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <span>MELENIA AYU SAPUTRI</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Program Studi</label>
                            <div class="col-sm-10">
                                <span>S1 BIMBINGAN DAN KONSELING</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Alamat Rumah</label>
                            <div class="col-sm-10">
                                <!-- <input type="text" disabled class="form-control" id="" value="S1 BIMBINGAN DAN KONSELING"> -->
                                <span>RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Sekolah</label>
                            <div class="col-sm-10">
                                <span>MAN 2 TULUNGAGUNG</span>
                                <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Alamat Sekolah</label>
                            <div class="col-sm-10">
                                <span>MAN 2 TULUNGAGUNG</span>
                                <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Telp</label>
                            <div class="col-sm-10">
                                <span>085542333463</span>
                                <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <form action="{{ url('/angket/save') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="calon_penerima_id" value="1">
                    <div class="card-header">
                        <h5 class="title">Orang Tua & Kondisi Rumah</h5>
                    </div>
                    <div class="card-body">
                        
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Ayah/Wali</label>
                                <div class="col-sm-5">
                                    <span>SAMSU</span>
                                </div>
                                <div class="col-sm-2">
                                    <select name="ayah" id="" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control"  name="keterangan_ayah" placeholder="Keterangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Ibu</label>
                                <div class="col-sm-5">
                                    <span>SITI ROBIYAH</span>
                                </div>
                                <div class="col-sm-2">
                                    <select name="ibu" id="" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control"  name="keterangan_ibu" placeholder="Keterangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                                <div class="col-sm-5">
                                    <span>Buruh (Tani, Pabrik)</span>
                                </div>
                                <div class="col-sm-2">
                                    <select name="kerja_ayah" id="" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control"  name="keterangan_kerja_ayah" placeholder="Keterangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                                <div class="col-sm-5">
                                    <span>Tidak Bekerja</span>
                                </div>
                                <div class="col-sm-2">
                                    <select name="kerja_ibu" id="" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control"  name="keterangan_kerja_ibu" placeholder="Keterangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Pendidikan Ayah/Ibu</label>
                                <div class="col-sm-5">
                                    <span>Lulus SD/Lulus SD</span>
                                </div>
                                <div class="col-sm-2">
                                    <select name="pendidikan_ayah_ibu" id="" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control"  name="keterangan_pendidikan_ayah_ibu" placeholder="Keterangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Penghasilan Ayah</label>
                                <div class="col-sm-2">
                                    <span>Rp. 850.000</span>
                                </div>
                                <div class="col-sm-3">
                                    <select name="jenis_penghasilan_ayah" id="" class="form-control">
                                        <option value="1">Penghasilan Tetap</option>
                                        <option value="0">Penghasilan Tidak Tetap</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="penghasilan_ayah" id="" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control"  name="keterangan_penghasilan_ayah" placeholder="Keterangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Penghasilan Ibu</label>
                                <div class="col-sm-2">
                                    <span>0</span>
                                </div>
                                <div class="col-sm-3">
                                    <select name="jenis_penghasilan_ibu" id="" class="form-control">
                                        <option value="1">Penghasilan Tetap</option>
                                        <option value="0">Penghasilan Tidak Tetap</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="penghasilan_ibu" id="" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control"  name="keterangan_penghasilan_ibu" placeholder="Keterangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Penghasilan Wali</label>
                                <div class="col-sm-2">
                                    <span>0</span>
                                </div>
                                <div class="col-sm-3">
                                    <select name="jenis_penghasilan_wali" id="" class="form-control">
                                        <option value="1">Penghasilan Tetap</option>
                                        <option value="0">Penghasilan Tidak Tetap</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="penghasilan_wali" id="" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control"  name="keterangan_penghasilan_wali" placeholder="Keterangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Alat Komunikasi</label>
                                <input type="hidden" name="jumlah_hp" >
                                <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="komunikasi[]" value="telepon_rumah">
                                                <span class="form-check-sign">Telepon Rumah</span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="komunikasi[]" value="hp">
                                                <span class="form-check-sign">Handphone (<span id="hp">0</span> buah)</span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="komunikasi[]" value="internet">
                                                <span class="form-check-sign">Internet rumah/TV Cable</span>
                                            </label>
                                        </div>
                                    
                                </div>
                               
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Jumlah penghuni rumah</label>
                                <div class="col-sm-7">
                                    <input name="jumlah_penghuni_rumah" type="number" min=0 class="form-control" id="">
                                    <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Jumlah saudara</label>
                                <div class="col-sm-2">
                                    <input type="number" placeholder="Kakak" min=0 class="form-control" id="" name="jumlah_kakak">
                                    <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" placeholder="Adik" min=0 class="form-control" id="" name="jumlah_adek">
                                    <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                                </div>
                                <div class="col-sm-3">
                                        <input type="number" placeholder="yang kuliah" min=0 class="form-control" id="" name="jumlah_kuliah">
                                        <!-- <textarea name="" id="" cols="30" rows="10" class="form-control">RT 002 RW 008 DSN. TANGGUNG DS. TANGGUNG KEC. CAMPURDARAT KABUPATEN TULUNGAGUNG, JATIM</textarea> -->
                                    </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Kepemilikan rumah</label>
                                <div class="col-sm-4">
                                    <select name="kepemilikan_rumah" class="form-control" id="">
                                        <option value="1">Milik sendiri</option>
                                        <option value="2">Sewa tahunan</option>
                                        <option value="3">Sewa bulanan</option>
                                        <option value="4">Menempati milik orang lain</option>
                                        <option value="5">Menempati milik keluarga</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <!-- <input type="number" placeholder="jumlah" class="form-control"> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Luas Tanah</label>
                                <div class="col-sm-4">
                                    <select name="luas_tanah" class="form-control" id="">
                                        <option value="1"> > 200 m2</option>
                                        <option value="2">100 - 200 m2</option>
                                        <option value="3">50 - 99 m2</option>
                                        <option value="5">< 25 m2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Luas Bangunan</label>
                                <div class="col-sm-4">
                                    <select name="luas_bangunan" class="form-control" id="">
                                        <option value="1"> > 200 m2</option>
                                        <option value="2">100 - 200 m2</option>
                                        <option value="3">50 - 99 m2</option>
                                        <option value="4">< 50 m2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Daya Listrik</label>
                                <div class="col-sm-4">
                                    <select name="daya_listrik" class="form-control" id="">
                                        <option value="1"> > 2200 watt</option>
                                        <option value="2">1300 watt</option>
                                        <option value="3">900 watt</option>
                                        <option value="4">450 watt</option>
                                        <option value="5">tidak ada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Sumber air</label>
                                <div class="col-sm-4">
                                    <select name="sumber_air" class="form-control" id="">
                                        <option value="1">Kemasan</option>
                                        <option value="2">PDAM</option>
                                        <option value="3">Sumur</option>
                                        <option value="4">Sungai/mata air/gunung</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">MCK</label>
                                    <div class="col-sm-4">
                                        <select name="mck" class="form-control" id="">
                                            <option value="1">Kepemilikan sendiri di dalam</option>
                                            <option value="2">Kepemilikan sendiri di luar</option>
                                            <option value="3">Berbagi pakai</option>
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
                                <input type="hidden" name="mobil">
                                
                                <div class="col-sm-10">
                                    <ul class="list-unstyled list-inline" id="list_mobil">
                                        {{-- <li class="list-inline-item">
                                                <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#editMobil"> 
                                                        <h6>Honda Jazz (2010)</h6>
                                                </a>
                                        </li>
                                        <li class="list-inline-item">
                                                <a href="#" class="badge badge-warning"  data-toggle="modal" data-target="#editMobil">
                                                       <h6>Honda Jazz (2010)</h6> 
                                                </a>
                                        </li>  --}}
                                    </ul>
                                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambahMobil">Tambah</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Sepeda Motor (Jenis/Tahun)</label>
                                    <input type="hidden" name="motor">
                                    <div class="col-sm-10">
                                        <ul class="list-unstyled list-inline" id="list_motor">
                                                {{-- <li class="list-inline-item">
                                                        <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#editMotor"> 
                                                                <h6>Honda Jazz (2010)</h6>
                                                        </a>
                                                </li>
                                                <li class="list-inline-item">
                                                        <a href="#" class="badge badge-warning"  data-toggle="modal" data-target="#editMotor">
                                                                <h6>Honda Jazz (2010)</h6> 
                                                        </a>
                                                </li>  --}}
                                            </ul>
                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambahMotor">Tambah</a>
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Sawah (Luas)</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="" name="luas_sawah">
                                </div>
                                <div class="col-sm-2">
                                    <strong>m <sup>2</sup></strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Ternak (Jenis/Jumlah)</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" placeholder="jenis" name="ternak">
                                </div>
                                <div class="col-sm-4">
                                        <input type="number" name="jumlah_ternak" class="form-control" id="" placeholder="jumlah">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Catatan</label>
                                <div class="col-sm-8">
                                    <textarea name="catatan" class="form-control" id="" cols="30" rows="10"></textarea>
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
                            <strong class="now-ui-icons business_bulb-63"></strong> &nbsp;<small><em>Sebelum simpan, pastikan semua data telah terisi sesuai kondisi di lapangan.</em></small>
                        
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <button class="btn btn-success">Simpan</button>
                        
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection

@push("script")
<script>
        $(document).ready(function(){

            // 
            $("input[value='hp']").click(function(){
                if($("input[value='hp']").prop("checked") == true){
                    $('#totalHp').modal();
                }else{
                    $("input[name='jumlah_hp']").val("");
                    $("span#hp").html("0");
                }
            });
            
            $("#total_hp").click(function(){
                var total_hp = $("input[name='total_hp']").val();
                $("input[name='jumlah_hp']").val(total_hp);
                $("input[name='total_hp']").val("");
                $("span#hp").html(total_hp);
                $("#totalHp").modal('toggle');
            });


           
            $("#tambah_motor").click(function(){
                var merk = $("input[name='merk_motor']").val();
                var tahun = $("input[name='tahun_motor']").val();
                var motor = {"merk":merk, "tahun":tahun};

                $("input[name='motor']").val(function(){
                    if(this.value == ''){
                        return JSON.stringify(motor);
                    }
                    else{
                        return this.value + ',' + JSON.stringify(motor)
                    }
                });
                addKendaraan("#list_motor", merk, tahun);
                $("input[name='merk_motor']").val('');
                $("input[name='tahun_motor']").val('');
                $("#tambahMotor").modal("toggle");
            });

            $("#tambah_mobil").click(function(){
                var merk = $("input[name='merk_mobil']").val();
                var tahun = $("input[name='tahun_mobil']").val();
                var mobil = {"merk":merk, "tahun":tahun};

                $("input[name='mobil']").val(function(){
                    if(this.value ==''){
                        return JSON.stringify(mobil);
                    }
                    else{
                        return this.value + ',' + JSON.stringify(mobil)
                    }
                });
                addKendaraan("#list_mobil", merk, tahun);
                $("input[name='merk_mobil']").val('');
                $("input[name='tahun_mobil']").val('');
                $("#tambahMobil").modal("toggle");
            });

        function addKendaraan(id, merk, tahun){
            $(id).append("<li class='list-inline-item'><a href='#' class='badge badge-warning' data-toggle='modal' data-target='#editMobil' data-merk='"+merk+"' data-tahun='"+tahun+"'><h6>"+merk+" ("+tahun+")</h6></a></li>");
        }
        });

    </script>

@endpush

@push("modal")
<div class="modal fade" id="tambahMotor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text"  class="form-control" id="" value="" placeholder="Merk" name="merk_motor">
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

    <div class="modal fade" id="editMotor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="staticEmail2" class="sr-only">Merk</label>
                                <input type="text"  class="form-control" id="" value="" placeholder="Merk" name="edit_merk_motor">
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="" class="sr-only">Tahun</label>
                                <input type="number" class="form-control" id="" placeholder="Tahun" name="edit_tahun_motor">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        
                        <button type="button" class="btn btn-success" id="edit_motor">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    <div class="modal fade" id="editMobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="staticEmail2" class="sr-only">Merk</label>
                            <input type="text"  class="form-control" id="" value="" placeholder="Merk" name="edit_merk_mobil">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="" class="sr-only">Tahun</label>
                            <input type="number" class="form-control" id="" placeholder="Tahun" name="edit_tahun_mobil">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    
                    <button type="button" class="btn btn-success" id="edit_mobil">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahMobil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text"  class="form-control" id="" value="" placeholder="Merk" name="merk_mobil">
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

          <div class="modal fade" id="totalHp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="number"  class="form-control" id="" value="" min=1 placeholder="Jumlah" name="total_hp">
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