<?php

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::name('product.show')->get('products/{product}', 'ProductController');

Route::resource('cart', 'CartController')->only(['index', 'store', 'update', 'destroy']);

// Utilisateur authentifié
Route::middleware('auth')->group(function () {

    // Commandes
    Route::prefix('order')->group(function () {
        Route::resource('/', 'OrderController')->names([
            'create' => 'order.create',
            'store' => 'order.store',
        ])->only(['create', 'store']);
        Route::name('order.details')->post('details', 'DetailsController');
    });


});