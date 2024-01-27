<?php

namespace App\Http\Livewire;

use Pdf;
use Livewire\Component;
use App\Models\HasilPetani;
use Livewire\WithPagination;

class Laporan extends Component
{
    use WithPagination;

    public $laporan, $tanggal_mulai, $tanggal_selesai;


    public function render()
    {
        return view('livewire.laporan',[
            'laporan' => HasilPetani::join('hasils', 'hasils.id', '=', 'hasil_petanis.hasil_id')
                            ->join('alternatifs', 'alternatifs.id', '=', 'hasils.alternatif_id')
                            ->join('petanis', 'petanis.id', '=', 'hasil_petanis.petani_id')
                            ->join('hargas', 'hargas.id', '=', 'alternatifs.harga_id')
                            ->join('bahanaktifs', 'bahanaktifs.id', '=', 'alternatifs.bahanaktif_id')
                            ->join('hamadibasmis', 'hamadibasmis.id', '=', 'alternatifs.hamadibasmi_id')
                            ->join('dayatahans', 'dayatahans.id', '=', 'alternatifs.dayatahan_id')
                            ->select('hasils.alternatif_id','alternatifs.nama_alternatif', 'petanis.nama as nama_petani', 'hargas.nama as namaharga', 'bahanaktifs.nama as bahanaktif', 'hamadibasmis.nama as hamadibasmi', 'dayatahans.nama as dayatahan', 'hasil_petanis.created_at')
                            ->get(),
        ])->extends('layouts.app')->section('content');
    }

    public function cetak(){
        $this->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $this->laporan = HasilPetani::join('hasils', 'hasils.id', '=', 'hasil_petanis.hasil_id')
                            ->join('alternatifs', 'alternatifs.id', '=', 'hasils.alternatif_id')
                            ->join('petanis', 'petanis.id', '=', 'hasil_petanis.petani_id')
                            ->join('hargas', 'hargas.id', '=', 'alternatifs.harga_id')
                            ->join('bahanaktifs', 'bahanaktifs.id', '=', 'alternatifs.bahanaktif_id')
                            ->join('hamadibasmis', 'hamadibasmis.id', '=', 'alternatifs.hamadibasmi_id')
                            ->join('dayatahans', 'dayatahans.id', '=', 'alternatifs.dayatahan_id')
                            ->select('hasils.alternatif_id','alternatifs.nama_alternatif', 'petanis.nama as nama_petani', 'hargas.nama as namaharga', 'bahanaktifs.nama as bahanaktif', 'hamadibasmis.nama as hamadibasmi', 'dayatahans.nama as dayatahan', 'hasil_petanis.created_at')
                            ->whereBetween('hasil_petanis.created_at', [$this->tanggal_mulai, $this->tanggal_selesai])
                            ->get();

        $pdf = Pdf::loadView('livewire.laporan-pdf', [
            'laporan' => $this->laporan,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
        ])->setPaper('a4', 'potrait')->output();

        return response()->streamDownload(
            fn () => print($pdf),
            'laporan_' . $this->tanggal_mulai . ' - ' . $this->tanggal_selesai . '.pdf'
        );
    }
}
