<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/', [App\Http\Controllers\Props\PropertiesController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');

Route::group(['prefix' => 'props'], function () {
    Route::get('prop-details/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'single'])->name('single.prop');

    // Inserting requests

    Route::post('prop-details/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'insertRequests'])->name('insert.request');

    //  Saving props
    Route::get('save-props/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'saveProps'])->name('show.save.form');
    Route::post('save-props/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'saveProps'])->name('save.prop');


    // Displaying props by rent and buy
    Route::get('type/Buy', [App\Http\Controllers\Props\PropertiesController::class, 'propsBuy'])->name('buy.prop');
    Route::get('type/Rent', [App\Http\Controllers\Props\PropertiesController::class, 'propsRent'])->name('rent.prop');


    // Displaying props by home type
    Route::get('home_type/{home_type}', [App\Http\Controllers\Props\PropertiesController::class, 'displayByHomeType'])->name('display.prop.hometype');

    //  Displaying props by price

    Route::get('price-asc', [App\Http\Controllers\Props\PropertiesController::class, 'priceAsc'])->name('price.asc.prop');
    Route::get('price-desc', [App\Http\Controllers\Props\PropertiesController::class, 'priceDesc'])->name('price.desc.prop');

    // searching for props
    Route::any('search', [App\Http\Controllers\Props\PropertiesController::class, 'searchProps'])->name('search.prop');

});


Route::group(
    ['prefix' => 'users'],
    function () {
        // users pages
        Route::get('all-requests', [App\Http\Controllers\Users\UsersController::class, 'allRequests'])->name('all.requests');
        Route::get('all-saved-props', [App\Http\Controllers\Users\UsersController::class, 'allSavedProps'])->name('all.saved.props');
    }
);



//  Displaying contact and about pages
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


//  about
Route::get('/about', [HomeController::class, 'about'])->name('about');
