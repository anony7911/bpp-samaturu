<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Tambah Kelompok Tani Baru</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="nama">Nama Kelompok Tani</label>
                        <input wire:model="nama" type="text" class="form-control" id="nama" placeholder="Nama Kelompok Tani">@error('nama') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">Ketua Kelompok Tani</label>
                        <input wire:model="nik" type="text" class="form-control" id="nik" placeholder="Ketua Kelompok Tani">@error('nik') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat </label>
                        <input wire:model="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat">@error('alamat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input wire:model="no_hp" type="text" class="form-control" id="no_hp" placeholder="No Hp">@error('no_hp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="luas_lahan">Luas Lahan</label>
                        <input wire:model="luas_lahan" type="text" class="form-control" id="luas_lahan" placeholder="Luas Lahan">@error('luas_lahan') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input wire:model="email" type="email" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input wire:model="password" type="password" class="form-control" id="password" placeholder="Password">@error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Kelompok Tani</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nama">Nama Kelompok Tani</label>
                        <input wire:model="nama" type="text" class="form-control" id="nama" placeholder="Nama Kelompok Tani">@error('nama') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">Ketua Kelompok Tani</label>
                        <input wire:model="nik" type="text" class="form-control" id="nik" placeholder="Ketua Kelompok Tani">@error('nik') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat </label>
                        <input wire:model="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat">@error('alamat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input wire:model="no_hp" type="text" class="form-control" id="no_hp" placeholder="No Hp">@error('no_hp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="luas_lahan">Luas Lahan</label>
                        <input wire:model="luas_lahan" type="text" class="form-control" id="luas_lahan" placeholder="Luas Lahan">@error('luas_lahan') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Simpan</button>
            </div>
       </div>
    </div>
</div>
