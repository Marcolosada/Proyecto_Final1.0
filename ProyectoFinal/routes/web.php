<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EscuelaController;
use App\Http\Controllers\ConsejosController;

use App\Http\Controllers\DescripcionprofesController;

use App\Http\Livewire\UserPagination;
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

Route::get('/solicitudes', [ConsejosController::class, 'solicitudes'])->middleware(['auth', 'verified'])->name('solicitudes');

Route::get('/aceptarsolicitud/{idconsejo}', [ConsejosController::class, 'validasolicitud'])->name('validasolicitud');
Route::get('/cancelarsolicitud/{idconsejo}', [ConsejosController::class, 'cancelarsolicitud'])->name('cancelasolici');

Route::get('/misconsejos', [ConsejosController::class, 'misconsejos'])->name('misconsejos');

Route::get('/activauserconsejo/{idconsejo}', [ConsejosController::class, 'activarconsejouser'])->name('activarconsejouser');
Route::get('/eliminarconsejo/{idconsejo}', [ConsejosController::class, 'eliminarconsejouser'])->name('eliminarconsejouser');
Route::get('/updateconsejo/{idconsejo}', [ConsejosController::class, 'actulizarconsejo'])->name('actulizarconsejo');

Route::post('/actualizamiconsejo', [ConsejosController::class, 'update'])->name('update');

Route::get('/consejosgenral', [ConsejosController::class, 'generalconsejos'])->middleware(['auth', 'verified'])->name('generalconsejos');


Route::get('/laprofedex', [ConsejosController::class, 'laprofedex'])->name('laprofedex');
Route::get('/searchmaestros', [DescripcionprofesController::class, 'searchmaestros'])->name('searchmaestros');
Route::get('/profedexprofe/{id}', [DescripcionprofesController::class, 'profedexsolo'])->name('profedexsolo');

require __DIR__ . '/auth.php';
