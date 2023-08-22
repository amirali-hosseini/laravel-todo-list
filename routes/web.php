<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
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


// Authentications Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    Route::get('/', [TodoController::class, 'index'])->name('index');

    Route::resource('todos', TodoController::class)->only('index', 'store', 'destroy');

    Route::put('/todos/switch/{todo:id}', [TodoController::class, 'switch'])->name('todos.switch');

});
