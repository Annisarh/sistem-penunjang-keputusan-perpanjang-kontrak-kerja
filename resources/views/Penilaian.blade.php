@extends('components.layout')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <h5 class="card-title fw-semibold mb-4">Data Alternatif</h5>
        @include('alert.alert')
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Tabel Data Alternatif</h5>
          {{-- {{$alternatives ->links()}} --}}
                <div class="table-responsive">
                  <table id="tableBody" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kode Alternatif</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Alternatif</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Aksi</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($alternatives as $alternative)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$alternative->kode}}</td>
                        <td>{{$alternative->nama}}</td>
                        <td>
                          <div class="btn-wrapper d-flex gap-2 flex-wrap">
                            <a href="#" data-id="{{$alternative->id}}" data-nama="{{$alternative->nama}}" class="btn edit btn-action btn-warning text-white"><i
                            class="ti ti-edit"></i></a>
                          </div>
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
    $.get("{{ route('penilaian.form') }}",{id:id}, function(data){
        $('#editmodal').empty().html(data);
    })
  }

});
  
</script>
@endpush