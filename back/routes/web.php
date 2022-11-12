<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class,'index']);


Route::get('/dashboard', [HomeController::class,'redirect']);
Route::get('/view_category', [AdminController::class,'view_category'])->name('category.view');
Route::post('/add_category', [AdminController::class,'add_category'])->name('category.add');
Route::delete('/delete_category/{id}', [AdminController::class, 'destroy_category'])->name('category.destroy');

Route::get('/view_product', [AdminController::class,'view_product'])->name('product.view');
Route::post('/add_product', [AdminController::class,'add_product'])->name('product.add');
Route::get('/show_product', [AdminController::class,'show_product'])->name('product.show');
Route::delete('/delete_product/{id}', [AdminController::class, 'destroy_product'])->name('product.destroy');
Route::get('/product/{id}/edit', [AdminController::class, 'edit_product'])->name('product.edit');
Route::put('/product/{id}',[AdminController::class, 'update_product'])->name('product.update');
Route::get('/view_searchByProductName', [AdminController::class,'view_searchByProductName'])->name('product.viewSearchByName');
Route::get('/searchByProductName', [AdminController::class,'searchByProductName'])->name('product.SearchByName');

Route::get('/view_order', [AdminController::class,'view_order'])->name('order.view');
Route::get('/search_order', [AdminController::class,'search_order'])->name('order.search');
