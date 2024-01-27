<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alternatif;

class Alternatifs extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama_alternatif, $harga_id, $bahanaktif_id, $dayatahan_id, $hamadibasmi_id;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.alternatifs.view', [
            'alternatifs' => Alternatif::latest()
						->orWhere('nama_alternatif', 'LIKE', $keyWord)
						->orWhere('harga_id', 'LIKE', $keyWord)
						->orWhere('bahanaktif_id', 'LIKE', $keyWord)
						->orWhere('dayatahan_id', 'LIKE', $keyWord)
						->orWhere('hamadibasmi_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
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
		'nama_alternatif' => 'required',
        ]);

        Alternatif::create([
			'nama_alternatif' => $this-> nama_alternatif,
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
		'nama_alternatif' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Alternatif::find($this->selected_id);
            $record->update([
			'nama_alternatif' => $this-> nama_alternatif,
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
