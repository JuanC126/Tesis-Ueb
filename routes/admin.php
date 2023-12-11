<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('', [HomeController::class,'index'])->name('index');
Route::put('eliminar-anuncio/{id}',[HomeController::class,'delete'])->name('eliminar-anuncio');

