{{-- Create Modal --}}
<div class="modal fade" id="addnamaAlter" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Nama Penanggung Jawab Laporan Alternatif</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('alternatives.laporan')}}" id="addForm" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label for="nama" class="mb-1">Inputkan Nama</label>
              <input required class="form-control @error('kode') is-invalid
              @enderror" type="text" name="nama" id="nama"
                placeholder="Inputkan nama" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Oke</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  {{-- Create Modal --}}
<div class="modal fade" id="addnamaCri" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Nama Penanggung Jawab Laporan Kriteria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('criteria.laporan')}}" id="addForm" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label for="nama" class="mb-1">Inputkan Nama</label>
              <input required class="form-control @error('kode') is-invalid
              @enderror" type="text" name="nama" id="nama"
                placeholder="Inputkan nama" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Oke</button>
        </div>
        </form>
      </div>
    </div>
  </div>

   {{-- Create Modal --}}
<div class="modal fade" id="addnamaHas" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Nama Penanggung Jawab Laporan Kriteria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('exportPdf')}}" id="addForm" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label for="nama" class="mb-1">Inputkan Nama</label>
              <input required class="form-control @error('kode') is-invalid
              @enderror" type="text" name="nama" id="nama"
                placeholder="Inputkan nama" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Oke</button>
        </div>
        </form>
      </div>
    </div>
  </div>
