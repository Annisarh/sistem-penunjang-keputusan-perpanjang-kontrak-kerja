@extends('components.layout')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <h5 class="card-title fw-semibold mb-4">Laporan Hasil</h5>
        {{-- @include('alert.alert') --}}
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Tabel Laporan</h5>
          {{-- {{$alternatives ->links()}} --}}
                <div class="table-responsive">
                  <table id="tableBody" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Laporan</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Aksi</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Laporan Hasil</td>
                        <td>
                          <div class="btn-wrapper d-flex gap-2 flex-wrap">
                            {{-- <a href="{{route('exportPdf')}}" class="btn edit btn-action btn-warning text-white"><i
                            class="ti ti-edit"></i></a> --}}
                            <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#addnamaHas" class="btn btn-primary m-1">Lihat Laporan</button>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Laporan Kriteria</td>
                        <td>
                          <div class="btn-wrapper d-flex gap-2 flex-wrap">
                            {{-- <a href="{{route('criteria.laporan')}}" class="btn edit btn-action btn-warning text-white"><i
                            class="ti ti-edit"></i></a> --}}
                            <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#addnamaCri" class="btn btn-primary m-1">Lihat Laporan</button>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Laporan Alternatif</td>
                        <td>
                          <div class="btn-wrapper d-flex gap-2 flex-wrap">
                            {{-- <a href="{{route('alternatives.laporan')}}" class="btn edit btn-action btn-warning text-white"><i
                            class="ti ti-edit"></i></a> --}}
                            <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#addnamaAlter" class="btn btn-primary m-1">Lihat Laporan</button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
        </div>
      </div>
    </div>
</div>
@include('modal.laporanModal')
@endsection