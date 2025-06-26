@extends('components.layout')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-4">
        <h5 class="card-title fw-semibold mb-4">Data Perhitungan Topsis</h5>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Matriks Keputusan</h5>
          {{-- {{$alternatives ->links()}} --}}
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle border">
                    <thead class="text-dark fs-4 border">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kode Alternative</h6>
                        </th>
                        @foreach ($matrixKeputusan[0] as $values)
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">C{{$loop->iteration}}</h6>
                          </th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($matrixKeputusan as $values)
                        <tr class="border">
                          @foreach ($values as $value)
                            @if ($loop->first)
                              <th class="border-bottom-0">
                                 <h6 class="fw-semibold mb-0">A{{$loop->parent->iteration}}</h6>
                              </th>
                             @endif
                               <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{$value}}</h6>
                              </th>
                          @endforeach
                         </tr>
                       @endforeach
                    </tbody>
                  </table>
                </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Matriks Ternormalisasi</h5>
          {{-- {{$alternatives ->links()}} --}}
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kode Alternatif</h6>
                        </th>
                        @foreach ($matrixNormalisasi[0] as $value)
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">C{{$loop->iteration}}</h6>
                        </th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($matrixNormalisasi as $values)
                            <tr>
                              @foreach ($values as $value)
                                  @if ($loop->first)
                                  <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">A{{$loop->parent->iteration}}</h6>
                                 </th> 
                                  @endif
                                  <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{$value}}</h6>
                                  </th>
                              @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Matriks Ternormalisasi Terbobot</h5>
          {{-- {{$alternatives ->links()}} --}}
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kode Alternatif</h6>
                        </th>
                        @foreach ($matrixNormTerbobot[0] as $value)
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">C{{$loop->iteration}}</h6>
                        </th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($matrixNormTerbobot as $values)
                            <tr>
                              @foreach ($values as $value)
                                  @if ($loop->first)
                                  <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">A{{$loop->parent->iteration}}</h6>
                                 </th> 
                                  @endif
                                  <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">{{$value}}</h6>
                                  </th>
                              @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Solusi Ideal Positif (A+)</h5>
          {{-- {{$alternatives ->links()}} --}}
                <div class="table-responsive">
                  <table id="idealPositif" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kode Kriteria</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Kriteria</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Solusi Ideal Positif (A+)</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @for ($i = 0; $i < count($idealPositif); $i++) 
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">C{{$i+1}}</h6>
                        </th> 
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$criteria[$i]->nama}}</h6>
                        </th> 
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$idealPositif[$i]}}</h6>
                        </th> 
                        </tr>
                        @endfor
                    </tbody>
                  </table>
                </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Solusi Ideal Negatif (A-)</h5>
          {{-- {{$alternatives ->links()}} --}}
                <div class="table-responsive">
                  <table id="idealNegatif" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kode Kriteria</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Kriteria</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Solusi Ideal Positif (A+)</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @for ($i = 0; $i < count($idealNegatif); $i++) 
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">C{{$i+1}}</h6>
                        </th> 
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$criteria[$i]->nama}}</h6>
                        </th> 
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$idealNegatif[$i]}}</h6>
                        </th> 
                        </tr>
                        @endfor
                    </tbody>
                  </table>
                </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Jarak Ideal Positif (D+)</h5>
          {{-- {{$alternatives ->links()}} --}}
                <div class="table-responsive">
                  <table id="idealPositif" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kode Alternatif</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Alternatif</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Jarak Ideal Positif (A+)</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @for ($i = 0; $i < count($getSolusiPositif); $i++) 
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">A{{$i+1}}</h6>
                        </th> 
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$alternatives[$i]->nama}}</h6>
                        </th> 
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$getSolusiPositif[$i]}}</h6>
                        </th> 
                        </tr>
                        @endfor
                    </tbody>
                  </table>
                </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Jarak Ideal Negatif (D-)</h5>
          {{-- {{$alternatives ->links()}} --}}
                <div class="table-responsive">
                  <table id="getSolusiNegatif" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kode Alternatif</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Nama Alternatif</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Jarak Ideal Negatif (A-)</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @for ($i = 0; $i < count($getSolusiNegatif); $i++) 
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">A{{$i+1}}</h6>
                        </th> 
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$alternatives[$i]->nama}}</h6>
                        </th> 
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$getSolusiNegatif[$i]}}</h6>
                        </th> 
                        </tr>
                        @endfor
                    </tbody>
                  </table>
                </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Kedekatan Relatif Terhadap Solusi Ideal (V)</h5>
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
                          <h6 class="fw-semibold mb-0">Kedekatan Relatif Terhadap Solusi Ideal (V)</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @for ($i = 0; $i < count($preferensi); $i++) 
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">A{{$i+1}}</h6>
                        </th> 
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$alternatives[$i]->nama}}</h6>
                        </th> 
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">{{$preferensi[$i]}}</h6>
                        </th> 
                        </tr>
                        @endfor
                    </tbody>
                  </table>
                </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
