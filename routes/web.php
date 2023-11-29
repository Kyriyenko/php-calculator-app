<?php

use App\Controllers\AppController as AppController;

use App\Route\Route as Route;

Route::get('/home', [AppController::class, 'index'])->name('index');
Route::post('/save-data', [AppController::class, 'save'])->name('save-data');
