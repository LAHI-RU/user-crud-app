<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetailsController;

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
});

Route::middleware(['auth'])->group(function(){
    Route::resource('user-details',UserDetailsController::class);
});
