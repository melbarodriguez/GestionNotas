<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotasController; 
use App\Http\Controllers\CategoriasController; 
use App\Http\Controllers\EtiquetasController; 

Route::get('/',[NotasController::class,'index'])->name('nota.index');


Route::get('/nota/{id}/show',[NotasController::class,'show'])->name('nota.show');


Route::get('/nota/crear',[NotasController::class,'create'])->name('nota.crear');
Route::post('/nota/store',[NotasController::class,'store'])->name('nota.store');


Route::post('/categoria/store',[CategoriasController::class,'store'])->name('categoria.store');


Route::post('/etiqueta/store',[EtiquetasController::class,'store'])->name('etiqueta.store');


Route::get('/nota/{id}/editar',[NotasController::class,'edit'])->whereNumber('id')->name('nota.editar');
Route::put('/nota/{id}/editar',[NotasController::class,'update'])->whereNumber('id')->name('nota.update');


Route::delete('/nota/{id}/borrar',[NotasController::class,'destroy'])->whereNumber('id')->name('nota.borrar');
