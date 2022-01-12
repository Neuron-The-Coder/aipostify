<?php

use App\Http\Controllers\AuthCont;
use App\Http\Controllers\RouteCont;
use App\Http\Controllers\TransactionController;
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

Route::get("/", [RouteCont::class, 'getIndex'])->name('index');
Route::get("/contact-us", [RouteCont::class, 'getContactUs'])->name('contact-us');
Route::middleware('guest')->prefix("/auth")->group(function(){
  Route::get("/login", [RouteCont::class, 'getLogin'])->name('login');
  Route::get("register", [RouteCont::class, 'getRegister'])->name('register');
});

Route::middleware('guest')->prefix('/cont')->group(function () {
  Route::post('/register', [AuthCont::class, 'register'])->name('register-cont');
  Route::post('/login', [AuthCont::class, 'login'])->name('login-cont');

});

Route::middleware('auth')->prefix('/stock')->group(function () {
  Route::get('/in', [RouteCont::class, 'getIn'])->name('input-stock');
  Route::get('/out', [RouteCont::class, 'getOut'])->name('output-stock');
  Route::get('/logout', [AuthCont::class, 'logout'])->name('logout-cont');
  Route::get('/profile', [RouteCont::class, 'getprofile'])->name('profile');
});
