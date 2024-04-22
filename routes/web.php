<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('single/{id}', [App\Http\Controllers\IndexController::class, 'single'])->name('single');
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::post('save/',[App\Http\Controllers\IndexController::class, 'save'])->name('save');
Route::get('/sort', [App\Http\Controllers\SortController::class, 'sort'])->name('sort');





