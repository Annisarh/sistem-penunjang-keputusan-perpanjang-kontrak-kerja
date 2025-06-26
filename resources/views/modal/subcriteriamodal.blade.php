{{-- Create Modal --}}
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel1">Tambah Sub Kriteria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('subcriteria.simpan')}}" id="addForm" method="POST">
            @csrf
            <input type="hidden" name="criteria_id" id="id">
            <div class="form-group mb-3">
              <label for="kode" class="mb-1">Nama Sub Kriteria</label>
              <input required class="form-control @error('namasub') is-invalid
              @enderror" type="text" name="namasub" id="kode"
                placeholder="Masukkan Nama Sub Kriteria" />
            </div>
            <div class="form-group mb-3">
              <label for="bobot" class="mb-1">Nilai</label>
              <input required class="form-control" type="number" name="nilai" step="any" id="bobot"
                placeholder="Masukkan Nilai Sub Kriteria" />
            </div>
            <div class="form-group mb-3">
                <label for="kode" class="mb-1">Keterangan</label>
                <input required class="form-control @error('keterangan') is-invalid
                @enderror" type="text" name="keterangan" id="kode"
                  placeholder="Masukkan Kode Kriteria" />
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
    <form action="{{route('criteria.edit')}}" id="editForm" method="POST">
      @method('put')
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit Kriteria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            @csrf
            <input type="hidden" name="id" id="edit-id">
            <div class="form-group mb-3">
              <label for="name-edit" class="mb-1">Nama Kriteria</label>
              <input class="form-control" type="text" required name="nama" id="name-edit" placeholder="Ram" />
            </div>
            <div class="form-group mb-3">
              <label for="weight-edit" class="mb-1">Bobot</label>
              <input class="form-control" type="number" required name="bobot" id="weight-edit" placeholder="20" />
            </div>
            <div class="form-group mb-3">
              <label for="benefited-edit" class="mb-1">Jenis</label>
              <select id="benefited-edit" required name="benefited" class="form-select jenis status "
                aria-label="Default select example">
                <option value=0 class="text-secondary">Cost</option>
                <option value=1 class="text-secondary">Benefit</option>
              </select>
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
  
  
  <!-- Import Criteria Modal -->
  <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Tambah Kriteria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="template-wrapper p-2 border border-2 rounded-2 text-center">
              <a href="#">impor-kriteria.xlsx</a>
            </div>
            <div class="impor-wrapper mt-2 p-2 border border-2 rounded-2 text-center">
              <input type="file" name="criteria">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  
  <!-- Delete Modal -->
  <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Hapus Kriteria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h4 class="text-center">Apakah anda yakin mengapus kriteria <span class="criteria-name"></span>?</h4>
        </div>
        <form action="{{route('criteria.delete')}}" method="post">
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