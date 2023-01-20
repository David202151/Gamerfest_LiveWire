<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('eventos', 'livewire.eventos.index')->middleware('auth');
	Route::view('insgrupales', 'livewire.insgrupales.index')->middleware('auth');
	Route::view('equipos', 'livewire.equipos.index')->middleware('auth');
	Route::view('insinvidviduales', 'livewire.insinvidviduales.index')->middleware('auth');
	Route::view('jugadores', 'livewire.jugadores.index')->middleware('auth');
	Route::view('horarios', 'livewire.horarios.index')->middleware('auth');
	Route::view('aulas', 'livewire.aulas.index')->middleware('auth');
	Route::view('videojuegos', 'livewire.videojuegos.index')->middleware('auth');
	Route::view('categorias', 'livewire.categorias.index')->middleware('auth');
	Route::view('reporteind', 'livewire.reporteinscripcionind.index')->middleware('auth');
	Route::view('reportegru', 'livewire.reporteinscripcciongru.index')->middleware('auth');
	Route::view('recaudacionind', 'livewire.recaudacionind.index')->middleware('auth');
	Route::view('recaudaciongru', 'livewire.recaudaciongru.index')->middleware('auth');
	Route::view('reportehorarios', 'livewire.reportehorarios.index')->middleware('auth');
	Route::get('/pdf-horario',[App\Http\Livewire\ReporteHorarios::class,'pdf'])->name('descargarPDF-Hor');
	Route::get('/pdf-jugadorind',[App\Http\Livewire\ReporteInsIndividual::class,'pdf'])->name('descargarPDF-JugI');
	Route::get('/pdf-jugadorgru',[App\Http\Livewire\ReporteInsGrupal::class,'pdf'])->name('descargarPDF-JugG');
	Route::get('/pdf-recaudacionind',[App\Http\Livewire\ReporteRecaudacionInd::class,'pdf'])->name('descargarPDF-RecI');
	Route::get('/pdf-recaudaciongru',[App\Http\Livewire\ReporteRecaudacionGru::class,'pdf'])->name('descargarPDF-RecG');
	Route::get('/xml-horario',[App\Http\Livewire\ReporteHorarios::class,'excel'])->name('descargarXML-Hor');
	Route::get('/xml-jugadorind',[App\Http\Livewire\ReporteInsIndividual::class,'excel'])->name('descargarXML-JugI');
	Route::get('/xml-jugadorgru',[App\Http\Livewire\ReporteInsGrupal::class,'excel'])->name('descargarXML-JugG');
	Route::get('/xml-recaudacionind',[App\Http\Livewire\ReporteRecaudacionInd::class,'excel'])->name('descargarXML-RecI');
	Route::get('/xml-recaudaciongru',[App\Http\Livewire\ReporteRecaudacionGru::class,'excel'])->name('descargarXML-RecG');
