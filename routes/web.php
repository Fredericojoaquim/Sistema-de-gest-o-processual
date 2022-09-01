<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpedienteController;

//EXPEDIENTES
Route::get('/expedientes',[ExpedienteController::class,'index']);
Route::post('/expedientes/store',[ExpedienteController::class,'store'])->middleware('auth');
Route::put('/expedientes/update{id}',[ExpedienteController::class,'update'])->middleware('auth');

//processocrime
Route::get('/processoscrime',[ProcessoCrimeController::class,'index']);
Route::post('/processoscrime/store',[ProcessoCrimeController::class,'store'])->middleware('auth');
Route::put('/processoscrime/update{id}',[ProcessoCrimeController::class,'update'])->middleware('auth');

Route::get('/teste', function () {
    return view('teste');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


