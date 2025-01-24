<?php

use App\Livewire\Dashboard;
use App\Livewire\MyProfile;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Roles\RoleEdit;
use App\Livewire\Users\UserEdit;
use App\Livewire\Roles\RoleIndex;
use App\Livewire\Users\UserIndex;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Users\UserCreate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class)->name('login');


Route::middleware('auth')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('users', UserIndex::class)->name('users.index');
    Route::get('users/create', UserCreate::class)->name('users.create');
    Route::get('users/{userId}/edit', UserEdit::class)->name('users.edit');
    Route::get('roles', RoleIndex::class)->name('roles.index');
    Route::get('roles/create', RoleCreate::class)->name('roles.create');
    Route::get('roles/{roleId}/edit', RoleEdit::class)->name('roles.edit');
    Route::get('profile', MyProfile::class)->name('profile.show');
    Route::get('logout', Logout::class)->name('logout');
});
