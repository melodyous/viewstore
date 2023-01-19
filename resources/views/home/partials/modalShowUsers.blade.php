<!-- Modal -->
<div class="modal fade" id="modalShowUsers" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog rounded modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content shadow border-0 rounded">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-bell"></i> All Active Users</h1>
          <button type="button" class="btn-close" id="modalAddUser_button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            @foreach ($users as $user)    
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">{{ $loop->iteration }}</span>
                    <input type="text" class="form-control rounded-end" placeholder="Category Name" aria-label="Username" aria-describedby="basic-addon1" name="name" value="{{ $user->name }}">
                    <a class="btn bg-warning text-white mx-1 rounded" href="/home/users/{{ $user->id }}/edit"><i class="fa-regular fa-eye"></i> Show</a>
                    <form action="/home/users/{{ $user->id }}" method="POST">
                    @method('delete')
                    @csrf

                    <button class="btn bg-danger text-white mx-1" type="submit" onclick="return confirm('Are you sure ?')"><i class="fa-regular fa-trash-can"></i> Delete</button>
                    </form>
                </div>
            @endforeach

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="modalAddUser_button" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>