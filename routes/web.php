<?php

use App\Http\Controllers\Position\PositionController;
use App\Http\Controllers\Position\SalaryController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('facebook/login/{driver}' , [SocialController::class , 'rediect'])->name('facebook.login');
Route::get('google/login/{driver}' , [SocialController::class , 'rediect'])->name('google.login');
Route::get('callback/{driver}' ,[SocialController::class , 'callback'] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('salary', SalaryController::class);
