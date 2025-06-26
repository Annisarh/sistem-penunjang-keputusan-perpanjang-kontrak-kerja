@extends('components.layout')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <h5 class="card-title fw-semibold mb-4">Data Alternatif</h5>
        @include('alert.alert')
        <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary m-1">Tambah Alternatif</button>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Tabel Data Alternatif</h5>
          {{-- {{$alternatives ->links()}} --}}
          <div class="table-responsive">
            <table id="tableBody" class="table text-nowrap mb-0 align-middle" style="width: 50%;">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">No</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Kode Alternatif</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nama</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Posisi</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Tanggal Awal Kontrak</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Tanggal Akhir Kontrak</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Selisih</h6>
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
                    <td>{{$alternative->posisi}}</td>
                    <td>{{\Carbon\Carbon::parse($alternative->tglawal)->translatedFormat('l d-M-Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($alternative->tglakhir)->translatedFormat('l d-M-Y')}}</td>
                    <td>{{$alternative->selisih}}</td>
                    <td>
                        <div class="btn-wrapper d-flex gap-2 flex-wrap">
                          <a href="#" data-id="{{$alternative->id}}" data-nama="{{$alternative->nama}}" data-posisi="{{$alternative->posisi}}" data-tglawal="{{$alternative->tglawal}}" class="btn edit btn-action btn-warning text-white"><i
                          class="ti ti-edit"></i></a>
                          <a href="#" class="delete btn btn-action btn-danger text-white" data-nama="{{$alternative->nama}}"
                          data-id="{{$alternative->id}}">
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

    </div>
  </div>
</div>

@include('modal.alternativeModal')

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
          var posisi = $(this).data('posisi');
          var tglawal = $(this).data('tglawal');
          $('#editmodal').modal('show');
          $('#name-edit').val(nama);
          $('#posisi-edit').val(posisi);
          $('#tgl-awal-edit').val(tglawal);
          $('#edit-id').val(id);
      });
       
      $(document).on('click', '.delete', function(event){
          event.preventDefault();
          var id = $(this).data('id');
          var nama = $(this).data('nama');
          $('#deletemodal').modal('show');
          $('#delete-id').val(id);
          $('.alternative-nama').html(nama);
      });
       
  });

    
</script>
@endpush
