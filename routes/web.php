<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Bootstrap\RegisterProviders;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\Props\PropertiesController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::get('props/prop-details/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'single'])->name('single.prop');

// Inserting requests

Route::post('props/prop-details/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'insertRequests'])->name('insert.request');

//  Saving props
Route::get('props/save-props/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'saveProps'])->name('show.save.form');
Route::post('props/save-props/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'saveProps'])->name('save.prop');


// Displaying props by rent and buy
Route::get('props/type/Buy', [App\Http\Controllers\Props\PropertiesController::class, 'propsBuy'])->name('buy.prop');
Route::get('props/type/Rent', [App\Http\Controllers\Props\PropertiesController::class, 'propsRent'])->name('rent.prop');


// Displaying props by home type
Route::get('props/home_type/{home_type}', [App\Http\Controllers\Props\PropertiesController::class, 'displayByHomeType'])->name('display.prop.hometype');

