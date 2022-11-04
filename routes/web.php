<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/users', [AdminController::class, 'users'])->middleware('auth');
Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUser'])->middleware('auth');
Route::get('/redirects' , [HomeController::class, 'redirects'])->middleware('auth');

//Order
Route::post('/orderConfirm' , [HomeController::class, 'orderConfirm'])->middleware('auth');
Route::get('/viewOrder' , [AdminController::class, 'viewOrder'])->middleware('auth');

//food
Route::get('/foodMenu', [AdminController::class, 'foodMenu'])->middleware('auth');
Route::post('/uploadFood', [AdminController::class, 'upload'])->middleware('auth');
Route::get('/deleteFood/{id}', [AdminController::class, 'delete'])->middleware('auth');
Route::get('/updateView/{id}', [AdminController::class, 'updateView'])->middleware('auth');
Route::put('/updateFood/{id}', [AdminController::class, 'updateFood'])->middleware('auth');

//Cart
Route::post('/addCart/{id}', [HomeController::class, 'addCart'])->middleware('auth');
Route::get('/showCart/{id}', [HomeController::class, 'showCart'])->middleware('auth');
Route::get('/remove/{id}', [HomeController::class, 'remove'])->middleware('auth');

//Res
Route::get('/viewReservation', [AdminController::class, 'viewReservation'])->middleware('auth');
Route::get('/deleteReservation/{id}', [AdminController::class, 'deleteReservation'])->middleware('auth');
Route::get('/updateViewReservation/{id}', [AdminController::class, 'updateViewReservation'])->middleware('auth');
Route::put('/updateReservation/{id}', [AdminController::class, 'updateReservation'])->middleware('auth');
Route::post('/reservation', [AdminController::class, 'reservation']);


//chef
Route::get('/viewChef', [AdminController::class, 'viewChef'])->middleware('auth');
Route::post('/uploadChef', [AdminController::class, 'uploadChef'])->middleware('auth');
Route::get('/updateChef/{id}', [AdminController::class, 'updateChef'])->middleware('auth');
Route::put('/updateFoodChef/{id}', [AdminController::class, 'updateFoodChef'])->middleware('auth');
Route::get('/deleteChef/{id}', [AdminController::class, 'deleteChef'])->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
