<div class="p-3">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row justify-align-between">
                    <div class="col">
                        <h4 class="card-title">User Device Management {{ $device_id }}</h4>
                    </div>

                    <div class="col text-end">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#createModal">Create New User Device</button>
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
                                    Device
                                </th>
                                <th>
                                    User
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key => $data)
                                <tr>
                                    <td>{{ $key + $datas->firstItem() }}</td>
                                    <td>{{ $data->device()->first()->name }}</td>
                                    <td>{{ $data->user()->first()->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button type="button"
                                                class="btn btn-primary btn-rounded btn-icon btn-sm me-2"
                                                data-bs-toggle="modal" data-bs-target="#updateModal"
                                                wire:click='show({{ $data->id }})'>
                                                <i class="ti-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-rounded btn-icon btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                wire:click='show({{ $data->id }})'>
                                                <i class="ti-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $datas->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModal">Create New User Device</h1>
                    <button type="button" class="btn-close" wire:click.prevent='closeCreateModal' aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='store'>
                    <div class="modal-body">
                        <div class="form-group d-flex flex-column" wire:ignore>
                            <select
                                class="js-example-basic-single form-control form-control-lg @error('device_id') border-danger is-invalid @enderror"
                                id="createDevice">
                                <option value="">Select Device</option>
                                @foreach ($devices as $device)
                                    <option value="{{ $device->id }}">{{ $device->name }}</option>
                                @endforeach
                                @error('device_id')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column" wire:ignore>
                            <select
                                class="js-example-basic-single form-control form-control-lg @error('user_id') border-danger is-invalid @enderror"
                                id="createUser">
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                                @error('user_id')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click.prevent='closeCreateModal'>Close</button>
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
                    <h1 class="modal-title fs-5" id="updateModal">Update User Device</h1>
                    <button type="button" class="btn-close" wire:click.prevent='closeUpdateModal' aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='update'>
                    <div class="modal-body">
                        <div class="form-group d-flex flex-column" wire:ignore>
                            <select
                                class="js-example-basic-single form-control form-control-lg @error('device_id') border-danger is-invalid @enderror"
                                id="updateDevice">
                                <option value="">Select Device</option>
                                @foreach ($devices as $device)
                                    <option value="{{ $device->id }}">{{ $device->name }}</option>
                                @endforeach
                                @error('device_id')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group d-flex flex-column" wire:ignore>
                            <select
                                class="js-example-basic-single form-control form-control-lg @error('user_id') border-danger is-invalid @enderror"
                                id="updateUser">
                                <option value="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                                @error('user_id')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click.prevent='closeUpdateModal'
                            wire:click='resetData()'>Close</button>
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
                    <h1 class="modal-title fs-5" id="deleteModal">Delete this user device?</h1>
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

    @push('styles')
        <style>
            .select2-container--open {
                z-index: 10000
            }
        </style>
    @endpush

    @push('scripts')
        <script>

            $(document).ready(function() {

                //INITIAL

                $('#createUser').select2({
                    dropdownParent: $('#createModal'),
                    placeholder: "Select a customer",
                });
                $('#createDevice').select2({
                    dropdownParent: $('#createModal'),
                    placeholder: "Select a customer",
                });
                $('#updateUser').select2({
                    dropdownParent: $('#updateModal')
                });
                $('#updateDevice').select2({
                    dropdownParent: $('#updateModal')
                });

                // ON CHANGE

                $('#createUser').on('change', function(e) {
                    var data = $('#createUser').select2("val");
                    @this.set('user_id', data);
                });

                $('#createDevice').on('change', function(e) {
                    var data = $('#createDevice').select2("val");
                    @this.set('device_id', data);
                });

                $('#updateDevice').on('change', function(e) {
                    var data = $('#updateDevice').select2("val");
                    @this.set('device_id', data);
                });

                $('#updateUser').on('change', function(e) {
                    var data = $('#updateUser').select2("val");
                    @this.set('user_id', data);
                });

                // INITIAL FOR UPDATE

                document.addEventListener('contentChanged', function() {
                    if (@this.current_user && @this.current_device) {
                        $("#updateUser").select2().val(@this.current_user).trigger("change");
                        $("#updateDevice").select2().val(@this.current_device).trigger("change");
                    }
                });

                //CLOSE MODAL

                window.addEventListener('closeCreateModal', event => {
                    $("#createUser").select2().val(null).trigger("change");
                    $("#createDevice").select2().val(null).trigger("change");
                    $('#createModal').modal('hide')
                })

                window.addEventListener('closeUpdateModal', event => {
                    $('#updateModal').modal('hide')
                })

            });
        </script>
    @endpush
</div>
