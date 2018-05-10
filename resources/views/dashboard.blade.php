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
                                                    Kota
                                                </th>
                                                <th>
                                                    Sekolah Asal
                                                </th>
                                                <th class="text-right">
                                                    Survey
                                                </th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            MELENIA AYU SAPUTRI
                                        </td>
                                        <td>
                                            Tulungagung
                                        </td>
                                        <td>
                                            MAN 2 Tulungagung
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ url("/angket/1") }}"><i class="now-ui-icons files_single-copy-04"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            MELENIA AYU SAPUTRI
                                        </td>
                                        <td>
                                            Tulungagung
                                        </td>
                                        <td>
                                            MAN 2 Tulungagung
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ url("/angket/1") }}"><i class="now-ui-icons files_single-copy-04"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                            <td>
                                                MELENIA AYU SAPUTRI
                                            </td>
                                            <td>
                                                Tulungagung
                                            </td>
                                            <td>
                                                MAN 2 Tulungagung
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ url("/angket/1") }}"><i class="now-ui-icons files_single-copy-04"></i></a>
                                            </td>
                                        </tr>
                                   
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
      }

    });
    });
</script>
@endpush