<?php

namespace App\Livewire\Roles;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    use WithPagination;
    public $perPage = 5;
    public $role, $roleId;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function deleteConfirm($roleId)
    {
        $this->roleId = $roleId;
        $this->dispatch('delete-confirmation');
    }
    public function delete()
    {
        $this->role = Role::where('id', $this->roleId)->first();
        $this->role->delete();
        session()->flash('alert', [
            'type' => 'success',
            'title' => 'Role deleted successfully!',
            'toast' => false,
            'position' => 'center',
            'timer' => 1500,
            'progbar' => false,
            'showConfirmButton' => false,
        ]);
        return $this->redirectRoute('roles.index', navigate: true);
    }
    #[Title('Roles')]
    public function render()
    {
        return view('livewire.roles.role-index',[
            'roles' => Role::latest()->paginate($this->perPage),
        ]);
    }
}
