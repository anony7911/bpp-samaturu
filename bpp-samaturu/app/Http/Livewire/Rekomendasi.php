<?php

namespace App\Http\Livewire;

use App\Models\Hasil;
use App\Models\Petani;
use Livewire\Component;
use App\Models\HasilPetani;
use Livewire\WithPagination;

class Rekomendasi extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 10;

    protected $rekomendasis, $hasilPetani;


    public function render()
    {
        if(auth()->user()->role == 'user'){
            $petaniId = Petani::where('user_id', auth()->user()->id)->first()->id;

            $this->hasilPetani = HasilPetani::join('hasils', 'hasils.id', '=', 'hasil_petanis.hasil_id')
                            ->join('alternatifs', 'alternatifs.id', '=', 'hasils.alternatif_id')
                            ->join('hargas', 'hargas.id', '=', 'alternatifs.harga_id')
                            ->join('bahanaktifs', 'bahanaktifs.id', '=', 'alternatifs.bahanaktif_id')
                            ->join('dayatahans', 'dayatahans.id', '=', 'alternatifs.dayatahan_id')
                            ->join('hamadibasmis', 'hamadibasmis.id', '=', 'alternatifs.hamadibasmi_id')
                            ->select('hasils.*', 'alternatifs.nama_alternatif', 'hargas.nama as nama_harga', 'bahanaktifs.nama as nama_bahanaktif', 'dayatahans.nama as nama_dayatahan', 'hamadibasmis.nama as nama_hamadibasmi')
                            ->where('petani_id', $petaniId)
                            ->first();
        }
        
        $this->rekomendasis = Hasil::join('alternatifs', 'alternatifs.id', '=', 'hasils.alternatif_id')
                        ->join('hargas', 'hargas.id', '=', 'alternatifs.harga_id')
                        ->join('bahanaktifs', 'bahanaktifs.id', '=', 'alternatifs.bahanaktif_id')
                        ->join('dayatahans', 'dayatahans.id', '=', 'alternatifs.dayatahan_id')
                        ->join('hamadibasmis', 'hamadibasmis.id', '=', 'alternatifs.hamadibasmi_id')
                        ->select('hasils.*', 'alternatifs.nama_alternatif', 'hargas.nama as nama_harga', 'bahanaktifs.nama as nama_bahanaktif', 'dayatahans.nama as nama_dayatahan', 'hamadibasmis.nama as nama_hamadibasmi')
                        ->where('alternatifs.nama_alternatif', 'like', '%'.$this->search.'%')
                        ->orderBy('hasils.nilai_preferensi', 'desc')
                        ->paginate($this->perPage);
        return view('livewire.rekomendasi',[
            'rekomendasis' => $this->rekomendasis,
            'hasilPetani' => $this->hasilPetani,
        ])->extends('layouts.app')->section('content');
    }

    public function pilih($id){
        $petaniId = Petani::where('user_id', auth()->user()->id)->first()->id;
        HasilPetani::create([
            'petani_id' => $petaniId,
            'hasil_id' => $id,
        ]);

        session()->flash('message', 'Berhasil memilih rekomendasi');
    }

    public function resetPilihan(){
        $petaniId = Petani::where('user_id', auth()->user()->id)->first()->id;
        HasilPetani::where('petani_id', $petaniId)->delete();

        session()->flash('message', 'Berhasil mereset pilihan');
    }
}
