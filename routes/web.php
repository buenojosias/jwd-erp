<?php

use App\Livewire\Client\ListClient;
use App\Livewire\Client\ShowClient;
use App\Livewire\Service\ListService;
use App\Livewire\Service\ShowService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/clientes', ListClient::class)->name('client.list')->lazy();
Route::get('/clientes/{client}', ShowClient::class)->name('client.show');

Route::get('servicos', ListService::class)->name('service.list');
Route::get('servicos/{service}', ShowService::class)->name('service.show');

require __DIR__.'/auth.php';
