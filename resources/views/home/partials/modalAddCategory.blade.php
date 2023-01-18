<!-- Modal -->
<div class="modal fade" id="modalAddCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog rounded modal-dialog-centered">
      <div class="modal-content shadow border-0 rounded">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-bell"></i> Add New Category</h1>
          <button type="button" class="btn-close" id="modalAddUser_button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="/home/categories" method="POST">
            @csrf

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1" style="width:100px">Name</span>
              <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Category Name" aria-label="Username" aria-describedby="basic-addon1" name="name" value="{{ old('name') }}">
            </div>
            @error('name')
              <div class="alert alert-danger" role="alert">
                {{ $message }}
              </div>
            @enderror
  
  
            <button type="submit" class="btn w-100 text-white" style="background-color: #183153"><i class="fa-solid fa-file-circle-plus"></i> Add Category</button>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="modalAddUser_button" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>