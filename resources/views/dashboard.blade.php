@extends('components.layout')
@section('content')
<div class="container-fluid">
    <div class="card">
      @include('alert.alert')
      <div class="card-body">
        <div class="d-flex justify-content-between mb-4">
          <h5 class="card-title fw-semibold mb-4">Halaman Dashboard</h5>
        </div>
        <div class="data-count-box mt-2 mb-3">
            <div class="row">
              <div class="col-md-6">
                <div class="data-count-item p-3 bg-white rounded rounded-2 border">
                  <h4>Jumlah Data Kriteria :</h4>
                  <p class="fs-4">{{ $criteriaJumlah }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="data-count-item p-3 bg-white rounded rounded-2 border">
                  <h4>Jumlah Data Alternatif :</h4>
                  <p class="fs-4">{{ $alternativesJumlah }}</p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection