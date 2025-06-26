{{-- Create Modal --}}
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Tambah Alternatif</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('alternative.simpan')}}" id="addForm" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label for="kode" class="mb-1">Kode Alternatif</label>
              <input required class="form-control @error('kode') is-invalid
              @enderror" type="text" name="kode" id="kode"
                placeholder="Masukkan Kode Alternatif" />
            </div>
            <div class="form-group mb-3">
              <label for="nama" class="mb-1">Nama Alternatif</label>
              <input required class="form-control @error('nama') is-invalid
              @enderror" type="text" name="nama" id="nama"
                placeholder="Masukkan Nama Alternatif" />
              @error('nama')
                {{$message}}
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="position" class="mb-1">Posisi</label>
              <input required class="form-control @error('position') is-invalid
              @enderror" type="text" name="position" id="position"
                placeholder="Masukkan posisi alternatif" />
              @error('position')
                {{$message}}
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="tglawal" class="mb-1">Tanggal Awal Kontrak</label>
              <input required class="form-control @error('tglawal') is-invalid
              @enderror" type="date" name="tglawal" id="tglawal"
                placeholder="Masukkan tanggal awal kontrak" />
              @error('tglawal')
                {{$message}}
              @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  
  <!-- Edit Modal -->
  <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="{{route('alternative.edit')}}" id="editForm" method="POST">
      @method('put')
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit Alternative</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            @csrf
            <input type="hidden" name="id" id="edit-id">
            <div class="form-group mb-3">
              <label for="name-edit" class="mb-1">Nama Alternative</label>
              <input class="form-control" type="text" required name="nama" id="name-edit" placeholder="Ram" />
            </div>
            <div class="form-group mb-3">
              <label for="posisi-edit" class="mb-1">Posisi</label>
              <input required class="form-control @error('position') is-invalid
              @enderror" type="text" name="position" id="posisi-edit"
                placeholder="Masukkan posisi alternatif" />
              @error('position')
                {{$message}}
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="tgl-awal-edit" class="mb-1">Tanggal Awal Kontrak</label>
              <input required class="form-control @error('tglawal') is-invalid
              @enderror" type="date" name="tglawal" id="tgl-awal-edit"
                placeholder="Masukkan tanggal awal kontrak" />
              @error('tglawal')
                {{$message}}
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-warning text-white">Edit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  
  <!-- Delete Modal -->
  <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Hapus Alternative</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h4 class="text-center">Apakah anda yakin mengapus Alternative<span class="criteria-name"></span>?</h4>
        </div>
        <form action="{{route('alternative.delete')}}" method="post">
          @method('delete')
          @csrf
          <input type="hidden" name="id" id="delete-id">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" id="deletecriteria" class="btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>