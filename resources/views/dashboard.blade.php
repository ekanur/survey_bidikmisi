@extends("layout")
@push('style')
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section("content")
<div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Calon Penerima Bidik Misi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                            <th>
                                                    Nama
                                                </th>
                                                <th>
                                                    Alamat
                                                </th width="60%">
                                                <th>
                                                    Sekolah Asal
                                                </th>
                                                <th>
                                                    Nilai
                                                </th>
                                                <th class="text-right">
                                                    Survey
                                                </th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @foreach($calon_penerima as $calon_penerima)
                                    <tr>
                                        <td>
                                            {{$calon_penerima->nama}}
                                        </td>
                                        <td>
                                            {{$calon_penerima->alamat}}
                                        </td>
                                        <td>
                                            {{$calon_penerima->sekolah_asal}}
                                        </td>
                                        <td>
                                            {{ $calon_penerima->nilai }}
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ url("/angket/".$calon_penerima->id) }}"><i class="now-ui-icons files_single-copy-04"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection

@push('script')
<script type="text/javascript" src="{{ url('/js/plugins/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $(".table").DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      responsive: true,
      language: {
      search: "_INPUT_",
      searchPlaceholder: "Search records",
      order: [[ 0, 'asc' ], [ 1, 'desc' ]]
      }

    });
    });
</script>
@endpush