<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EscuelaController;
use App\Http\Controllers\ConsejosController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/escribeunconsejo', [EscuelaController::class, 'traemaestros'], function () {
    return view('escribeconsejo');
})->middleware(['auth', 'verified'])->name('escribeunconsejo');

Route::get('/manualdeconsejos', [ConsejosController::class, 'manualdeconsejosvista'], function () {
})->name('manualdeconsejosvista');

Route::get('/search', [ConsejosController::class, 'searchconsejosvista'])->name('searchconsejosvista');

Route::get('/utils/{id}', [EscuelaController::class, 'materias'])->name('materias');

Route::post('/crearconsejo', [ConsejosController::class, 'store'])->name('store');

Route::get('/profesores/{id}/editar', [ConsejosController::class, 'edit'])->name('profesores.edit');

Route::get('/muestraconsejo/{id}', [ConsejosController::class, 'mostrarsolounconsejo'])->name('mostrarsolounconsejo');


require __DIR__ . '/auth.php';
