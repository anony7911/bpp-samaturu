<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Manajuser extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 10;

    protected $queryString = ['search'];

    public $user_id, $name, $email, $password, $password_confirmation, $role;
    protected $users;

    public function render()
    {
        $this->users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate($this->perPage);
        return view('livewire.manajuser',[
            'users' => $this->users
        ])->extends('layouts.app')->section('content');
    }

    public function cancel()
    {
        $this->resetInputFields();
		$this->dispatchBrowserEvent('closeModal');
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->role = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => bcrypt($this->password),
        ]);

        $this->resetInputFields();
		$this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'User Berhasil Ditambahkan.');

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        if ($this->password != null) {
            $this->validate([
                'password' => 'required',
            ]);
        }

        $user = User::findOrFail($this->user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);

        if ($this->password != null) {
            $user->update([
                'password' => bcrypt($this->password),
            ]);
        }


        $this->resetInputFields();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'User Berhasil Diupdate.');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User Berhasil Dihapus.');
    }
}
