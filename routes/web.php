<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\logincontroller;
use App\Http\Controllers\Auth\Registercontroller;
use App\Http\Controllers\Auth\Dashboardcontroller;

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


/*register */
Route::get('/register',[Registercontroller::class, 'showRegistrationForm'])->name('register');
Route::post('/register',[Registercontroller::class, 'register']);

/*login */
Route::get('/',[logincontroller::class, 'showLoginForm'])->name('login');
Route::post('/login',[logincontroller::class, 'login']);

Route::post('/logout',[logincontroller::class, 'logout'])->name('logout');

Route::get('/dashboard',[Dashboardcontroller::class, 'dashboard'])->middleware('auth')->name('dashboard');

