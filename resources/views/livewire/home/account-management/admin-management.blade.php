<div>
    <div class="col-lg-12 grid-margin stretch-card p-3">
        <div class="card">
            <div class="card-body">
                <div class="row justify-align-between">
                    <div class="col">
                        <h4 class="card-title">Admin Management</h4>
                    </div>

                    <div class="col text-end">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#createModal">Create New Account</button>
                    </div>

                </div>
                @if (session()->has('error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <p class="card-description">
                <div class="form-group">
                    <input wire:model='search' type="text" class="form-control" placeholder="Search">
                </div>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $key => $account)
                                <tr>
                                    <td>{{ $key + $accounts->firstItem() }}</td>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->email }}</td>
                                    <td>{{ $account->role }}</td>
                                    <td>{{ $account->is_email_verified }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button"
                                                class="btn btn-primary btn-rounded btn-icon btn-sm me-2"
                                                data-bs-toggle="modal" data-bs-target="#updateModal"
                                                wire:click='show({{ $account->id }})'>
                                                <i class="ti-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                wire:click='show({{ $account->id }})'>
                                                <i class="ti-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $accounts->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModal">Create New Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='store'>
                    <div class="modal-body">
                        <div class="form-group">
                            <input wire:model='name' type="name"
                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                placeholder="Username">
                            @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input wire:model='email' type="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input wire:model='password' type="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModal">Update Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='update'>
                    <div class="modal-body">
                        <div class="form-group">
                            <input wire:model='name' type="name"
                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                placeholder="Username">
                            @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input wire:model='email' type="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModal">Delete this account?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"
                        wire:click='delete'>Delete</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        window.addEventListener('closeCreateModal', event => {
            $('#createModal').modal('hide')
        })
        window.addEventListener('closeUpdateModal', event => {
            $('#updateModal').modal('hide')
        })
    </script>
</div>
