<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicarController;
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

Route::get('/', HomeController::class)->name('home');
Route::get('sobre-nosotros',[HomeController::class,'AboutUs'])->name('policy');
Route::get('terminos-condiciones', [HomeController::class,'Terms'])->name('terms');

Route::get('anuncio/{slug}', [PublicarController::class,'show'])->name('publicar.show');
Route::put('anuncio/{slug}/editar2', [PublicarController::class,'update2'])->name('publicar.update2');
Route::get('buscar', [PublicarController::class,'index'])->name('buscar.index');
Route::get('anuncio/{slug}/perfil', [PublicarController::class,'perfil'])->name('publicar.perfil');
Route::get('perfil', [PublicarController::class, 'perfil'])->name('anuncio.perfil');
Route::get('anuncio/{slug}/editar', [PublicarController::class,'edit'])->name('publicar.perfil');
Route::put('anuncio/{slug}/editarF', [PublicarController::class,'update'])->name('publicar.update');

Route::put('perfil/{id}/crearF', [PublicarController::class,'createF'])->name('publicar.crearF');
Route::get('perfil/{id}/crear', [PublicarController::class,'create'])->name('publicar.create');
Route::get('perfil/{id}/fotos', [PublicarController::class,'fotos'])->name('publicar.fotos');
Route::put('perfil/{id}/fotos', [PublicarController::class,'fotosC'])->name('publicar.fotosC');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
