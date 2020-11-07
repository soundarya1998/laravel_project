<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\AuthController;
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
    return view('login');
});

Route::get('/index', function () {
    return view('Admin/index');
});

Route::get('login',[AuthController::class, 'login']);
Route::post('login',[AuthController::class, 'loginsubmit']);
Route::get('logout',[AuthController::class, 'logoutsubmit']);

Route::resource('/category',CategoryController::class);

Route::resource('/subcategory',SubCategoryController::class);

Route::get('/reverse', function () {
    return view('reverse');
});