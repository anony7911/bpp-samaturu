<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kriteria;

class Kriterias extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama, $bobot, $tipe;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.kriterias.view', [
            'kriterias' => Kriteria::latest()
						->orWhere('nama', 'LIKE', $keyWord)
						->orWhere('bobot', 'LIKE', $keyWord)
						->orWhere('tipe', 'LIKE', $keyWord)
						->paginate(10),
            
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
		$this->nama = null;
		$this->bobot = null;
		$this->tipe = null;
    }

    public function store()
    {
        $this->validate([
		'nama' => 'required',
		'bobot' => 'required',
		'tipe' => 'required',
        ]);

        Kriteria::create([
			'nama' => $this-> nama,
			'bobot' => $this-> bobot,
			'tipe' => $this-> tipe
        ]);

        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Kriteria Successfully created.');
    }

    public function edit($id)
    {
        $record = Kriteria::findOrFail($id);
        $this->selected_id = $id;
		$this->nama = $record-> nama;
		$this->bobot = $record-> bobot;
		$this->tipe = $record-> tipe;
    }

    public function update()
    {
        $this->validate([
		'nama' => 'required',
		'bobot' => 'required',
		'tipe' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Kriteria::find($this->selected_id);
            $record->update([
			'nama' => $this-> nama,
			'bobot' => $this-> bobot,
			'tipe' => $this-> tipe
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Kriteria Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Kriteria::where('id', $id)->delete();
        }
    }
}
