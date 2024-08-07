<?php

use App\Livewire\Client\ListClient;
use App\Livewire\Client\ShowClient;
use App\Livewire\Financial\IndexFinancial;
use App\Livewire\Keyboard\IndexKeyboard;
use App\Livewire\Service\ListService;
use App\Livewire\Service\ShowService;
use App\Livewire\Transaction\IndexTransaction;
use App\Livewire\Wallet\ListWallet;
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

Route::view('/', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/clientes', ListClient::class)->name('client.list')->lazy();
Route::get('/clientes/{client}', ShowClient::class)->name('client.show');

Route::get('servicos', ListService::class)->name('service.list');
Route::get('servicos/{service}', ShowService::class)->name('service.show');

Route::get('teclado', IndexKeyboard::class)->name('keyboard.index');

Route::get('financeiro', IndexFinancial::class)->name('financial.index');

Route::get('financeiro/carteiras', ListWallet::class)->name('financial.wallet.index');

Route::get('financeiro/extrato', IndexTransaction::class)->name('financial.transaction.index');

require __DIR__.'/auth.php';
