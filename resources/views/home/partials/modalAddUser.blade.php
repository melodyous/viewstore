<!-- Modal -->
<div class="modal fade" id="modalAddUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog rounded modal-dialog-centered">
      <div class="modal-content shadow border-0 rounded">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-bell"></i> Add New User</h1>
          <button type="button" class="btn-close" id="modalAddUser_button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="/home/users" method="POST">
            @csrf

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1" style="width:100px">Name</span>
              <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" aria-label="Username" aria-describedby="basic-addon1" name="name" value="{{ old('name') }}">
            </div>
            @error('name')
              <div class="alert alert-danger" role="alert">
                {{ $message }}
              </div>
            @enderror
  
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1" style="width:100px">Username</span>
              <input type="text" class="form-control" placeholder="username" aria-label="Username" aria-describedby="basic-addon1" name="username" value="{{ old('username') }}">
            </div>
  
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1" style="width:100px">Email</span>
              <input type="text" class="form-control" placeholder="User Email" aria-label="email" aria-describedby="basic-addon1" name="email" value="{{ old('email') }}">
            </div>
  
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1" style="width:100px">Password</span>
              <input type="text" class="form-control" placeholder="User password" aria-label="password" aria-describedby="basic-addon1" name="password" value="{{ old('password') }}">
            </div>
  
            <div class="input-group mb-2">
              <span class="input-group-text @error('isAdmin') border border-danger @enderror" id="addon-wrapping" style="width: 100px">Role</span>
              <select class="form-select @error('isAdmin') is-invalid @enderror" name="isAdmin">
                  <option value="" @disabled(true) selected>No Role chosen</option>
                  <option value="1" selected>Admin</option>
                  <option value="0" selected>Not Admin</option>
              </select>
            </div>
  
            <button type="submit" class="btn w-100 text-white" style="background-color: #183153"><i class="fa-solid fa-user-check"></i> Add User</button>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="modalAddUser_button" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>