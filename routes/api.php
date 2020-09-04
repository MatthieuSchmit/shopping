<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// s2 - categories
Route::get('categories', function (Request $request) {
    return DB::table('categories')
        ->select('name as text', 'id')
        ->distinct()
        ->where('name', 'like', '%' . $request->input('search') . '%')
        ->get();
});
