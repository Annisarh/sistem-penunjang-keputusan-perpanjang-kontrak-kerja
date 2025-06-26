@extends('components.layout')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <h5 class="card-title fw-semibold mb-4">Data Users</h5>
        @include('alert.alert')
        <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary m-1">Tambah User</button>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Tabel Data Users</h5>
          {{-- {{$criteria ->links()}} --}}
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama User</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Email User</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Role</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Aksi</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $value)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$value->nama}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->role}}</td>
                        <td class="">
                          <div class="btn-wrapper d-flex gap-2 flex-wrap">
                            <a href="#" data-id="{{$value->id}}" data-nama="{{$value->nama}}" data-email="{{$value->email}}"
                              data-role="{{$value->role}}" class="btn edit btn-action btn-warning text-white"><i
                                class="ti ti-edit"></i></a>
                            <a href="#" class="delete btn btn-action btn-danger text-white" data-nama="{{$value->nama}}"
                              data-id="{{$value->id}}">
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

@include('modal.usersModal')

@endsection

@push('js')
<script type="text/javascript">
  $(document).ready(function(){
      
      // $.ajaxSetup({
      //     headers: {
      //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //     }
      // });

       
      $(document).on('click', '.edit', function (event){
          event.preventDefault();
          var id = $(this).data('id');
          var nama = $(this).data('nama');
          var email = $(this).data('email');
          var role = $(this).data('role');
          $('#editmodal').modal('show');
          $('#nama-edit').val(nama);
          $('#email-edit').val(email);
          $('#role-edit').val(role);
          $('#edit-id').val(id);
      });
       
      $(document).on('click', '.delete', function(event){
          event.preventDefault();
          var id = $(this).data('id');
          var nama = $(this).data('nama');
          $('#deletemodal').modal('show');
          $('#delete-id').val(id);
          $('.users-nama').html(nama);
      });
       
       
  });

    
</script>
@endpush
