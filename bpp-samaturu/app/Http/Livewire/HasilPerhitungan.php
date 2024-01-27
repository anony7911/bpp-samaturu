<?php

namespace App\Http\Livewire;

use App\Models\Hasil;
use App\Models\HasilPetani;
use Livewire\Component;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Livewire\WithPagination;

class HasilPerhitungan extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;

    protected $listeners = [
        'refreshHasilPerhitungan' => '$refresh',
        'deleteHasilPerhitungan' => 'delete',
    ];

    public $hasilPerhitungan, $nilai_harga_normalisasi, $nilai_bahanaktif_normalisasi, $nilai_dayatahan_normalisasi, $nilai_hamadibasmi_normalisasi, $nilai_preferensi;

    public $nilai_pre=[], $id_alternatif=[];
    public $normalisasi, $hasils;
    protected $tipe_harga, $tipe_bahanaktif, $tipe_dayatahan, $tipe_hamadibasmi, $nilai_harga, $nilai_bahanaktif, $nilai_dayatahan, $nilai_hamadibasmi, $bobot_harga, $bobot_bahanaktif, $bobot_dayatahan, $bobot_hamadibasmi, $hasil;
    public function render()
    {
        $this->tipe_harga = Kriteria::where('nama', 'harga')->first()->tipe;
        $this->tipe_bahanaktif = Kriteria::where('nama', 'bahan aktif')->first()->tipe;
        $this->tipe_dayatahan = Kriteria::where('nama', 'daya tahan')->first()->tipe;
        $this->tipe_hamadibasmi = Kriteria::where('nama', 'hama dibasmi')->first()->tipe;

        $this->bobot_harga = Kriteria::where('nama', 'harga')->first()->bobot;
        $this->bobot_bahanaktif = Kriteria::where('nama', 'bahan aktif')->first()->bobot;
        $this->bobot_dayatahan = Kriteria::where('nama', 'daya tahan')->first()->bobot;
        $this->bobot_hamadibasmi = Kriteria::where('nama', 'hama dibasmi')->first()->bobot;

        $nilai_harga = Alternatif::join('hargas', 'alternatifs.harga_id', '=', 'hargas.id')
                        ->select('alternatifs.id', 'alternatifs.nama_alternatif', 'hargas.nilai as nilai_harga')
                        ->where('alternatifs.harga_id', '!=', null)
                        ->orderBy('alternatifs.id', 'DESC')
                        ->get();

        $nilai_bahanaktif = Alternatif::join('bahanaktifs', 'alternatifs.bahanaktif_id', '=', 'bahanaktifs.id')
                        ->select('alternatifs.id', 'alternatifs.nama_alternatif', 'bahanaktifs.nilai as nilai_bahanaktif')
                        ->where('alternatifs.bahanaktif_id', '!=', null)
                        ->orderBy('alternatifs.id', 'DESC')
                        ->get();

        $nilai_dayatahan = Alternatif::join('dayatahans', 'alternatifs.dayatahan_id', '=', 'dayatahans.id')
                        ->select('alternatifs.id', 'alternatifs.nama_alternatif', 'dayatahans.nilai as nilai_dayatahan')
                        ->where('alternatifs.dayatahan_id', '!=', null)
                        ->orderBy('alternatifs.id', 'DESC')
                        ->get();

        $nilai_hamadibasmi = Alternatif::join('hamadibasmis', 'alternatifs.hamadibasmi_id', '=', 'hamadibasmis.id')
                        ->select('alternatifs.id', 'alternatifs.nama_alternatif', 'hamadibasmis.nilai as nilai_hamadibasmi')
                        ->where('alternatifs.hamadibasmi_id', '!=', null)
                        ->orderBy('alternatifs.id', 'DESC')
                        ->get();

        $this->nilai_harga = $nilai_harga->pluck('nilai_harga')->toArray();
        $this->nilai_bahanaktif = $nilai_bahanaktif->pluck('nilai_bahanaktif')->toArray();
        $this->nilai_dayatahan = $nilai_dayatahan->pluck('nilai_dayatahan')->toArray();
        $this->nilai_hamadibasmi = $nilai_hamadibasmi->pluck('nilai_hamadibasmi')->toArray();

        // max dan min dari $this->nilai_harga, $this->nilai_bahanaktif, $this->nilai_dayatahan, $this->nilai_hamadibasmi
        $max_harga = max($this->nilai_harga);
        $min_harga = min($this->nilai_harga);
        $max_bahanaktif = max($this->nilai_bahanaktif);
        $min_bahanaktif = min($this->nilai_bahanaktif);
        $max_dayatahan = max($this->nilai_dayatahan);
        $min_dayatahan = min($this->nilai_dayatahan);
        $max_hamadibasmi = max($this->nilai_hamadibasmi);
        $min_hamadibasmi = min($this->nilai_hamadibasmi);

        // tipe harga dari $this->tipe_harga, tipe bahan aktif dari $this->tipe_bahanaktif, tipe daya tahan dari $this->tipe_dayatahan, tipe hama dibasmi dari $this->tipe_hamadibasmi
        // $this->nilai_harga, $this->nilai_bahanaktif, $this->nilai_dayatahan, $this->nilai_hamadibasmi
        // rumus normalisasi benefit = nilai alternatif / nilai max, rumus normalisasi cost = nilai min / nilai alternatif
        if ($this->tipe_harga == 'benefit') {
            foreach ($this->nilai_harga as $key => $value) {
                $this->nilai_harga[$key] = $value / $max_harga;
            }
        } else {
            foreach ($this->nilai_harga as $key => $value) {
                $this->nilai_harga[$key] = $min_harga / $value;
            }
        }

        if ($this->tipe_bahanaktif == 'benefit') {
            foreach ($this->nilai_bahanaktif as $key => $value) {
                $this->nilai_bahanaktif[$key] = $value / $max_bahanaktif;
            }
        } else {
            foreach ($this->nilai_bahanaktif as $key => $value) {
                $this->nilai_bahanaktif[$key] = $min_bahanaktif / $value;
            }
        }

        if ($this->tipe_dayatahan == 'benefit') {
            foreach ($this->nilai_dayatahan as $key => $value) {
                $this->nilai_dayatahan[$key] = $value / $max_dayatahan;
            }
        } else {
            foreach ($this->nilai_dayatahan as $key => $value) {
                $this->nilai_dayatahan[$key] = $min_dayatahan / $value;
            }
        }

        if ($this->tipe_hamadibasmi == 'benefit') {
            foreach ($this->nilai_hamadibasmi as $key => $value) {
                $this->nilai_hamadibasmi[$key] = $value / $max_hamadibasmi;
            }
        } else {
            foreach ($this->nilai_hamadibasmi as $key => $value) {
                $this->nilai_hamadibasmi[$key] = $min_hamadibasmi / $value;
            }
        }

        // bobot dari $this->bobot_harga, $this->bobot_bahanaktif, $this->bobot_dayatahan, $this->bobot_hamadibasmi
        // nilai preferensi adalah bobot * nilai normalisasi
        foreach ($this->nilai_harga as $key => $value) {
            $this->nilai_harga[$key] = $value * $this->bobot_harga;
        }

        foreach ($this->nilai_bahanaktif as $key => $value) {
            $this->nilai_bahanaktif[$key] = $value * $this->bobot_bahanaktif;
        }

        foreach ($this->nilai_dayatahan as $key => $value) {
            $this->nilai_dayatahan[$key] = $value * $this->bobot_dayatahan;
        }

        foreach ($this->nilai_hamadibasmi as $key => $value) {
            $this->nilai_hamadibasmi[$key] = $value * $this->bobot_hamadibasmi;
        }

        // nilai preferensi dari $this->nilai_harga, $this->nilai_bahanaktif, $this->nilai_dayatahan, $this->nilai_hamadibasmi
        // nilai preferensi adalah nilai preferensi harga + nilai preferensi bahan aktif + nilai preferensi daya tahan + nilai preferensi hama dibasmi

        // nilai preferensi dari $this->nilai_harga

        foreach ($this->nilai_harga as $key => $value) {
            $this->nilai_preferensi[$key] = $value + $this->nilai_bahanaktif[$key] + $this->nilai_dayatahan[$key] + $this->nilai_hamadibasmi[$key];
        }


        // ambil nilai normalisasi ke sebuah variabel untuk ditampilkan di view
        $this->nilai_harga_normalisasi = $this->nilai_harga;
        $this->nilai_bahanaktif_normalisasi = $this->nilai_bahanaktif;
        $this->nilai_dayatahan_normalisasi = $this->nilai_dayatahan;
        $this->nilai_hamadibasmi_normalisasi = $this->nilai_hamadibasmi;

        //


        // ambil nilai preferensi ke sebuah variabel untuk ditampilkan di view
        $this->nilai_preferensi = $this->nilai_preferensi;

        $this->normalisasi = Alternatif::join('hargas', 'alternatifs.harga_id', '=', 'hargas.id')
                        ->join('bahanaktifs', 'alternatifs.bahanaktif_id', '=', 'bahanaktifs.id')
                        ->join('dayatahans', 'alternatifs.dayatahan_id', '=', 'dayatahans.id')
                        ->join('hamadibasmis', 'alternatifs.hamadibasmi_id', '=', 'hamadibasmis.id')
                        ->select('alternatifs.id', 'alternatifs.nama_alternatif', 'hargas.nilai as nilai_harga', 'bahanaktifs.nilai as nilai_bahanaktif', 'dayatahans.nilai as nilai_dayatahan', 'hamadibasmis.nilai as nilai_hamadibasmi')
                        ->where('alternatifs.harga_id', '!=', null)
                        ->orderBy('alternatifs.id', 'desc')
                        ->get();

        $this->hasils = Hasil::all();

        return view('livewire.hasil-perhitungan', [
            'matriks_keputusan' => Alternatif::join('hargas', 'alternatifs.harga_id', '=', 'hargas.id')
                        ->join('bahanaktifs', 'alternatifs.bahanaktif_id', '=', 'bahanaktifs.id')
                        ->join('dayatahans', 'alternatifs.dayatahan_id', '=', 'dayatahans.id')
                        ->join('hamadibasmis', 'alternatifs.hamadibasmi_id', '=', 'hamadibasmis.id')
                        ->select('alternatifs.id', 'alternatifs.nama_alternatif', 'hargas.nilai as nilai_harga', 'bahanaktifs.nilai as nilai_bahanaktif', 'dayatahans.nilai as nilai_dayatahan', 'hamadibasmis.nilai as nilai_hamadibasmi')
                        ->where('alternatifs.harga_id', '!=', null)
                        ->orderBy('alternatifs.id', 'DESC')
                        ->get(),
            'hasils'    => $this->hasils,
            'normalisasi' => $this->normalisasi,
            'tipe_harga' => $this->tipe_harga,
            'tipe_bahanaktif' => $this->tipe_bahanaktif,
            'tipe_dayatahan' => $this->tipe_dayatahan,
            'tipe_hamadibasmi' => $this->tipe_hamadibasmi,
            'bobot_harga' => $this->bobot_harga,
            'bobot_bahanaktif' => $this->bobot_bahanaktif,
            'bobot_dayatahan' => $this->bobot_dayatahan,
            'bobot_hamadibasmi' => $this->bobot_hamadibasmi,
            'max_harga' => $max_harga,
            'max_bahanaktif' => $max_bahanaktif,
            'max_dayatahan' => $max_dayatahan,
            'max_hamadibasmi' => $max_hamadibasmi,
            'min_harga' => $min_harga,
            'min_bahanaktif' => $min_bahanaktif,
            'min_dayatahan' => $min_dayatahan,
            'min_hamadibasmi' => $min_hamadibasmi,
            'nilai_harga_normalisasi' => $this->nilai_harga_normalisasi,
            'nilai_bahanaktif_normalisasi' => $this->nilai_bahanaktif_normalisasi,
            'nilai_dayatahan_normalisasi' => $this->nilai_dayatahan_normalisasi,
            'nilai_hamadibasmi_normalisasi' => $this->nilai_hamadibasmi_normalisasi,
            'nilai_preferensi' => $this->nilai_preferensi,
        ])->extends('layouts.app')->section('content');
    }

    public function store(){
        // nilai_preferensi dan alternatif_id akan disimpan pada tabel hasil
        foreach ($this->normalisasi as $key => $value) {
            Hasil::create([
                'alternatif_id' => $value->id,
                'nilai_preferensi' => $this->nilai_preferensi[$key],
            ]);
        }
        return redirect('/hasil')->with('message', 'Data hasil perhitungan berhasil disimpan');
    }

    public function resetTabel(){
        // delete all data in table hasil
        HasilPetani::truncate();

        // delete all data in table hasil
        foreach ($this->hasils as $key => $value) {
            $value->delete();
        }
        return redirect('/hasil')->with('message', 'Data hasil perhitungan berhasil direset');
    }
}
