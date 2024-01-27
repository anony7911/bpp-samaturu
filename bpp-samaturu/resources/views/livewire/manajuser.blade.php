@section('title', __('Manajemen User'))
<div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                            ">
                            <div class="float-left">
                                <h4>
                                    <i class="feather-award text-info"></i>
                                    Manajemen User
                                </h4>
                            </div>
                            @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success"
                                style="margin-top: 0px; margin-bottom: 0px">
                                {{ session("message") }}
                            </div>
                            @endif
                            <div>
                                <input wire:model="keyWord" type="text" class="form-control" name="search" id="search"
                                    placeholder="Search..." />
                            </div>
                            <div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
                                <i class="fa fa-plus"></i> Tambah Data
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static"
                            tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createDataModalLabel">
                                            Tambah Data User
                                        </h5>
                                        <button wire:click.prevent="cancel()" type="button" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="name">Nama Lengkap</label>
                                                <input wire:model="name" type="text" class="form-control" id="name"
                                                    placeholder="Masukkan Nama Lengkap" />
                                                @error('name')
                                                <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input wire:model="email" type="email" class="form-control" id="email"
                                                    placeholder="Masukkan Nama Lengkap" />
                                                @error('email')
                                                <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Role</label>
                                                <select wire:model="role" class="form-control">
                                                    <option value="">
                                                        Pilih Role
                                                    </option>
                                                    <option value="admin">
                                                        Admin
                                                    </option>
                                                    <option value="user">
                                                        Kelompok Tani
                                                    </option>
                                                </select>
                                                @error('role')
                                                <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input wire:model="password" type="password" class="form-control"
                                                    id="password" placeholder="Masukkan Password" />
                                                @error('password')
                                                <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary close-btn"
                                            data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" wire:click.prevent="store()" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static"
                            tabindex="-1" role="dialog" aria-labelledby="updateDataModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateDataModalLabel">
                                            Update Data User
                                        </h5>
                                        <button wire:click.prevent="cancel()" type="button" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="name">Nama Lengkap</label>
                                                <input wire:model="name" type="text" class="form-control" id="name"
                                                    placeholder="Masukkan Nama Lengkap" />
                                                @error('name')
                                                <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input wire:model="email" type="email" class="form-control" id="email"
                                                    placeholder="Masukkan Nama Lengkap" />
                                                @error('email')
                                                <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Role</label>
                                                <select wire:model="role" class="form-control">
                                                    <option value="">
                                                        Pilih Role
                                                    </option>
                                                    <option value="admin">
                                                        Admin
                                                    </option>
                                                    <option value="user">
                                                        Kelompok Tani
                                                    </option>
                                                </select>
                                                @error('role')
                                                <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input wire:model="password" type="password" class="form-control"
                                                    id="password" placeholder="Masukkan Password" />
                                                @error('password')
                                                <span class="error text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary close-btn"
                                            data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" wire:click.prevent="update()" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="thead">
                                    <tr>
                                        <td>#</td>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <td>ACTIONS</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name}}</td>
                                        <td>{{ $row->email}}</td>
                                        <td>{{ $row->role}}</td>
                                        <td width="90">
                                            <a data-bs-toggle="modal" data-bs-target="#updateDataModal"
                                                class="btn btn-sm btn-primary" wire:click="edit({{$row->id}})"><i
                                                    class="fa fa-edit"></i> Edit
                                            </a>
                                            <button wire:click="delete({{$row->id}})" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i> Delete
                                                    </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="100%">
                                            No data Found
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="float-end">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
