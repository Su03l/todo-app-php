<?php

use App\Livewire\Landing;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use App\Livewire\Tasks\Index as TasksIndex;
use App\Livewire\Profile;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// Public
Route::get('/', Landing::class);
Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');

// Protected
Route::middleware('auth')->group(function () {
    Route::get('/tasks', TasksIndex::class)->name('dashboard');
    Route::get('/profile', Profile::class)->name('profile');

    // Logout needs to be a POST request, usually handled by a controller or a Livewire action
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
