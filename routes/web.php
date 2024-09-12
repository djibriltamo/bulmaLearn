<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route de connexion
Route::get('/', [LoginController::class, 'showLogin']);
Route::post('/', [LoginController::class, 'login'])->name('auth.login');

//Route d'inscription
Route::get('/register', [RegisterController::class, 'showRegister']);
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');

//Route de déconnexion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//Route pour les utilisateurs authentifiés
Route::middleware('auth')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index']);

    Route::resource('employers', EmployerController::class);
    Route::resource('missions', MissionController::class);
    Route::resource('sites', SiteController::class);

    Route::get('/profile', [RegisterController::class, 'index'])->name('users.index');
    Route::get('/profile/{user}/edit', [RegisterController::class, 'edit'])->name('users.edit');
    Route::put('/profile/{user}', [RegisterController::class, 'profile'])->name('users.profile');

});