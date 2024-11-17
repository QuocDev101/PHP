<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/users', [UserController::class, 'showUser'])->name('users.list');
Route::get('/admin/APIusers', [UserController::class, 'showAPIUser']);

Route::get('/token', function () {
    return csrf_token(); 
});

Route::get('/admin/users/create', [UserController::class, 'showCreateForm'])->name('users.create');
Route::post('/admin/users', [UserController::class, 'storeUser'])->name('users.store');



Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/Login', [UserController::class, 'showLogin'])->name('login-index');
Route::post('/Login', [UserController::class, 'authenticate'])->name('login');
Route::post('/Logout', [UserController::class, 'logout'])->name('logout');
