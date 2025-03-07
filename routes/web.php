<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('records', RecordController::class);


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
