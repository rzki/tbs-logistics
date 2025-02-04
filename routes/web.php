<?php

use App\Livewire\Dashboard;
use App\Livewire\MyProfile;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Public\ShipmentDetail;
use App\Livewire\Roles\RoleEdit;
use App\Livewire\Users\UserEdit;
use App\Livewire\Roles\RoleIndex;
use App\Livewire\Users\UserIndex;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Users\UserCreate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Shipments\ShipmentEdit;
use App\Livewire\Shipments\ShipmentIndex;
use App\Livewire\Shipments\ShipmentCreate;
use App\Livewire\Public\ShipmentIndex as ShipmentSearch;
use App\Livewire\Shipments\Histories\ShipmentHistoryEdit;
use App\Livewire\Shipments\Histories\ShipmentHistoryIndex;
use App\Livewire\Shipments\Histories\ShipmentHistoryCreate;

Route::get('/', ShipmentSearch::class)->name('shipments.search');
Route::get('/shipments/search/{shipmentId}', ShipmentDetail::class)->name('shipments.show');
Route::get('/login', Login::class)->name('login');


Route::middleware('auth')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('shipments', ShipmentIndex::class)->name('shipments.index');
    Route::get('shipments/create', ShipmentCreate::class)->name('shipments.create');
    Route::get('shipments/{shipmentId}/edit', ShipmentEdit::class)->name('shipments.edit');
    Route::get('shipments/{shipmentId}/histories', ShipmentHistoryIndex::class)->name('shipment.histories.index');
    Route::get('shipments/{shipmentId}/histories/create', ShipmentHistoryCreate::class)->name('shipment.histories.create');
    Route::get('shipments/{shipmentId}/histories/{shipmentHistoryId}/edit', ShipmentHistoryEdit::class)->name('shipment.histories.edit');
    Route::get('users', UserIndex::class)->name('users.index');
    Route::get('users/create', UserCreate::class)->name('users.create');
    Route::get('users/{userId}/edit', UserEdit::class)->name('users.edit');
    Route::get('roles', RoleIndex::class)->name('roles.index');
    Route::get('roles/create', RoleCreate::class)->name('roles.create');
    Route::get('roles/{roleId}/edit', RoleEdit::class)->name('roles.edit');
    Route::get('profile', MyProfile::class)->name('profile.show');
    Route::get('logout', Logout::class)->name('logout');
});
