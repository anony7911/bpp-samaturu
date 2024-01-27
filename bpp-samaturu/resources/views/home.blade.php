@extends('layouts.app')
@section('title', __('Beranda'))
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-sub-header">
                <h3 class="page-title">Welcome {{ Auth::check() ? Auth::user()->name : 'Guest' }}!</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Beranda</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-6 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Kelompok Tani</h6>
                        <h3>
                            {{ $kelompokTani->count() }}
                        </h3>
                    </div>
                    <div class="db-icon">
                        <img src="assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Pestisida</h6>
                        <h3>
                            {{ $pestisida->count() }}
                        </h3>
                    </div>
                    <div class="db-icon">
                        <img src="assets/img/icons/dash-icon-02.svg" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-sm-12 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body text-center">
                <img src="assets/petani1.png" alt="Dashboard Icon" class="img-fluid" width="20%">
                <h4 class="text-uppercase p-1">
                    <marquee behavior="scroll" direction="left" scrollamount="4">Sistem Pendukung Keputusan Penentuan
                        Pestisida Tanaman Padi</marquee>
                </h4>
            </div>
        </div>
    </div>
</div>
@endsection
