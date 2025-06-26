@extends('components.layout')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <h5 class="card-title fw-semibold mb-4">Data Kriteria</h5>
        @include('alert.alert')
        <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary m-1">Tambah Kriteria</button>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Tabel Data Kriteria</h5>
          {{-- {{$criteria ->links()}} --}}
                <div class="table-responsive">
                  <table  id="tableBody" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kode Kriteria</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Bobot</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Jenis</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Aksi</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($criteria as $criterion)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$criterion->kode}}</td>
                        <td>{{$criterion->nama}}</td>
                        <td>{{$criterion->bobot}}</td>
                        <td>{{$criterion->benefited == 1 ? 'Benefit' : 'Cost'}}</td>
                        <td class="">
                          <div class="btn-wrapper d-flex gap-2 flex-wrap">
                            <a href="#" data-id="{{$criterion->id}}" data-nama="{{$criterion->nama}}" data-bobot="{{$criterion->bobot}}"
                              data-benefited="{{$criterion->benefited}}" class="btn edit btn-action btn-warning text-white"><i
                                class="ti ti-edit"></i></a>
                            <a href="#" class="delete btn btn-action btn-danger text-white" data-nama="{{$criterion->nama}}"
                              data-id="{{$criterion->id}}">
                              <i class="ti ti-trash"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
        </div>
      </div>
      {{-- <a href="{{route('criteria.laporan')}}">
        <button class="btn btn-primary m-1">Laporan Kriteria</button>
      </a> --}}
    </div>
  </div>
</div>

@include('modal.criteriaModal')

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