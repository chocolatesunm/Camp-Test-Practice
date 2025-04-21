<?php

use App\Http\Controllers\CampController;
use App\Models\CampUserPrefix;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [CampController::class, 'index']);
Route::get('/add', [CampController::class, 'add']);
Route::post('/insert', [CampController::class, 'insert'])->name('user.insert');
Route::delete('/delete', [CampController::class, 'delete']);
