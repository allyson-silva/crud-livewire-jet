<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Select2\Select2Index;
use App\Livewire\Customer\CustomerIndex;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/customer', CustomerIndex::class)->name('customer.index');

    // Route::get('/reward', RewardIndex::class)->name('reward.index');

    Route::get('/select2', Select2Index::class)->name('select2.index');


});
