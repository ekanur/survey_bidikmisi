@extends("layout")
@push('style')
<link href="{{ asset("css/style.css") }}" rel="stylesheet" />
@endpush
@section("content")
<div class="panel-header">
        <div class="header text-center">
            <h2 class="title">Upload Foto</h2>
            <p class="category">Upload foto sebagai bukti kondisi rumah calon penerima bidik misi.
                <!-- <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the
                <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a> -->
            </p>
        </div>
    </div>
    <div class="content">
        <form action="{{ url('/foto/save') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="calon_penerima_id" value="{{ $calon_penerima_id }}">
            {{-- <input type="hidden" name="nim_surveyor" value="1533430596"> --}}
            <input type="hidden" name="foto_bersama_lama" value="{{ $path_foto['bersama'] }}">
            <input type="hidden" name="foto_dapur_lama" value="{{ $path_foto['dapur'] }}">
            <input type="hidden" name="foto_kamar_mandi_lama" value="{{ $path_foto['kamar_mandi'] }}">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
            
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-primary nav-pills-icons justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url("/angket/".$calon_penerima_id) }}" role="tablist">
                                    <i class="now-ui-icons files_single-copy-04"></i>
                                    Angket
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url("/foto/".$calon_penerima_id) }}" role="tablist">
                                    <i class="now-ui-icons design_image"></i>
                                    Foto
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Foto Bersama Keluarga</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-12">
                                    <input name="foto_bersama" type="file" accept="image/*" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <img id="preview_foto_bersama" src="@if($path_foto['bersama'] != "") {{ Storage::url($path_foto['bersama']) }} @else {{asset("/img/preview.jpg")}} @endif" alt="Preview" class="img-fluid img-thumbnail" style="margin-top:1.9em; width: 100%;height:auto"/>
                                </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Foto Dapur</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                                <div class="col-md-12">
                                        <input name="foto_dapur" type="file" accept="image/*" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <img id="preview_foto_dapur" src="@if($path_foto['dapur'] != "") {{ Storage::url($path_foto['dapur']) }} @else {{asset("/img/preview.jpg")}} @endif" alt="Preview" class="img-fluid img-thumbnail" style="margin-top:1.9em; width: 100%;height:auto"/>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Foto Kamar Mandi</h4>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                        <div class="col-md-12">
                                                <input name="foto_kamar_mandi" type="file" accept="image/*" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <img id="preview_foto_kamar_mandi" src="@if($path_foto['kamar_mandi'] != "") {{ Storage::url($path_foto['kamar_mandi']) }} @else {{asset("/img/preview.jpg")}} @endif" alt="Preview" class="img-fluid img-thumbnail" style="margin-top:1.9em; width: 100%;height:auto"/>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                        <div class="card">
                                <div class="card-body text-center">
                                    <button class="btn btn-success">Upload</button>
                                    
                                </div>
                            </div>
                </div>   
        </div>
    </form>
    </div>
@endsection

@push("script")
<script>
        function readURL(input, id) {
    
            if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function(e) {
                $(id).attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
            }
        }
    
        $("input[name='foto_bersama']").change(function() {
            readURL(this, "#preview_foto_bersama");
        });
    
        $("input[name='foto_dapur']").change(function() {
            readURL(this, "#preview_foto_dapur");
        });
    
        $("input[name='foto_kamar_mandi']").change(function() {
            readURL(this, "#preview_foto_kamar_mandi");
        });
    </script>
@endpush