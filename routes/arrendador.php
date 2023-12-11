<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicarController;


Route::get('', [PublicarController::class,'perfil'])->name('publicar.inicio');

