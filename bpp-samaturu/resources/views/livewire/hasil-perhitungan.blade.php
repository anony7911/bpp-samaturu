@section('title', __('Hasil Perhitungan'))
<div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;"></div>
                        @if (session()->has('message'))
                        <div wire:poll.4s class="alert alert-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div
                            style="
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                            "
                        >
                            <div class="float-left">
                                <h4>
                                    <i class="feather-airplay text-info"></i>
                                    Matriks Keputusan
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="thead">
                                    <tr class="text-center">
                                        <td>#</td>
                                        <th>Nama Alternatif</th>
                                        <th>Harga</th>
                                        <th>Bahanaktif</th>
                                        <th>Dayatahan</th>
                                        <th>Hamadibasmi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($matriks_keputusan as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->nama_alternatif }}</td>
                                        <td>{{ $row->nilai_harga }}</td>
                                        <td>{{ $row->nilai_bahanaktif }}</td>
                                        <td>{{ $row->nilai_dayatahan }}</td>
                                        <td>{{ $row->nilai_hamadibasmi }}</td>
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
                <div class="card">
                    <div class="card-header">
                        <div
                            style="
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                            "
                        >
                            <div class="float-left">
                                <h4>
                                    <i class="feather-airplay text-info"></i>
                                    Normalisasi
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="thead">
                                    <tr class="text-center">
                                        <td>#</td>
                                        <th>Nama Alternatif</th>
                                        <th>Harga</th>
                                        <th>Bahanaktif</th>
                                        <th>Dayatahan</th>
                                        <th>Hamadibasmi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- $this->nilai_harga_normalisasi = $this->nilai_harga;
                                    $this->nilai_bahanaktif_normalisasi = $this->nilai_bahanaktif;
                                    $this->nilai_dayatahan_normalisasi = $this->nilai_dayatahan;
                                    $this->nilai_hamadibasmi_normalisasi = $this->nilai_hamadibasmi;
                                tampilkan nilai normalisasi
                                -->
                                @foreach($normalisasi as $row)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_alternatif }}</td>
                                    <td>
                                        @if($tipe_harga == 'benefit')
                                        {{ $row->nilai_harga/$max_harga }}
                                        @else
                                        {{ $min_harga/$row->nilai_harga }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($tipe_bahanaktif == 'benefit')
                                        {{ $row->nilai_bahanaktif/$max_bahanaktif }}
                                        @else
                                        {{ $min_bahanaktif/$row->nilai_bahanaktif }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($tipe_dayatahan == 'benefit')
                                        {{ $row->nilai_dayatahan/$max_dayatahan }}
                                        @else
                                        {{ $min_dayatahan/$row->nilai_dayatahan }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($tipe_hamadibasmi == 'benefit')
                                        {{ $row->nilai_hamadibasmi/$max_hamadibasmi }}
                                        @else
                                        {{ $min_hamadibasmi/$row->nilai_hamadibasmi }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div
                            style="
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                            "
                        >
                            <div class="float-left">
                                <h4>
                                    <i class="feather-airplay text-info"></i>
                                    Nilai Preferensi
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="thead">
                                    <tr class="text-center">
                                        <td>#</td>
                                        <th>Nama Alternatif</th>
                                        <th>Nilai Preferensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($normalisasi as $row)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->nama_alternatif }}</td>
                                        <td>
                                            @php
                                            if($tipe_harga == 'benefit'){
                                            $nilai_harga1 = $row->nilai_harga/$max_harga;
                                            }else{
                                            $nilai_harga1 = $min_harga/$row->nilai_harga;
                                            }
                                            if($tipe_bahanaktif == 'benefit'){
                                            $nilai_bahanaktif1 = $row->nilai_bahanaktif/$max_bahanaktif;
                                            }else{
                                            $nilai_bahanaktif1 = $min_bahanaktif/$row->nilai_bahanaktif;
                                            }
                                            if($tipe_dayatahan == 'benefit'){
                                            $nilai_dayatahan1 = $row->nilai_dayatahan/$max_dayatahan;
                                            }else{
                                            $nilai_dayatahan1 = $min_dayatahan/$row->nilai_dayatahan;
                                            }
                                            if($tipe_hamadibasmi == 'benefit'){
                                            $nilai_hamadibasmi1 = $row->nilai_hamadibasmi/$max_hamadibasmi;
                                            }else{
                                            $nilai_hamadibasmi1 = $min_hamadibasmi/$row->nilai_hamadibasmi;
                                            }

                                            $nilai_preferensi = ($nilai_harga1*$bobot_harga)+($nilai_bahanaktif1*$bobot_bahanaktif)+($nilai_dayatahan1*$bobot_dayatahan)+($nilai_hamadibasmi1*$bobot_hamadibasmi);
                                            @endphp
                                            {{ $nilai_preferensi }}
                                            <input wire:model="nilai_pre.{{ $row->id }}" type="hidden" value="{{ $nilai_preferensi }}">
                                            <input wire:model="id_alternatif.{{ $row->id }}" type="hidden" value="{{ $row->id }}">
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
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if($hasils->isEmpty())
                        <button wire:click="store" class="btn btn-primary btn-md btn-block">
                            <i class="feather-save"></i>
                            Simpan Hasil Perhitungan
                        </button>
                        @else
                        <buton wire:click="resetTabel" class="btn btn-danger btn-md btn-block">
                            <i class="feather-trash"></i>
                            Reset Hasil Perhitungan
                        </buton>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
