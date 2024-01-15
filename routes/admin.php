<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class,'index'])->middleware('can:eliminar anuncios')->name('admin.home');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('users', UserController::class)->names('admin.users');

Route::put('eliminar-anuncio/{id}',[HomeController::class,'delete'])->name('eliminar-anuncio');


