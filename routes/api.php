<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('/products')->group(function () {
  Route::post('/', [ProductController::class, 'getAll']);
  Route::post('/add', [ProductController::class, 'add']);
  Route::post('/add-stock', [ProductController::class, 'addStock']);
  Route::post('/bill', [ProductController::class, 'addBill']);
});

Route::prefix('/categories')->group(function () {
  Route::get('/', [CategoryController::class, 'getAll']);
  Route::post('/add', [CategoryController::class, 'insert']);
});

Route::prefix('/sales')->group(function () {
  Route::get('/overall-sales', [SalesController::class, 'getOverallSales']);
});


