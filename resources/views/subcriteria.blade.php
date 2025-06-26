@extends('components.layout')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <h5 class="card-title fw-semibold mb-4">Data Sub Kriteria</h5>
      </div>

      @foreach ($criterias as $criteria)
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">{{$criteria->nama}} ({{$criteria->kode}})</h5>
          {{-- <button type="button" id="add" data-id="{{$criteria->id}}" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary m-1">Tambah Sub Kriteria</button> --}}
          <a href="#" data-id="{{$criteria->id}}" data-nama="{{$criteria->nama}}" data-bs-toggle="modal" data-bs-target="#addnew" class="btn add btn-action btn-warning text-white"><i>Tambah sub kriteria</i></a>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle border">
              <thead class="text-dark fs-4 border">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">No</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nama Sub Kriteria</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nilai</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Keterangan</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Aksi</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($subcriterias as $subcriteria)
                @if ($subcriteria->id === $criteria->id)
                <tr>
                  <td>$i++</td>
                  <td>{{$subcriteria->namasub}}</td>
                  <td>{{$subcriteria->nilai}}</td>
                  <td>{{$subcriteria->keterangan}}</td>
                  <td class="">
                    <div class="btn-wrapper d-flex gap-2 flex-wrap">
                      <a href="#" data-id="{{$subcriteria->id}}" data-nama="{{$subcriteria->namasub}}" data-nilai="{{$subcriteria->nilai}}"
                        data-ket="{{$subcriteria->keterangan}}" class="btn edit btn-action btn-warning text-white"><i
                        class="ti ti-edit"></i></a>
                      <a href="#" class="delete btn btn-action btn-danger text-white" data-nama="{{$subcriteria->namasub}}"
                        data-id="{{$subcriteria->id}}">
                        <i class="ti ti-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endforeach
    </div>
</div>

  
  @include('modal.subcriteriaModal')
@endsection

@push('js')
<script type="text/javascript">
  $(document).ready(function(){

    $('#tableBody').DataTable();
      
      // $.ajaxSetup({
      //     headers: {
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //     }
      // });
       
      $(document).on('click', '.add', function (event){
          event.preventDefault();
          var id = $(this).data('id');
          var nama = $(this).data('nama');
          $('#myModalLabel1').html(`Tambah Sub Criteria `+ nama);
          $('#id').val(id);
      });

      $(document).on('click', '.edit', function (event){
          event.preventDefault();
          var id = $(this).data('id');
          var nama = $(this).data('nama');
          var bobot = $(this).data('bobot');
          var benefited = $(this).data('benefited');
          $('#editmodal').modal('show');
          $('#name-edit').val(nama);
          $('#weight-edit').val(bobot);
          $('#benefited-edit').val(benefited);
          $('#edit-id').val(id);
      });
       
      $(document).on('click', '.delete', function(event){
          event.preventDefault();
          var id = $(this).data('id');
          var nama = $(this).data('nama');
          $('#deletemodal').modal('show');
          $('#delete-id').val(id);
          $('.criteria-nama').html(nama);
      });
       
       
  });

    
</script>
@endpush
