@extends('components.layout')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <h5 class="card-title fw-semibold mb-4">Data Hasil Akhir</h5>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Tabel Perangkingan</h5>
          {{-- {{$alternatives ->links()}} --}}
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kode Alternatif</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Alternatif</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nilai</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Ranking</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kondisi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Detail</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($sortedResults as $sortedResult)
                      <tr>
                        <td>{{$sortedResult->code}}</td>
                        <td>{{$sortedResult->name}}</td>
                        <td>{{$sortedResult->grade}}</td>
                        <td>{{$sortedResult->rank}}</td>
                        <td>{{$sortedResult->kondisi}}</td>
                        <td>
                          <td>
                            <div class="btn-wrapper d-flex gap-2 flex-wrap">
                              <a href="#" data-id="{{$sortedResult->id}}" data-nama="{{$sortedResult->name}}" class="btn edit btn-action btn-warning text-white"><i
                              class="ti ti-edit"></i></a>
                            </div>
                          </td>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
        </div>
      </div>
      {{-- @canany(['admin', 'kepala cabang'])
      <a href="{{route('exportPdf')}}">
        <button class="btn btn-primary m-1">Laporan Hasil</button>
      </a>
      @endcanany --}}
    </div>
  </div>
</div>
@include('modal.penilaianModal.penilaianModal')
@endsection

@push('js')
<script type="text/javascript">
$(document).ready(function(){

  $('#tableBody').DataTable();

  $(document).on('click', '.edit', function (event){
          var id = $(this).data('id');
          event.preventDefault();
          $('#editmodal').modal('show');
          getGradeForms(id);
      });

  function getGradeForms(id){
    $.get("{{ route('hasil.form') }}",{id:id}, function(data){
        $('#editmodal').empty().html(data);
    })
  }

});
  
</script>
@endpush
