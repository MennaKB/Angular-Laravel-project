<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Api\AdminController;

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

// Route::get('/create', function (){return "we are here!";});
Route::get('/product', function (){
    return Product::all() ;
    // return Category::all() ;
    // return "hi" ;
});


// category Api routes for Admin
Route::get('/view_all_category', [AdminController::class,'view_category']);
Route::post('/add_new_category', [AdminController::class,'add_category']);
Route::delete('/delete_category/{id}', [AdminController::class, 'destroy_category']);

// Product Api routes for Admin
Route::get('/view_all_product', [AdminController::class,'view_product']);
Route::post('/add_new_product', [AdminController::class,'add_product']);
Route::delete('/delete_product/{id}', [AdminController::class, 'destroy_product']);
Route::put('/update_product',[AdminController::class, 'update_product']);
Route::get('/searchByProductName/{name}', [AdminController::class,'searchByProductName']);

// Order Api routes for Admin
Route::get('/view_all_order', [AdminController::class,'view_order']);
Route::get('/search_for_order/{name}', [AdminController::class,'search_order']);
Route::put('/update_order',[AdminController::class, 'update_order']);




//  get       http://127.0.0.1:8000/api/view_all_category
//  post      http://127.0.0.1:8000/api/add_new_category
//  delete    http://127.0.0.1:8000/api/delete_category/{id}

//  get       http://127.0.0.1:8000/api/view_all_product
//  post      http://127.0.0.1:8000/api/add_new_product
//  delete    http://127.0.0.1:8000/api/delete_product/{id}
//  put       http://127.0.0.1:8000/api/update_product
//  get       http://127.0.0.1:8000/api/searchByProductName/{name}

//  get       http://127.0.0.1:8000/api/view_all_order
//  get       http://127.0.0.1:8000/api/search_for_order/{name}
//  put       http://127.0.0.1:8000/api/update_order



