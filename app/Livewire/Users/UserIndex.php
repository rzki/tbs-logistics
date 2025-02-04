<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Hash;

class UserIndex extends Component
{
    use WithPagination;
    public $perPage = 5;
    public $user, $userId;
    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function deleteConfirm($userId)
    {
        $this->userId = $userId;
        $this->dispatch('delete-confirmation');
    }
    public function delete()
    {
        $this->user = User::where('userId', $this->userId)->first();
        $this->user->delete();
        session()->flash('alert', [
            'type' => 'success',
            'title' => 'Product deleted successfully!',
            'toast' => true,
            'position' => 'top-end',
            'timer' => 1500,
            'progbar' => true,
            'showConfirmButton' => false,
        ]);
        return $this->redirectRoute('users.index', navigate: true);
    }
    public function resetPassword($userId)
    {
        $this->user = User::where('userId', $userId)->first();
        $this->user->update([
            'password' => 'Tbs2025!',
        ]);
        session()->flash('alert', [
            'type' => 'success',
            'title' => 'Password reset successfully!',
            'toast' => false,
            'position' => 'center',
            'timer' => 1500,
            'progbar' => false,
            'showConfirmButton' => false,
        ]);
        return $this->redirectRoute('users.index', navigate: true);
    }
    #[Title('Users')]
    public function render()
    {
        return view('livewire.users.user-index',[
            'users' => User::latest()->paginate($this->perPage),
        ]);
    }
}
