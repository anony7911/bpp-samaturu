@section('title', __('Hasil Rekomendasi'))
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
                                    <i class="feather-check-circle text-info"></i>
                                    Hasil Rekomendasi
                                </h4>
                            </div>
                            @if (session()->has('message'))
                            <div wire:poll.4s class="alert alert-success" style="margin-top:0px; margin-bottom:0px;">
                                {{ session('message') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        @if(auth()->user()->role == 'user' && $hasilPetani)
                        <div class="row bg-info mb-4 p-1 mx-2 pt-2">
                            <div wire:ignore.self class="row d-flex mb-4">
                                <div class="col-xl-6 col-sm-6 col-12 d-flex">
                                    <label>
                                        Pilihan Anda: {{ $hasilPetani->nama_alternatif }}
                                    </label>
                                </div>
                                <div class="col-xl-6 col-sm-6 col-12">
                                    <button wire:click.prevent="resetPilihan()" class="btn btn-sm btn-danger float-end"><i
                                            class="feather-x-circle"></i>Reset</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                                    <div class="card bg-comman w-100">
                                        <div class="card-body">
                                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                                <div class="db-info">
                                                    <h5>Harga</h5>
                                                    <h6>{{ $hasilPetani->nama_harga }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                                    <div class="card bg-comman w-100">
                                        <div class="card-body">
                                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                                <div class="db-info">
                                                    <h5>Bahan aktif</h5>
                                                    <h6>{{ $hasilPetani->nama_bahanaktif }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                                    <div class="card bg-comman w-100">
                                        <div class="card-body">
                                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                                <div class="db-info">
                                                    <h5>Daya Tahan</h5>
                                                    <h6>{{ $hasilPetani->nama_dayatahan }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                                    <div class="card bg-comman w-100">
                                        <div class="card-body">
                                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                                <div class="db-info">
                                                    <h5>Hama Dibasmi</h5>
                                                    <h6>{{ $hasilPetani->nama_hamadibasmi }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                @php
                                $no = 1;
                                @endphp
                                <thead class="thead bg-dark text-light">
                                    <tr class="text-center">
                                        <td>#</td>
                                        <th>Nama Pestisida</th>
                                        <th>Harga</th>
                                        <th>Bahan aktif</th>
                                        <th>Daya tahan</th>
                                        <th>Hama dibasmi</th>
                                        <th>Nilai Preferensi</th>
                                        @if(auth()->user()->role == 'user' && $no < 5 && !$hasilPetani) <th>Aksi</th>
                                            @endif
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($rekomendasis as $row)
                                    <tr class="text-center">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nama_alternatif }}</td>
                                        <td>{{ $row->nama_harga }}</td>
                                        <td>{{ $row->nama_bahanaktif }}</td>
                                        <td>{{ $row->nama_dayatahan }}</td>
                                        <td>{{ $row->nama_hamadibasmi }}</td>
                                        <td>{{ $row->nilai_preferensi }}</td>
                                        @if(auth()->user()->role == 'user' && !$hasilPetani)
                                        <td>
                                            <button wire:click="pilih({{ $row->id }})" class="btn btn-sm btn-success">
                                                <i class="feather-check-circle"></i> Pilih
                                            </button>
                                        </td>
                                            @endif
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
