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
Route::name('categories.show')->get('categories/{category}', 'CategoryController');

Route::resource('cart', 'CartController')->only(['index', 'store', 'update', 'destroy']);

Route::get('page/{page:slug}', 'HomeController@page')->name('page');

// API
Route::prefix('api/v0')->namespace('Api')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::name('api.categories')->get('/', 'CategoryController@index');
        Route::name('api.category')->get('/{category}', 'CategoryController@show');
    });
    Route::prefix('products')->group(function () {
        Route::name('api.products')->get('/', 'ProductController@index');
    });
    Route::prefix('users')->group(function () {
        Route::name('api.login')->post('login', 'UserController@login');
    });
});

// Utilisateur authentifié
Route::middleware('auth')->group(function () {

    // Gestion du compte
    Route::prefix('account')->group(function () {
        Route::name('account')->get('/', 'AccountController');
        Route::name('identity.edit')->get('identity', 'IdentityController@edit');
        Route::name('identity.update')->put('identity', 'IdentityController@update');
        Route::name('rgpd')->get('rgpd', 'IdentityController@rgpd');
        Route::name('rgpd.pdf')->get('rgpd/pdf', 'IdentityController@pdf');
        Route::resource('addresses', 'AddressController')->except('show');
        Route::resource('orders', 'OrdersController')->only(['index', 'show'])->parameters(['orders' => 'order']);
    });

    // Commandes
    Route::prefix('orders')->group(function () {
        Route::resource('/', 'OrderController')->names([
            'create' => 'order.create',
            'store' => 'order.store',
        ])->only(['create', 'store']);
        Route::name('order.details')->post('details', 'DetailsController');
        Route::name('order.confirm')->get('confirm/{order}', 'OrdersController@confirm');
    });

    // Administration
    Route::prefix('admin')->middleware('admin')->namespace('Admin')->group(function () {
        Route::name('admin')->get('/', 'HomeController@home');
        //Route::name('read')->put('read/{type}', 'AdminController@read');

        Route::name('shop.edit')->get('shop', 'ShopController@edit');
        Route::name('shop.update')->put('shop', 'ShopController@update');

        Route::resource('countries', 'CountryController')->except('show')->parameters(['pays' => 'pays']);
        Route::name('countries.destroy.alert')->get('countries/{country}', 'CountryController@alert');

        Route::name('range.edit')->get('ranges/edit', 'RangeController@edit');
        Route::name('range.update')->put('ranges', 'RangeController@update');

        Route::name('colissimos.edit')->get('colissimos/edit', 'ColissimoController@edit');
        Route::name('colissimos.update')->put('colissimos', 'ColissimoController@update');

        Route::resource('states', 'StateController')->except('show');
        Route::name('states.destroy.alert')->get('states/{etat}', 'StateController@alert');

        Route::resource('pages', 'PageController')->except('show');
        Route::name('pages.destroy.alert')->get('pages/{page}', 'PageController@alert');

        Route::resource('categories', 'CategoryController')->except('show');
        Route::name('categories.destroy.alert')->get('categories/{category}', 'CategoryController@alert');

        Route::resource('products', 'ProductController')->except('show');
        Route::name('products.destroy.alert')->get('products/{product}', 'ProductController@alert');

        Route::resource('customers', 'UserController')->only(['index', 'show']);

        Route::resource('addresses', 'AddressController')->names([
            'index' => 'back.addresses.index',
            'show' => 'back.addresses.show',
        ])->only(['index', 'show']);

        Route::resource('orders', 'OrderController')->only(['index', 'show', 'update'])->names([
            'index' => 'orders.index',
            'show' => 'orders.show',
            'update' => 'orders.update',
        ]);

        Route::name('maintenance.edit')->get('maintenance', 'MaintenanceController@edit');
        Route::name('maintenance.update')->put('maintenance', 'MaintenanceController@update');
        Route::name('cache.update')->put('cache', 'MaintenanceController@cache');

    });

});
