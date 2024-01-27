@section('title', __('Laporan'))
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
                                    <i class="feather-printer text-info"></i>
                                    Laporan
                                </h4>
                            </div>
                            @if (session()->has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" wire:poll.4s>
                                <strong>Gagal!</strong> {{ session('message') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                {{-- date --}}
                                <div class="form-group mb-3">
                                    <label for="basicInput">Tanggal Awal</label>
                                    <input type="date" class="form-control" wire:model="tanggal_mulai">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                {{-- date --}}
                                <div class="form-group mb-3">
                                    <label for="basicInput">Tanggal Akhir</label>
                                    <input type="date" class="form-control" wire:model="tanggal_selesai">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <button class="btn btn-primary btn-block" wire:click="cetak">Cetak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
