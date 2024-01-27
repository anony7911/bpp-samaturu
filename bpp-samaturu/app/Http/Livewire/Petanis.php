<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Petani;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class Petanis extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nama, $nik, $alamat, $no_hp, $luas_lahan, $status, $user_id, $email, $password;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.petanis.view', [
            'petanis' => Petani::latest()
						->orWhere('nama', 'LIKE', $keyWord)
						->orWhere('nik', 'LIKE', $keyWord)
						->orWhere('alamat', 'LIKE', $keyWord)
						->orWhere('no_hp', 'LIKE', $keyWord)
						->orWhere('luas_lahan', 'LIKE', $keyWord)
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
		$this->nik = null;
		$this->alamat = null;
		$this->no_hp = null;
		$this->luas_lahan = null;
        $this->email = null;
        $this->password = null;
    }

    public function store()
    {
        $this->validate([
		'nama' => 'required',
		'nik' => 'required',
		'alamat' => 'required',
		'no_hp' => 'required',
		'luas_lahan' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required',
        ]);

        $user = User::create([
            'name' => $this-> nama,
            'email' => $this-> email,
            'password' => Hash::make($this-> password),
            'role' => 'user',
        ]);

        Petani::create([
			'nama' => $this-> nama,
			'nik' => $this-> nik,
			'alamat' => $this-> alamat,
			'no_hp' => $this-> no_hp,
			'luas_lahan' => $this-> luas_lahan,
            'user_id' => $user->id,
        ]);



        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Data Kelompok Tani berhasil dibuat.');
    }

    public function edit($id)
    {
        $record = Petani::findOrFail($id);
        $this->selected_id = $id;
		$this->nama = $record-> nama;
		$this->nik = $record-> nik;
		$this->alamat = $record-> alamat;
		$this->no_hp = $record-> no_hp;
		$this->luas_lahan = $record-> luas_lahan;
    }

    public function update()
    {
        $this->validate([
		'nama' => 'required',
		'nik' => 'required',
		'alamat' => 'required',
		'no_hp' => 'required',
		'luas_lahan' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Petani::find($this->selected_id);
            $record->update([
			'nama' => $this-> nama,
			'nik' => $this-> nik,
			'alamat' => $this-> alamat,
			'no_hp' => $this-> no_hp,
			'luas_lahan' => $this-> luas_lahan,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Data Kelompok Tani berhasil diubah.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Petani::where('id', $id)->delete();
        }
    }
}
