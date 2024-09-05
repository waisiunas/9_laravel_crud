<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CountryController::class, 'index'])->name('countries');
Route::get('country/create', [CountryController::class, 'create'])->name('country.create');
Route::post('country/create', [CountryController::class, 'store']);
Route::get('country/{country}/edit', [CountryController::class, 'edit'])->name('country.edit');
Route::post('country/{country}/edit', [CountryController::class, 'update']);
Route::post('country/{country}/destroy', [CountryController::class, 'destroy'])->name('country.destroy');
