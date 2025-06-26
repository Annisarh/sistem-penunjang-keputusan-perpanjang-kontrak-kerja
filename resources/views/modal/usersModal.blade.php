{{-- Create Modal --}}
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Tambah User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('users.simpan')}}" id="addForm" method="POST">
            @csrf
            <div class="form-group mb-3">
              <label for="nama" class="mb-1">Nama User</label>
              <input required class="form-control @error('nama') is-invalid
              @enderror" type="text" name="nama" id="nama"
                placeholder="Masukkan Nama User" />
            </div>
            <div class="form-group mb-3">
              <label for="email" class="mb-1">Email User</label>
              <input required class="form-control @error('email') is-invalid
              @enderror" type="email" name="email" id="email"
                placeholder="Masukkan Email User" />
              @error('email')
                {{$message}}
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="password" class="mb-1">Password User</label>
              <input required class="form-control" type="password" name="password" id="password"
                placeholder="Masukkan Password user" />
            </div>
            <div class="form-group mb-3">
              <label for="role" class="mb-1">Role User</label>
              <select required id="role" name="role" class="form-select status"
                aria-label="Default select example">
                <option class="text-secondary" value="">
                  Klik untuk memilih jenis Role
                </option>
                <option value="admin" class="text-secondary">Admin</option>
                <option value="user" class="text-secondary">User</option>
              </select>
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
    <form action="{{route('users.edit')}}" id="editForm" method="POST">
      @method('put')
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            @csrf
            <input type="hidden" name="id" id="edit-id">
            <div class="form-group mb-3">
              <label for="nama-edit" class="mb-1">Nama User</label>
              <input class="form-control" type="text" required name="nama" id="nama-edit" placeholder="Annisa Rahmadani" />
            </div>
            <div class="form-group mb-3">
              <label for="email-edit" class="mb-1">Email User</label>
              <input class="form-control" type="email" required name="email" id="email-edit" placeholder="annisarahmadani2311@gmail.com" />
            </div>
            <div class="form-group mb-3">
              <label for="role-edit" class="mb-1">Jenis Role User</label>
              <select id="role-edit" required name="role" class="form-select jenis role "
                aria-label="Default select example">
                <option value="admin" class="text-secondary">Admin</option>
                <option value="user" class="text-secondary">User</option>
                <option value="kepala cabang" class="text-secondary">Kepala Cabang</option>
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
          <h4 class="text-center">Apakah anda yakin mengapus User <span class="users-nama"></span>?</h4>
        </div>
        <form action="{{route('users.delete')}}" method="post">
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