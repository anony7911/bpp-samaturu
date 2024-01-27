<?php

namespace App\Http\Livewire;

use App\Models\Petani;
use Livewire\Component;
use App\Models\Alternatif;
use Livewire\WithPagination;

class RatingKecocokan extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama_alternatif, $harga_id, $bahanaktif_id, $dayatahan_id, $hamadibasmi_id, $alternatif_id;

    public function render()
    {
        $keyWord = '%'.$this->keyWord .'%';
        return view('livewire.rating-kecocokan',[
            'alternatifs' => Alternatif::join('hargas', 'alternatifs.harga_id', '=', 'hargas.id')
                        ->join('bahanaktifs', 'alternatifs.bahanaktif_id', '=', 'bahanaktifs.id')
                        ->join('dayatahans', 'alternatifs.dayatahan_id', '=', 'dayatahans.id')
                        ->join('hamadibasmis', 'alternatifs.hamadibasmi_id', '=', 'hamadibasmis.id')
                        ->select('alternatifs.id', 'alternatifs.nama_alternatif', 'hargas.nama as nama_harga', 'bahanaktifs.nama as nama_bahanaktif', 'dayatahans.nama as nama_dayatahan', 'hamadibasmis.nama as nama_hamadibasmi')
						->where('alternatifs.harga_id', '!=', null)
                        ->where('nama_alternatif', 'LIKE', $keyWord)
                        ->orderBy('alternatifs.id', 'DESC')
						->paginate(10),
            'all_alternatifs' => Alternatif::where('harga_id', '=', null)->get(),
            'hargas' => \App\Models\Harga::orderBy('created_at', 'ASC')->get(),
            'bahanaktifs' => \App\Models\Bahanaktif::orderBy('created_at', 'ASC')->get(),
            'dayatahans' => \App\Models\Dayatahan::orderBy('created_at', 'ASC')->get(),
            'hamadibasmis' => \App\Models\Hamadibasmi::orderBy('created_at', 'ASC')->get(),
        ])->extends('layouts.app')->section('content');
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->nama_alternatif = null;
		$this->harga_id = null;
		$this->bahanaktif_id = null;
		$this->dayatahan_id = null;
		$this->hamadibasmi_id = null;
    }

    public function store()
    {
        $this->validate([
		'alternatif_id' => 'required',
		'harga_id' => 'required',
		'bahanaktif_id' => 'required',
		'dayatahan_id' => 'required',
		'hamadibasmi_id' => 'required',
        ]);

        Alternatif::find($this->alternatif_id)->update([
			'harga_id' => $this-> harga_id,
			'bahanaktif_id' => $this-> bahanaktif_id,
			'dayatahan_id' => $this-> dayatahan_id,
			'hamadibasmi_id' => $this-> hamadibasmi_id
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Alternatif Successfully created.');
    }

    public function edit($id)
    {
        $record = Alternatif::findOrFail($id);
        $this->selected_id = $id;
		$this->nama_alternatif = $record-> nama_alternatif;
		$this->harga_id = $record-> harga_id;
		$this->bahanaktif_id = $record-> bahanaktif_id;
		$this->dayatahan_id = $record-> dayatahan_id;
		$this->hamadibasmi_id = $record-> hamadibasmi_id;
    }

    public function update()
    {
        $this->validate([
		'harga_id' => 'required',
		'bahanaktif_id' => 'required',
		'dayatahan_id' => 'required',
		'hamadibasmi_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Alternatif::find($this->selected_id);
            $record->update([
			'harga_id' => $this-> harga_id,
			'bahanaktif_id' => $this-> bahanaktif_id,
			'dayatahan_id' => $this-> dayatahan_id,
			'hamadibasmi_id' => $this-> hamadibasmi_id
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Alternatif Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Alternatif::where('id', $id)->delete();
        }
    }
}
