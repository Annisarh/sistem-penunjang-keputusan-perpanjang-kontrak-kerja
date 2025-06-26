@extends('components.layout')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <h5 class="card-title fw-semibold mb-4">Profile User</h5>
        @include('alert.alert')
      </div>
      <div class="card">
        <form action="{{route('profile.update')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama User</label>
                <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" value="{{$user->nama}}">
              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}">
            </div>
            <button type="submit" class="btn btn-primary">Edit Profile</button>
          </form>
      </div>
    </div>
  </div>
@endsection
