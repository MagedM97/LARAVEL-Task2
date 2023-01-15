<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
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

Route::get('/', [HomeController::class, 'view_index']);
Route::get('/shop', [HomeController::class, 'view_shop']);
Route::get('/admin', [AdminController::class, 'view_admin']);
Route::get('/w', function(){return view('welcome');});

Route::prefix('/admin')->group (function () {

    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.index');
    Route::get('/category/create', [CategoriesController::class, 'create']);
    Route::get('/category/{id}/edit', [CategoriesController::class, 'edit']);
    Route::put('/category/{id}', [CategoriesController::class, 'update']);
    Route::get('/category/{id}/show', [CategoriesController::class, 'show']);
    Route::delete('/category/{id}/', [CategoriesController::class, 'delete']);

    Route::resource('products', ProductsController::class);
});