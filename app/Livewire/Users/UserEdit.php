<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{
    public $user, $userId, $name, $company, $email, $phone, $position;
    public function mount($userId)
    {
        $this->user = User::where('userId', $userId)->first();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->allRoles = Role::pluck('name')->toArray(); // Get all role names
        $this->position = $this->user->getRoleNames()->first(); // Get the user's current role
    }
    public function update()
    {
        User::where('userId', $this->userId)->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        // Include this if you installed spatie/laravel-permission and use roles for User
        $this->user->syncRoles($this->position);
        session()->flash('alert', [
            'type' => 'success',
            'title' => 'User updated Successfully!',
            'toast' => false,
            'position' => 'center',
            'timer' => 1500,
            'showConfirmButton' => false,
        ]);

        return $this->redirectRoute('users.index', navigate:true);
    }
    #[Title('Edit User')]
    public function render()
    {
        return view('livewire.users.user-edit', [
            'roles' => $this->allRoles
        ]);
    }
}
