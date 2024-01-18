<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BasicCrudController;
use App\Http\Controllers\AjaxCrudController;
///////////////////////////LiveWire 3///////////////////////////
use App\Livewire\Livewire3index;
use App\Livewire\Livewire3Create;
use App\Livewire\Livewire3Edit;
///////////////////////////LiveWire 3///////////////////////////


Route::get('/livewire3crud', Livewire3index::class)->name('livewire3Crud.index');
Route::get('/livewire3crud/create', Livewire3Create::class)->name('livewire3Crud.create');
Route::get('/livewire3crud/{id}/edit', Livewire3Edit::class)->name('livewire3Crud.edit');

// Route::get('/', [BasicCrudController::class, 'index'])->name('basicCrud.index');

Route::get('/basiccrud', [BasicCrudController::class, 'index'])->name('basicCrud.index');
Route::get('/basiccrud/create', [BasicCrudController::class, 'create'])->name('basicCrud.create');
Route::post('/basiccrud', [BasicCrudController::class, 'store'])->name('basicCrud.store');
Route::get('/basiccrud/{id}', [BasicCrudController::class, 'show'])->name('basicCrud.show');
Route::get('/basiccrud/{id}/edit', [BasicCrudController::class, 'edit'])->name('basicCrud.edit');
Route::put('/basiccrud/{id}', [BasicCrudController::class, 'update'])->name('basicCrud.update');
Route::delete('/basiccrud/{id}', [BasicCrudController::class, 'destroy'])->name('basicCrud.destroy');


Route::get('/ajaxcrud', [AjaxCrudController::class, 'index'])->name('ajaxCrud.index');
Route::get('/ajaxcrud/create', [AjaxCrudController::class, 'create'])->name('ajaxCrud.create');
Route::post('/ajaxcrud', [AjaxCrudController::class, 'store'])->name('ajaxCrud.store');
Route::get('/ajaxcrud/{id}', [AjaxCrudController::class, 'show'])->name('ajaxCrud.show');
Route::get('/ajaxcrud/{id}/edit', [AjaxCrudController::class, 'edit'])->name('ajaxCrud.edit');
Route::put('/ajaxcrud/{id}', [AjaxCrudController::class, 'update'])->name('ajaxCrud.update');
Route::delete('/ajaxcrud/{id}', [AjaxCrudController::class, 'destroy'])->name('ajaxCrud.destroy');

