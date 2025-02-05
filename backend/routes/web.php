<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/todo', [TodoController::class, 'index'])
  ->name('todo');

Route::post('/todo', [TodoController::class, 'store'])
  ->name('todo.post');
