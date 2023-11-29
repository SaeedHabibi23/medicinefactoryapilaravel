<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriController;

use App\Http\Controllers\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/add_categories' , [CategoriController::class, 'add_categories']);
Route::get('/show_categories' , [CategoriController::class, 'show_categories']);
Route::post('/store_update_categories/{cat_id}' , [CategoriController::class, 'store_update_categories']);
Route::delete('/delete_categories/{cat_id}' , [CategoriController::class, 'delete_categories']);


Route::post('/add_product' , [ProductController::class, 'add_product']);
Route::get('/show_product' , [ProductController::class, 'show_product']);
Route::post('/store_update_product/{product_id}' , [ProductController::class, 'store_update_product']);
Route::delete('/delete_product/{product_id}' , [ProductController::class, 'delete_product']);
