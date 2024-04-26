<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('login/', function () {
//    return view('auth.login');
//})->name('login');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

//------------
//Route::group(['middleware' => 'web'], function () {
//    Route::get('/elfinder', 'ElFinderController@show')->name('elfinder.show');
//    Route::post('/elfinder', 'ElFinderController@connector')->name('elfinder.connector');
//});
//------------
//Auth::routes();
Route::get('single/{id}', [App\Http\Controllers\IndexController::class, 'single'])->name('single');
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::post('save/',[App\Http\Controllers\IndexController::class, 'save'])->name('save');
Route::get('main-massage/hi/',[App\Http\Controllers\IndexController::class, 'main_massage'])->name('main-massage');
Route::post('main-massage-save/',[App\Http\Controllers\IndexController::class, 'main_massage_save'])->name('main-massage-save');
Route::get('/sort', [App\Http\Controllers\SortController::class, 'sort'])->name('sort');







Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
