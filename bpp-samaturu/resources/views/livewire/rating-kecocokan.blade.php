@section('title', __('Rating Kecocokan'))
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
                                <i class="feather-award text-info"></i> Rating
                                Kecocokan
                            </h4>
                        </div>
                        @if (session()->has('message'))
                        <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top: 0px; margin-bottom: 0px">
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
                                    <h5 class="modal-title" id="createDataModalLabel">Create New Alternatif</h5>
                                    <button wire:click.prevent="cancel()" type="button" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="nama_alternatif">Nama Alternatif</label>
                                            <select wire:model="alternatif_id" class="form-control">
                                                <option value="">Pilih Alternatif</option>
                                                @foreach ($all_alternatifs as $alternatif)
                                                <option value="{{ $alternatif->id }}">
                                                    {{ $alternatif->nama_alternatif }}</option>
                                                @endforeach
                                            </select>
                                            @error('nama_alternatif') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_id">Harga</label>
                                            <select wire:model="harga_id" class="form-control">
                                                <option value="">Pilih Harga</option>
                                                @foreach ($hargas as $harga)
                                                <option value="{{ $harga->id }}">
                                                    {{ $harga->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('harga_id') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bahanaktif_id">Bahan Aktif</label>
                                            <select wire:model="bahanaktif_id" class="form-control">
                                                <option value="">Pilih Bahan Aktif</option>
                                                @foreach ($bahanaktifs as $bahanaktif)
                                                <option value="{{ $bahanaktif->id }}">
                                                    {{ $bahanaktif->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('bahanaktif_id') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="dayatahan_id">Daya Tahan</label>
                                            <select wire:model="dayatahan_id" class="form-control">
                                                <option value="">Pilih Daya Tahan</option>
                                                @foreach ($dayatahans as $dayatahan)
                                                <option value="{{ $dayatahan->id }}">
                                                    {{ $dayatahan->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('dayatahan_id') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="hamadibasmi_id">Hama Dibasmi</label>
                                            <select wire:model="hamadibasmi_id" class="form-control">
                                                <option value="">Pilih Hama Dibasmi</option>
                                                @foreach ($hamadibasmis as $hamadibasmi)
                                                <option value="{{ $hamadibasmi->id }}">
                                                    {{ $hamadibasmi->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('hamadibasmi_id') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary close-btn"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" wire:click.prevent="store()"
                                        class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static"
                        tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel">Update Alternatif</h5>
                                    <button wire:click.prevent="cancel()" type="button" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <input type="hidden" wire:model="selected_id">
                                        <div class="form-group">
                                            <label for="nama_alternatif">Nama Alternatif</label>
                                            <input wire:model="nama_alternatif" type="text" class="form-control"
                                                id="nama_alternatif" placeholder="Masukkan Nama Alternatif" disabled>
                                            </div>
                                        <div class="form-group">
                                            <label for="harga_id">Harga</label>
                                            <select wire:model="harga_id" class="form-control">
                                                <option value="">Pilih Harga</option>
                                                @foreach ($hargas as $harga)
                                                <option value="{{ $harga->id }}">
                                                    {{ $harga->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('harga_id') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bahanaktif_id">Bahan Aktif</label>
                                            <select wire:model="bahanaktif_id" class="form-control">
                                                <option value="">Pilih Bahan Aktif</option>
                                                @foreach ($bahanaktifs as $bahanaktif)
                                                <option value="{{ $bahanaktif->id }}">
                                                    {{ $bahanaktif->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('bahanaktif_id') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="dayatahan_id">Daya Tahan</label>
                                            <select wire:model="dayatahan_id" class="form-control">
                                                <option value="">Pilih Daya Tahan</option>
                                                @foreach ($dayatahans as $dayatahan)
                                                <option value="{{ $dayatahan->id }}">
                                                    {{ $dayatahan->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('dayatahan_id') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="hamadibasmi_id">Hama Dibasmi</label>
                                            <select wire:model="hamadibasmi_id" class="form-control">
                                                <option value="">Pilih Hama Dibasmi</option>
                                                @foreach ($hamadibasmis as $hamadibasmi)
                                                <option value="{{ $hamadibasmi->id }}">
                                                    {{ $hamadibasmi->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('hamadibasmi_id') <span
                                                class="error text-danger">{{ $message }}</span> @enderror
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" wire:click.prevent="update()"
                                        class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>Nama Alternatif</th>
                                    <th>Harga</th>
                                    <th>Bahanaktif</th>
                                    <th>Dayatahan</th>
                                    <th>Hamadibasmi</th>
                                    <td>ACTIONS</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($alternatifs as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_alternatif }}</td>
                                    <td>{{ $row->nama_harga }}</td>
                                    <td>{{ $row->nama_bahanaktif }}</td>
                                    <td>{{ $row->nama_dayatahan }}</td>
                                    <td>{{ $row->nama_hamadibasmi }}</td>
                                    <td width="90">
                                        <a data-bs-toggle="modal" data-bs-target="#updateDataModal"
                                            class="btn btn-sm btn-primary" wire:click="edit({{$row->id}})"><i
                                                class="fa fa-edit"></i> Edit
                                        </a>
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
                        <div class="float-end">{{ $alternatifs->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
