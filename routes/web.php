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


Route::get('/admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login')->middleware('checkforauth');
Route::post('/admin/check-login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');
//  middleware
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get('allAdmins', [App\Http\Controllers\Admins\AdminsController::class, 'allAdmins'])->name('admins.display');

    Route::get('createAdmins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('admins.create');
    Route::post('createAdmins', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmins'])->name('admins.store');

    //  hometypes
    Route::get('allHomeTypes', [App\Http\Controllers\Admins\HometypesController::class, 'allHomeTypes'])->name('admins.hometypes');

    // create home type
    Route::get('createHomeTypes', [App\Http\Controllers\Admins\HometypesController::class, 'createHomeTypes'])->name('admins.create.hometypes');
    Route::post('createHomeTypes', [App\Http\Controllers\Admins\HometypesController::class, 'storeHomeTypes'])->name('admins.store.hometypes');

    //  edit and update home type
    Route::get('editHomeTypes/{id}', [App\Http\Controllers\Admins\HometypesController::class, 'editHomeTypes'])->name('admins.edit.hometypes');
    Route::post('updateHomeTypes/{id}', [App\Http\Controllers\Admins\HometypesController::class, 'updateHomeTypes'])->name('admins.update.hometypes');

    //  delete home type
    Route::get('deleteHomeTypes/{id}', [App\Http\Controllers\Admins\HometypesController::class, 'deleteHomeTypes'])->name('admins.delete.hometypes');

    // display all requests

    Route::get('allRequests', [App\Http\Controllers\Admins\AdminsController::class, 'allRequests'])->name('admins.allRequests');


    //  props

    Route::get('allProps', [App\Http\Controllers\Admins\AdminsController::class, 'allProps'])->name('admins.allProps');

    // create props
    Route::get('createProps', [App\Http\Controllers\Admins\AdminsController::class, 'createProps'])->name('admins.createProps');
    Route::post('createProps', [App\Http\Controllers\Admins\AdminsController::class, 'storeProps'])->name('admins.storeProps');


    // create gallery

    Route::get('createGallery', [App\Http\Controllers\Admins\AdminsController::class, 'createGallery'])->name('admins.createGallery');
    Route::post('createGallery', [App\Http\Controllers\Admins\AdminsController::class, 'storeGallery'])->name('admins.storeGallery');

    //  delete props

    Route::get('deleteProps/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteProps'])->name('admins.propsDelete');

});


//  Displaying contact and about pages
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


//  about
Route::get('/about', [HomeController::class, 'about'])->name('about');
