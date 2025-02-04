<?php

namespace App\Livewire\Users;

use App\Models\Company;
use App\Models\User;
use Hash;
use Livewire\Component;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;
use Str;

class UserCreate extends Component
{
    public $name, $email, $position;
    public function create()
    {
        $user = User::create([
            'userId' => Str::orderedUuid(),
            'name' => $this->name,
            'email' => $this->email,
            'password' => 'Tbs2025!',
        ]);
        $user->assignRole($this->position);
        session()->flash('alert', [
            'type' => 'success',
            'title' => 'User created Successfully!',
            'toast' => false,
            'position' => 'center',
            'timer' => 1500,
            'showConfirmButton' => false,
        ]);

        return $this->redirectRoute('users.index', navigate:true);
    }
    #[Title('Create New User')]
    public function render()
    {
        return view('livewire.users.user-create',[
            // Include this if you installed spatie/laravel-permission and use roles for User
            'roles' => Role::all()
        ]);
    }
}
